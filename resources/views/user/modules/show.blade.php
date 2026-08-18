<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>{{ $module->title }}</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}


/* =========================================================
   BODY
========================================================= */

body{
    background:#eef6fb;
    padding:40px;
    color:#0f172a;
}


.container{
    max-width:1200px;
    margin:auto;
}


/* =========================================================
   MAIN CARD
========================================================= */

.module-card{
    background:white;
    padding:40px;
    border-radius:25px;
    margin-bottom:30px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    border:1px solid #e2e8f0;
}


/* =========================================================
   HEADER
========================================================= */

.module-header{
    display:flex;
    align-items:center;
    gap:20px;
}


.module-icon{
    width:65px;
    height:65px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:linear-gradient(
        135deg,
        #38bdf8,
        #0284c7
    );

    border-radius:18px;

    font-size:30px;

    line-height:1;

    flex-shrink:0;
}


.module-header h1{
    font-size:40px;
    font-weight:800;
    margin:0;
}


/* =========================================================
   SECTION TITLE
========================================================= */

.section-title{
    display:flex;
    align-items:center;
    gap:15px;
    margin-bottom:25px;
}


.section-icon{
    width:42px;
    height:42px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:#e0f2fe;

    border-radius:12px;

    font-size:25px;

    flex-shrink:0;
}


.section-title h2{
    margin:0;
    font-size:28px;
    font-weight:800;
}


/* =========================================================
   TEXT
========================================================= */

p{
    color:#475569;
    font-size:16px;
    line-height:1.8;
    margin-bottom:15px;
}


/* =========================================================
   GRID
========================================================= */

.equipment-grid,
.ship-grid{
    display:grid;

    grid-template-columns:
        repeat(auto-fit,minmax(300px,1fr));

    gap:30px;

    align-items:stretch;
}


/* =========================================================
   EQUIPMENT / SHIP CARD
========================================================= */

.equipment-card,
.ship-card{
    background:#f8fafc;

    padding:25px;

    border-radius:25px;

    border:1px solid #dbeafe;

    display:flex;

    flex-direction:column;

    height:100%;
}


/* =========================================================
   IMAGE
========================================================= */

.equipment-image,
.ship-image{
    width:100%;
    height:210px;

    object-fit:contain;

    background:white;

    padding:15px;

    border-radius:20px;

    margin-bottom:20px;
}


.ship-image{
    object-fit:cover;
    padding:0;
}


.no-image{
    width:100%;
    height:210px;

    background:white;

    border-radius:20px;

    margin-bottom:20px;

    display:flex;

    align-items:center;
    justify-content:center;

    color:#64748b;

    font-weight:600;

    text-align:center;
}


/* =========================================================
   CARD TITLE
========================================================= */

.equipment-card h2,
.ship-card h2{
    font-size:22px;

    margin-top:0;

    margin-bottom:12px;

    color:#0f172a;
}


/* =========================================================
   CARD DESCRIPTION
========================================================= */

.card-description{
    flex:1;
    margin-bottom:20px;
}


.card-description p{
    margin-bottom:0;
}


/* =========================================================
   BUTTON AREA

   Ini memastikan button sentiasa paling bawah + center.
========================================================= */

.card-action{
    margin-top:auto;

    display:flex;

    align-items:center;

    justify-content:center;

    padding-top:15px;
}


.btn-ar{
    display:inline-flex;

    align-items:center;

    justify-content:center;

    gap:7px;

    min-width:155px;

    padding:13px 25px;

    background:#0284c7;

    color:white;

    border-radius:30px;

    text-decoration:none;

    font-weight:700;

    text-align:center;

    transition:.3s;
}


.btn-ar:hover{
    background:#0369a1;

    transform:translateY(-2px);
}


/* =========================================================
   EMPTY
========================================================= */

.empty-equipment{
    text-align:center;

    padding:35px;

    background:#f8fafc;

    border-radius:18px;

    border:1px dashed #cbd5e1;

    color:#64748b;
}


/* =========================================================
   BACK BUTTON
========================================================= */

.back-btn{
    display:inline-flex;

    margin-top:20px;

    padding:14px 30px;

    background:#0284c7;

    color:white;

    border-radius:12px;

    text-decoration:none;

    font-weight:700;

    transition:.3s;
}


.back-btn:hover{
    background:#0369a1;

    transform:translateX(-5px);
}


/* =========================================================
   VIDEO
========================================================= */

.video-frame{
    width:100%;
    height:400px;

    border:none;

    border-radius:18px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width:700px){

    body{
        padding:20px;
    }


    .module-card{
        padding:25px;
    }


    .module-header h1{
        font-size:30px;
    }


    .module-icon{
        width:55px;
        height:55px;
        font-size:25px;
    }


    .section-title h2{
        font-size:23px;
    }


    .equipment-grid,
    .ship-grid{
        grid-template-columns:1fr;
    }


    .video-frame{
        height:250px;
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

                @else

                    ⚓

                @endif

            </div>


            <h2>

                @if($isSecurityModule)

                    Ship Security System

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