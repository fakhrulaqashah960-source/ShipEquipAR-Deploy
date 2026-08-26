<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Profile - ShipEquipAR</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])


<style>

:root{
    --navy:#0f172a;
    --navy-soft:#1e293b;
    --blue:#0284c7;
    --blue-dark:#0369a1;
    --cyan:#38bdf8;
    --text:#0f172a;
    --muted:#64748b;
    --line:#e2e8f0;
    --white:#ffffff;
    --red:#dc2626;
}


*{
    box-sizing:border-box;
}


html,
body{
    width:100%;
    min-height:100%;
}


body{
    margin:0;

    min-height:100vh;

    color:var(--text);

    font-family:'Segoe UI',sans-serif;

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


/* =========================================================
   PAGE
========================================================= */

.profile-page{
    width:100%;

    min-height:100vh;

    padding:34px 18px;
}


.profile-shell{
    width:100%;

    max-width:1180px;

    margin:0 auto;
}


/* =========================================================
   HERO
========================================================= */

.profile-hero{
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
        0 18px 40px rgba(0,0,0,.22);
}


.profile-hero-copy{
    min-width:0;
}


.profile-eyebrow{
    display:inline-flex;

    align-items:center;

    gap:7px;

    margin-bottom:10px;

    padding:7px 12px;

    border-radius:999px;

    background:rgba(255,255,255,.12);

    color:#e0f2fe;

    font-size:12px;

    font-weight:800;
}


.profile-hero h1{
    margin:0;

    color:white;

    font-size:clamp(30px,4vw,42px);

    line-height:1.2;

    font-weight:900;
}


.profile-hero p{
    max-width:720px;

    margin:9px 0 0;

    color:#dbeafe;

    font-size:14px;

    line-height:1.7;
}


.profile-hero-icon{
    width:86px;

    height:86px;

    flex:0 0 auto;

    display:flex;

    align-items:center;

    justify-content:center;

    border-radius:22px;

    background:rgba(255,255,255,.12);

    font-size:41px;
}


/* =========================================================
   MAIN GRID
========================================================= */

.profile-grid{
    display:grid;

    grid-template-columns:300px minmax(0,1fr);

    gap:20px;

    align-items:start;
}


/* =========================================================
   ACCOUNT SUMMARY
========================================================= */

.profile-summary{
    position:sticky;

    top:20px;

    padding:24px;

    border-radius:22px;

    background:rgba(255,255,255,.98);

    box-shadow:
        0 16px 34px rgba(0,0,0,.17);
}


.profile-avatar{
    width:82px;

    height:82px;

    display:flex;

    align-items:center;

    justify-content:center;

    margin:0 auto 15px;

    border-radius:50%;

    background:
        linear-gradient(
            135deg,
            #0284c7,
            #0f172a
        );

    color:white;

    font-size:36px;

    box-shadow:
        0 10px 22px rgba(2,132,199,.22);
}


.profile-summary h2{
    margin:0;

    color:#0f172a;

    text-align:center;

    font-size:21px;

    font-weight:900;

    overflow-wrap:anywhere;
}


.profile-summary-email{
    margin-top:6px;

    color:#64748b;

    text-align:center;

    font-size:12.5px;

    line-height:1.5;

    overflow-wrap:anywhere;

    word-break:break-word;
}


.profile-summary-divider{
    height:1px;

    margin:20px 0;

    background:#e2e8f0;
}


.profile-info-row{
    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:12px;

    padding:10px 0;

    color:#475569;

    font-size:12.5px;
}


.profile-info-row strong{
    color:#0f172a;

    font-weight:800;
}


.profile-status{
    display:inline-flex;

    align-items:center;

    gap:6px;

    padding:5px 9px;

    border-radius:999px;

    background:#dcfce7;

    color:#166534;

    font-size:10px;

    font-weight:900;
}


.dashboard-btn{
    width:100%;

    min-height:45px;

    display:inline-flex;

    align-items:center;

    justify-content:center;

    margin-top:18px;

    padding:10px 15px;

    border-radius:11px;

    background:#0f172a;

    color:white;

    text-decoration:none;

    font-size:13px;

    font-weight:800;

    transition:.2s ease;
}


.dashboard-btn:hover{
    background:#0284c7;

    transform:translateY(-2px);
}


/* =========================================================
   FORM STACK
========================================================= */

.profile-forms{
    min-width:0;

    display:grid;

    gap:18px;
}


.profile-form-card{
    padding:26px;

    border-radius:22px;

    background:rgba(255,255,255,.98);

    box-shadow:
        0 14px 32px rgba(0,0,0,.15);
}


.profile-form-card.danger{
    border:1px solid #fecaca;

    background:
        linear-gradient(
            180deg,
            rgba(255,255,255,.99),
            rgba(254,242,242,.99)
        );
}


/* =========================================================
   OVERRIDES FOR DEFAULT BREEZE PROFILE PARTIALS
========================================================= */

.profile-form-card section{
    max-width:none !important;
}


.profile-form-card header{
    margin-bottom:20px;
}


.profile-form-card h2{
    margin:0 !important;

    color:#0f172a !important;

    font-family:'Segoe UI',sans-serif !important;

    font-size:21px !important;

    line-height:1.35 !important;

    font-weight:900 !important;
}


.profile-form-card header p{
    margin-top:6px !important;

    color:#64748b !important;

    font-family:'Segoe UI',sans-serif !important;

    font-size:13px !important;

    line-height:1.65 !important;
}


.profile-form-card form{
    width:100%;
}


.profile-form-card label{
    color:#334155 !important;

    font-family:'Segoe UI',sans-serif !important;

    font-size:13px !important;

    font-weight:800 !important;
}


.profile-form-card input[type="text"],
.profile-form-card input[type="email"],
.profile-form-card input[type="password"]{
    width:100% !important;

    min-height:48px !important;

    margin-top:7px !important;

    padding:11px 13px !important;

    border:1px solid #cbd5e1 !important;

    border-radius:11px !important;

    background:white !important;

    color:#0f172a !important;

    font-family:'Segoe UI',sans-serif !important;

    font-size:14px !important;

    box-shadow:none !important;

    outline:none !important;

    transition:.2s ease !important;
}


.profile-form-card input:focus{
    border-color:#0284c7 !important;

    box-shadow:
        0 0 0 3px rgba(2,132,199,.12) !important;

    --tw-ring-color:transparent !important;
}


.profile-form-card input[disabled]{
    background:#f8fafc !important;

    color:#475569 !important;
}


.profile-form-card form > div{
    max-width:none !important;
}


.profile-form-card form > div + div{
    margin-top:17px !important;
}


.profile-form-card p.text-sm,
.profile-form-card p.mt-2{
    font-family:'Segoe UI',sans-serif !important;
}


.profile-form-card button{
    min-height:43px;

    display:inline-flex;

    align-items:center;

    justify-content:center;

    border:none;

    border-radius:10px;

    font-family:'Segoe UI',sans-serif;

    font-size:12px;

    font-weight:900;

    cursor:pointer;

    transition:.2s ease;
}


/* Primary Breeze button */
.profile-form-card button.bg-gray-800,
.profile-form-card button[class*="bg-gray-800"],
.profile-form-card button[class*="bg-slate"],
.profile-form-card button[type="submit"]:not([class*="red"]):not([class*="danger"]){
    padding:10px 18px !important;

    background:#0284c7 !important;

    color:white !important;
}


.profile-form-card button.bg-gray-800:hover,
.profile-form-card button[class*="bg-gray-800"]:hover,
.profile-form-card button[type="submit"]:not([class*="red"]):not([class*="danger"]):hover{
    background:#0369a1 !important;

    transform:translateY(-1px);
}


/* Delete account button */
.profile-form-card.danger button{
    padding:10px 18px !important;
}


.profile-form-card.danger button[class*="red"],
.profile-form-card.danger button[class*="danger"]{
    background:#dc2626 !important;

    color:white !important;
}


.profile-form-card.danger button[class*="red"]:hover,
.profile-form-card.danger button[class*="danger"]:hover{
    background:#b91c1c !important;
}


/* Save confirmation text */
.profile-form-card .text-gray-600,
.profile-form-card .text-gray-800,
.profile-form-card .dark\:text-gray-400{
    color:#64748b !important;
}


/* Validation text */
.profile-form-card .text-red-600,
.profile-form-card .text-red-500{
    color:#dc2626 !important;

    font-size:12px !important;
}


/* =========================================================
   TABLET
========================================================= */

@media(max-width:900px){

    .profile-grid{
        grid-template-columns:250px minmax(0,1fr);
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media(max-width:700px){

    body{
        background-attachment:scroll;
    }


    .profile-page{
        padding:0;
    }


    .profile-shell{
        max-width:none;
    }


    .profile-hero{
        margin-bottom:10px;

        padding:23px 17px;

        border-radius:0 0 22px 22px;
    }


    .profile-hero-icon{
        display:none;
    }


    .profile-hero h1{
        font-size:28px;
    }


    .profile-grid{
        display:block;
    }


    .profile-summary{
        position:static;

        width:calc(100% - 16px);

        margin:0 8px 10px;

        padding:20px;

        border-radius:18px;
    }


    .profile-avatar{
        width:70px;

        height:70px;

        font-size:31px;
    }


    .profile-forms{
        width:calc(100% - 16px);

        margin:0 8px 12px;

        gap:10px;
    }


    .profile-form-card{
        padding:18px;

        border-radius:18px;
    }


    .profile-form-card h2{
        font-size:19px !important;
    }


    .profile-form-card button{
        width:100%;
    }

}

</style>

</head>


<body>


<div class="profile-page">


    <div class="profile-shell">


        {{-- =====================================================
             HERO
        ====================================================== --}}

        <section class="profile-hero">


            <div class="profile-hero-copy">

                <div class="profile-eyebrow">
                    👤 Account Settings
                </div>

                <h1>
                    My Profile
                </h1>

                <p>
                    Manage your ShipEquipAR account information,
                    password and account settings.
                </p>

            </div>


            <div class="profile-hero-icon">
                👤
            </div>


        </section>



        {{-- =====================================================
             PROFILE GRID
        ====================================================== --}}

        <div class="profile-grid">


            {{-- =================================================
                 ACCOUNT SUMMARY
            ================================================== --}}

            <aside class="profile-summary">


                <div class="profile-avatar">
                    👤
                </div>


                <h2>
                    {{ auth()->user()->name }}
                </h2>


                <div class="profile-summary-email">
                    {{ auth()->user()->email }}
                </div>


                <div class="profile-summary-divider"></div>


                <div class="profile-info-row">

                    <span>
                        Account
                    </span>

                    <span class="profile-status">
                        ● Active
                    </span>

                </div>


                <div class="profile-info-row">

                    <span>
                        Role
                    </span>

                    <strong>
                        {{ ucfirst(auth()->user()->role ?? 'User') }}
                    </strong>

                </div>


                <a
                    href="{{ route('dashboard') }}"
                    class="dashboard-btn"
                >
                    ← Back to Dashboard
                </a>


            </aside>



            {{-- =================================================
                 PROFILE FORMS
            ================================================== --}}

            <main class="profile-forms">


                <div class="profile-form-card">

                    @include(
                        'profile.partials.update-profile-information-form'
                    )

                </div>



                <div class="profile-form-card">

                    @include(
                        'profile.partials.update-password-form'
                    )

                </div>



                <div class="profile-form-card danger">

                    @include(
                        'profile.partials.delete-user-form'
                    )

                </div>


            </main>


        </div>


    </div>


</div>


</body>

</html>
