<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>ShipEquipAR - Manage Quiz</title>

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


        body.admin-quiz-page {

            min-height: 100vh;

            background:
                linear-gradient(
                    135deg,
                    rgba(3,37,65,.88),
                    rgba(2,132,199,.70)
                ),
                url('https://images.unsplash.com/photo-1569263979104-865ab7cd8d13');

            background-size: cover;
            background-position: center;
            background-attachment: fixed;

            padding: 30px 20px 45px;

            color: #0f172a;
        }



        /* =====================================================
           WRAPPER
        ===================================================== */

        .admin-quiz-wrapper {

            width: 100%;

            max-width: 1200px;

            margin: 0 auto;
        }



        /* =====================================================
           TOP BAR
        ===================================================== */

        .admin-quiz-topbar {

            width: 100%;

            display: flex;

            align-items: center;

            justify-content: flex-start;

            gap: 15px;

            margin-bottom: 20px;
        }


        .admin-quiz-brand {

            color: white;

            font-size: 26px;

            font-weight: 900;
        }


        .admin-quiz-brand span {

            color: #38bdf8;
        }


        .admin-back-btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-height: 45px;

            padding: 10px 18px;

            border-radius: 12px;

            background: #0f172a;

            color: white;

            text-decoration: none;

            font-size: 14px;

            font-weight: 700;

            transition: .2s ease;
        }


        .admin-back-btn:hover {

            background: #0284c7;

            transform: translateY(-2px);
        }



        /* =====================================================
           HEADER
        ===================================================== */

        .admin-quiz-header {

            width: 100%;

            padding: 36px;

            border-radius: 25px;

            background:
                linear-gradient(
                    135deg,
                    #0284c7,
                    #0f172a
                );

            color: white;

            box-shadow:
                0 15px 35px rgba(0,0,0,.20);
        }


        .admin-quiz-header-label {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            margin-bottom: 12px;

            padding: 8px 13px;

            border-radius: 999px;

            background: rgba(255,255,255,.13);

            color: #e0f2fe;

            font-size: 13px;

            font-weight: 700;
        }


        .admin-quiz-header h1 {

            font-size:
                clamp(30px,4vw,44px);

            font-weight: 900;

            line-height: 1.2;
        }


        .admin-quiz-header p {

            max-width: 750px;

            margin-top: 12px;

            color: #dbeafe;

            font-size: 16px;

            line-height: 1.7;
        }



        /* =====================================================
           STATUS
        ===================================================== */

        .admin-quiz-status-grid {

            width: 100%;

            display: grid;

            grid-template-columns:
                repeat(3,minmax(0,1fr));

            gap: 16px;

            margin-top: 22px;
        }


        .admin-status-card {

            min-width: 0;

            padding: 18px;

            border-radius: 16px;

            background: rgba(255,255,255,.12);

            border:
                1px solid rgba(255,255,255,.12);
        }


        .admin-status-card strong {

            display: block;

            margin-bottom: 5px;

            color: white;

            font-size: 14px;
        }


        .admin-status-card span {

            color: #dbeafe;

            font-size: 13px;
        }



        /* =====================================================
           MAIN QUIZ CARD
        ===================================================== */

        .admin-quiz-card {

            width: 100%;

            margin-top: 24px;

            padding: 32px;

            border-radius: 25px;

            background: white;

            box-shadow:
                0 12px 32px rgba(0,0,0,.18);
        }



        /* =====================================================
           QUIZ DETAILS
        ===================================================== */

        .admin-quiz-card-top {

            display: flex;

            align-items: flex-start;

            justify-content: space-between;

            gap: 25px;
        }


        .admin-quiz-icon {

            width: 72px;

            height: 72px;

            flex-shrink: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 18px;

            background: #e0f2fe;

            font-size: 36px;
        }


        .admin-quiz-info {

            flex: 1;

            min-width: 0;
        }


        .admin-quiz-info h2 {

            color: #0284c7;

            font-size:
                clamp(23px,2.5vw,31px);

            font-weight: 900;

            line-height: 1.3;
        }


        .admin-quiz-info p {

            max-width: 760px;

            margin-top: 10px;

            color: #64748b;

            font-size: 15px;

            line-height: 1.7;
        }


        .admin-active-badge {

            flex-shrink: 0;

            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding: 8px 13px;

            border-radius: 999px;

            background: #dcfce7;

            color: #166534;

            font-size: 12px;

            font-weight: 800;
        }



        /* =====================================================
           QUIZ SETTINGS
        ===================================================== */

        .admin-settings {

            width: 100%;

            display: grid;

            grid-template-columns:
                repeat(3,minmax(0,1fr));

            gap: 14px;

            margin-top: 27px;
        }


        .admin-setting-item {

            padding: 17px;

            border-radius: 15px;

            background: #f8fafc;

            border: 1px solid #e2e8f0;
        }


        .admin-setting-label {

            display: block;

            margin-bottom: 5px;

            color: #64748b;

            font-size: 12px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: .4px;
        }


        .admin-setting-value {

            color: #0f172a;

            font-size: 15px;

            font-weight: 800;
        }



        /* =====================================================
           ACTION TITLE
        ===================================================== */

        .admin-action-heading {

            margin-top: 30px;

            padding-top: 25px;

            border-top: 1px solid #e2e8f0;
        }


        .admin-action-heading h3 {

            color: #0f172a;

            font-size: 20px;

            font-weight: 900;
        }


        .admin-action-heading p {

            margin-top: 5px;

            color: #64748b;

            font-size: 13px;
        }



        /* =====================================================
           ACTION CARDS
        ===================================================== */

        .admin-actions {

            width: 100%;

            display: grid;

            grid-template-columns:
                repeat(3,minmax(0,1fr));

            gap: 16px;

            margin-top: 18px;
        }


        .admin-action-card {

            min-width: 0;

            padding: 22px;

            border-radius: 18px;

            background: #f8fafc;

            border: 1px solid #e2e8f0;

            display: flex;

            flex-direction: column;

            transition: .2s ease;
        }


        .admin-action-card:hover {

            transform: translateY(-3px);

            box-shadow:
                0 8px 20px rgba(15,23,42,.10);
        }


        .admin-action-icon {

            font-size: 34px;
        }


        .admin-action-card h4 {

            margin-top: 13px;

            color: #0f172a;

            font-size: 18px;

            font-weight: 800;
        }


        .admin-action-card p {

            margin-top: 8px;

            margin-bottom: 20px;

            color: #64748b;

            font-size: 13px;

            line-height: 1.6;

            flex: 1;
        }



        /* =====================================================
           BUTTONS
        ===================================================== */

        .admin-action-btn {

            width: 100%;

            min-height: 47px;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 11px 15px;

            border-radius: 11px;

            color: white;

            text-decoration: none;

            text-align: center;

            font-size: 13px;

            font-weight: 800;

            transition: .2s ease;
        }


        .admin-action-btn:hover {

            transform: translateY(-2px);
        }


        .admin-btn-blue {

            background: #0284c7;
        }


        .admin-btn-blue:hover {

            background: #0369a1;
        }


        .admin-btn-teal {

            background: #0f766e;
        }


        .admin-btn-teal:hover {

            background: #0d9488;
        }


        .admin-btn-dark {

            background: #0f172a;
        }


        .admin-btn-dark:hover {

            background: #1e293b;
        }



        /* =====================================================
           IMPORTANT NOTE
        ===================================================== */

        .admin-note {

            margin-top: 22px;

            padding: 17px 19px;

            border-radius: 15px;

            background: #eff6ff;

            border-left: 4px solid #0284c7;

            color: #334155;

            font-size: 13px;

            line-height: 1.7;
        }




        /* =====================================================
           BOTTOM DASHBOARD BUTTON
        ===================================================== */

        .admin-quiz-bottom-back {

            width: 100%;

            display: flex;

            justify-content: flex-start;

            margin-top: 22px;
        }


        /* =====================================================
           TABLET
        ===================================================== */

        @media(max-width:900px) {

            .admin-actions {

                grid-template-columns: 1fr;
            }


            .admin-settings {

                grid-template-columns:
                    repeat(2,minmax(0,1fr));
            }

        }



        /* =====================================================
           MOBILE
        ===================================================== */

        @media(max-width:650px) {

            body.admin-quiz-page {

                padding: 0 0 25px;

                background-attachment: scroll;
            }


            .admin-quiz-topbar {

                position: sticky;

                top: 0;

                z-index: 1000;

                min-height: 67px;

                padding: 10px 14px;

                margin-bottom: 0;

                background: #0f172a;
            }


            .admin-quiz-brand {

                font-size: 21px;
            }


            .admin-back-btn {

                min-height: 44px;

                padding: 10px 16px;

                font-size: 13px;
            }


            .admin-quiz-bottom-back {

                padding: 0 12px;

                margin-top: 15px;
            }


            .admin-quiz-header {

                padding: 24px 17px;

                border-radius: 0;
            }


            .admin-quiz-header h1 {

                font-size: 29px;
            }


            .admin-quiz-header p {

                font-size: 14px;
            }


            .admin-quiz-status-grid {

                grid-template-columns: 1fr;

                gap: 9px;
            }


            .admin-quiz-card {

                margin-top: 12px;

                padding: 20px 15px;

                border-radius: 0;

                box-shadow: none;
            }


            .admin-quiz-card-top {

                flex-direction: column;

                gap: 15px;
            }


            .admin-active-badge {

                align-self: flex-start;
            }


            .admin-settings {

                grid-template-columns: 1fr;

                gap: 9px;
            }


            .admin-actions {

                grid-template-columns: 1fr;

                gap: 12px;
            }

        }

    </style>

</head>


<body class="admin-quiz-page">


<div class="admin-quiz-wrapper">


    {{-- =====================================================
         TOPBAR
    ====================================================== --}}

    <div class="admin-quiz-topbar">


        <div class="admin-quiz-brand">

            Ship<span>EquipAR</span>

        </div>


    </div>



    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <section class="admin-quiz-header">


        <div class="admin-quiz-header-label">

            📝 Quiz Administration

        </div>


        <h1>

            Manage Quiz

        </h1>


        <p>

            Manage the ShipEquipAR maritime assessment,
            questions, results and certificate configuration
            through ProProfs Quiz Maker.

        </p>



        <div class="admin-quiz-status-grid">


            <div class="admin-status-card">

                <strong>
                    🌐 Platform
                </strong>

                <span>
                    ProProfs Quiz Maker
                </span>

            </div>



            <div class="admin-status-card">

                <strong>
                    🎯 Passing Score
                </strong>

                <span>
                    70% or above
                </span>

            </div>



            <div class="admin-status-card">

                <strong>
                    🏆 Certificate
                </strong>

                <span>
                    Automatic upon successful completion
                </span>

            </div>


        </div>


    </section>



    {{-- =====================================================
         QUIZ CARD
    ====================================================== --}}

    <section class="admin-quiz-card">


        <div class="admin-quiz-card-top">


            <div class="admin-quiz-icon">

                🚢

            </div>



            <div class="admin-quiz-info">


                <h2>

                    ShipEquipAR Maritime Knowledge Quiz

                </h2>


                <p>

                    Main maritime assessment for ShipEquipAR.
                    Quiz questions and scoring are managed
                    externally through ProProfs and displayed
                    to users through the ShipEquipAR website.

                </p>


            </div>



            <div class="admin-active-badge">

                ● Active

            </div>


        </div>



        {{-- =================================================
             SETTINGS
        ================================================== --}}

        <div class="admin-settings">


            <div class="admin-setting-item">

                <span class="admin-setting-label">
                    Quiz Platform
                </span>

                <span class="admin-setting-value">
                    ProProfs
                </span>

            </div>



            <div class="admin-setting-item">

                <span class="admin-setting-label">
                    Passing Score
                </span>

                <span class="admin-setting-value">
                    70%
                </span>

            </div>



            <div class="admin-setting-item">

                <span class="admin-setting-label">
                    Certificate
                </span>

                <span class="admin-setting-value">
                    Enabled
                </span>

            </div>


        </div>



        {{-- =================================================
             MANAGEMENT ACTIONS
        ================================================== --}}

        <div class="admin-action-heading">


            <h3>

                Quiz Management

            </h3>


            <p>

                Select an option below to manage or preview
                the assessment.

            </p>


        </div>



        <div class="admin-actions">


            {{-- =============================================
                 MANAGE QUESTIONS
            ============================================== --}}

            <article class="admin-action-card">


                <div class="admin-action-icon">

                    ✏️

                </div>


                <h4>

                    Manage Questions

                </h4>


                <p>

                    Add new questions, edit answers,
                    change scoring and manage the quiz
                    directly in ProProfs Quiz Maker.

                </p>


                <a
                    href="https://www.proprofs.com/quiz-school/"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="admin-action-btn admin-btn-blue"
                >

                    Open ProProfs Dashboard ↗

                </a>


            </article>



            {{-- =============================================
                 PREVIEW QUIZ
            ============================================== --}}

            <article class="admin-action-card">


                <div class="admin-action-icon">

                    👁️

                </div>


                <h4>

                    Preview Quiz

                </h4>


                <p>

                    Open the published ShipEquipAR quiz
                    and check exactly how the assessment
                    appears to learners.

                </p>


                <a
                    href="https://www.proprofs.com/quiz-school/ugc/story.php?title=shipequipar-maritime-knowledge-quiz-272&id=4794765&ew=430"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="admin-action-btn admin-btn-teal"
                >

                    Preview Assessment ↗

                </a>


            </article>



            {{-- =============================================
                 CERTIFICATE
            ============================================== --}}

            <article class="admin-action-card">


                <div class="admin-action-icon">

                    🏆

                </div>


                <h4>

                    Certificate Settings

                </h4>


                <p>

                    Configure the passing requirement,
                    certificate design, learner name,
                    completion date and certificate settings.

                </p>


                <a
                    href="https://www.proprofs.com/quiz-school/"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="admin-action-btn admin-btn-dark"
                >

                    Manage Certificate ↗

                </a>


            </article>


        </div>



        {{-- =================================================
             NOTE
        ================================================== --}}

        <div class="admin-note">

            <strong>ℹ️ Important:</strong>

            Questions no longer need to be created or deleted
            from the Laravel database. Any question changes made
            in ProProfs will automatically appear in the
            ShipEquipAR embedded quiz.

        </div>


    </section>


    <div class="admin-quiz-bottom-back">

        <a
            href="{{ route('admin.dashboard') }}"
            class="admin-back-btn"
        >
            ← Admin Dashboard
        </a>

    </div>


</div>


</body>

</html>