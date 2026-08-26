<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>ShipEquipAR Admin Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        :root{
            --sidebar-width:250px;
            --nav-bg:#0f172a;
            --nav-item:#1e293b;
            --blue:#0284c7;
            --cyan:#38bdf8;
        }


        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI',sans-serif;
        }


        html,
        body{
            width:100%;
            min-height:100%;
            overflow-x:hidden;
        }


        body{
            min-height:100vh;

            background:
            linear-gradient(
                rgba(3,37,65,.88),
                rgba(2,132,199,.72)
            ),
            url('https://images.unsplash.com/photo-1569263979104-865ab7cd8d13');

            background-size:cover;
            background-position:center;
            background-attachment:fixed;
        }


        body.sidebar-open{
            overflow:hidden;
        }



        /* =====================================================
           MOBILE TOPBAR
        ===================================================== */

        .mobile-topbar{
            display:none;
        }


        .mobile-brand{
            font-weight:900;
            color:white;
        }


        .mobile-brand span{
            color:var(--cyan);
        }



        /* =====================================================
           OVERLAY
        ===================================================== */

        .sidebar-overlay{
            position:fixed;
            inset:0;

            background:rgba(0,0,0,.55);

            opacity:0;
            visibility:hidden;

            transition:.25s;

            z-index:1290;
        }


        .sidebar-overlay.open{
            opacity:1;
            visibility:visible;
        }



        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar{
            position:fixed;

            top:0;
            left:0;

            width:var(--sidebar-width);

            height:100vh;
            height:100dvh;

            background:rgba(15,23,42,.98);

            padding:28px 18px;

            overflow-y:auto;

            z-index:1300;
        }


        .drawer-close{
            display:none;
        }



        /* =====================================================
           LOGO
        ===================================================== */

        .logo{
            width:100%;

            text-align:center;

            margin-bottom:30px;

            font-size:27px;

            font-weight:900;

            color:white;
        }


        .logo span{
            color:var(--cyan);
        }



        /* =====================================================
           MENU
        ===================================================== */

        .menu{
            width:100%;

            display:flex;

            flex-direction:column;

            gap:9px;
        }


        .menu-link{
            width:100%;

            min-height:52px;

            display:flex;

            align-items:center;

            gap:10px;

            padding:12px 13px;

            background:var(--nav-item);

            color:#e2e8f0;

            border-radius:12px;

            text-decoration:none;

            font-size:13px;

            font-weight:600;

            transition:.22s;
        }


        .menu-link:hover{
            background:#0369a1;

            color:white;

            transform:translateX(3px);
        }


        .menu-link.active{
            background:var(--blue);

            color:white;
        }


        .menu-icon{
            width:24px;

            flex-shrink:0;

            text-align:center;
        }


        .menu-text{
            flex:1;

            min-width:0;

            white-space:nowrap;
        }



        /* =====================================================
           LOGOUT
        ===================================================== */

        .logout-form{
            width:100%;
        }


        .logout-btn{
            width:100%;

            min-height:52px;

            margin-top:10px;

            padding:13px;

            border:none;

            border-radius:12px;

            background:#dc2626;

            color:white;

            font-size:14px;

            font-weight:700;

            cursor:pointer;

            transition:.2s;
        }


        .logout-btn:hover{
            background:#b91c1c;
        }



        /* =====================================================
           CONTENT
        ===================================================== */

        .content{
            margin-left:var(--sidebar-width);

            width:calc(100% - var(--sidebar-width));

            min-height:100vh;

            padding:clamp(22px,3vw,40px);
        }


        .content-inner{
            width:100%;

            max-width:1400px;

            margin:0 auto;
        }



        /* =====================================================
           WELCOME
        ===================================================== */

        .welcome{
            width:100%;

            background:
            linear-gradient(
                135deg,
                rgba(14,116,144,.96),
                rgba(15,23,42,.96)
            );

            border-radius:26px;

            padding:clamp(28px,4vw,45px);

            color:white;

            display:flex;

            align-items:center;

            justify-content:space-between;

            gap:28px;

            box-shadow:0 12px 30px rgba(0,0,0,.16);
        }


        .welcome-copy{
            flex:1;
            min-width:0;
        }


        .welcome h1{
            font-size:clamp(29px,3vw,43px);

            line-height:1.2;

            font-weight:900;
        }


        .welcome p{
            margin-top:12px;

            font-size:clamp(14px,1.2vw,18px);

            line-height:1.65;
        }


        .ship{
            flex-shrink:0;

            font-size:clamp(65px,7vw,95px);
        }



        /* =====================================================
           STATISTICS
        ===================================================== */

        .stats{
            margin-top:28px;

            display:grid;

            grid-template-columns:
            repeat(4,minmax(0,1fr));

            gap:20px;
        }


        .stat-card{
            min-width:0;

            background:white;

            padding:25px;

            border-radius:22px;

            display:flex;

            align-items:center;

            gap:18px;

            box-shadow:0 8px 22px rgba(0,0,0,.14);
        }


        .stat-icon{
            flex-shrink:0;

            font-size:42px;
        }


        .stat-info{
            min-width:0;
        }


        .stat-card h2{
            color:#0f172a;

            font-size:30px;

            font-weight:900;
        }


        .stat-card p{
            margin-top:4px;

            color:#64748b;

            font-size:14px;
        }



        /* =====================================================
           SECTION TITLE
        ===================================================== */

        .title{
            margin:35px 0 22px;

            color:white;

            font-size:clamp(27px,2.5vw,36px);

            font-weight:900;
        }



        /* =====================================================
           MANAGEMENT CARDS
        ===================================================== */

        .modules{
            display:grid;

            grid-template-columns:
            repeat(3,minmax(0,1fr));

            gap:24px;

            align-items:stretch;
        }


        .card{
            min-width:0;

            min-height:330px;

            background:white;

            padding:30px;

            border-radius:24px;

            box-shadow:0 10px 26px rgba(0,0,0,.16);

            display:flex;

            flex-direction:column;
        }


        .icon{
            font-size:50px;
        }


        .card h2{
            margin-top:20px;

            color:#0284c7;

            font-size:23px;

            line-height:1.35;

            font-weight:900;
        }


        .card p{
            margin-top:15px;

            color:#64748b;

            font-size:15px;

            line-height:1.7;

            flex:1;
        }


        /*
        |--------------------------------------------------------------------------
        | BUTTON SENTIASA PALING BAWAH + CENTER
        |--------------------------------------------------------------------------
        */

        .btn{
            display:flex;

            align-items:center;

            justify-content:center;

            width:100%;

            max-width:190px;

            min-height:48px;

            margin-top:25px;

            margin-left:auto;

            margin-right:auto;

            padding:12px 18px;

            background:#0284c7;

            color:white;

            border-radius:12px;

            text-decoration:none;

            text-align:center;

            font-size:14px;

            font-weight:800;

            transition:.2s;
        }


        .btn:hover{
            background:#0369a1;

            transform:translateY(-2px);
        }



        /* =====================================================
           LAPTOP
        ===================================================== */

        @media(max-width:1100px){

            :root{
                --sidebar-width:220px;
            }


            .sidebar{
                padding-left:14px;
                padding-right:14px;
            }


            .menu-link{
                font-size:12px;
            }


            .stats{
                grid-template-columns:
                repeat(2,minmax(0,1fr));
            }


            .modules{
                grid-template-columns:
                repeat(2,minmax(0,1fr));
            }

        }



        /* =====================================================
           MOBILE / TABLET
        ===================================================== */

        @media(max-width:768px){


            body{
                background-attachment:scroll;
            }



            /* TOPBAR */

            .mobile-topbar{
                position:sticky;

                top:0;

                z-index:1200;

                width:100%;

                min-height:68px;

                display:flex;

                align-items:center;

                justify-content:center;

                padding:9px 14px;

                background:#0f172a;

                box-shadow:0 3px 15px rgba(0,0,0,.2);
            }


            .mobile-menu-btn{
                position:absolute;

                left:13px;
                top:50%;

                transform:translateY(-50%);

                width:46px;
                height:46px;

                border:none;

                border-radius:13px;

                background:#0284c7;

                color:white;

                font-size:24px;

                cursor:pointer;
            }


            .mobile-brand{
                width:100%;

                padding:0 58px;

                text-align:center;

                font-size:25px;
            }



            /* SIDEBAR DRAWER */

            .sidebar{
                position:fixed !important;

                top:0 !important;
                left:0 !important;

                width:min(86vw,330px) !important;

                height:100vh !important;
                height:100dvh !important;

                padding:20px 16px 28px !important;

                transform:translateX(-105%);

                transition:transform .28s ease;

                box-shadow:10px 0 35px rgba(0,0,0,.3);
            }


            .sidebar.open{
                transform:translateX(0);
            }


            .drawer-close{
                position:absolute;

                top:14px;
                right:14px;

                width:38px;
                height:38px;

                display:flex;

                align-items:center;

                justify-content:center;

                border:none;

                border-radius:10px;

                background:#1e293b;

                color:white;

                font-size:22px;

                cursor:pointer;
            }


            .logo{
                padding:7px 42px 0;

                margin-bottom:24px;

                font-size:25px;
            }


            .menu-link{
                min-height:54px;

                font-size:14px;

                white-space:normal;
            }


            .menu-text{
                white-space:normal;
            }



            /* CONTENT */

            .content{
                margin-left:0 !important;

                width:100% !important;

                min-height:calc(100vh - 68px);

                padding:10px !important;
            }


            .content-inner{
                width:100%;
            }


            .welcome{
                padding:22px 18px;

                border-radius:21px;

                flex-direction:column;

                align-items:flex-start;

                gap:12px;
            }


            .welcome h1{
                font-size:clamp(28px,8vw,36px);
            }


            .welcome p{
                font-size:15px;
            }


            .ship{
                display:none;
            }



            /* STATISTICS */

            .stats{
                margin-top:18px;

                grid-template-columns:
                repeat(2,minmax(0,1fr));

                gap:12px;
            }


            .stat-card{
                padding:18px;

                border-radius:17px;

                gap:12px;
            }


            .stat-icon{
                font-size:34px;
            }


            .stat-card h2{
                font-size:25px;
            }


            .stat-card p{
                font-size:12px;
            }



            /* MANAGEMENT */

            .title{
                margin:27px 0 18px;

                font-size:27px;
            }


            .modules{
                grid-template-columns:1fr;

                gap:16px;
            }


            .card{
                min-height:0;

                padding:24px;
            }


            .card p{
                flex:1;
            }


            .btn{
                max-width:220px;
            }

        }



        /* =====================================================
           SMALL PHONE
        ===================================================== */

        @media(max-width:430px){

            .content{
                padding:8px !important;
            }


            .mobile-topbar{
                min-height:65px;
            }


            .mobile-menu-btn{
                left:10px;

                width:43px;
                height:43px;

                font-size:22px;
            }


            .mobile-brand{
                font-size:22px;
            }


            .sidebar{
                width:88vw !important;
            }


            .stats{
                grid-template-columns:1fr;
            }


            .stat-card{
                min-height:90px;
            }


            .welcome{
                padding:19px 16px;
            }


            .card{
                padding:21px;
            }


            .btn{
                width:100%;

                max-width:none;
            }

        }

    /* =========================================================
   FINAL ADMIN RESPONSIVE FIX
   SAME BEHAVIOUR AS USER DASHBOARD
========================================================= */

@media (max-width: 768px) {

    /* ===============================
       MOBILE TOPBAR
    =============================== */

    .mobile-topbar {
        position: sticky !important;
        top: 0 !important;

        width: 100% !important;
        min-height: 68px !important;

        display: flex !important;
        align-items: center !important;
        justify-content: center !important;

        padding: 9px 14px !important;

        background: #0f172a !important;

        z-index: 1900 !important;
    }


    .mobile-menu-btn {
        position: absolute !important;

        left: 13px !important;
        top: 50% !important;

        transform: translateY(-50%) !important;

        width: 46px !important;
        height: 46px !important;

        display: flex !important;
        align-items: center !important;
        justify-content: center !important;

        padding: 0 !important;
        margin: 0 !important;

        border: none !important;
        border-radius: 13px !important;

        background: #0284c7 !important;
        color: white !important;

        font-size: 24px !important;
    }


    .mobile-brand {
        width: 100% !important;

        padding: 0 58px !important;

        text-align: center !important;

        font-size: 25px !important;
        line-height: 1.2 !important;
    }


    /* ===============================
       SIDEBAR
    =============================== */

    .sidebar {
        position: fixed !important;

        top: 0 !important;
        left: 0 !important;
        right: auto !important;
        bottom: auto !important;

        width: min(86vw, 330px) !important;

        max-width: 330px !important;

        height: 100vh !important;
        height: 100dvh !important;

        min-height: 100vh !important;

        display: block !important;

        padding: 20px 16px 28px !important;
        margin: 0 !important;

        background: #0f172a !important;

        overflow-y: auto !important;
        overflow-x: hidden !important;

        transform: translateX(-105%) !important;

        transition:
            transform .28s ease !important;

        box-shadow:
            10px 0 35px
            rgba(0,0,0,.30) !important;

        z-index: 2000 !important;
    }


    .sidebar.open {
        transform: translateX(0) !important;
    }


    /* ===============================
       SIDEBAR LOGO
    =============================== */

    .sidebar .logo {
        display: block !important;

        width: 100% !important;

        padding: 7px 42px 0 !important;

        margin: 0 0 24px !important;

        text-align: center !important;

        font-size: 25px !important;
    }


    /* ===============================
       MENU
    =============================== */

    .sidebar .menu {
        width: 100% !important;

        display: flex !important;

        flex-direction: column !important;

        grid-template-columns: none !important;

        gap: 9px !important;

        padding: 0 !important;
        margin: 0 !important;
    }


    .sidebar .menu-link {
        width: 100% !important;

        min-height: 54px !important;

        display: flex !important;

        align-items: center !important;

        justify-content: flex-start !important;

        gap: 10px !important;

        padding: 13px 14px !important;
        margin: 0 !important;

        border-radius: 12px !important;

        font-size: 14px !important;

        text-align: left !important;
    }


    .sidebar .menu-icon {
        width: 23px !important;

        flex-shrink: 0 !important;

        text-align: center !important;
    }


    .sidebar .menu-text {
        flex: 1 !important;

        min-width: 0 !important;

        white-space: normal !important;
    }


    /* ===============================
       LOGOUT
    =============================== */

    .sidebar .logout-form {
        width: 100% !important;

        display: block !important;

        margin: 0 !important;
    }


    .sidebar .logout-btn {
        width: 100% !important;

        min-height: 54px !important;

        margin: 10px 0 0 !important;

        display: flex !important;

        align-items: center !important;

        justify-content: center !important;

        border-radius: 12px !important;
    }


    /* ===============================
       CLOSE BUTTON
    =============================== */

    .drawer-close {
        position: absolute !important;

        top: 14px !important;
        right: 14px !important;

        width: 38px !important;
        height: 38px !important;

        display: flex !important;

        align-items: center !important;
        justify-content: center !important;

        border: none !important;
        border-radius: 10px !important;

        background: #1e293b !important;
        color: white !important;

        font-size: 22px !important;

        z-index: 5 !important;
    }


    /* ===============================
       OVERLAY
    =============================== */

    .sidebar-overlay {
        position: fixed !important;

        inset: 0 !important;

        background:
            rgba(2, 6, 23, .60) !important;

        opacity: 0 !important;
        visibility: hidden !important;

        z-index: 1990 !important;
    }


    .sidebar-overlay.open {
        opacity: 1 !important;
        visibility: visible !important;
    }


    /* ===============================
       MAIN CONTENT
    =============================== */

    .content {
        position: relative !important;

        display: block !important;

        width: 100% !important;

        min-height:
            calc(100vh - 68px) !important;

        margin: 0 !important;
        margin-left: 0 !important;

        padding: 10px !important;

        top: auto !important;
        left: auto !important;

        transform: none !important;
    }


    .content-inner {
        position: relative !important;

        display: block !important;

        width: 100% !important;

        max-width: none !important;

        margin: 0 !important;

        padding: 0 !important;

        top: auto !important;

        transform: none !important;
    }


    /* ===============================
       WELCOME - RAPAT KE ATAS
    =============================== */

    .welcome {
        position: relative !important;

        width: 100% !important;

        margin: 0 !important;

        padding: 22px 18px !important;

        top: auto !important;

        transform: none !important;

        border-radius: 21px !important;

        flex-direction: column !important;

        align-items: flex-start !important;

        gap: 12px !important;
    }


    .welcome h1 {
        font-size:
            clamp(28px, 8vw, 36px) !important;
    }


    .welcome p {
        font-size: 14px !important;
    }


    .ship {
        display: none !important;
    }


    /* ===============================
       STATISTICS
    =============================== */

    .stats {
        width: 100% !important;

        margin-top: 18px !important;

        grid-template-columns:
            repeat(2, minmax(0,1fr)) !important;

        gap: 12px !important;
    }


    /* ===============================
       MANAGEMENT
    =============================== */

    .modules {
        width: 100% !important;

        grid-template-columns: 1fr !important;

        gap: 16px !important;
    }

}


/* =========================================================
   SMALL PHONE
========================================================= */

@media (max-width: 430px) {

    .mobile-topbar {
        min-height: 65px !important;
    }


    .mobile-menu-btn {
        left: 10px !important;

        width: 43px !important;
        height: 43px !important;

        font-size: 22px !important;
    }


    .mobile-brand {
        padding: 0 50px !important;

        font-size: 22px !important;
    }


    .sidebar {
        width: 88vw !important;
        max-width: 330px !important;
    }


    .content {
        padding: 8px !important;
    }


    .welcome {
        padding: 19px 16px !important;
    }

}

    </style>

</head>


<body>


{{-- =========================================================
     MOBILE TOPBAR
========================================================= --}}

<div class="mobile-topbar">

    <button
        type="button"
        class="mobile-menu-btn"
        onclick="toggleSidebar()"
        aria-label="Open admin menu"
    >
        ☰
    </button>


    <div class="mobile-brand">

        Ship<span>EquipAR</span>

    </div>

</div>



{{-- =========================================================
     OVERLAY
========================================================= --}}

<div
    id="sidebarOverlay"
    class="sidebar-overlay"
    onclick="closeSidebar()"
></div>



{{-- =========================================================
     SIDEBAR
========================================================= --}}

<aside
    id="adminSidebar"
    class="sidebar"
>


    <button
        type="button"
        class="drawer-close"
        onclick="closeSidebar()"
        aria-label="Close menu"
    >
        ×
    </button>



    <div class="logo">

        Ship<span>EquipAR</span>

    </div>



    <nav class="menu">


        <a
            href="{{ route('admin.dashboard') }}"
            class="menu-link active"
            onclick="closeSidebar()"
        >

            <span class="menu-icon">
                🏠
            </span>

            <span class="menu-text">
                Admin Dashboard
            </span>

        </a>



        <a
            href="/admin/users"
            class="menu-link"
            onclick="closeSidebar()"
        >

            <span class="menu-icon">
                👥
            </span>

            <span class="menu-text">
                Manage Users
            </span>

        </a>



        <a
            href="/admin/modules"
            class="menu-link"
            onclick="closeSidebar()"
        >

            <span class="menu-icon">
                📚
            </span>

            <span class="menu-text">
                Manage Module
            </span>

        </a>



        <a
            href="/admin/notes"
            class="menu-link"
            onclick="closeSidebar()"
        >

            <span class="menu-icon">
                📘
            </span>

            <span class="menu-text">
                Manage Notes
            </span>

        </a>



        <a
            href="/admin/equipment"
            class="menu-link"
            onclick="closeSidebar()"
        >

            <span class="menu-icon">
                🦺
            </span>

            <span class="menu-text">
                Manage Equipments
            </span>

        </a>



        <a
            href="{{ route('admin.ships.index') }}"
            class="menu-link"
            onclick="closeSidebar()"
        >

            <span class="menu-icon">
                🚢
            </span>

            <span class="menu-text">
                Manage Ships
            </span>

        </a>



        <a
            href="{{ route('admin.quiz.index') }}"
            class="menu-link"
            onclick="closeSidebar()"
        >

            <span class="menu-icon">
                📝
            </span>

            <span class="menu-text">
                Manage Quiz
            </span>

        </a>

        <form
            method="POST"
            action="{{ route('logout') }}"
            class="logout-form"
        >

            @csrf


            <button
                type="submit"
                class="logout-btn"
            >
                Logout
            </button>

        </form>


    </nav>


</aside>



{{-- =========================================================
     CONTENT
========================================================= --}}

<main class="content">


    <div class="content-inner">


        {{-- =====================================================
             WELCOME
        ====================================================== --}}

        <section class="welcome">


            <div class="welcome-copy">


                <h1>
                    Welcome Admin to ShipEquipAR
                </h1>


                <p>
                    Admin Management Panel
                </p>


                <p>
                    Manage maritime learning modules, ships,
                    equipment and digital content.
                </p>


            </div>



            <div class="ship">
                🚢
            </div>


        </section>



        {{-- =====================================================
             STATISTICS
        ====================================================== --}}

        <section class="stats">


            <div class="stat-card">

                <div class="stat-icon">
                    👥
                </div>

                <div class="stat-info">

                    <h2>
                        {{ \App\Models\User::count() }}
                    </h2>

                    <p>
                        Total Users
                    </p>

                </div>

            </div>



            <div class="stat-card">

                <div class="stat-icon">
                    📚
                </div>

                <div class="stat-info">

                    <h2>
                        {{ \App\Models\Module::count() }}
                    </h2>

                    <p>
                        Learning Modules
                    </p>

                </div>

            </div>



            <div class="stat-card">

                <div class="stat-icon">
                    🦺
                </div>

                <div class="stat-info">

                    <h2>
                        {{ \App\Models\Equipment::count() }}
                    </h2>

                    <p>
                        Equipment
                    </p>

                </div>

            </div>



            <div class="stat-card">

                <div class="stat-icon">
                    🚢
                </div>

                <div class="stat-info">

                    <h2>
                        {{ \App\Models\Ship::count() }}
                    </h2>

                    <p>
                        Ships
                    </p>

                </div>

            </div>


        </section>



        {{-- =====================================================
             SYSTEM OVERVIEW
        ====================================================== --}}

        <div class="title">
            📊 System Overview
        </div>



        <section class="modules">


            {{-- LEARNING MODULE --}}

            <article class="card">


                <div class="icon">
                    📚
                </div>


                <h2>
                    Learning Module Management
                </h2>


                <p>
                    Manage maritime learning contents such as
                    PPE Equipment, Safety System and Engine
                    Knowledge.
                </p>


                <a
                    href="/admin/modules"
                    class="btn"
                >
                    Manage Module
                </a>


            </article>



            {{-- SHIP --}}

            <article class="card">


                <div class="icon">
                    🚢
                </div>


                <h2>
                    Ship Management
                </h2>


                <p>
                    Manage ship categories, upload Reality
                    Composer AR files and provide ship
                    information for users.
                </p>


                <a
                    href="{{ route('admin.ships.index') }}"
                    class="btn"
                >
                    Manage Ship
                </a>


            </article>



            {{-- EQUIPMENT --}}

            <article class="card">


                <div class="icon">
                    🦺
                </div>


                <h2>
                    Equipment Management
                </h2>


                <p>
                    Maintain marine equipment database including
                    safety equipment and specifications.
                </p>


                <a
                    href="/admin/equipment"
                    class="btn"
                >
                    Manage Equipment
                </a>


            </article>


        </section>


    </div>


</main>



{{-- =========================================================
     JAVASCRIPT
========================================================= --}}

<script>

    function toggleSidebar()
    {
        const sidebar =
            document.getElementById(
                'adminSidebar'
            );

        const overlay =
            document.getElementById(
                'sidebarOverlay'
            );


        const isOpen =
            sidebar.classList.toggle(
                'open'
            );


        overlay.classList.toggle(
            'open',
            isOpen
        );


        document.body.classList.toggle(
            'sidebar-open',
            isOpen
        );
    }



    function closeSidebar()
    {
        const sidebar =
            document.getElementById(
                'adminSidebar'
            );

        const overlay =
            document.getElementById(
                'sidebarOverlay'
            );


        sidebar.classList.remove(
            'open'
        );

        overlay.classList.remove(
            'open'
        );

        document.body.classList.remove(
            'sidebar-open'
        );
    }



    document.addEventListener(
        'keydown',
        function(event)
        {
            if(event.key === 'Escape'){
                closeSidebar();
            }
        }
    );



    window.addEventListener(
        'resize',
        function()
        {
            if(window.innerWidth > 768){
                closeSidebar();
            }
        }
    );

</script>


</body>

</html>