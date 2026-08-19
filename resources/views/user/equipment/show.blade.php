<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>{{ $equipment->name }}</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f1f5f9;
            padding: 40px;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: auto;
        }

        /* =========================
           HEADER
        ========================= */

        .header {
            background: linear-gradient(
                135deg,
                #0284c7,
                #0f172a
            );

            color: white;

            padding: 30px;

            border-radius: 25px;

            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 35px;
        }

        .header p {
            margin-top: 10px;
            line-height: 1.6;
        }

        /* =========================
           CARD
        ========================= */

        .card {
            background: white;

            border-radius: 25px;

            padding: 35px;

            box-shadow:
                0 15px 35px
                rgba(0, 0, 0, .15);
        }

        .title {
            text-align: center;

            font-size: 32px;

            color: #075985;

            margin-bottom: 20px;
        }

        /* =========================
           IMAGE
        ========================= */

        .equipment-image {
            display: block;

            width: 100%;

            height: 300px;

            object-fit: contain;

            margin-bottom: 25px;
        }

        /* =========================
           CONTENT
        ========================= */

        .section {
            margin-top: 25px;
        }

        .section h2 {
            color: #0284c7;

            font-size: 20px;

            margin-bottom: 10px;
        }

        .section p {
            color: #475569;

            line-height: 1.8;

            font-size: 16px;
        }

        /* =========================
           AR
        ========================= */

        .ar-container {
            width: 100%;

            text-align: center;

            margin-top: 35px;
        }

        /*
        |--------------------------------------------------------------------------
        | AR QUICK LOOK
        |--------------------------------------------------------------------------
        |
        | IMPORTANT:
        |
        | Apple/WebKit expects:
        |
        | <a rel="ar">
        |     <img>
        | </a>
        |
        | No JavaScript redirect.
        | No download attribute.
        |
        */

        .ar-btn {
            position: relative;

            display: block;

            width: 220px;
            height: 54px;

            margin: 0 auto;

            background: #0284c7;

            border-radius: 30px;

            overflow: hidden;

            text-decoration: none;

            cursor: pointer;

            box-shadow:
                0 8px 20px
                rgba(2, 132, 199, .25);
        }

        .ar-btn:active {
            transform: scale(.98);
        }

        /*
        |--------------------------------------------------------------------------
        | REAL CHILD IMAGE
        |--------------------------------------------------------------------------
        */

        .ar-btn img {
            position: absolute;

            inset: 0;

            width: 100%;
            height: 100%;

            object-fit: cover;

            opacity: 0.001;

            pointer-events: none;
        }

        /*
        |--------------------------------------------------------------------------
        | BUTTON LABEL
        |--------------------------------------------------------------------------
        */

        .ar-btn::after {
            content: "📱 Open AR Model";

            position: absolute;

            inset: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            color: white;

            font-size: 16px;

            font-weight: 700;

            z-index: 2;

            pointer-events: none;
        }

        /* =========================
           BACK
        ========================= */

        .back-btn {
            display: inline-block;

            margin-top: 30px;

            background: #0284c7;

            color: white;

            padding: 12px 25px;

            border-radius: 12px;

            text-decoration: none;

            font-size: 16px;

            font-weight: 600;
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 768px) {

            body {
                padding: 18px;
            }

            .container {
                width: 100%;
            }

            .header {
                padding: 22px;
                border-radius: 20px;
            }

            .header h1 {
                font-size: 27px;
            }

            .card {
                padding: 22px;
                border-radius: 20px;
            }

            .title {
                font-size: 26px;
            }

            .equipment-image {
                height: 230px;
            }

            .ar-btn {
                width: 210px;
            }

        }

    </style>

</head>


<body>


<div class="container">


    <div class="header">

        <h1>
            ⚓ PPE Marine Engineer
        </h1>

        <p>
            Marine Personal Protective Equipment (PPE)
            provides essential protection for marine
            engineers against workplace hazards onboard ships.
        </p>

    </div>


    <div class="card">


        <h1 class="title">

            @if(str_contains($equipment->name, 'Helmet'))

                ⛑️

            @elseif(str_contains($equipment->name, 'Glasses'))

                🥽

            @elseif(str_contains($equipment->name, 'Gloves'))

                🧤

            @elseif(str_contains($equipment->name, 'Coverall'))

                🥼

            @elseif(str_contains($equipment->name, 'Boots'))

                🥾

            @else

                ⚓

            @endif


            {{ $equipment->name }}

        </h1>


        {{-- =========================
             EQUIPMENT IMAGE
        ========================== --}}

        @php

            $equipmentImage = null;

        @endphp


        @if($equipment->image)

            @php

                $equipmentImage =

                    str_starts_with(
                        $equipment->image,
                        'http://'
                    )

                    ||

                    str_starts_with(
                        $equipment->image,
                        'https://'
                    )

                    ?

                    $equipment->image

                    :

                    asset(
                        'uploads/equipment/' .
                        $equipment->image
                    );

            @endphp


            <img
                src="{{ $equipmentImage }}"
                alt="{{ $equipment->name }}"
                class="equipment-image"
            >

        @endif


        {{-- =========================
             ABOUT
        ========================== --}}

        <div class="section">

            <h2>
                📌 About Equipment
            </h2>

            <p>
                {{ $equipment->description }}
            </p>

        </div>


        {{-- =========================
             FUNCTION
        ========================== --}}

        <div class="section">

            <h2>
                ⚙️ Main Function
            </h2>

            <p>
                {{ $equipment->function }}
            </p>

        </div>


        {{-- =========================
             AR QUICK LOOK
        ========================== --}}

        @if($equipment->model_file)

            @php

                /*
                |--------------------------------------------------------------------------
                | GET MODEL FILE NAME
                |--------------------------------------------------------------------------
                */

                $modelValue =
                    trim(
                        $equipment->model_file
                    );


                if (
                    str_starts_with(
                        $modelValue,
                        'http://'
                    )
                    ||
                    str_starts_with(
                        $modelValue,
                        'https://'
                    )
                ) {

                    $modelPath =
                        parse_url(
                            $modelValue,
                            PHP_URL_PATH
                        );


                    $modelName =
                        rawurldecode(
                            basename(
                                $modelPath
                            )
                        );

                }

                else {

                    $modelName =
                        rawurldecode(
                            basename(
                                $modelValue
                            )
                        );

                }


                /*
                |--------------------------------------------------------------------------
                | PREVIEW
                |--------------------------------------------------------------------------
                */

                $arPreviewImage =
                    $equipmentImage
                    ??
                    asset('favicon.ico');


                /*
                |--------------------------------------------------------------------------
                | LOCAL RENDER URL
                |--------------------------------------------------------------------------
                */

                $arUrl =
                    route(
                        'ar.model',
                        [
                            'file' =>
                                $modelName
                        ]
                    );

            @endphp


            @if(
                str_ends_with(
                    strtolower($modelName),
                    '.reality'
                )
            )

                <div class="ar-container">

                    <a
                        rel="ar"
                        href="{{ $arUrl }}"
                        class="ar-btn"
                    >

                        <img
                            src="{{ $arPreviewImage }}"
                            alt="Open {{ $equipment->name }} in AR"
                        >

                    </a>

                </div>

            @endif

        @endif


        {{-- =========================
             BACK
        ========================== --}}

        <a
            href="{{ route('dashboard') }}"
            class="back-btn"
        >
            ← Back to Dashboard
        </a>


    </div>


</div>


</body>

</html>