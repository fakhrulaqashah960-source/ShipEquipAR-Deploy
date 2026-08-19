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
           MAIN CARD
        ========================= */

        .card {
            background: white;
            border-radius: 25px;
            padding: 35px;

            box-shadow:
                0 15px 35px rgba(0, 0, 0, .15);
        }


        .title {
            text-align: center;
            font-size: 32px;
            color: #075985;
            margin-bottom: 20px;
        }


        /* =========================
           EQUIPMENT IMAGE
        ========================= */

        .equipment-image {
            display: block;
            width: 100%;
            height: 300px;
            object-fit: contain;
            margin-bottom: 25px;
        }


        /* =========================
           CONTENT SECTION
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
           AR BUTTON
        ========================= */

        .ar-btn {
            position: relative;

            display: flex;
            align-items: center;
            justify-content: center;

            width: 220px;
            height: 54px;

            margin: 35px auto 10px;

            background: #0284c7;
            color: white;

            text-decoration: none;

            border-radius: 30px;

            font-weight: bold;

            overflow: hidden;

            transition: .3s;
        }


        .ar-btn:hover {
            background: #0369a1;
            transform: translateY(-2px);
        }


        /*
         * IMPORTANT FOR iOS AR QUICK LOOK
         *
         * Safari requires the rel="ar" link to contain
         * an image/picture child.
         *
         * Image stays as the only actual child.
         * Text is displayed using ::after.
         */

        .ar-quicklook img {
            position: absolute;

            width: 100%;
            height: 100%;

            inset: 0;

            object-fit: cover;

            opacity: 0.01;
        }


        .ar-quicklook::after {
            content: "📱 Open AR Model";

            position: relative;

            z-index: 2;

            color: white;

            font-weight: 700;

            pointer-events: none;
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
             iOS AR QUICK LOOK
        ========================== --}}

        @if($equipment->model_file)

            @php

                $arUrl =
                    \Illuminate\Support\Facades\URL::temporarySignedRoute(
                        'equipment.ar',
                        now()->addMinutes(30),
                        [
                            'id' => $equipment->id,
                        ]
                    );

            @endphp


            <a
                href="{{ $arUrl }}"
                rel="ar"
                class="ar-btn ar-quicklook"
                aria-label="Open AR Model"
            >

                <img
                    src="{{ $equipmentImage ?? asset('favicon.ico') }}"
                    alt="Open {{ $equipment->name }} in AR"
                >

            </a>

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