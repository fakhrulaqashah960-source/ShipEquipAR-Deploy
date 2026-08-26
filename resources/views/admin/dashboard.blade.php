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
            --admin-sidebar-width:250px;
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
        body.admin-dashboard-page{
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


        body.admin-sidebar-open{
            overflow:hidden;
        }



        /* =====================================================
           MOBILE TOPBAR
        ===================================================== */

        .admin-mobile-topbar{
            display:none;
        }


        .admin-mobile-brand{
            font-weight:900;
            color:white;
        }


        .admin-mobile-brand span{
            color:var(--cyan);
        }



        /* =====================================================
           OVERLAY
        ===================================================== */

        .admin-sidebar-overlay{
            position:fixed;
            inset:0;

            background:rgba(0,0,0,.55);

            opacity:0;
            visibility:hidden;

            transition:.25s;

            z-index:1290;
        }


        .admin-sidebar-overlay.open{
            opacity:1;
            visibility:visible;
        }



        /* =====================================================
           SIDEBAR
        ===================================================== */

        .admin-sidebar{
            position:fixed;

            top:0;
            left:0;

            width:var(--admin-sidebar-width);

            height:100vh;
            height:100dvh;

            background:rgba(15,23,42,.98);

            padding:28px 18px;

            overflow-y:auto;

            z-index:1300;
        }


        .admin-drawer-close{
            display:none;
        }



        /* =====================================================
           LOGO
        ===================================================== */

        .admin-logo{
            width:100%;

            text-align:center;

            margin-bottom:30px;

            font-size:27px;

            font-weight:900;

            color:white;
        }


        .admin-logo span{
            color:var(--cyan);
        }



        /* =====================================================
           MENU
        ===================================================== */

        .admin-menu{
            width:100%;

            display:flex;

            flex-direction:column;

            gap:9px;
        }


        .admin-menu-link{
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


        .admin-menu-link:hover{
            background:#0369a1;

            color:white;

            transform:translateX(3px);
        }


        .admin-menu-link.active{
            background:var(--blue);

            color:white;
        }


        .admin-menu-icon{
            width:24px;

            flex-shrink:0;

            text-align:center;
        }


        .admin-menu-text{
            flex:1;

            min-width:0;

            white-space:nowrap;
        }



        /* =====================================================
           LOGOUT
        ===================================================== */

        .admin-logout-form{
            width:100%;
        }


        .admin-logout-btn{
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


        .admin-logout-btn:hover{
            background:#b91c1c;
        }



        /* =====================================================
           CONTENT
        ===================================================== */

        .admin-content{
            margin-left:var(--admin-sidebar-width);

            width:calc(100% - var(--admin-sidebar-width));

            min-height:100vh;

            padding:clamp(22px,3vw,40px);
        }


        .admin-content-inner{
            width:100%;

            max-width:1400px;

            margin:0 auto;
        }



        /* =====================================================
           WELCOME
        ===================================================== */

        .admin-welcome{
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


        .admin-welcome-copy{
            flex:1;
            min-width:0;
        }


        .admin-welcome h1{
            font-size:clamp(29px,3vw,43px);

            line-height:1.2;

            font-weight:900;
        }


        .admin-welcome p{
            margin-top:12px;

            font-size:clamp(14px,1.2vw,18px);

            line-height:1.65;
        }


        .admin-ship{
            flex-shrink:0;

            font-size:clamp(65px,7vw,95px);
        }



        /* =====================================================
           STATISTICS
        ===================================================== */

        .admin-stats{
            margin-top:28px;

            display:grid;

            grid-template-columns:
            repeat(4,minmax(0,1fr));

            gap:20px;
        }


        .admin-stat-card{
            min-width:0;

            background:white;

            padding:25px;

            border-radius:22px;

            display:flex;

            align-items:center;

            gap:18px;

            box-shadow:0 8px 22px rgba(0,0,0,.14);
        }


        .admin-stat-icon{
            flex-shrink:0;

            font-size:42px;
        }


        .admin-stat-info{
            min-width:0;
        }


        .admin-stat-card h2{
            color:#0f172a;

            font-size:30px;

            font-weight:900;
        }


        .admin-stat-card p{
            margin-top:4px;

            color:#64748b;

            font-size:14px;
        }


        .admin-stat-breakdown{
            display:block;

            margin-top:6px;

            color:#64748b;

            font-size:12px;

            font-weight:600;

            line-height:1.4;
        }


        /* =====================================================
           EQUIPMENT + SHIPS COMBINED STAT
        ===================================================== */

        .admin-stat-combined{
            padding:18px 20px;
        }


        .admin-stat-combined .admin-stat-icon{
            width:50px;
            height:50px;

            display:flex;
            align-items:center;
            justify-content:center;

            border-radius:16px;

            background:#e0f2fe;

            font-size:31px;
        }


        .admin-marine-info{
            width:100%;
        }


        .admin-marine-heading{
            display:flex;
            align-items:flex-end;
            gap:8px;
        }


        .admin-marine-heading h2{
            line-height:1;
        }


        .admin-marine-heading span{
            padding-bottom:2px;

            color:#64748b;

            font-size:11px;

            font-weight:700;

            text-transform:uppercase;

            letter-spacing:.04em;
        }


        .admin-marine-label{
            margin-top:5px !important;

            color:#475569 !important;

            font-weight:700;
        }


        .admin-marine-breakdown{
            margin-top:10px;

            display:grid;
            grid-template-columns:repeat(2,minmax(0,1fr));

            gap:7px;
        }


        .admin-marine-mini{
            min-width:0;

            display:flex;
            align-items:center;

            gap:7px;

            padding:7px 8px;

            border:1px solid #e2e8f0;

            border-radius:10px;

            background:#f8fafc;
        }


        .admin-marine-mini-icon{
            flex-shrink:0;

            font-size:19px;
        }


        .admin-marine-mini-copy{
            min-width:0;

            display:flex;
            flex-direction:column;

            line-height:1.15;
        }


        .admin-marine-mini-copy strong{
            color:#0f172a;

            font-size:14px;

            font-weight:900;
        }


        .admin-marine-mini-copy small{
            margin-top:2px;

            color:#64748b;

            font-size:9px;

            font-weight:700;
        }



        /* =====================================================
           SECTION TITLE
        ===================================================== */

        .admin-title{
            margin:35px 0 22px;

            color:white;

            font-size:clamp(27px,2.5vw,36px);

            font-weight:900;
        }



        /* =====================================================
           MANAGEMENT CARDS
        ===================================================== */

        .admin-modules{
            display:grid;

            grid-template-columns:
            repeat(3,minmax(0,1fr));

            gap:24px;

            align-items:stretch;
        }


        .admin-card{
            min-width:0;

            min-height:330px;

            background:white;

            padding:30px;

            border-radius:24px;

            box-shadow:0 10px 26px rgba(0,0,0,.16);

            display:flex;

            flex-direction:column;
        }


        .admin-icon{
            font-size:50px;
        }


        .admin-card h2{
            margin-top:20px;

            color:#0284c7;

            font-size:23px;

            line-height:1.35;

            font-weight:900;
        }


        .admin-card p{
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

        .admin-btn{
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


        .admin-btn:hover{
            background:#0369a1;

            transform:translateY(-2px);
        }



        /* =====================================================
           LAPTOP
        ===================================================== */

        @media(max-width:1100px){

            :root{
                --admin-sidebar-width:220px;
            }


            .admin-sidebar{
                padding-left:14px;
                padding-right:14px;
            }


            .admin-menu-link{
                font-size:12px;
            }


            .admin-stats{
                grid-template-columns:
                repeat(2,minmax(0,1fr));
            }


            .admin-modules{
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

            .admin-mobile-topbar{
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


            .admin-mobile-menu-btn{
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


            .admin-mobile-brand{
                width:100%;

                padding:0 58px;

                text-align:center;

                font-size:25px;
            }



            /* SIDEBAR DRAWER */

            .admin-sidebar{
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


            .admin-sidebar.open{
                transform:translateX(0);
            }


            .admin-drawer-close{
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


            .admin-logo{
                padding:7px 42px 0;

                margin-bottom:24px;

                font-size:25px;
            }


            .admin-menu-link{
                min-height:54px;

                font-size:14px;

                white-space:normal;
            }


            .admin-menu-text{
                white-space:normal;
            }



            /* CONTENT */

            .admin-content{
                margin-left:0 !important;

                width:100% !important;

                min-height:calc(100vh - 68px);

                padding:10px !important;
            }


            .admin-content-inner{
                width:100%;
            }


            .admin-welcome{
                padding:22px 18px;

                border-radius:21px;

                flex-direction:column;

                align-items:flex-start;

                gap:12px;
            }


            .admin-welcome h1{
                font-size:clamp(28px,8vw,36px);
            }


            .admin-welcome p{
                font-size:15px;
            }


            .admin-ship{
                display:none;
            }



            /* STATISTICS */

            .admin-stats{
                margin-top:18px;

                grid-template-columns:
                repeat(2,minmax(0,1fr));

                gap:12px;
            }


            .admin-stat-card{
                padding:18px;

                border-radius:17px;

                gap:12px;
            }


            .admin-stat-icon{
                font-size:34px;
            }


            .admin-stat-card h2{
                font-size:25px;
            }


            .admin-stat-card p{
                font-size:12px;
            }


            .admin-stat-combined{
                padding:16px;
            }


            .admin-marine-breakdown{
                gap:6px;
            }


            .admin-marine-mini{
                padding:6px 7px;
            }



            /* MANAGEMENT */

            .admin-title{
                margin:27px 0 18px;

                font-size:27px;
            }


            .admin-modules{
                grid-template-columns:1fr;

                gap:16px;
            }


            .admin-card{
                min-height:0;

                padding:24px;
            }


            .admin-card p{
                flex:1;
            }


            .admin-btn{
                max-width:220px;
            }

        }



        /* =====================================================
           SMALL PHONE
        ===================================================== */

        @media(max-width:430px){

            .admin-content{
                padding:8px !important;
            }


            .admin-mobile-topbar{
                min-height:65px;
            }


            .admin-mobile-menu-btn{
                left:10px;

                width:43px;
                height:43px;

                font-size:22px;
            }


            .admin-mobile-brand{
                font-size:22px;
            }


            .admin-sidebar{
                width:88vw !important;
            }


            .admin-stats{
                grid-template-columns:1fr;
            }


            .admin-stat-card{
                min-height:90px;
            }


            .admin-welcome{
                padding:19px 16px;
            }


            .admin-card{
                padding:21px;
            }


            .admin-btn{
                width:100%;

                max-width:none;
            }

        }

    
    </style>

</head>


<body class="admin-dashboard-page">


{{-- =========================================================
     MOBILE TOPBAR
========================================================= --}}

<div class="admin-mobile-topbar">

    <button
        type="button"
        class="admin-mobile-menu-btn"
        onclick="toggleSidebar()"
        aria-label="Open admin menu"
    >
        ☰
    </button>


    <div class="admin-mobile-brand">

        Ship<span>EquipAR</span>

    </div>

</div>



{{-- =========================================================
     OVERLAY
========================================================= --}}

<div
    id="sidebarOverlay"
    class="admin-sidebar-overlay"
    onclick="closeSidebar()"
></div>



{{-- =========================================================
     SIDEBAR
========================================================= --}}

<aside
    id="adminSidebar"
    class="admin-sidebar"
>


    <button
        type="button"
        class="admin-drawer-close"
        onclick="closeSidebar()"
        aria-label="Close menu"
    >
        ×
    </button>



    <div class="admin-logo">

        Ship<span>EquipAR</span>

    </div>



    <nav class="admin-menu">


        <a
            href="{{ route('admin.dashboard') }}"
            class="admin-menu-link active"
            onclick="closeSidebar()"
        >

            <span class="admin-menu-icon">
                🏠
            </span>

            <span class="admin-menu-text">
                Admin Dashboard
            </span>

        </a>



        <a
            href="/admin/users"
            class="admin-menu-link"
            onclick="closeSidebar()"
        >

            <span class="admin-menu-icon">
                👥
            </span>

            <span class="admin-menu-text">
                Manage Users
            </span>

        </a>



        <a
            href="/admin/modules"
            class="admin-menu-link"
            onclick="closeSidebar()"
        >

            <span class="admin-menu-icon">
                📚
            </span>

            <span class="admin-menu-text">
                Manage Module
            </span>

        </a>



        <a
            href="/admin/notes"
            class="admin-menu-link"
            onclick="closeSidebar()"
        >

            <span class="admin-menu-icon">
                📘
            </span>

            <span class="admin-menu-text">
                Manage Notes
            </span>

        </a>



        <a
            href="/admin/equipment"
            class="admin-menu-link"
            onclick="closeSidebar()"
        >

            <span class="admin-menu-icon">
                🦺
            </span>

            <span class="admin-menu-text">
                Manage Equipments
            </span>

        </a>



        <a
            href="{{ route('admin.ships.index') }}"
            class="admin-menu-link"
            onclick="closeSidebar()"
        >

            <span class="admin-menu-icon">
                🚢
            </span>

            <span class="admin-menu-text">
                Manage Ships
            </span>

        </a>



        <a
            href="{{ route('admin.quiz.index') }}"
            class="admin-menu-link"
            onclick="closeSidebar()"
        >

            <span class="admin-menu-icon">
                📝
            </span>

            <span class="admin-menu-text">
                Manage Quiz
            </span>

        </a>

        <form
            method="POST"
            action="{{ route('logout') }}"
            class="admin-logout-form"
        >

            @csrf


            <button
                type="submit"
                class="admin-logout-btn"
            >
                Logout
            </button>

        </form>


    </nav>


</aside>



{{-- =========================================================
     CONTENT
========================================================= --}}

<main class="admin-content">


    <div class="admin-content-inner">


        {{-- =====================================================
             WELCOME
        ====================================================== --}}

        <section class="admin-welcome">


            <div class="admin-welcome-copy">


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



            <div class="admin-ship">
                🚢
            </div>


        </section>



        {{-- =====================================================
             STATISTICS
        ====================================================== --}}

        @php
            $totalUsers = \App\Models\User::count();

            $quizParticipants = 0;

            /*
             * Safe during the first deployment:
             * before the quiz_attempts migration exists,
             * the dashboard will still open and show 0.
             */
            if (\Illuminate\Support\Facades\Schema::hasTable('quiz_attempts')) {

                $quizParticipants =
                    \App\Models\QuizAttempt::query()
                        ->whereNotNull('user_id')
                        ->distinct()
                        ->count('user_id');
            }

            $totalModules = \App\Models\Module::count();

            $totalEquipment = \App\Models\Equipment::count();

            $totalShips = \App\Models\Ship::count();

            $totalMarineContent =
                $totalEquipment + $totalShips;
        @endphp


<section class="admin-stats">


    {{-- TOTAL USERS --}}

    <div class="admin-stat-card">

        <div class="admin-stat-icon">
            👥
        </div>

        <div class="admin-stat-info">

            <h2>
                {{ $totalUsers }}
            </h2>

            <p>
                Total Users
            </p>

        </div>

    </div>



    {{-- QUIZ PARTICIPANTS --}}

    <div class="admin-stat-card">

        <div class="admin-stat-icon">
            📝
        </div>

        <div class="admin-stat-info">

            <h2>
                {{ $quizParticipants }}
            </h2>

            <p>
                Quiz Participants
            </p>

        </div>

    </div>



    {{-- LEARNING MODULES --}}

    <div class="admin-stat-card">

        <div class="admin-stat-icon">
            📚
        </div>

        <div class="admin-stat-info">

            <h2>
                {{ $totalModules }}
            </h2>

            <p>
                Learning Modules
            </p>

        </div>

    </div>



    {{-- EQUIPMENT + SHIPS --}}

    <div class="admin-stat-card admin-stat-combined">

        <div class="admin-stat-icon">
            ⚓
        </div>

        <div class="admin-stat-info admin-marine-info">

            <div class="admin-marine-heading">

                <h2>
                    {{ $totalMarineContent }}
                </h2>

                <span>
                    Total Assets
                </span>

            </div>

            <p class="admin-marine-label">
                Equipment & Ships
            </p>

            <div class="admin-marine-breakdown">

                <div class="admin-marine-mini">

                    <span class="admin-marine-mini-icon">
                        🦺
                    </span>

                    <span class="admin-marine-mini-copy">

                        <strong>
                            {{ $totalEquipment }}
                        </strong>

                        <small>
                            Equipment
                        </small>

                    </span>

                </div>


                <div class="admin-marine-mini">

                    <span class="admin-marine-mini-icon">
                        🚢
                    </span>

                    <span class="admin-marine-mini-copy">

                        <strong>
                            {{ $totalShips }}
                        </strong>

                        <small>
                            Ships
                        </small>

                    </span>

                </div>

            </div>

        </div>

    </div>


</section>



        {{-- =====================================================
             SYSTEM OVERVIEW
        ====================================================== --}}

        <div class="admin-title">
            📊 System Overview
        </div>



        <section class="admin-modules">


            {{-- LEARNING MODULE --}}

            <article class="admin-card">


                <div class="admin-icon">
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
                    class="admin-btn"
                >
                    Manage Module
                </a>


            </article>



            {{-- SHIP --}}

            <article class="admin-card">


                <div class="admin-icon">
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
                    class="admin-btn"
                >
                    Manage Ship
                </a>


            </article>



            {{-- EQUIPMENT --}}

            <article class="admin-card">


                <div class="admin-icon">
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
                    class="admin-btn"
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
            'admin-sidebar-open',
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
            'admin-sidebar-open'
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