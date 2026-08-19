<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>ShipEquipAR Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.botpress.cloud/webchat/v3.7/inject.js"></script>

    <script
        src="https://files.bpcontent.cloud/2026/08/19/16/20260819164721-MXQ50NAU.js"
        defer>
    </script>

    <style>

        :root{
            --user-sidebar-width:250px;
            --user-dark:#0f172a;
            --user-dark-light:#1e293b;
            --user-blue:#0284c7;
            --user-blue-dark:#0369a1;
            --user-cyan:#38bdf8;
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


        body.user-dashboard-page{

            min-height:100vh;

            background:
                linear-gradient(
                    135deg,
                    rgba(15,23,42,.93),
                    rgba(2,132,199,.70)
                ),
                url('/images/ship-bg.jpg');

            background-size:cover;
            background-position:center;
            background-attachment:fixed;

            color:white;
        }


        body.user-drawer-open{
            overflow:hidden;
        }



        /* =====================================================
           MOBILE TOPBAR
        ===================================================== */

        .user-mobile-topbar{
            display:none;
        }


        .user-mobile-brand{
            color:white;
            font-weight:900;
            text-align:center;
        }


        .user-mobile-brand span{
            color:var(--user-cyan);
        }



        /* =====================================================
           OVERLAY
        ===================================================== */

        .user-sidebar-overlay{

            position:fixed;

            inset:0;

            background:rgba(2,6,23,.60);

            backdrop-filter:blur(2px);

            opacity:0;

            visibility:hidden;

            transition:.25s ease;

            z-index:1990;
        }


        .user-sidebar-overlay.open{
            opacity:1;
            visibility:visible;
        }



        /* =====================================================
           SIDEBAR
        ===================================================== */

        .user-sidebar{

            position:fixed;

            top:0;
            left:0;

            width:var(--user-sidebar-width);

            height:100vh;
            height:100dvh;

            background:rgba(15,23,42,.99);

            padding:28px 18px;

            overflow-y:auto;
            overflow-x:hidden;

            z-index:2000;
        }


        .user-drawer-close{
            display:none;
        }



        /* =====================================================
           LOGO
        ===================================================== */

        .user-logo{

            width:100%;

            text-align:center;

            margin-bottom:30px;

            font-size:27px;

            font-weight:900;

            color:white;
        }


        .user-logo span{
            color:var(--user-cyan);
        }



        /* =====================================================
           MAIN MENU
        ===================================================== */

        .user-menu{

            width:100%;

            display:flex;

            flex-direction:column;

            gap:9px;
        }


        .user-menu-link,
        .user-module-title{

            width:100%;

            min-height:52px;

            display:flex;

            align-items:center;

            gap:10px;

            padding:12px 13px;

            border-radius:12px;

            background:#1e293b;

            color:#e2e8f0;

            text-decoration:none;

            font-size:13px;

            font-weight:600;

            transition:.22s ease;
        }


        .user-menu-link:hover,
        .user-module-title:hover{

            background:#0369a1;

            color:white;
        }


        .user-menu-link.active,
        .user-module-title.active{

            background:#0284c7;

            color:white;
        }


        .user-menu-icon{

            width:23px;

            flex-shrink:0;

            text-align:center;
        }


        .user-menu-text{

            flex:1;

            min-width:0;
        }



        /* =====================================================
           LEARNING MODULE
        ===================================================== */

        .user-learning-wrapper{
            width:100%;
        }


        .user-module-title{

            justify-content:space-between;

            cursor:pointer;
        }


        .user-module-title-left{

            display:flex;

            align-items:center;

            gap:10px;

            min-width:0;
        }


        .user-module-arrow{
            flex-shrink:0;
        }


        .user-module-content{

            display:none;

            width:100%;

            margin-top:8px;

            padding-left:7px;
        }


        .user-module-content.active{
            display:block;
        }



        /* =====================================================
           MODULE ITEM
        ===================================================== */

        .user-module-item{

            width:100%;

            display:flex;

            align-items:center;

            justify-content:space-between;

            gap:8px;

            margin-bottom:8px;

            padding:11px 12px;

            background:#1e293b;

            border-radius:10px;

            color:#e2e8f0;

            font-size:12px;

            cursor:pointer;

            transition:.2s;
        }


        .user-module-item:hover{
            background:#075985;
        }


        .user-module-list{

            display:none;

            width:100%;

            padding-left:7px;

            margin-bottom:10px;
        }


        .user-module-list.active{
            display:block;
        }



        /* =====================================================
           INTRO LINK
        ===================================================== */

        .user-intro-link{

            width:100%;

            display:flex;

            align-items:center;

            padding:10px;

            margin-bottom:7px;

            background:#0f766e;

            border-radius:10px;

            color:white;

            text-decoration:none;

            font-size:11px;

            font-weight:600;

            line-height:1.45;

            transition:.2s;
        }


        .user-intro-link:hover{
            background:#0d9488;
        }



        /* =====================================================
           SHIP / EQUIPMENT SIDEBAR ITEMS
        ===================================================== */

        .user-ship-link,
        .user-equipment-link{

            width:100%;

            display:flex;

            align-items:center;

            gap:8px;

            padding:9px 10px;

            margin-bottom:6px;

            border-radius:9px;

            color:white;

            text-decoration:none;

            font-size:11px;

            transition:.2s;
        }


        .user-ship-link{
            background:#164e63;
        }


        .user-equipment-link{
            background:#172554;
        }


        .user-ship-link:hover,
        .user-equipment-link:hover{
            background:#0284c7;
        }


        .user-submenu-icon{

            width:21px;

            flex-shrink:0;

            text-align:center;
        }


        .user-submenu-name{

            color:#e0f2fe;

            font-weight:600;

            line-height:1.4;
        }


        .user-empty-ship{

            display:block;

            width:100%;

            padding:9px;

            margin-bottom:7px;

            border-radius:9px;

            background:#334155;

            color:#cbd5e1;

            text-align:center;

            font-size:11px;
        }



        /* =====================================================
           LOGOUT
        ===================================================== */

        .user-logout-form{
            width:100%;
        }


        .user-logout-btn{

            width:100%;

            min-height:52px;

            margin-top:10px;

            padding:12px;

            border:none;

            border-radius:12px;

            background:#ef4444;

            color:white;

            font-size:14px;

            font-weight:700;

            cursor:pointer;

            transition:.2s;
        }


        .user-logout-btn:hover{
            background:#dc2626;
        }



        /* =====================================================
           CONTENT
        ===================================================== */

        .user-content{

            margin-left:var(--user-sidebar-width);

            width:calc(100% - var(--user-sidebar-width));

            min-height:100vh;

            padding:clamp(22px,3vw,40px);
        }


        .user-content-inner{

            width:100%;

            max-width:1400px;

            margin:0 auto;
        }



        /* =====================================================
           WELCOME
        ===================================================== */

        .user-welcome{

            width:100%;

            padding:clamp(28px,4vw,45px);

            border-radius:26px;

            background:
                linear-gradient(
                    135deg,
                    rgba(14,116,144,.96),
                    rgba(15,23,42,.96)
                );

            display:flex;

            align-items:center;

            justify-content:space-between;

            gap:28px;

            box-shadow:0 12px 30px rgba(0,0,0,.16);
        }


        .user-welcome-copy{

            flex:1;

            min-width:0;
        }


        .user-welcome-title{

            font-size:clamp(29px,3vw,43px);

            font-weight:900;

            line-height:1.2;
        }


        .user-welcome-subtitle{

            margin-top:12px;

            color:#7dd3fc;

            font-size:clamp(19px,2vw,27px);

            line-height:1.4;
        }


        .user-welcome-description{

            max-width:700px;

            margin-top:18px;

            color:#f8fafc;

            font-size:clamp(14px,1.15vw,17px);

            line-height:1.75;
        }


        .user-welcome-ship{

            flex-shrink:0;

            font-size:clamp(65px,7vw,95px);
        }



        /* =====================================================
           WEBSITE INTRODUCTION
        ===================================================== */

        .user-introduction{

            margin-top:30px;

            display:grid;

            grid-template-columns:
                repeat(2,minmax(0,1fr));

            gap:18px;
        }


        .user-section-title{

            grid-column:1 / -1;

            color:#bae6fd;

            font-size:clamp(26px,2.5vw,33px);

            font-weight:700;
        }


        .user-intro-card{

            min-width:0;

            padding:25px;

            border-radius:20px;

            background:rgba(255,255,255,.14);

            border:1px solid rgba(255,255,255,.10);

            backdrop-filter:blur(5px);
        }


        .user-intro-card h3{

            margin-bottom:12px;

            font-size:clamp(18px,1.5vw,22px);
        }


        .user-intro-card p{

            color:#f1f5f9;

            font-size:14px;

            line-height:1.75;
        }



        /* =====================================================
           LAPTOP
        ===================================================== */

        @media(max-width:1100px){

            :root{
                --user-sidebar-width:220px;
            }


            .user-sidebar{
                padding-left:14px;
                padding-right:14px;
            }


            .user-menu-link,
            .user-module-title{
                font-size:12px;
            }

        }



        /* =====================================================
           MOBILE / TABLET
        ===================================================== */

        @media(max-width:768px){


            body.user-dashboard-page{
                background-attachment:scroll;
            }



            /* TOPBAR */

            .user-mobile-topbar{

                position:sticky;

                top:0;

                z-index:1900;

                width:100%;

                min-height:68px;

                display:flex;

                align-items:center;

                justify-content:center;

                padding:9px 14px;

                background:#0f172a;

                box-shadow:0 3px 15px rgba(0,0,0,.2);
            }


            .user-mobile-menu-btn{

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


            .user-mobile-brand{

                width:100%;

                padding:0 58px;

                font-size:25px;

                line-height:1.2;
            }



            /* =================================================
               DRAWER
            ================================================= */

            .user-sidebar{

                position:fixed !important;

                top:0 !important;

                left:0 !important;

                width:min(86vw,330px) !important;

                height:100vh !important;

                height:100dvh !important;

                padding:20px 16px 28px !important;

                transform:translateX(-105%);

                transition:transform .28s ease;

                box-shadow:10px 0 35px rgba(0,0,0,.30);
            }


            .user-sidebar.open{
                transform:translateX(0);
            }


            .user-drawer-close{

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


            .user-logo{

                padding:7px 42px 0;

                margin-bottom:24px;

                font-size:25px;
            }



            /* Semua main menu sama lebar */

            .user-menu-link,
            .user-module-title{

                width:100%;

                min-height:54px;

                padding:13px 14px;

                font-size:14px;

                border-radius:12px;
            }


            .user-menu-text{
                white-space:normal;
            }


            .user-module-content{
                padding-left:0;
            }


            .user-module-list{
                padding-left:7px;
            }



            /* =================================================
               CONTENT
            ================================================= */

            .user-content{

                margin-left:0 !important;

                width:100% !important;

                min-height:calc(100vh - 68px);

                padding:10px !important;
            }


            .user-content-inner{
                width:100%;
            }



            /*
             * Welcome terus dekat bawah navbar.
             * Tiada ruang kosong besar lagi.
             */

            .user-welcome{

                width:100%;

                padding:22px 18px;

                border-radius:21px;

                flex-direction:column;

                align-items:flex-start;

                gap:12px;
            }


            .user-welcome-title{

                font-size:clamp(28px,8vw,36px);
            }


            .user-welcome-subtitle{

                margin-top:9px;

                font-size:clamp(19px,5vw,23px);
            }


            .user-welcome-description{

                margin-top:14px;

                font-size:14px;

                line-height:1.7;
            }


            .user-welcome-ship{
                display:none;
            }



            /* =================================================
               INTRODUCTION
            ================================================= */

            .user-introduction{

                margin-top:18px;

                grid-template-columns:1fr;

                gap:13px;
            }


            .user-section-title{

                grid-column:1;

                font-size:25px;
            }


            .user-intro-card{

                padding:19px;

                border-radius:17px;
            }

        }



        /* =====================================================
           SMALL PHONE
        ===================================================== */

        @media(max-width:430px){


            .user-mobile-topbar{
                min-height:65px;
            }


            .user-mobile-menu-btn{

                left:10px;

                width:43px;

                height:43px;

                font-size:22px;
            }


            .user-mobile-brand{

                padding:0 50px;

                font-size:22px;
            }


            .user-sidebar{
                width:88vw !important;
            }


            .user-content{
                padding:8px !important;
            }


            .user-welcome{
                padding:19px 16px;
            }


            .user-intro-card{
                padding:17px;
            }

        }

    </style>

</head>


<body class="user-dashboard-page">


{{-- =========================================================
     MOBILE HEADER
========================================================= --}}

<header class="user-mobile-topbar">


    <button
        type="button"
        class="user-mobile-menu-btn"
        onclick="toggleUserSidebar()"
        aria-label="Open menu"
    >
        ☰
    </button>


    <div class="user-mobile-brand">

        Ship<span>EquipAR</span>

    </div>


</header>



{{-- =========================================================
     OVERLAY
========================================================= --}}

<div
    id="userSidebarOverlay"
    class="user-sidebar-overlay"
    onclick="closeUserSidebar()"
></div>



{{-- =========================================================
     SIDEBAR
========================================================= --}}

<aside
    id="userSidebar"
    class="user-sidebar"
>


    <button
        type="button"
        class="user-drawer-close"
        onclick="closeUserSidebar()"
        aria-label="Close menu"
    >
        ×
    </button>



    <div class="user-logo">

        Ship<span>EquipAR</span>

    </div>



    <nav class="user-menu">


        {{-- =================================================
             DASHBOARD
        ================================================== --}}

        <a
            href="{{ route('dashboard') }}"
            class="user-menu-link active"
            onclick="closeUserSidebar()"
        >

            <span class="user-menu-icon">
                🏠
            </span>

            <span class="user-menu-text">
                Dashboard
            </span>

        </a>



        {{-- =================================================
             LEARNING MODULE
        ================================================== --}}

        <div class="user-learning-wrapper">


            <div
                id="learningTitle"
                class="user-module-title"
                onclick="toggleModule()"
            >


                <div class="user-module-title-left">

                    <span class="user-menu-icon">
                        📚
                    </span>

                    <span class="user-menu-text">
                        Learning Module
                    </span>

                </div>


                <span
                    id="mainArrow"
                    class="user-module-arrow"
                >
                    ▼
                </span>


            </div>



            <div
                id="moduleContent"
                class="user-module-content"
            >


                @foreach($modules as $module)


                    {{-- MODULE TITLE --}}

                    <div
                        class="user-module-item"
                        onclick="toggleEquipment({{ $module->id }})"
                    >

                        <span>
                            📘 {{ $module->title }}
                        </span>


                        <span id="arrow{{ $module->id }}">
                            ▼
                        </span>

                    </div>



                    {{-- MODULE LIST --}}

                    <div
                        id="equipment{{ $module->id }}"
                        class="user-module-list"
                    >


                        {{-- INTRODUCTION --}}

                        <a
                            href="{{ route('learning.show', $module->id) }}"
                            class="user-intro-link"
                            onclick="closeUserSidebar()"
                        >

                            📖 Introduction to
                            {{ ucfirst($module->category) }}

                        </a>



                        {{-- ==========================================
                             SHIP LIST
                        =========================================== --}}

                        @if(
                            str_contains(
                                strtolower($module->category ?? ''),
                                'cargo'
                            )
                            ||
                            str_contains(
                                strtolower($module->category ?? ''),
                                'freight'
                            )
                            ||
                            str_contains(
                                strtolower($module->title ?? ''),
                                'ship model'
                            )
                        )


                            @forelse(($ships ?? collect()) as $ship)


                                <a
                                    href="{{ route('ship.show', $ship->id) }}"
                                    class="user-ship-link"
                                    onclick="closeUserSidebar()"
                                >

                                    <span class="user-submenu-icon">
                                        🚢
                                    </span>


                                    <span class="user-submenu-name">

                                        {{ $ship->name }}

                                    </span>


                                </a>


                            @empty


                                <span class="user-empty-ship">

                                    No ship available

                                </span>


                            @endforelse


                        @endif



                        {{-- ==========================================
                             EQUIPMENT
                        =========================================== --}}

                        @foreach($module->equipments as $equipment)


                            @php

                                $equipmentName =
                                    strtolower(
                                        $equipment->name ?? ''
                                    );


                                $equipmentIcon = '⚓';


                                if(str_contains($equipmentName,'helmet')){

                                    $equipmentIcon = '⛑️';

                                }
                                elseif(str_contains($equipmentName,'glasses')){

                                    $equipmentIcon = '🥽';

                                }
                                elseif(str_contains($equipmentName,'gloves')){

                                    $equipmentIcon = '🧤';

                                }
                                elseif(str_contains($equipmentName,'coverall')){

                                    $equipmentIcon = '🥼';

                                }
                                elseif(str_contains($equipmentName,'boots')){

                                    $equipmentIcon = '🥾';

                                }
                                elseif(str_contains($equipmentName,'cctv')){

                                    $equipmentIcon = '📹';

                                }
                                elseif(str_contains($equipmentName,'alarm')){

                                    $equipmentIcon = '🚨';

                                }
                                elseif(str_contains($equipmentName,'radar')){

                                    $equipmentIcon = '📡';

                                }
                                elseif(str_contains($equipmentName,'ear muffs')){

                                    $equipmentIcon = '🎧';

                                }
                                elseif(str_contains($equipmentName,'razor wire')){

                                    $equipmentIcon = '⛓️';

                                }
                                elseif(str_contains($equipmentName,'lighting')){

                                    $equipmentIcon = '💡';

                                }
                                elseif(str_contains($equipmentName,'water spray')){

                                    $equipmentIcon = '💨';

                                }
                                elseif(str_contains(
                                    $equipmentName,
                                    'automatic identification'
                                )){

                                    $equipmentIcon = '📡';

                                }

                            @endphp



                            <a
                                href="{{ route('equipment.show', $equipment->id) }}"
                                class="user-equipment-link"
                                onclick="closeUserSidebar()"
                            >

                                <span class="user-submenu-icon">

                                    {{ $equipmentIcon }}

                                </span>


                                <span class="user-submenu-name">

                                    {{ $equipment->name }}

                                </span>


                            </a>


                        @endforeach


                    </div>


                @endforeach


            </div>


        </div>



        {{-- =================================================
             NOTES
        ================================================== --}}

        <a
            href="{{ route('user.notes') }}"
            class="user-menu-link"
            onclick="closeUserSidebar()"
        >

            <span class="user-menu-icon">
                📘
            </span>

            <span class="user-menu-text">
                Module Notes
            </span>

        </a>



        {{-- =================================================
             QUIZ
        ================================================== --}}

        <a
            href="{{ route('quiz.index') }}"
            class="user-menu-link"
            onclick="closeUserSidebar()"
        >

            <span class="user-menu-icon">
                📝
            </span>

            <span class="user-menu-text">
                Start Quiz
            </span>

        </a>



        {{-- =================================================
             CERTIFICATE
        ================================================== --}}

        <a
            href="#"
            class="user-menu-link"
        >

            <span class="user-menu-icon">
                🏆
            </span>

            <span class="user-menu-text">
                Get Certificate
            </span>

        </a>

{{-- =========================================================
     NAVIBOT
========================================================= --}}

<a
    href="javascript:void(0)"
    id="naviBotButton"
    class="user-menu-link"
>
    <span class="user-menu-icon">
        🤖
    </span>

    <span class="user-menu-text">
        NaviBot
    </span>
</a>

        {{-- =================================================
             PROFILE
        ================================================== --}}

        <a
            href="{{ route('profile.edit') }}"
            class="user-menu-link"
            onclick="closeUserSidebar()"
        >

            <span class="user-menu-icon">
                👤
            </span>

            <span class="user-menu-text">
                Profile
            </span>

        </a>



        {{-- =================================================
             LOGOUT
        ================================================== --}}

        <form
            method="POST"
            action="{{ route('logout') }}"
            class="user-logout-form"
        >

            @csrf


            <button
                type="submit"
                class="user-logout-btn"
            >

                Logout

            </button>


        </form>


    </nav>


</aside>



{{-- =========================================================
     CONTENT
========================================================= --}}

<main class="user-content">


    <div class="user-content-inner">


        {{-- =================================================
             WELCOME
        ================================================== --}}

        <section class="user-welcome">


            <div class="user-welcome-copy">


                <h1 class="user-welcome-title">

                    Welcome to ShipEquipAR

                </h1>


                <h2 class="user-welcome-subtitle">

                    Augmented Reality Maritime Learning Platform

                </h2>


                <p class="user-welcome-description">

                    Explore ship equipment, marine components
                    and safety systems through interactive
                    AR-based learning.

                </p>


            </div>



            <div class="user-welcome-ship">

                🚢

            </div>


        </section>



        {{-- =================================================
             WEBSITE INTRODUCTION
        ================================================== --}}

        <section class="user-introduction">


            <div class="user-section-title">

                Website Introduction

            </div>



            <article class="user-intro-card">


                <h3>

                    ⚓ What is ShipEquipAR?

                </h3>


                <p>

                    ShipEquipAR is an Augmented Reality maritime
                    learning platform designed to help users
                    understand ship equipment through interactive
                    digital learning.

                </p>


            </article>



            <article class="user-intro-card">


                <h3>

                    🎯 System Objectives

                </h3>


                <p>

                    The system provides learning materials,
                    equipment information, AR visualization
                    and interactive maritime education.

                </p>


            </article>



            <article class="user-intro-card">


                <h3>

                    📱 AR Application

                </h3>


                <p>

                    AR technology allows users to visualize
                    marine equipment models in a real-world
                    environment.

                </p>


            </article>



            <article class="user-intro-card">


                <h3>

                    ✨ Platform Benefits

                </h3>


                <p>

                    Provides immersive learning experience,
                    easy information access and interactive
                    maritime education.

                </p>


            </article>


        </section>


    </div>


</main>



{{-- =========================================================
     JAVASCRIPT
========================================================= --}}

<script>


    /* =====================================================
       LEARNING MODULE
    ===================================================== */

    function toggleModule()
    {

        const box =
            document.getElementById(
                'moduleContent'
            );


        const title =
            document.getElementById(
                'learningTitle'
            );


        const arrow =
            document.getElementById(
                'mainArrow'
            );


        box.classList.toggle(
            'active'
        );


        title.classList.toggle(
            'active'
        );


        arrow.textContent =
            box.classList.contains('active')
                ? '▲'
                : '▼';

    }



    /* =====================================================
       MODULE ITEMS
    ===================================================== */

    function toggleEquipment(id)
    {

        const box =
            document.getElementById(
                'equipment' + id
            );


        const arrow =
            document.getElementById(
                'arrow' + id
            );


        box.classList.toggle(
            'active'
        );


        arrow.textContent =
            box.classList.contains('active')
                ? '▲'
                : '▼';

    }



    /* =====================================================
       USER MOBILE DRAWER
    ===================================================== */

    function toggleUserSidebar()
    {

        const sidebar =
            document.getElementById(
                'userSidebar'
            );


        const overlay =
            document.getElementById(
                'userSidebarOverlay'
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
            'user-drawer-open',
            isOpen
        );

    }



    function closeUserSidebar()
    {

        const sidebar =
            document.getElementById(
                'userSidebar'
            );


        const overlay =
            document.getElementById(
                'userSidebarOverlay'
            );


        sidebar.classList.remove(
            'open'
        );


        overlay.classList.remove(
            'open'
        );


        document.body.classList.remove(
            'user-drawer-open'
        );

    }



    /* ESC CLOSE */

    document.addEventListener(
        'keydown',
        function(event)
        {

            if(event.key === 'Escape'){

                closeUserSidebar();

            }

        }
    );



    /* RESET WHEN DESKTOP */

    window.addEventListener(
        'resize',
        function()
        {

            if(window.innerWidth > 768){

                closeUserSidebar();

            }

        }
    );


</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const naviBotButton =
        document.getElementById('naviBotButton');

    if (!naviBotButton) {
        return;
    }

    naviBotButton.addEventListener('click', function (event) {

        event.preventDefault();

        if (
            typeof closeUserSidebar === 'function'
        ) {
            closeUserSidebar();
        }

        if (
            window.botpress &&
            typeof window.botpress.open === 'function'
        ) {
            window.botpress.open();
        } else {
            console.log('NaviBot is still loading...');
        }

    });

});
</script>


</body>

</html>