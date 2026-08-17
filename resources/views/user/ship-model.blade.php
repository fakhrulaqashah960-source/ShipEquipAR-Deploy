<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Ship Model AR</title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }


        body {
            background: #f1f5f9;
            padding: 30px;
            color: #0f172a;
        }


        .container {
            max-width: 1400px;
            margin: auto;
        }


        /* =========================
           HEADER
        ========================= */

        .header {
            background:
                linear-gradient(
                    135deg,
                    #0284c7,
                    #075985
                );

            color: white;
            padding: 40px;
            border-radius: 25px;

            box-shadow:
                0 10px 25px rgba(0,0,0,.15);

            margin-bottom: 35px;
        }


        .header h1 {
            font-size: 38px;
            margin-bottom: 15px;
        }


        .header p {
            font-size: 16px;
            line-height: 1.7;
        }



        /* =========================
           SHIP GRID
        ========================= */

        .ship-list {
            display: grid;
            grid-template-columns:
                repeat(3, 1fr);
            gap: 25px;
        }



        /* =========================
           CARD
        ========================= */

        .card {
            background: white;

            border-radius: 20px;

            min-height: 460px;

            display: flex;
            flex-direction: column;

            overflow: hidden;

            box-shadow:
                0 8px 20px rgba(0,0,0,.12);

            transition: .3s;
        }


        .card:hover {
            transform: translateY(-8px);
        }



        /* =========================
           IMAGE
        ========================= */

        .ship-image-wrapper {
            width: 100%;
            height: 220px;
            background: #e2e8f0;

            display: flex;
            align-items: center;
            justify-content: center;
        }


        .ship-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }


        .no-image {
            color: #64748b;
            font-weight: 600;
        }



        /* =========================
           CONTENT
        ========================= */

        .card-content {
            flex: 1;
            padding: 25px;

            display: flex;
            flex-direction: column;
        }


        .card h2 {
            font-size: 24px;
            color: #0f172a;
            margin-bottom: 18px;
        }


        .card h3 {
            font-size: 16px;
            color: #0284c7;
            margin-bottom: 8px;
        }


        .card p {
            font-size: 14px;
            color: #475569;
            line-height: 1.7;
        }


        .description {
            flex: 1;
        }



        /* =========================
           AR BUTTON
        ========================= */

        .btn {
            display: block;

            width: 190px;

            margin:
                25px auto 0;

            padding: 13px 18px;

            background: #7c3aed;

            color: white;

            text-decoration: none;

            text-align: center;

            border-radius: 10px;

            font-weight: 700;
        }


        .btn:hover {
            background: #6d28d9;
        }


        .no-ar {
            display: block;

            width: fit-content;

            margin:
                25px auto 0;

            padding: 12px 18px;

            background: #e2e8f0;

            color: #64748b;

            border-radius: 10px;

            font-weight: 600;
        }



        /* =========================
           EMPTY
        ========================= */

        .empty {
            background: white;

            padding: 50px;

            border-radius: 20px;

            text-align: center;

            box-shadow:
                0 8px 20px rgba(0,0,0,.10);
        }


        .empty h2 {
            margin-bottom: 10px;
        }


        .empty p {
            color: #64748b;
        }



        /* =========================
           BACK
        ========================= */

        .back-btn {
            display: inline-block;

            margin-top: 35px;

            padding: 13px 23px;

            background: #0f172a;

            color: white;

            text-decoration: none;

            border-radius: 10px;

            font-weight: 600;
        }


        .back-btn:hover {
            background: #1e293b;
        }



        /* =========================
           RESPONSIVE
        ========================= */

        @media(max-width:1000px) {

            .ship-list {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media(max-width:700px) {

            body {
                padding: 20px;
            }


            .header {
                padding: 28px;
            }


            .header h1 {
                font-size: 30px;
            }


            .ship-list {
                grid-template-columns: 1fr;
            }

        }

    </style>


</head>



<body>


<div class="container">


    {{-- =========================
         HEADER
    ========================== --}}

    <div class="header">

        <h1>
            🚢 Ship Model AR
        </h1>

        <p>
            Explore interactive 3D ship models using
            Augmented Reality technology.
            Users can visualize ship structures and
            components digitally.
        </p>

    </div>



    {{-- =========================
         SHIP LIST
    ========================== --}}

    @if($ships->count() > 0)

        <div class="ship-list">


            @foreach($ships as $ship)


                @php

                    /*
                    |--------------------------------------------------------------------------
                    | SHIP IMAGE
                    |--------------------------------------------------------------------------
                    |
                    | Data baru:
                    | Full GitHub Release URL
                    |
                    | Data lama:
                    | Filename sahaja
                    |
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

                        } else {

                            $imageUrl =
                                asset(
                                    'uploads/ships/' .
                                    $ship->image
                                );

                        }

                    }



                    /*
                    |--------------------------------------------------------------------------
                    | AR MODEL
                    |--------------------------------------------------------------------------
                    |
                    | Data baru:
                    | Full browser_download_url
                    |
                    | Data lama:
                    | Nama fail .reality sahaja
                    |
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

                        } else {

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



                <div class="card">


                    {{-- SHIP IMAGE --}}

                    <div class="ship-image-wrapper">


                        @if($imageUrl)

                            <img
                                src="{{ $imageUrl }}"
                                alt="{{ $ship->name }}"
                                class="ship-image"
                                loading="lazy"
                                onerror="
                                    this.style.display='none';
                                    this.nextElementSibling.style.display='block';
                                "
                            >

                            <span
                                class="no-image"
                                style="display:none;"
                            >
                                🚢 Image unavailable
                            </span>

                        @else

                            <span class="no-image">
                                🚢 No Ship Image
                            </span>

                        @endif


                    </div>



                    {{-- CONTENT --}}

                    <div class="card-content">


                        <h2>
                            🚢 {{ $ship->name }}
                        </h2>


                        <div class="description">

                            <h3>
                                Description
                            </h3>


                            <p>

                                @if($ship->description)

                                    {{ $ship->description }}

                                @else

                                    No description available.

                                @endif

                            </p>

                        </div>



                        {{-- AR MODEL --}}

                        @if($arUrl)

                            <a
                                class="btn"
                                href="{{ $arUrl }}"
                                rel="ar"
                            >
                                📱 Open AR Model
                            </a>

                        @else

                            <span class="no-ar">
                                AR Model Not Available
                            </span>

                        @endif


                    </div>


                </div>


            @endforeach


        </div>


    @else


        <div class="empty">

            <h2>
                🚢 No Ship Available
            </h2>

            <p>
                No ship models have been added yet.
            </p>

        </div>


    @endif



    {{-- =========================
         BACK DASHBOARD
    ========================== --}}

    <a
        href="{{ route('dashboard') }}"
        class="back-btn"
    >
        ← Back Dashboard
    </a>


</div>


</body>

</html>