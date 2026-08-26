<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>{{ $ship->name }}</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])


<style>

:root{
    --navy:#0f172a;
    --blue:#0284c7;
    --blue-dark:#0369a1;
    --text:#0f172a;
    --muted:#64748b;
    --line:#e2e8f0;
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
    max-width:1000px;
    margin:0 auto;
}


/* =========================================================
   HERO
========================================================= */

.ship-hero{
    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:22px;

    margin-bottom:20px;

    padding:30px;

    border-radius:24px;

    color:white;

    background:
        linear-gradient(
            135deg,
            rgba(14,116,144,.97),
            rgba(15,23,42,.98)
        );

    box-shadow:
        0 18px 40px rgba(0,0,0,.23);
}


.ship-hero-copy{
    min-width:0;
}


.ship-label{
    display:inline-flex;
    align-items:center;
    gap:7px;

    margin-bottom:9px;

    padding:7px 12px;

    border-radius:999px;

    background:rgba(255,255,255,.12);

    color:#e0f2fe;

    font-size:12px;
    font-weight:800;
}


.ship-hero h1{
    color:white;

    font-size:clamp(30px,4vw,41px);
    line-height:1.2;
    font-weight:900;

    overflow-wrap:anywhere;
}


.ship-hero-icon{
    width:84px;
    height:84px;

    flex:0 0 auto;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:21px;

    background:rgba(255,255,255,.12);

    font-size:40px;
}


/* =========================================================
   SHIP CARD
========================================================= */

.ship-card{
    width:100%;

    padding:28px;

    background:rgba(255,255,255,.98);

    border:1px solid rgba(226,232,240,.95);
    border-radius:24px;

    box-shadow:
        0 16px 38px rgba(0,0,0,.18);
}


/* =========================================================
   IMAGE
========================================================= */

.ship-image{
    display:block;

    width:100%;
    max-width:660px;
    height:330px;

    margin:0 auto 25px;

    object-fit:cover;

    background:#f8fafc;

    border:1px solid #e2e8f0;
    border-radius:18px;
}


.no-image{
    width:100%;
    max-width:660px;
    height:300px;

    display:flex;
    align-items:center;
    justify-content:center;

    margin:0 auto 25px;

    background:#f8fafc;

    border:1px dashed #cbd5e1;
    border-radius:18px;

    color:#64748b;

    font-size:14px;
    font-weight:700;
}


/* =========================================================
   ABOUT
========================================================= */

.info-section{
    margin-top:8px;

    padding:21px;

    background:#f8fafc;

    border:1px solid #e2e8f0;
    border-radius:17px;
}


.info-section h3{
    margin-bottom:10px;

    color:#0284c7;

    font-size:20px;
    line-height:1.4;
    font-weight:900;

    overflow-wrap:anywhere;
}


.info-section p{
    color:#475569;

    font-size:14.5px;
    line-height:1.85;

    overflow-wrap:anywhere;
}


/* =========================================================
   ACTIONS
========================================================= */

.ship-actions{
    display:flex;

    align-items:center;

    gap:10px;

    flex-wrap:wrap;

    margin-top:22px;

    padding-top:20px;

    border-top:1px solid #e2e8f0;
}


.btn-ar,
.back-btn,
.no-ar{
    min-height:45px;

    display:inline-flex;
    align-items:center;
    justify-content:center;

    padding:10px 18px;

    border-radius:11px;

    font-size:13px;
    font-weight:800;
}


.btn-ar{
    background:#0284c7;

    color:white;

    text-decoration:none;

    transition:.2s ease;
}


.btn-ar:hover{
    background:#0369a1;

    transform:translateY(-2px);
}


.no-ar{
    background:#e2e8f0;

    color:#64748b;
}


.back-btn{
    background:#0f172a;

    color:white;

    text-decoration:none;

    transition:.2s ease;
}


.back-btn:hover{
    background:#0284c7;

    transform:translateY(-2px);
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


    .ship-hero{
        margin-bottom:10px;

        padding:23px 17px;

        border-radius:0 0 22px 22px;
    }


    .ship-hero-icon{
        display:none;
    }


    .ship-hero h1{
        font-size:27px;
    }


    .ship-card{
        width:calc(100% - 16px);

        margin:0 8px 12px;

        padding:17px;

        border-radius:18px;
    }


    .ship-image,
    .no-image{
        height:215px;

        margin-bottom:17px;
    }


    .info-section{
        padding:16px;
    }


    .info-section h3{
        font-size:18px;
    }


    .info-section p{
        font-size:14px;
        line-height:1.78;
    }


    .ship-actions{
        display:grid;

        grid-template-columns:1fr;
    }


    .btn-ar,
    .back-btn,
    .no-ar{
        width:100%;
    }

}

</style>

</head>


<body>


@php

    /*
    |--------------------------------------------------------------------------
    | IMAGE URL
    |--------------------------------------------------------------------------
    */

    $imageUrl = null;


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

            $imageUrl =
                $ship->image;

        }

        else {

            $imageUrl =
                asset(
                    'uploads/ships/' .
                    $ship->image
                );

        }

    }


    /*
    |--------------------------------------------------------------------------
    | AR URL
    |--------------------------------------------------------------------------
    */

    $arUrl = null;


    if ($ship->ar_model) {

        if (
            str_starts_with(
                $ship->ar_model,
                'http://'
            )
            ||
            str_starts_with(
                $ship->ar_model,
                'https://'
            )
        ) {

            $arUrl =
                $ship->ar_model;

        }

        else {

            $arUrl =
                'https://github.com/' .
                'fakhrulaqashah960-source/' .
                'ShipEquipAR/' .
                'releases/latest/download/' .
                rawurlencode(
                    $ship->ar_model
                );

        }

    }

@endphp



<div class="container">


    <section class="ship-hero">


        <div class="ship-hero-copy">

            <div class="ship-label">
                🚢 Ship Learning
            </div>

            <h1>
                {{ $ship->name }}
            </h1>

        </div>


        <div class="ship-hero-icon">
            🚢
        </div>


    </section>



    <article class="ship-card">


        {{-- =====================================================
             IMAGE
        ====================================================== --}}

        @if($imageUrl)

            <img
                src="{{ $imageUrl }}"
                alt="{{ $ship->name }}"
                class="ship-image"
            >

        @else

            <div class="no-image">
                🚢 No Ship Image
            </div>

        @endif



        {{-- =====================================================
             ABOUT
        ====================================================== --}}

        <section class="info-section">

            <h3>
                📌 About {{ $ship->name }}
            </h3>

            <p>

                @if($ship->description)

                    {{ $ship->description }}

                @else

                    No description available.

                @endif

            </p>

        </section>



        {{-- =====================================================
             ACTIONS
        ====================================================== --}}

        <div class="ship-actions">


            @if($arUrl)

                <a
                    href="{{ $arUrl }}"
                    class="btn-ar"
                    rel="ar"
                >
                    📱 Open AR Model
                </a>

            @else

                <span class="no-ar">
                    AR Model Not Available
                </span>

            @endif



            <a
                href="{{ url()->previous() }}"
                class="back-btn"
            >
                ← Back
            </a>


        </div>


    </article>


</div>


</body>

</html>
