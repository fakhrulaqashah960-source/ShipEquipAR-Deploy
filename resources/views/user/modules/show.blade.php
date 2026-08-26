<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>{{ $module->title }}</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>

:root{
    --navy:#0f172a;
    --navy-soft:#1e293b;
    --blue:#0284c7;
    --blue-dark:#0369a1;
    --cyan:#38bdf8;
    --text:#0f172a;
    --muted:#64748b;
    --line:#dbe5ef;
    --card:rgba(255,255,255,.97);
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
}

body{
    min-height:100vh;
    padding:34px 18px;
    color:var(--text);

    background:
        linear-gradient(
            135deg,
            rgba(15,23,42,.92),
            rgba(2,132,199,.70)
        ),
        url('/images/ship-bg.jpg');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    background-attachment:fixed;
}

.container{
    width:100%;
    max-width:1180px;
    margin:0 auto;
}

/* =========================================================
   GENERAL MODULE CARD
========================================================= */

.module-card{
    width:100%;
    margin-bottom:20px;
    padding:28px;

    background:var(--card);

    border:1px solid rgba(226,232,240,.95);
    border-radius:22px;

    box-shadow:
        0 14px 34px rgba(0,0,0,.15);
}

/* =========================================================
   MODULE HERO
========================================================= */

.container > .module-card:first-of-type{
    padding:31px;

    color:white;

    background:
        linear-gradient(
            135deg,
            rgba(14,116,144,.97),
            rgba(15,23,42,.98)
        );

    border:none;

    box-shadow:
        0 18px 40px rgba(0,0,0,.23);
}

.module-header{
    display:flex;
    align-items:center;
    gap:18px;
}

.module-icon{
    width:68px;
    height:68px;
    flex:0 0 auto;

    display:flex;
    align-items:center;
    justify-content:center;

    background:rgba(255,255,255,.13);

    border:1px solid rgba(255,255,255,.12);
    border-radius:18px;

    font-size:31px;
    line-height:1;
}

.module-header h1{
    margin:0;

    color:white;

    font-size:clamp(30px,4vw,42px);
    line-height:1.2;
    font-weight:900;

    overflow-wrap:anywhere;
}

/* =========================================================
   SECTION HEADER
========================================================= */

.section-title{
    display:flex;
    align-items:center;
    gap:13px;

    margin-bottom:20px;
}

.section-icon{
    width:46px;
    height:46px;
    flex:0 0 auto;

    display:flex;
    align-items:center;
    justify-content:center;

    background:#e0f2fe;

    border-radius:13px;

    font-size:23px;
}

.section-title h2{
    margin:0;

    color:#0f172a;

    font-size:clamp(22px,2.5vw,29px);
    line-height:1.3;
    font-weight:900;

    overflow-wrap:anywhere;
}

/* =========================================================
   TEXT
========================================================= */

p{
    color:#475569;

    font-size:14.5px;
    line-height:1.82;

    margin-bottom:13px;
}

.module-card > p:last-child{
    margin-bottom:0;
}

/* =========================================================
   SHIP / EQUIPMENT GRID
========================================================= */

.equipment-grid,
.ship-grid{
    display:grid;

    grid-template-columns:
        repeat(2,minmax(0,1fr));

    gap:18px;

    margin-top:20px;
}

.equipment-card,
.ship-card{
    min-width:0;
    height:100%;

    display:flex;
    flex-direction:column;

    padding:18px;

    background:#f8fafc;

    border:1px solid #e2e8f0;
    border-radius:18px;

    box-shadow:
        0 7px 18px rgba(15,23,42,.07);

    transition:.2s ease;
}

.equipment-card:hover,
.ship-card:hover{
    transform:translateY(-2px);

    box-shadow:
        0 13px 27px rgba(15,23,42,.11);
}

/* =========================================================
   IMAGES
========================================================= */

.equipment-image,
.ship-image{
    display:block;

    width:100%;
    height:190px;

    margin-bottom:16px;

    background:white;

    border:1px solid #e2e8f0;
    border-radius:15px;

    object-fit:contain;
}

.equipment-image{
    padding:10px;
}

.ship-image{
    padding:0;
    object-fit:cover;
}

.no-image{
    width:100%;
    height:190px;

    display:flex;
    align-items:center;
    justify-content:center;

    margin-bottom:16px;

    padding:15px;

    background:white;

    border:1px solid #e2e8f0;
    border-radius:15px;

    color:#64748b;

    text-align:center;
    font-size:13px;
    font-weight:700;
}

/* =========================================================
   CARD CONTENT
========================================================= */

.equipment-card h2,
.ship-card h2{
    margin:0 0 9px;

    color:#0f172a;

    font-size:19px;
    line-height:1.35;
    font-weight:900;

    overflow-wrap:anywhere;
}

.card-description{
    flex:1;

    margin-bottom:12px;
}

.card-description p{
    margin:0;

    display:-webkit-box;
    -webkit-line-clamp:5;
    -webkit-box-orient:vertical;

    overflow:hidden;

    color:#64748b;

    font-size:13px;
    line-height:1.65;
}

/* =========================================================
   BUTTONS
========================================================= */

.card-action{
    margin-top:auto;

    display:flex;
    align-items:center;
    justify-content:flex-start;

    padding-top:13px;

    border-top:1px solid #e2e8f0;
}

.btn-ar{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:7px;

    min-height:43px;

    padding:10px 16px;

    background:#0284c7;

    color:white;

    border-radius:10px;

    text-decoration:none;

    font-size:13px;
    font-weight:800;

    transition:.2s ease;
}

.btn-ar:hover{
    background:#0369a1;

    transform:translateY(-2px);
}

.back-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;

    min-height:45px;

    margin-top:2px;
    padding:10px 18px;

    background:#0f172a;

    color:white;

    border-radius:11px;

    text-decoration:none;

    font-size:13px;
    font-weight:800;

    box-shadow:
        0 6px 16px rgba(15,23,42,.20);

    transition:.2s ease;
}

.back-btn:hover{
    background:#0284c7;

    transform:translateY(-2px);
}

/* =========================================================
   EMPTY
========================================================= */

.empty-equipment{
    width:100%;

    padding:35px 20px;

    background:#f8fafc;

    border:1px dashed #cbd5e1;
    border-radius:16px;

    color:#64748b;

    text-align:center;
    font-size:13px;
    font-weight:700;
}

/* =========================================================
   VIDEO
========================================================= */

.video-frame{
    display:block;

    width:100%;
    height:420px;

    border:none;
    border-radius:16px;

    background:#0f172a;
}

/* =========================================================
   TABLET
========================================================= */

@media(max-width:850px){

    .equipment-grid,
    .ship-grid{
        grid-template-columns:1fr;
    }

}

/* =========================================================
   MOBILE
========================================================= */

@media(max-width:600px){

    body{
        padding:0;
        background-attachment:scroll;
    }

    .container{
        max-width:none;
    }

    .module-card{
        width:calc(100% - 16px);

        margin:0 8px 10px;
        padding:18px;

        border-radius:18px;
    }

    .container > .module-card:first-of-type{
        width:100%;

        margin:0 0 10px;
        padding:22px 17px;

        border-radius:0 0 22px 22px;
    }

    .module-header{
        gap:13px;
    }

    .module-icon{
        width:54px;
        height:54px;

        border-radius:15px;

        font-size:25px;
    }

    .module-header h1{
        font-size:27px;
    }

    .section-icon{
        width:42px;
        height:42px;

        font-size:21px;
    }

    .section-title h2{
        font-size:21px;
    }

    p{
        font-size:14px;
        line-height:1.75;
    }

    .equipment-card,
    .ship-card{
        padding:15px;
    }

    .equipment-image,
    .ship-image,
    .no-image{
        height:170px;
    }

    .card-description p{
        -webkit-line-clamp:6;
    }

    .btn-ar{
        width:100%;
    }

    .video-frame{
        height:235px;
    }

    .back-btn{
        width:calc(100% - 16px);

        margin:4px 8px 12px;
    }

}

</style>

</head>


<body>


{{-- =========================================================
     DETERMINE MODULE TYPE
========================================================= --}}

@php

    $moduleTitle =
        strtolower(
            $module->title ?? ''
        );


    $moduleCategory =
        strtolower(
            $module->category ?? ''
        );


    /*
    |--------------------------------------------------------------------------
    | SHIP MODEL
    |--------------------------------------------------------------------------
    |
    | Hanya module sebenar Ship Model / Cargo & Freight.
    |
    | Jangan guna sekadar perkataan "ship",
    | sebab "Ship Security System" pun ada perkataan ship.
    |
    */

    $isShipModel =

        str_contains(
            $moduleTitle,
            'ship model'
        )

        ||

        str_contains(
            $moduleCategory,
            'cargo'
        )

        ||

        str_contains(
            $moduleCategory,
            'freight'
        );


    /*
    |--------------------------------------------------------------------------
    | SHIP SECURITY SYSTEM
    |--------------------------------------------------------------------------
    */

    $isSecurityModule =

        str_contains(
            $moduleTitle,
            'security'
        )

        ||

        str_contains(
            $moduleCategory,
            'security'
        )

        ||

        str_contains(
            $moduleCategory,
            'protection'
        );


    /*
    |--------------------------------------------------------------------------
    | PPE / SAFETY EQUIPMENT
    |--------------------------------------------------------------------------
    */

    $isSafetyModule =

        str_contains(
            $moduleTitle,
            'safety equipment'
        )

        ||

        str_contains(
            $moduleCategory,
            'ppe'
        )

        ||

        str_contains(
            $moduleCategory,
            'safety'
        );


    /*
    |--------------------------------------------------------------------------
    | ENGINE MODEL
    |--------------------------------------------------------------------------
    */

    $isEngineModule =

        str_contains(
            $moduleTitle,
            'engine'
        )

        ||

        str_contains(
            $moduleCategory,
            'engine'
        );

@endphp



<div class="container">


{{-- =========================================================
     HEADER
========================================================= --}}

<div class="module-card">

    <div class="module-header">


        <div class="module-icon">


            @if($isShipModel)

                🚢


            @elseif($isSecurityModule)

                🛡️


            @elseif($isSafetyModule)

                🦺


            @elseif($isEngineModule)

                ⚙️


            @else

                📚

            @endif


        </div>


        <h1>
            {{ $module->title }}
        </h1>


    </div>

</div>



{{-- =========================================================
     ABOUT MODULE
========================================================= --}}

<div class="module-card">


    <div class="section-title">


        <div class="section-icon">
            📖
        </div>


        <h2>
            About {{ $module->title }}
        </h2>


    </div>



    @if($module->description)

        <p>
            {{ $module->description }}
        </p>

    @endif



    @if($module->function)

        <p>
            {{ $module->function }}
        </p>

    @endif


</div>



{{-- =========================================================
     VIDEO
========================================================= --}}

@if($module->video_url)


    <div class="module-card">


        <div class="section-title">


            <div class="section-icon">
                🎥
            </div>


            <h2>
                Learning Video
            </h2>


        </div>


        <iframe
            class="video-frame"
            src="{{ $module->video_url }}"
            allowfullscreen>
        </iframe>


    </div>


@endif



{{-- =========================================================
     SHIP MODEL MODULE
========================================================= --}}

@if($isShipModel)


    <div class="module-card">


        <div class="section-title">


            <div class="section-icon">
                🚢
            </div>


            <h2>
                Ship Model
            </h2>


        </div>


        <p>
            Explore different types of maritime vessels
            through Augmented Reality technology.
        </p>



        @if(
            isset($ships)
            &&
            $ships->count() > 0
        )


            <div class="ship-grid">


                @foreach($ships as $ship)


                    @php

                        /*
                        |--------------------------------------------------------------------------
                        | SHIP IMAGE
                        |--------------------------------------------------------------------------
                        */

                        $shipImageUrl = null;


                        if ($ship->image) {


                            if (
                                str_starts_with(
                                    $ship->image,
                                    'http://'
                                )
                                ||
                                str_starts_with(
                                    $ship->image,
                                    'https://'
                                )
                            ) {

                                $shipImageUrl =
                                    $ship->image;

                            } else {

                                $shipImageUrl =
                                    asset(
                                        'uploads/ships/' .
                                        $ship->image
                                    );

                            }

                        }

                    @endphp



                    <div class="ship-card">


                        {{-- IMAGE --}}

                        @if($shipImageUrl)

                            <img
                                src="{{ $shipImageUrl }}"
                                alt="{{ $ship->name }}"
                                class="ship-image"
                            >

                        @else

                            <div class="no-image">
                                🚢 No Ship Image
                            </div>

                        @endif



                        {{-- TITLE --}}

                        <h2>
                            {{ $ship->name }}
                        </h2>



                        {{-- DESCRIPTION --}}

                        <div class="card-description">


                            @if($ship->description)

                                <p>
                                    {{ $ship->description }}
                                </p>

                            @else

                                <p>
                                    No description available.
                                </p>

                            @endif


                        </div>



                        {{-- BUTTON --}}

                        <div class="card-action">


                            <a
                                href="{{ route(
                                    'ship.show',
                                    $ship->id
                                ) }}"
                                class="btn-ar"
                            >
                                🚢 View Ship
                            </a>


                        </div>


                    </div>


                @endforeach


            </div>


        @else


            <div class="empty-equipment">

                No ship model available.

            </div>


        @endif


    </div>



{{-- =========================================================
     OTHER MODULES
     PPE / SECURITY / ETC
========================================================= --}}

@else


    <div class="module-card">


        <div class="section-title">


            <div class="section-icon">

                @if($isSecurityModule)

                    🛡️

                @elseif($isSafetyModule)

                    🦺

                @elseif($isEngineModule)

                    ⚙️

                @else

                    ⚓

                @endif

            </div>


            <h2>

                @if($isSecurityModule)

                    Ship Security System

                @elseif($isSafetyModule)

                    Safety Equipment

                @elseif($isEngineModule)

                    Engine Equipment

                @else

                    Equipment List

                @endif

            </h2>


        </div>



        @if(
            $module->equipments
            &&
            $module->equipments->count() > 0
        )


            <div class="equipment-grid">


                @foreach(
                    $module->equipments as $equipment
                )


                    @php

                        /*
                        |--------------------------------------------------------------------------
                        | EQUIPMENT IMAGE
                        |--------------------------------------------------------------------------
                        |
                        | Support:
                        | - full GitHub URL
                        | - local filename
                        |
                        */

                        $equipmentImageUrl = null;


                        if ($equipment->image) {


                            if (
                                str_starts_with(
                                    $equipment->image,
                                    'http://'
                                )
                                ||
                                str_starts_with(
                                    $equipment->image,
                                    'https://'
                                )
                            ) {

                                $equipmentImageUrl =
                                    $equipment->image;

                            } else {

                                $equipmentImageUrl =
                                    asset(
                                        'uploads/equipment/' .
                                        $equipment->image
                                    );

                            }

                        }

                    @endphp



                    <div class="equipment-card">


                        {{-- IMAGE --}}

                        @if($equipmentImageUrl)

                            <img
                                src="{{ $equipmentImageUrl }}"
                                alt="{{ $equipment->name }}"
                                class="equipment-image"
                            >

                        @else

                            <div class="no-image">

                                @if($isSecurityModule)

                                    🛡️ No Image

                                @else

                                    ⚓ No Equipment Image

                                @endif

                            </div>

                        @endif



                        {{-- NAME --}}

                        <h2>
                            {{ $equipment->name }}
                        </h2>



                        {{-- DESCRIPTION --}}

                        <div class="card-description">


                            @if($equipment->description)

                                <p>
                                    {{ $equipment->description }}
                                </p>

                            @else

                                <p>
                                    No description available.
                                </p>

                            @endif


                        </div>



                        {{-- BUTTON --}}

                        <div class="card-action">


                            <a
                                href="{{ route(
                                    'equipment.show',
                                    $equipment->id
                                ) }}"
                                class="btn-ar"
                            >
                                📱 Open AR Model
                            </a>


                        </div>


                    </div>


                @endforeach


            </div>


        @else


            <div class="empty-equipment">


                @if($isSecurityModule)

                    No security system equipment available
                    for this module.

                @else

                    No equipment available for this module.

                @endif


            </div>


        @endif


    </div>


@endif



{{-- =========================================================
     BACK
========================================================= --}}

<a
    href="{{ route('dashboard') }}"
    class="back-btn"
>
    ← Back to Dashboard
</a>


</div>


</body>

</html>