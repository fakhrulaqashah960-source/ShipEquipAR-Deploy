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

        :root{
            --navy:#0f172a;
            --blue:#0284c7;
            --blue-dark:#0369a1;
            --green:#16a34a;
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

        /* =====================================================
           HERO
        ===================================================== */

        .header{
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

        .header h1{
            color:white;

            font-size:clamp(28px,4vw,40px);
            line-height:1.2;
            font-weight:900;
        }

        .header p{
            max-width:720px;

            margin-top:10px;

            color:#e0f2fe;

            font-size:14px;
            line-height:1.7;
        }

        /* =====================================================
           MAIN CARD
        ===================================================== */

        .card{
            width:100%;

            padding:28px;

            background:rgba(255,255,255,.98);

            border:1px solid rgba(226,232,240,.95);
            border-radius:24px;

            box-shadow:
                0 16px 38px rgba(0,0,0,.18);
        }

        .title{
            margin-bottom:20px;

            color:#0f172a;

            text-align:center;

            font-size:clamp(27px,3.5vw,36px);
            line-height:1.3;
            font-weight:900;

            overflow-wrap:anywhere;
        }

        /* =====================================================
           IMAGE
        ===================================================== */

        .equipment-image{
            display:block;

            width:100%;
            max-width:520px;
            height:285px;

            margin:0 auto 25px;
            padding:10px;

            object-fit:contain;

            background:#f8fafc;

            border:1px solid #e2e8f0;
            border-radius:18px;
        }

        /* =====================================================
           CONTENT
        ===================================================== */

        .section{
            margin-top:18px;
            padding:20px;

            background:#f8fafc;

            border:1px solid #e2e8f0;
            border-radius:16px;
        }

        .section h2{
            margin-bottom:9px;

            color:#0284c7;

            font-size:19px;
            line-height:1.4;
            font-weight:900;

            overflow-wrap:anywhere;
        }

        .section p{
            color:#475569;

            font-size:14.5px;
            line-height:1.82;

            overflow-wrap:anywhere;
        }

        /* =====================================================
           AR QUICK LOOK
        ===================================================== */

        .ar-container{
            width:100%;

            display:flex;
            justify-content:flex-start;

            margin-top:22px;
            padding-top:20px;

            border-top:1px solid #e2e8f0;
        }

        /*
        |--------------------------------------------------------------------------
        | Keep a real child <img> inside <a rel="ar"> for Apple Quick Look.
        |--------------------------------------------------------------------------
        */

        .ar-btn{
            position:relative;

            display:block;

            width:210px;
            height:46px;

            margin:0;

            overflow:hidden;

            background:#0284c7;

            border-radius:11px;

            text-decoration:none;

            cursor:pointer;

            box-shadow:
                0 7px 18px rgba(2,132,199,.22);

            transition:.2s ease;
        }

        .ar-btn:hover{
            background:#0369a1;

            transform:translateY(-2px);
        }

        .ar-btn:active{
            transform:scale(.98);
        }

        .ar-btn img{
            position:absolute;

            inset:0;

            width:100%;
            height:100%;

            object-fit:cover;

            opacity:.001;

            pointer-events:none;
        }

        .ar-btn::after{
            content:"📱 Open AR Model";

            position:absolute;

            inset:0;

            z-index:2;

            display:flex;
            align-items:center;
            justify-content:center;

            color:white;

            font-size:13px;
            font-weight:800;

            pointer-events:none;
        }

        /* =====================================================
           BACK
        ===================================================== */

        .back-btn{
            display:inline-flex;

            align-items:center;
            justify-content:center;

            min-height:45px;

            margin-top:12px;

            padding:10px 18px;

            background:#0f172a;

            color:white;

            border-radius:11px;

            text-decoration:none;

            font-size:13px;
            font-weight:800;

            transition:.2s ease;
        }

        .back-btn:hover{
            background:#0284c7;

            transform:translateY(-2px);
        }

        /* =====================================================
           MOBILE
        ===================================================== */

        @media(max-width:600px){

            body{
                padding:0;
                background-attachment:scroll;
            }

            .container{
                max-width:none;
            }

            .header{
                margin-bottom:10px;

                padding:23px 17px;

                border-radius:0 0 22px 22px;
            }

            .header h1{
                font-size:27px;
            }

            .card{
                width:calc(100% - 16px);

                margin:0 8px 12px;
                padding:17px;

                border-radius:18px;
            }

            .title{
                font-size:25px;
            }

            .equipment-image{
                height:210px;

                margin-bottom:17px;
            }

            .section{
                padding:16px;
            }

            .section h2{
                font-size:18px;
            }

            .section p{
                font-size:14px;
                line-height:1.76;
            }

            .ar-container{
                display:block;
            }

            .ar-btn,
            .back-btn{
                width:100%;
            }

            .back-btn{
                margin-top:10px;
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
                📌 About {{ $equipment->name }}
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