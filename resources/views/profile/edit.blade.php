<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">


<title>
    Profile - ShipEquipAR
</title>


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
    --red:#dc2626;

    --text:#0f172a;
    --muted:#64748b;

}



*{

    margin:0;
    padding:0;

    box-sizing:border-box;

    font-family:'Segoe UI',sans-serif;

}



body{

    min-height:100vh;

    padding:35px 20px;

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




/* =========================================================
   WRAPPER
========================================================= */


.profile-wrapper{

    width:100%;

    max-width:1150px;

    margin:auto;

}



/* =========================================================
   HERO
========================================================= */


.profile-hero{


    padding:35px;


    margin-bottom:25px;


    border-radius:26px;


    background:


    linear-gradient(
        135deg,
        rgba(14,116,144,.95),
        rgba(15,23,42,.95)
    );


    color:white;


    box-shadow:

    0 18px 40px rgba(0,0,0,.25);


}




.profile-tag{


    display:inline-flex;


    align-items:center;


    padding:8px 14px;


    border-radius:999px;


    background:

    rgba(255,255,255,.15);


    color:#e0f2fe;


    font-size:12px;


    font-weight:900;


}




.profile-hero h1{


    margin-top:15px;


    font-size:42px;


    font-weight:950;


}




.profile-hero p{


    margin-top:10px;


    color:#dbeafe;


    font-size:14px;


    line-height:1.7;


}






/* =========================================================
   STACK LAYOUT
========================================================= */


.profile-grid{


    display:flex;


    flex-direction:column;


    gap:22px;


}






/* =========================================================
   PROFILE SUMMARY CARD
========================================================= */


.profile-summary{


    width:100%;


    padding:32px;


    border-radius:25px;


    background:white;


    text-align:center;


    box-shadow:


    0 15px 35px rgba(0,0,0,.18);


}





.profile-avatar{


    width:95px;


    height:95px;


    margin:0 auto 18px;


    display:flex;


    align-items:center;


    justify-content:center;


    border-radius:50%;


    background:


    linear-gradient(
        135deg,
        #0284c7,
        #0f172a
    );


    color:white;


    font-size:42px;


}





.profile-summary h2{


    font-size:24px;


    font-weight:900;


}





.profile-email{


    margin-top:7px;


    color:var(--muted);


    font-size:14px;


}





.profile-divider{


    height:1px;


    max-width:450px;


    margin:25px auto;


    background:#e2e8f0;


}





.profile-info-row{


    max-width:450px;


    margin:12px auto;


    display:flex;


    justify-content:space-between;


    align-items:center;


    font-size:14px;


}




.profile-info-row span:first-child{


    color:#64748b;


}




.profile-info-row strong{


    font-weight:900;


}






.profile-status{


    padding:5px 10px;


    border-radius:999px;


    background:#dcfce7;


    color:#166534;


    font-size:11px;


    font-weight:900;


}



/* =========================================================
   FORM SECTION
========================================================= */


.profile-forms{


    width:100%;


    display:flex;


    flex-direction:column;


    gap:22px;


}




.profile-form-card{


    padding:30px;


    border-radius:24px;


    background:white;


    box-shadow:


    0 15px 35px rgba(0,0,0,.16);


}




.profile-form-card section{


    max-width:none !important;


}




.profile-form-card header h2{


    color:#0f172a !important;


    font-size:22px !important;


    font-weight:900 !important;


}




.profile-form-card header p{


    color:#64748b !important;


}
/* =========================================================
   INPUT STYLE
========================================================= */


.profile-form-card input[type="text"],
.profile-form-card input[type="email"],
.profile-form-card input[type="password"]{


    width:100%;


    min-height:48px;


    margin-top:8px;


    padding:12px 15px;


    border-radius:12px;


    border:1px solid #cbd5e1;


    background:white;


    color:#0f172a;


    font-size:14px;


    outline:none;


}



.profile-form-card input:focus{


    border-color:#0284c7;


    box-shadow:

    0 0 0 3px rgba(2,132,199,.12);


}




/* =========================================================
   BUTTON
========================================================= */


.profile-form-card button{


    min-height:44px;


    padding:10px 22px;


    border:none;


    border-radius:11px;


    background:#0284c7;


    color:white;


    font-size:13px;


    font-weight:900;


    cursor:pointer;


    transition:.2s;


}



.profile-form-card button:hover{


    background:#0369a1;


    transform:translateY(-2px);


}





/* =========================================================
   DELETE ACCOUNT
========================================================= */


.profile-form-card.danger{


    border:1px solid #fecaca;


    background:


    linear-gradient(
        180deg,
        #ffffff,
        #fff7f7
    );


}



.profile-form-card.danger button{


    background:#dc2626;


}



.profile-form-card.danger button:hover{


    background:#b91c1c;


}






/* =========================================================
   BACK BUTTON
========================================================= */


.bottom-dashboard-btn{


    width:fit-content;


    margin:0 auto 30px;


    padding:13px 30px;


    display:flex;


    align-items:center;


    justify-content:center;


    border-radius:13px;


    background:#0f172a;


    color:white;


    text-decoration:none;


    font-size:14px;


    font-weight:900;


    transition:.25s;


}



.bottom-dashboard-btn:hover{


    background:#0284c7;


    transform:translateY(-3px);


}







/* =========================================================
   MOBILE
========================================================= */


@media(max-width:700px){


    body{


        padding:15px;


        background-attachment:scroll;


    }



    .profile-hero{


        padding:25px 20px;


        border-radius:20px;


    }



    .profile-hero h1{


        font-size:30px;


    }



    .profile-summary,


    .profile-form-card{


        padding:20px;


        border-radius:18px;


    }



    .profile-info-row{


        flex-direction:column;


        gap:8px;


    }



    .bottom-dashboard-btn{


        width:100%;


    }


}


</style>


</head>





<body>



<div class="profile-wrapper">





<section class="profile-hero">


    <div class="profile-tag">

        👤 Account Settings

    </div>



    <h1>

        My Profile

    </h1>



    <p>

        Manage your ShipEquipAR account information,
        password and account settings.

    </p>



</section>






<div class="profile-grid">





<aside class="profile-summary">



    <div class="profile-avatar">

        👤

    </div>




    <h2>

        {{ auth()->user()->name }}

    </h2>




    <div class="profile-email">

        {{ auth()->user()->email }}

    </div>




    <div class="profile-divider"></div>





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




</aside>







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







<a

href="{{ route('dashboard') }}"

class="bottom-dashboard-btn"

>

    ← Back to Dashboard


</a>





</main>






</div>






</div>




</body>


</html>