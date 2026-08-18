<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        ShipEquipAR Dashboard
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }


        body {

            min-height: 100vh;

            background:
                linear-gradient(
                    135deg,
                    rgba(15,23,42,.95),
                    rgba(2,132,199,.75)
                ),
                url('/images/ship-bg.jpg');

            background-size: cover;
            background-position: center;

            color: white;
        }



        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {

            position: fixed;

            left: 0;
            top: 0;

            width: 245px;

            height: 100vh;

            background: #0f172a;

            padding: 25px 20px;

            overflow-y: auto;
        }



        .logo {

            font-size: 25px;

            font-weight: 800;

            text-align: center;

            margin-bottom: 35px;
        }



        .logo span {

            color: #38bdf8;
        }



        .menu {

            display: flex;

            flex-direction: column;

            gap: 8px;
        }



        /* =====================================================
           NORMAL MENU
        ===================================================== */

        .menu > a {

            display: flex;

            align-items: center;

            padding: 12px 14px;

            border-radius: 10px;

            color: #cbd5e1;

            text-decoration: none;

            font-size: 14px;

            font-weight: 400;

            transition: .3s;
        }



        .menu > a:hover {

            background: #0284c7;

            color: white;
        }



        .menu > a.active {

            background: #0284c7;

            color: white;

            font-weight: 700;
        }



        /* =====================================================
           LEARNING MODULE TITLE
        ===================================================== */

        .module-title {

            display: flex;

            justify-content: space-between;

            align-items: center;

            background: #1e293b;

            padding: 13px 14px;

            border-radius: 10px;

            cursor: pointer;

            font-size: 14px;

            font-weight: 400;

            color: #cbd5e1;

            transition: .3s;
        }



        .module-title.active {

            background: #0284c7;

            color: white;

            font-weight: 700;
        }



        .module-title span:last-child {

            font-size: 15px;
        }



        .module-content {

            display: none;

            margin-top: 8px;

            margin-left: 14px;
        }



        .module-content.active {

            display: block;
        }



        /* =====================================================
           MODULE ITEM
        ===================================================== */

        .module-item {

            display: flex;

            justify-content: space-between;

            align-items: center;

            background: #1e293b;

            padding: 12px;

            border-radius: 10px;

            margin-bottom: 8px;

            cursor: pointer;

            font-size: 14px;

            font-weight: 400;
        }



        .module-item:hover {

            background: #0284c7;
        }



        .module-list {

            display: none;

            margin-left: 10px;

            margin-bottom: 10px;
        }



        .module-list.active {

            display: block;
        }



        /* =====================================================
           INTRODUCTION LINK
        ===================================================== */

        .intro-link {

            display: block;

            background: #0f766e;

            padding: 10px;

            border-radius: 10px;

            margin-bottom: 8px;

            color: white;

            text-decoration: none;

            font-size: 13px;

            font-weight: 600;

            line-height: 1.5;
        }



        .intro-link:hover {

            background: #0d9488;
        }



        /* =====================================================
           EQUIPMENT CARD
        ===================================================== */

        .equipment-card {

            display: flex;

            align-items: center;

            gap: 10px;

            background: #172554;

            padding: 10px;

            border-radius: 10px;

            margin-bottom: 7px;

            text-decoration: none;

            color: white;

            font-size: 13px;

            transition: .3s;
        }



        .equipment-card:hover {

            background: #0284c7;
        }



        .equipment-icon {

            font-size: 18px;
        }



        .equipment-card strong {

            color: #bae6fd;

            font-weight: 500;
        }



        /* =====================================================
           SHIP CARD - USER SIDEBAR
        ===================================================== */

        .ship-sidebar-card {

            display: flex;

            align-items: center;

            gap: 10px;

            background: #164e63;

            padding: 10px;

            border-radius: 10px;

            margin-bottom: 7px;

            color: white;

            text-decoration: none;

            font-size: 13px;

            transition: .3s;
        }



        .ship-sidebar-card:hover {

            background: #0284c7;

            transform: translateX(3px);
        }



        .ship-sidebar-icon {

            font-size: 18px;

            flex-shrink: 0;
        }



        .ship-sidebar-card strong {

            color: #cffafe;

            font-weight: 600;

            line-height: 1.4;
        }



        .no-ship-sidebar {

            display: block;

            background: #334155;

            padding: 10px;

            border-radius: 10px;

            margin-bottom: 7px;

            color: #94a3b8;

            font-size: 12px;

            text-align: center;
        }



        /* =====================================================
           LOGOUT
        ===================================================== */

        .logout-btn {

            margin-top: 30px;

            width: 100%;

            padding: 12px;

            background: #ef4444;

            border: none;

            border-radius: 10px;

            color: white;

            font-weight: 600;

            cursor: pointer;
        }



        .logout-btn:hover {

            background: #dc2626;
        }



        /* =====================================================
           CONTENT
        ===================================================== */

        .content {

            margin-left: 245px;

            padding: 35px;
        }



        .welcome {

            background:
                linear-gradient(
                    135deg,
                    #0e7490,
                    #0f172a
                );

            padding: 45px;

            border-radius: 25px;

            display: flex;

            justify-content: space-between;

            align-items: center;
        }



        .welcome h1 {

            font-size: 40px;
        }



        .welcome h2 {

            color: #7dd3fc;

            margin-top: 10px;
        }



        .welcome p {

            margin-top: 20px;

            line-height: 1.7;

            max-width: 650px;
        }



        .ship {

            font-size: 90px;
        }



        /* =====================================================
           INTRODUCTION SECTION
        ===================================================== */

        .introduction-section {

            margin-top: 35px;

            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 20px;
        }



        .section-title {

            grid-column: 1 / 3;

            font-size: 30px;

            color: #bae6fd;
        }



        .intro-item {

            background:
                rgba(255,255,255,.15);

            padding: 25px;

            border-radius: 20px;
        }



        .intro-item h3 {

            margin-bottom: 15px;
        }



        .intro-item p {

            line-height: 1.7;
        }



        .notes-btn {

            background: #0284c7;

            color: white;

            padding: 12px 25px;

            border-radius: 10px;

            text-decoration: none;
        }



        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media(max-width:900px) {

            .sidebar {

                width: 220px;
            }


            .content {

                margin-left: 220px;

                padding: 25px;
            }


            .welcome {

                padding: 30px;
            }


            .welcome h1 {

                font-size: 32px;
            }


            .ship {

                font-size: 65px;
            }

        }



        @media(max-width:700px) {

            .sidebar {

                position: relative;

                width: 100%;

                height: auto;
            }


            .content {

                margin-left: 0;
            }


            .welcome {

                flex-direction: column;

                align-items: flex-start;

                gap: 20px;
            }


            .introduction-section {

                grid-template-columns: 1fr;
            }


            .section-title {

                grid-column: 1;
            }

        }

    </style>


</head>


<body>



{{-- =========================================================
     SIDEBAR
========================================================= --}}

<div class="sidebar">


    {{-- LOGO --}}

    <div class="logo">

        ⚓ Ship<span>EquipAR</span>

    </div>



    <div class="menu">


        {{-- =================================================
             DASHBOARD
        ================================================== --}}

        <a
            href="{{ route('dashboard') }}"
            class="{{ request()->is('dashboard') ? 'active' : '' }}"
        >

            🏠 Dashboard

        </a>



        {{-- =================================================
             LEARNING MODULE
        ================================================== --}}

        <div>


            <div
                id="learningTitle"
                class="module-title"
                onclick="toggleModule()"
            >


                <span>

                    📚 Learning Module

                </span>


                <span id="mainArrow">

                    ▼

                </span>


            </div>



            <div
                id="moduleContent"
                class="module-content"
            >


                @foreach($modules as $module)


                    {{-- =====================================
                         MODULE TITLE
                    ====================================== --}}

                    <div
                        class="module-item"
                        onclick="toggleEquipment({{ $module->id }})"
                    >


                        <span>

                            📘 {{ $module->title }}

                        </span>


                        <span id="arrow{{ $module->id }}">

                            ▼

                        </span>


                    </div>



                    {{-- =====================================
                         MODULE CONTENT
                    ====================================== --}}

                    <div
                        id="equipment{{ $module->id }}"
                        class="module-list"
                    >



                        {{-- INTRODUCTION --}}

                        <a
                            href="{{ route('learning.show', $module->id) }}"
                            class="intro-link"
                        >

                            📖 Introduction to
                            {{ ucfirst($module->category) }}

                        </a>



                        {{-- =================================
                             SHIP MODELS

                             Ship hanya muncul dalam module
                             Cargo / Freight.
                        ================================== --}}

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
                                    class="ship-sidebar-card"
                                >


                                    <span class="ship-sidebar-icon">

                                        🚢

                                    </span>


                                    <strong>

                                        {{ $ship->name }}

                                    </strong>


                                </a>


                            @empty


                                <span class="no-ship-sidebar">

                                    No ship available

                                </span>


                            @endforelse


                        @endif



                        {{-- =================================
                             EQUIPMENT LIST
                        ================================== --}}

                        @foreach($module->equipments as $equipment)


                            <a
                                href="{{ route('equipment.show', $equipment->id) }}"
                                class="equipment-card"
                            >


                                <span class="equipment-icon">


                                    @if(
                                        str_contains(
                                            $equipment->name,
                                            'Helmet'
                                        )
                                    )

                                        ⛑️


                                    @elseif(
                                        str_contains(
                                            $equipment->name,
                                            'Glasses'
                                        )
                                    )

                                        🥽


                                    @elseif(
                                        str_contains(
                                            $equipment->name,
                                            'Gloves'
                                        )
                                    )

                                        🧤


                                    @elseif(
                                        str_contains(
                                            $equipment->name,
                                            'Coverall'
                                        )
                                    )

                                        🥼


                                    @elseif(
                                        str_contains(
                                            $equipment->name,
                                            'Boots'
                                        )
                                    )

                                        🥾


                                    @elseif(
                                        str_contains(
                                            $equipment->name,
                                            'CCTV'
                                        )
                                    )

                                        📹


                                    @elseif(
                                        str_contains(
                                            $equipment->name,
                                            'Alarm'
                                        )
                                    )

                                        🚨


                                    @elseif(
                                        str_contains(
                                            $equipment->name,
                                            'Radar'
                                        )
                                    )

                                        📡


                                    @elseif(
                                        str_contains(
                                            $equipment->name,
                                            'Ear muffs'
                                        )
                                    )

                                        🎧

                                    @elseif(
                                        str_contains(
                                            $equipment->name,
                                            'Razor Wire'
                                        )
                                    )

                                        ⛓️ 

                                    @elseif(
                                        str_contains(
                                            $equipment->name,
                                            'Upperdeck Lighting'
                                        )
                                    )

                                        💡

                                    @elseif(
                                        str_contains(
                                            $equipment->name,
                                            'Water Spray & Foam Monitoring'
                                        )
                                    )

                                       💨 

                                    @elseif(
                                        str_contains(
                                            $equipment->name,
                                            'Automatic Identification System'
                                        )
                                    )

                                        📡


                                    @else

                                        ⚓

                                    @endif


                                </span>



                                <strong>

                                    {{ $equipment->name }}

                                </strong>


                            </a>


                        @endforeach


                    </div>


                @endforeach


            </div>


        </div>



        {{-- =================================================
             MODULE NOTES
        ================================================== --}}

        <a href="{{ route('user.notes') }}">

            📘 Module Notes

        </a>



        {{-- =================================================
             QUIZ
        ================================================== --}}

        <a href="{{ route('quiz.index') }}">

            📝 Start Quiz

        </a>



        {{-- =================================================
             CERTIFICATE
        ================================================== --}}

        <a href="#">

            🏆 Get Certificate

        </a>



        {{-- =================================================
             SHIP BOT
        ================================================== --}}

        <a href="#">

            🤖 Ship Bot

        </a>



        {{-- =================================================
             PROFILE
        ================================================== --}}

        <a href="{{ route('profile.edit') }}">

            👤 Profile

        </a>



        {{-- =================================================
             LOGOUT
        ================================================== --}}

        <form
            method="POST"
            action="{{ route('logout') }}"
        >

            @csrf


            <button
                type="submit"
                class="logout-btn"
            >

                Logout

            </button>


        </form>


    </div>


</div>



{{-- =========================================================
     MAIN CONTENT
========================================================= --}}

<div class="content">



    {{-- =====================================================
         WELCOME
    ====================================================== --}}

    <div class="welcome">


        <div>


            <h1>

                ⚓ Welcome to ShipEquipAR

            </h1>


            <h2>

                Augmented Reality Maritime Learning Platform

            </h2>


            <p>

                Explore ship equipment, marine components
                and safety systems through interactive
                AR-based learning.

            </p>


        </div>



        <div class="ship">

            🚢

        </div>


    </div>



    {{-- =====================================================
         WEBSITE INTRODUCTION
    ====================================================== --}}

    <div class="introduction-section">


        <div class="section-title">

            Website Introduction

        </div>



        <div class="intro-item">


            <h3>

                ⚓ What is ShipEquipAR?

            </h3>


            <p>

                ShipEquipAR is an Augmented Reality
                maritime learning platform designed
                to help users understand ship equipment
                through interactive digital learning.

            </p>


        </div>



        <div class="intro-item">


            <h3>

                🎯 System Objectives

            </h3>


            <p>

                The system provides learning materials,
                equipment information, AR visualization
                and interactive maritime education.

            </p>


        </div>



        <div class="intro-item">


            <h3>

                📱 AR Application

            </h3>


            <p>

                AR technology allows users to visualize
                marine equipment models in a real-world
                environment.

            </p>


        </div>



        <div class="intro-item">


            <h3>

                ✨ Platform Benefits

            </h3>


            <p>

                Provides immersive learning experience,
                easy information access and interactive
                maritime education.

            </p>


        </div>


    </div>


</div>



{{-- =========================================================
     JAVASCRIPT
========================================================= --}}

<script>


    function toggleModule()
    {

        let box =
            document.getElementById(
                "moduleContent"
            );

        let arrow =
            document.getElementById(
                "mainArrow"
            );

        let title =
            document.getElementById(
                "learningTitle"
            );


        box.classList.toggle(
            "active"
        );


        title.classList.toggle(
            "active"
        );


        if (
            box.classList.contains(
                "active"
            )
        ) {

            arrow.innerHTML = "▲";

        } else {

            arrow.innerHTML = "▼";

        }

    }



    function toggleEquipment(id)
    {

        let box =
            document.getElementById(
                "equipment" + id
            );

        let arrow =
            document.getElementById(
                "arrow" + id
            );


        box.classList.toggle(
            "active"
        );


        if (
            box.classList.contains(
                "active"
            )
        ) {

            arrow.innerHTML = "▲";

        } else {

            arrow.innerHTML = "▼";

        }

    }


</script>


</body>

</html>