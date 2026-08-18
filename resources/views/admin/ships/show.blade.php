<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        View Ship
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        * {
            box-sizing: border-box;
        }


        body {
            font-family: 'Segoe UI', sans-serif;
            background: #eef6fb;
            padding: 40px;
            margin: 0;
            color: #0f172a;
        }


        .card {
            background: white;
            padding: 35px;
            border-radius: 20px;
            max-width: 800px;
            margin: auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .15);
        }


        .ship-image {
            width: 100%;
            max-width: 400px;
            max-height: 280px;
            object-fit: cover;
            border-radius: 15px;
            margin: 20px 0 25px;
            display: block;
        }


        h1 {
            color: #0284c7;
            font-size: 36px;
            margin-bottom: 20px;
        }


        h2 {
            margin-top: 25px;
            margin-bottom: 10px;
            color: #0f172a;
        }


        p {
            font-size: 18px;
            color: #475569;
            line-height: 1.7;
        }


        .ar-box {
            margin-top: 15px;
            padding: 20px;
            border-radius: 15px;
            background: #f8fafc;
        }


        .ar-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 12px 22px;
            background: #7c3aed;
            color: white;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
        }


        .ar-btn:hover {
            background: #6d28d9;
        }


        .no-ar {
            color: #94a3b8;
            font-size: 16px;
        }


        .btn {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 25px;
            background: #0f172a;
            color: white;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
        }


        .btn:hover {
            background: #1e293b;
        }


        @media (max-width: 768px) {

            body {
                padding: 20px;
            }

            .card {
                padding: 25px;
            }

            h1 {
                font-size: 29px;
            }

            .ship-image {
                max-width: 100%;
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
    |
    | Data baru:
    | https://github.com/.../image.jpg
    |
    | Data lama:
    | nama-file.jpg
    |
    */

    $shipImageUrl = null;

    if ($ship->image) {

        if (
            str_starts_with($ship->image, 'http://') ||
            str_starts_with($ship->image, 'https://')
        ) {

            $shipImageUrl = $ship->image;

        } else {

            $shipImageUrl =
                asset('uploads/ships/' . $ship->image);

        }

    }


    /*
    |--------------------------------------------------------------------------
    | AR MODEL URL
    |--------------------------------------------------------------------------
    |
    | Data baru:
    | URL penuh GitHub Release
    |
    | Data lama:
    | nama fail .reality
    |
    */

    $shipArUrl = null;

    if ($ship->ar_model) {

        if (
            str_starts_with($ship->ar_model, 'http://') ||
            str_starts_with($ship->ar_model, 'https://')
        ) {

            $shipArUrl = $ship->ar_model;

        } else {

            $shipArUrl =
                'https://github.com/' .
                'fakhrulaqashah960-source/' .
                'ShipEquipAR/' .
                'releases/latest/download/' .
                rawurlencode($ship->ar_model);

        }

    }

@endphp



<div class="card">


    {{-- =========================
         SHIP NAME
    ========================== --}}

    <h1>
        🚢 {{ $ship->name }}
    </h1>



    {{-- =========================
         SHIP IMAGE
    ========================== --}}

    @if($shipImageUrl)

        <img
            src="{{ $shipImageUrl }}"
            alt="{{ $ship->name }}"
            class="ship-image"
            onerror="this.style.display='none';"
        >

    @endif



    {{-- =========================
         DESCRIPTION
    ========================== --}}

    <h2>
        Description
    </h2>


    @if($ship->description)

        <p>
            {{ $ship->description }}
        </p>

    @else

        <p>
            No description available.
        </p>

    @endif



    {{-- =========================
         AR MODEL
    ========================== --}}

    <h2>
        AR Model
    </h2>


    <div class="ar-box">

        @if($shipArUrl)

            <p>
                AR learning model is available.
            </p>


            <a
                href="{{ $shipArUrl }}"
                class="ar-btn"
                rel="ar"
            >

                📱 Open AR Model

            </a>

        @else

            <span class="no-ar">
                No AR model uploaded.
            </span>

        @endif

    </div>



    {{-- =========================
         BACK
    ========================== --}}

    <a
        href="{{ route('admin.ships.index') }}"
        class="btn"
    >

        ← Back

    </a>


</div>


</body>

</html>