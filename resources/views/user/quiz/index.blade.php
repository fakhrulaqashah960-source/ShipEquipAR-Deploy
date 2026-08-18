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
            overflow-x: hidden;
        }


        body.quiz-page {

            min-height: 100vh;

            background:
                linear-gradient(
                    rgba(3,37,65,.88),
                    rgba(2,132,199,.68)
                ),
                url('https://images.unsplash.com/photo-1569263979104-865ab7cd8d13');

            background-size: cover;
            background-position: center;
            background-attachment: fixed;

            padding: 30px 18px 45px;
        }



        /* =====================================================
           MAIN WRAPPER
        ===================================================== */

        .quiz-wrapper {

            width: 100%;

            max-width: 1200px;

            margin: 0 auto;
        }



        /* =====================================================
           TOP NAV
        ===================================================== */

        .quiz-topbar {

            width: 100%;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            margin-bottom: 20px;
        }


        .quiz-brand {

            color: white;

            font-size: 25px;

            font-weight: 900;
        }


        .quiz-brand span {
            color: #38bdf8;
        }


        .quiz-back-btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-height: 44px;

            padding: 10px 18px;

            border-radius: 12px;

            background: #0f172a;

            color: white;

            text-decoration: none;

            font-size: 14px;

            font-weight: 700;

            transition: .2s ease;
        }


        .quiz-back-btn:hover {

            background: #0284c7;

            transform: translateY(-2px);
        }



        /* =====================================================
           HEADER
        ===================================================== */

        .quiz-header {

            width: 100%;

            padding: 35px;

            border-radius: 25px;

            background:
                linear-gradient(
                    135deg,
                    rgba(2,132,199,.97),
                    rgba(15,23,42,.97)
                );

            color: white;

            box-shadow:
                0 15px 35px rgba(0,0,0,.22);
        }


        .quiz-header-label {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 12px;

            padding: 8px 13px;

            border-radius: 999px;

            background: rgba(255,255,255,.12);

            color: #e0f2fe;

            font-size: 13px;

            font-weight: 700;
        }


        .quiz-header h1 {

            font-size: clamp(30px, 4vw, 46px);

            font-weight: 900;

            line-height: 1.2;
        }


        .quiz-header p {

            max-width: 760px;

            margin-top: 13px;

            color: #dbeafe;

            font-size: 16px;

            line-height: 1.7;
        }



        /* =====================================================
           QUIZ INFORMATION
        ===================================================== */

        .quiz-info-grid {

            width: 100%;

            margin-top: 20px;

            display: grid;

            grid-template-columns:
                repeat(3, minmax(0,1fr));

            gap: 14px;
        }


        .quiz-info-card {

            min-width: 0;

            padding: 17px;

            border-radius: 16px;

            background: rgba(255,255,255,.12);

            border: 1px solid rgba(255,255,255,.10);
        }


        .quiz-info-card strong {

            display: block;

            margin-bottom: 5px;

            color: white;

            font-size: 14px;
        }


        .quiz-info-card span {

            color: #dbeafe;

            font-size: 13px;

            line-height: 1.5;
        }



        /* =====================================================
           EMBED CONTAINER
        ===================================================== */

        .quiz-embed-card {

            width: 100%;

            margin-top: 24px;

            padding: 18px;

            border-radius: 25px;

            background: white;

            box-shadow:
                0 12px 32px rgba(0,0,0,.22);

            overflow: hidden;
        }


        .quiz-embed-heading {

            padding: 5px 5px 17px;

            border-bottom: 1px solid #e2e8f0;

            margin-bottom: 15px;
        }


        .quiz-embed-heading h2 {

            color: #0f172a;

            font-size: 23px;

            font-weight: 800;
        }


        .quiz-embed-heading p {

            margin-top: 5px;

            color: #64748b;

            font-size: 14px;

            line-height: 1.5;
        }



        /* =====================================================
           PROPROFS IFRAME
        ===================================================== */

        .proprofs-frame {

            display: block;

            width: 100% !important;

            min-width: 100%;

            height: 1000px;

            border: 0;

            margin: 0;

            padding: 0;

            background: white;
        }



        /* =====================================================
           NOTICE
        ===================================================== */

        .quiz-notice {

            margin-top: 18px;

            padding: 15px 18px;

            border-radius: 14px;

            background: #ecfeff;

            color: #155e75;

            font-size: 13px;

            line-height: 1.6;
        }



        /* =====================================================
           MOBILE
        ===================================================== */

        @media(max-width:768px) {

            body.quiz-page {

                padding: 0 0 25px;

                background-attachment: scroll;
            }


            .quiz-wrapper {
                max-width: none;
            }


            .quiz-topbar {

                position: sticky;

                top: 0;

                z-index: 1000;

                min-height: 68px;

                margin-bottom: 0;

                padding: 10px 14px;

                background: #0f172a;
            }


            .quiz-brand {

                font-size: 21px;
            }


            .quiz-back-btn {

                min-height: 42px;

                padding: 9px 13px;

                font-size: 12px;
            }


            .quiz-header {

                border-radius: 0;

                padding: 25px 18px;
            }


            .quiz-header h1 {

                font-size: 29px;
            }


            .quiz-header p {

                font-size: 14px;
            }


            .quiz-info-grid {

                grid-template-columns: 1fr;

                gap: 9px;
            }


            .quiz-info-card {

                padding: 14px;
            }


            .quiz-embed-card {

                margin-top: 12px;

                padding: 7px;

                border-radius: 0;

                box-shadow: none;
            }


            .quiz-embed-heading {

                padding: 12px 10px 15px;

                margin-bottom: 8px;
            }


            .quiz-embed-heading h2 {

                font-size: 20px;
            }


            .proprofs-frame {

                width: 100% !important;

                min-width: 100% !important;

                height: 1100px;
            }


            .quiz-notice {

                margin: 12px 8px 0;
            }

        }



        /* =====================================================
           SMALL PHONE
        ===================================================== */

        @media(max-width:430px) {

            .quiz-brand {
                font-size: 19px;
            }


            .quiz-back-btn {

                padding: 9px 11px;

                font-size: 11px;
            }


            .quiz-header {

                padding: 22px 15px;
            }


            .quiz-header h1 {

                font-size: 26px;
            }


            .quiz-embed-card {

                padding-left: 0;

                padding-right: 0;
            }


            .quiz-embed-heading {

                padding-left: 14px;

                padding-right: 14px;
            }


            .proprofs-frame {

                height: 1200px;
            }

        }

    </style>

</head>


<body class="quiz-page">


<div class="quiz-wrapper">


    {{-- =====================================================
         TOP BAR
    ====================================================== --}}

    <div class="quiz-topbar">


        <div class="quiz-brand">

            Ship<span>EquipAR</span>

        </div>


        <a
            href="{{ route('dashboard') }}"
            class="quiz-back-btn"
        >

            ← Dashboard

        </a>


    </div>



    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <section class="quiz-header">


        <div class="quiz-header-label">

            📝 Maritime Assessment

        </div>


        <h1>

            ShipEquipAR Maritime Knowledge Quiz

        </h1>


        <p>

            Test your maritime knowledge by completing
            the assessment below. Answer all questions
            carefully and submit your answers to view
            your final result.

        </p>



        <div class="quiz-info-grid">


            <div class="quiz-info-card">

                <strong>
                    🎯 Passing Score
                </strong>

                <span>
                    70% or above
                </span>

            </div>



            <div class="quiz-info-card">

                <strong>
                    📝 Assessment
                </strong>

                <span>
                    Multiple-choice questions
                </span>

            </div>



            <div class="quiz-info-card">

                <strong>
                    🏆 Certificate
                </strong>

                <span>
                    Available after successful completion
                </span>

            </div>


        </div>


    </section>



    {{-- =====================================================
         PROPROFS QUIZ
    ====================================================== --}}

    <section class="quiz-embed-card">


        <div class="quiz-embed-heading">


            <h2>

                Start Assessment

            </h2>


            <p>

                Complete all questions below.
                Your score will be calculated automatically
                after submission.

            </p>


        </div>



        <iframe
            name="proprofs"
            id="proprofs"
            class="proprofs-frame"
            src="https://www.proprofs.com/quiz-school/ugc/story.php?title=shipequipar-maritime-knowledge-quiz-272&id=4794765&ew=430"
            frameborder="0"
            marginwidth="0"
            marginheight="0"
            scrolling="yes"
            allow="camera *; microphone *; fullscreen;"
            allowfullscreen
            title="ShipEquipAR Maritime Knowledge Quiz">
        </iframe>


        <div class="quiz-notice">

            🏆 Users who achieve the required passing score
            can receive the completion certificate configured
            for this assessment.

        </div>


    </section>


</div>


</body>

</html>