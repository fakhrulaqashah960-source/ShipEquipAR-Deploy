<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">


<title>
{{ $note->title }} - ShipEquipAR Learning
</title>


@vite([
    'resources/css/app.css',
    'resources/js/app.js'
])


<style>

:root{

    --navy:#0f172a;

    --blue:#0284c7;

    --cyan:#38bdf8;

    --green:#16a34a;

    --text:#1e293b;

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

    padding:35px 18px;


    background:

    linear-gradient(
        135deg,
        rgba(15,23,42,.92),
        rgba(2,132,199,.75)
    ),

    url('/images/ship-bg.jpg');


    background-size:cover;

    background-position:center;

    background-attachment:fixed;

}



/* ==============================
   MAIN CONTAINER
============================== */


.page-wrapper{

    width:100%;

    max-width:1050px;

    margin:auto;

}



/* ==============================
   HERO
============================== */


.learning-hero{

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:25px;


    padding:35px;


    border-radius:28px;


    color:white;


    background:

    linear-gradient(
        135deg,
        #0369a1,
        #0f172a
    );


    box-shadow:

    0 18px 40px rgba(0,0,0,.25);


    margin-bottom:25px;

}



.hero-content{

    flex:1;

}



.hero-badge{


    display:inline-flex;

    align-items:center;

    gap:8px;


    padding:8px 15px;


    border-radius:50px;


    background:

    rgba(255,255,255,.15);


    color:#e0f2fe;


    font-size:13px;


    font-weight:800;


    margin-bottom:15px;

}



.learning-hero h1{

    font-size:clamp(30px,4vw,44px);

    line-height:1.2;

    font-weight:900;

}



.hero-description{

    margin-top:12px;


    max-width:700px;


    color:#dbeafe;


    line-height:1.7;


    font-size:15px;

}



.hero-icon{


    width:100px;

    height:100px;


    display:flex;


    align-items:center;


    justify-content:center;


    border-radius:25px;


    background:

    rgba(255,255,255,.15);


    font-size:55px;

}




/* ==============================
   NOTE CONTENT CARD
============================== */


.note-container{


    background:white;


    border-radius:28px;


    padding:35px;


    box-shadow:

    0 18px 40px rgba(0,0,0,.18);


}



.section-title{


    font-size:22px;


    font-weight:900;


    color:var(--navy);


    padding-bottom:15px;


    border-bottom:1px solid var(--line);


    margin-bottom:20px;

}



.note-content{


    color:#334155;


    line-height:1.9;


    font-size:15px;


    white-space:pre-line;

}



/* ==============================
   RESOURCE AREA
============================== */


.resource-box{


    margin-top:30px;


    padding:22px;


    border-radius:20px;


    background:#f8fafc;


    border:1px solid var(--line);


}



.resource-title{


    font-weight:900;


    color:var(--navy);


    margin-bottom:15px;

}



/* ==============================
   BUTTON AREA
============================== */


.action-area{


    margin-top:35px;


    padding-top:25px;


    border-top:1px solid var(--line);


    display:flex;


    justify-content:center;


}



.back-button{


    display:inline-flex;


    align-items:center;


    justify-content:center;


    padding:13px 30px;


    border-radius:14px;


    background:var(--navy);


    color:white;


    text-decoration:none;


    font-weight:800;


    transition:.25s;


}



.back-button:hover{


    background:var(--blue);


    transform:translateY(-3px);

}



.pdf-button{


    display:inline-flex;


    align-items:center;


    justify-content:center;


    padding:13px 25px;


    border-radius:14px;


    background:var(--green);


    color:white;


    text-decoration:none;


    font-weight:800;


    transition:.25s;


}



.pdf-button:hover{


    background:#15803d;


    transform:translateY(-3px);

}



.resource-actions{


    display:flex;


    gap:15px;


    flex-wrap:wrap;


}



/* ==============================
   MOBILE
============================== */


@media(max-width:700px){


    body{

        padding:0;

    }



    .learning-hero{


        border-radius:0 0 25px 25px;


        padding:25px;


        flex-direction:column;


        align-items:flex-start;

    }



    .hero-icon{

        display:none;

    }



    .note-container{


        width:calc(100% - 16px);


        margin:8px;


        padding:20px;


        border-radius:20px;

    }



    .resource-actions{


        flex-direction:column;

    }



    .pdf-button,
    .back-button{


        width:100%;

    }



}



</style>


</head>

<body>


<div class="page-wrapper">



    {{-- =========================
         HERO SECTION
    ========================== --}}


    <section class="learning-hero">


        <div class="hero-content">


            <div class="hero-badge">

                📘 Interactive Learning Module

            </div>



            <h1>

                {{ $note->title }}

            </h1>



            <p class="hero-description">

                Explore marine engineering learning materials,
                understand the concept and improve your knowledge
                through ShipEquipAR digital learning resources.

            </p>



            <br>


            <div class="hero-badge">


                📚

                {{ $note->module->title
                    ?? $note->module->name
                    ?? '-' }}


            </div>



        </div>




        <div class="hero-icon">

            ⚓

        </div>



    </section>






    {{-- =========================
         CONTENT
    ========================== --}}



    <article class="note-container">



        <div class="section-title">

            📖 Learning Notes

        </div>





        <div class="note-content">

            {{ $note->content }}

        </div>






        {{-- =========================
             PDF RESOURCE
        ========================== --}}



        @if($note->pdf)


        <div class="resource-box">


            <div class="resource-title">

                📄 Additional Learning 

            </div>



            <p style="color:#64748b;font-size:14px;line-height:1.7;margin-bottom:18px;">


                Download or open the PDF resource
                to explore more detailed information
                about this learning topic.


            </p>




            <div class="resource-actions">



<a
    class="pdf-button"
    href="{{ asset('storage/'.$note->pdf) }}"
    target="_blank"
    rel="noopener noreferrer"
>
    📄 Open PDF Resource
</a>




            </div>



        </div>



        @endif







        {{-- =========================
             BACK BUTTON
        ========================== --}}



        <div class="action-area">


            <a

                class="back-button"

                href="{{ route('user.notes') }}"

            >

                ← Back to Module Notes

            </a>


        </div>





    </article>





</div>




</body>

</html>