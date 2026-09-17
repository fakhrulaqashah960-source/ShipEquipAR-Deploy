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
    --green:#16a34a;
    --text:#1e293b;
    --line:#e2e8f0;

}


*{

    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;

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




.page-wrapper{

    width:100%;

    max-width:1050px;

    margin:auto;

}





/* HERO */

.learning-hero{

    padding:35px;

    border-radius:28px;

    margin-bottom:25px;


    color:white;


    background:

    linear-gradient(
        135deg,
        #0369a1,
        #0f172a
    );


    box-shadow:
    0 18px 40px rgba(0,0,0,.25);

}



.hero-badge{

    display:inline-flex;

    padding:8px 15px;

    border-radius:50px;

    background:
    rgba(255,255,255,.15);


    color:#e0f2fe;

    font-weight:800;

    font-size:13px;

}



.learning-hero h1{

    margin-top:15px;

    font-size:clamp(30px,4vw,44px);

    font-weight:900;

}



.hero-description{

    margin-top:12px;

    color:#dbeafe;

    line-height:1.7;

}





/* CONTENT */


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

    padding-bottom:15px;

    margin-bottom:20px;

    border-bottom:1px solid var(--line);

}



.note-content{

    color:#334155;

    font-size:15px;

    line-height:1.9;

    white-space:pre-line;

}





/* PDF */


.resource-box{

    margin-top:30px;

    padding:22px;

    border-radius:20px;

    background:#f8fafc;

    border:1px solid var(--line);

}



.resource-title{

    font-weight:900;

    margin-bottom:15px;

}



.pdf-button{

    display:inline-flex;

    padding:13px 25px;

    border-radius:14px;

    background:#16a34a;

    color:white;

    text-decoration:none;

    font-weight:900;

}



.pdf-button:hover{

    background:#15803d;

}




/* BACK */


.action-area{

    margin-top:30px;

    padding-top:25px;

    border-top:1px solid var(--line);

    text-align:center;

}



.back-button{

    display:inline-flex;

    padding:13px 30px;

    border-radius:14px;

    background:#0f172a;

    color:white;

    text-decoration:none;

    font-weight:900;

}



.back-button:hover{

    background:#0284c7;

}





@media(max-width:700px){


body{

    padding:0;

}


.learning-hero{

    border-radius:0 0 25px 25px;

    padding:25px;

}


.note-container{

    margin:8px;

    padding:20px;

    border-radius:18px;

}


.pdf-button,
.back-button{

    width:100%;

    justify-content:center;

}


}

</style>


</head>



<body>


<div class="page-wrapper">





<section class="learning-hero">


<div class="hero-badge">

📘 Interactive Learning Module

</div>



<h1>

{{ $note->title }}

</h1>



<p class="hero-description">

Explore marine engineering learning materials
through ShipEquipAR digital learning resources.

</p>



<br>


<div class="hero-badge">

📚

{{ $note->module->title
?? $note->module->name
?? '-' }}

</div>



</section>







<article class="note-container">



<div class="section-title">

📖 Learning Notes

</div>




<div class="note-content">

{{ $note->content }}

</div>

@if($note->pdf)

@php

    $pdfPath = trim(
        str_replace(
            '\\',
            '/',
            $note->pdf
        )
    );


    /*
    |--------------------------------------------------------------------------
    | PDF PATH FIX
    |--------------------------------------------------------------------------
    |
    | Database:
    | notes/random-file.pdf
    |
    | Storage:
    | storage/app/public/notes/random-file.pdf
    |
    | Public URL:
    | /storage/notes/random-file.pdf
    |
    */


    if(
        str_starts_with(
            $pdfPath,
            'http://'
        )
        ||
        str_starts_with(
            $pdfPath,
            'https://'
        )
    ){

        $pdfUrl = $pdfPath;

    }

    else{


        // remove public/ if exists
        $pdfPath = str_replace(
            'public/',
            '',
            $pdfPath
        );


        // remove storage/ if exists
        $pdfPath = str_replace(
            'storage/',
            '',
            $pdfPath
        );


        // final URL
        $pdfUrl = asset(
            'storage/'.$pdfPath
        );


    }


@endphp



<div class="resource-box">


<div class="resource-title">

📄 Additional Learning Resource

</div>



<p style="
color:#64748b;
font-size:14px;
margin-bottom:15px;
">

Open the PDF resource to explore
additional learning materials.

</p>




<a

class="pdf-button"

href="{{ $pdfUrl }}"

target="_blank"

rel="noopener noreferrer"

>

📄 Open PDF Resource

</a>



</div>


@endif

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