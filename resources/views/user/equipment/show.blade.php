<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $equipment->name }}
    </title>

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
           SECTION
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
           AR CONTAINER
        ========================= */

        .ar-container {
            width: 100%;
            text-align: center;
            margin-top: 35px;
        }

        /* =========================
           AR QUICK LOOK BUTTON
        ========================= */

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

            transition:
                transform .25s ease,
                background .25s ease,
                box-shadow .25s ease;

            box-shadow:
                0 8px 20px
                rgba(2, 132, 199, .25);
        }

        .ar-btn:hover {
            background: #0369a1;

            transform: translateY(-2px);

            box-shadow:
                0 10px 25px
                rgba(2, 132, 199, .35);
        }

        /*
        |--------------------------------------------------------------------------
        | IMPORTANT FOR IOS QUICK LOOK
        |--------------------------------------------------------------------------
        |
        | Safari AR Quick Look uses:
        |
        | <a rel="ar">
        |     <img>
        | </a>
        |
        */

        .ar-quicklook img {
            position: absolute;

            inset: 0;

            width: 100%;
            height: 100%;

            object-fit: cover;

            opacity: 0.01;

            pointer-events: none;
        }

        .ar-quicklook::after {

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

        .ar-message {

            max-width: 420px;

            margin: 12px auto 0;

            color: #64748b;

            font-size: 13px;

            line-height: 1.5;
        }

        /* =========================
           BACK BUTTON
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

            transition: .3s;
        }

        .back-btn:hover {
            background: #0369a1;
            transform: translateY(-2px);
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
             ABOUT EQUIPMENT
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
             MAIN FUNCTION
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
                | MODEL VALUE FROM DATABASE
                |--------------------------------------------------------------------------
                |
                | Example:
                |
                | https://github.com/.../
                | equipment-ar_xxx.reality
                |
                */

                $modelValue =
                    trim(
                        $equipment->model_file
                    );


                /*
                |--------------------------------------------------------------------------
                | GET FILE NAME
                |--------------------------------------------------------------------------
                */

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
                | PREVIEW IMAGE
                |--------------------------------------------------------------------------
                */

                $arPreviewImage =

                    $equipmentImage

                    ??

                    asset(
                        'favicon.ico'
                    );


                /*
                |--------------------------------------------------------------------------
                | LOCAL RENDER AR ROUTE
                |--------------------------------------------------------------------------
                |
                | GitHub:
                |
                | equipment-ar_xxx.reality
                |
                | is synchronized to:
                |
                | public/uploads/reality/
                |
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


                    <!--
                    |--------------------------------------------------------------------------
                    | IMPORTANT
                    |--------------------------------------------------------------------------
                    |
                    | Do not add download=""
                    |
                    | Do not use JavaScript redirect.
                    |
                    | Direct user tap on rel="ar".
                    |
                    -->

                    <a
                        id="arQuickLookLink"
                        class="ar-btn ar-quicklook"
                        rel="ar"
                        href="{{ $arUrl }}"
                    >

                        <img
                            src="{{ $arPreviewImage }}"
                            alt="Open {{ $equipment->name }} in AR"
                        >

                    </a>


                    <p
                        id="arCompatibilityMessage"
                        class="ar-message"
                        style="display:none;"
                    >

                        For the best AR experience,
                        please open this page using
                        Safari on a compatible iPhone
                        or iPad.

                    </p>


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


<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {


        const arLink =
            document.getElementById(
                'arQuickLookLink'
            );


        const message =
            document.getElementById(
                'arCompatibilityMessage'
            );


        if (!arLink) {
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | AR FEATURE DETECTION
        |--------------------------------------------------------------------------
        */

        const testLink =
            document.createElement(
                'a'
            );


        let supportsAR = false;


        try {

            supportsAR =

                testLink.relList

                &&

                typeof testLink.relList.supports
                    === 'function'

                &&

                testLink.relList.supports(
                    'ar'
                );

        }

        catch (error) {

            supportsAR = false;

        }


        /*
        |--------------------------------------------------------------------------
        | IMPORTANT
        |--------------------------------------------------------------------------
        |
        | We do NOT disable the button.
        |
        | Older Safari may still handle Quick Look.
        |
        */

        if (
            !supportsAR
            &&
            message
        ) {

            message.style.display =
                'block';

        }


    }
);

</script>


</body>

</html>