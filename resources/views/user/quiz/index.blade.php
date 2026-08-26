<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>ShipEquipAR Maritime Quiz</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
        }

        body.shipquiz-page {
            min-height: 100vh;

            background:
                linear-gradient(
                    rgba(3,37,65,.86),
                    rgba(2,132,199,.65)
                ),
                url('https://images.unsplash.com/photo-1569263979104-865ab7cd8d13');

            background-size: cover;
            background-position: center;
            background-attachment: fixed;

            padding: 28px 15px 40px;

            overflow-x: hidden;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        body.shipquiz-page .shipquiz-wrapper {
            width: 100% !important;
            max-width: 760px !important;
            margin: 0 auto !important;
        }


        /* =====================================================
           BRAND
        ===================================================== */

        body.shipquiz-page .shipquiz-brand {
            text-align: center;
            margin-bottom: 15px;

            color: white;

            font-size: 23px;
            font-weight: 900;
        }

        body.shipquiz-page .shipquiz-brand span {
            color: #38bdf8;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        body.shipquiz-page .shipquiz-header {
            width: 100%;

            padding: 25px 28px;

            border-radius: 20px;

            background:
                linear-gradient(
                    135deg,
                    #0284c7,
                    #0f172a
                );

            color: white;

            box-shadow:
                0 12px 28px rgba(0,0,0,.20);
        }

        body.shipquiz-page .shipquiz-label {
            display: inline-block;

            padding: 6px 11px;

            margin-bottom: 10px;

            border-radius: 999px;

            background: rgba(255,255,255,.13);

            color: #e0f2fe;

            font-size: 11px;
            font-weight: 700;
        }

        body.shipquiz-page .shipquiz-header h1 {
            font-size: 29px;
            font-weight: 900;
            line-height: 1.25;
        }

        body.shipquiz-page .shipquiz-header > p {
            margin-top: 9px;

            color: #dbeafe;

            font-size: 13px;
            line-height: 1.65;
        }


        /* =====================================================
           INFO
        ===================================================== */

        body.shipquiz-page .shipquiz-info {
            margin-top: 17px;

            display: grid;

            grid-template-columns:
                repeat(3, minmax(0,1fr));

            gap: 10px;
        }

        body.shipquiz-page .shipquiz-info-card {
            padding: 12px;

            border-radius: 12px;

            background:
                rgba(255,255,255,.11);

            border:
                1px solid rgba(255,255,255,.10);
        }

        body.shipquiz-page .shipquiz-info-card strong {
            display: block;

            margin-bottom: 3px;

            color: white;

            font-size: 11px;
        }

        body.shipquiz-page .shipquiz-info-card span {
            color: #dbeafe;

            font-size: 10px;
            line-height: 1.4;
        }


        /* =====================================================
           QUIZ CARD
        ===================================================== */

        body.shipquiz-page .shipquiz-card {
            width: 100%;

            margin-top: 15px;

            padding: 18px;

            border-radius: 20px;

            background: white;

            box-shadow:
                0 12px 28px rgba(0,0,0,.20);
        }

        body.shipquiz-page .shipquiz-card-title {
            padding-bottom: 13px;
            margin-bottom: 14px;

            border-bottom:
                1px solid #e2e8f0;
        }

        body.shipquiz-page .shipquiz-card-title h2 {
            color: #0f172a;

            font-size: 19px;
            font-weight: 800;
        }

        body.shipquiz-page .shipquiz-card-title p {
            margin-top: 4px;

            color: #64748b;

            font-size: 11px;
            line-height: 1.5;
        }


        /* =====================================================
           PROPROFS - CENTER
        ===================================================== */

        body.shipquiz-page .shipquiz-frame-area {
            width: 100%;

            display: flex;

            justify-content: center;

            align-items: flex-start;

            overflow: hidden;
        }

        body.shipquiz-page #proprofs {
            display: block;

            width: 430px !important;
            max-width: 100% !important;

            height: 900px;

            margin: 0 auto !important;

            border: none;

            background: white;
        }


        /* =====================================================
           CERTIFICATE NOTICE
        ===================================================== */

        body.shipquiz-page .shipquiz-notice {
            margin-top: 14px;

            padding: 12px 14px;

            border-radius: 11px;

            background: #ecfeff;

            color: #155e75;

            font-size: 11px;
            line-height: 1.55;
        }


        /* =====================================================
           BACK BUTTON - BOTTOM LEFT
        ===================================================== */

        body.shipquiz-page .shipquiz-back-area {
            width: 100%;

            margin-top: 17px;

            display: flex;

            justify-content: flex-start;
        }

        body.shipquiz-page .shipquiz-back {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-height: 43px;

            padding: 10px 18px;

            border-radius: 11px;

            background: #0f172a;

            color: white;

            text-decoration: none;

            font-size: 13px;
            font-weight: 700;

            transition: .2s;
        }

        body.shipquiz-page .shipquiz-back:hover {
            background: #0284c7;

            transform: translateY(-2px);
        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media(max-width:600px) {

            body.shipquiz-page {
                padding: 12px 8px 25px;
                background-attachment: scroll;
            }

            body.shipquiz-page .shipquiz-wrapper {
                max-width: 100% !important;
            }

            body.shipquiz-page .shipquiz-brand {
                font-size: 21px;
                margin-bottom: 10px;
            }

            body.shipquiz-page .shipquiz-header {
                padding: 21px 17px;
                border-radius: 17px;
            }

            body.shipquiz-page .shipquiz-header h1 {
                font-size: 25px;
            }

            body.shipquiz-page .shipquiz-info {
                grid-template-columns: 1fr;
                gap: 7px;
            }

            body.shipquiz-page .shipquiz-card {
                padding: 10px 6px;
                border-radius: 16px;
            }

            body.shipquiz-page .shipquiz-card-title {
                padding: 5px 8px 12px;
            }

            body.shipquiz-page #proprofs {
                width: 100% !important;
                max-width: 430px !important;
                height: 1000px;
            }

            body.shipquiz-page .shipquiz-notice {
                margin-left: 5px;
                margin-right: 5px;
            }

        }

    </style>

</head>


<body class="shipquiz-page">


<div class="shipquiz-wrapper">


    <div class="shipquiz-brand">

        Ship<span>EquipAR</span>

    </div>



    <section class="shipquiz-header">


        <div class="shipquiz-label">

            📝 Maritime Assessment

        </div>


        <h1>

            ShipEquipAR Maritime Knowledge Quiz

        </h1>


        <p>

            Test your maritime knowledge by completing
            the assessment below. Answer all questions
            and submit your responses to view your result.

        </p>


        <div class="shipquiz-info">


            <div class="shipquiz-info-card">

                <strong>
                    🎯 Passing Score
                </strong>

                <span>
                    70% or above
                </span>

            </div>


            <div class="shipquiz-info-card">

                <strong>
                    📝 Assessment
                </strong>

                <span>
                    Multiple-choice questions
                </span>

            </div>


            <div class="shipquiz-info-card">

                <strong>
                    🏆 Certificate
                </strong>

                <span>
                    Available after passing
                </span>

            </div>


        </div>


    </section>



    <section class="shipquiz-card">


        <div class="shipquiz-card-title">


            <h2>

                Start Assessment

            </h2>


            <p>

                Complete all questions below.
                Your result will be calculated automatically.

            </p>


        </div>



        @php
            /*
            |--------------------------------------------------------------------------
            | PROPROFS SSO USER IDENTIFICATION
            |--------------------------------------------------------------------------
            |
            | ProProfs supports user_name, user_email and user_id in the
            | embedded quiz URL. Because this page is protected by the
            | authenticated user middleware, these values come directly
            | from the currently logged-in ShipEquipAR account.
            |
            */

            $proProfsUrl =
                'https://www.proprofs.com/quiz-school/ugc/story.php?' .
                http_build_query(
                    [
                        'title' =>
                            'shipequipar-maritime-knowledge-quiz-272',

                        'id' =>
                            '4794765',

                        'ew' =>
                            '430',

                        'user_name' =>
                            auth()->user()->name,

                        'user_email' =>
                            auth()->user()->email,

                        'user_id' =>
                            (string) auth()->id(),
                    ],
                    '',
                    '&',
                    PHP_QUERY_RFC3986
                );
        @endphp


        <div class="shipquiz-frame-area">


            <iframe
                name="proprofs"
                id="proprofs"
                src="{{ $proProfsUrl }}"
                frameborder="0"
                marginwidth="0"
                marginheight="0"
                scrolling="yes"
                allow="camera *; microphone *; fullscreen;"
                allowfullscreen
                title="ShipEquipAR Maritime Knowledge Quiz">
            </iframe>


        </div>



        <div class="shipquiz-notice">

            🏆 Complete the quiz and achieve the required
            passing score to receive your completion certificate.

        </div>


    </section>



    {{-- BACK BUTTON BAWAH KIRI --}}

    <div class="shipquiz-back-area">


        <a
            href="{{ route('dashboard') }}"
            class="shipquiz-back"
        >

            ← Back to Dashboard

        </a>


    </div>


</div>


</body>

</html>