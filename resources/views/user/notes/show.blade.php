<!DOCTYPE html>
<html lang="en">

<head>

<title>
{{ $note->title }} - ShipEquipAR Learning
</title>


@vite(['resources/css/app.css','resources/js/app.js'])


<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',Arial,sans-serif;
}


body{

min-height:100vh;

padding:35px 20px;

background:
linear-gradient(
135deg,
rgba(15,23,42,.95),
rgba(2,132,199,.75)
),
url('/images/ship-bg.jpg');

background-size:cover;
background-position:center;
background-attachment:fixed;

}



.container{

max-width:1200px;
margin:auto;

}



/* HERO */


.hero{

padding:45px;

border-radius:30px;

background:
linear-gradient(
135deg,
#0369a1,
#0f172a
);

color:white;

box-shadow:
0 25px 50px rgba(0,0,0,.3);

}



.tag{

display:inline-flex;

padding:8px 16px;

border-radius:999px;

background:rgba(255,255,255,.15);

font-size:13px;

font-weight:900;

}



.hero h1{

margin-top:20px;

font-size:42px;

font-weight:950;

line-height:1.3;

}



.hero p{

margin-top:15px;

color:#dbeafe;

font-size:17px;

}





/* MAIN */


.learning-card{


margin-top:30px;

background:white;

padding:45px;

border-radius:30px;

box-shadow:

0 20px 45px rgba(0,0,0,.25);

}





.course-title{

font-size:38px;

font-weight:950;

color:#0369a1;

line-height:1.3;

}





.module{

margin-top:20px;

display:inline-flex;

padding:12px 20px;

border-radius:999px;

background:#e0f2fe;

color:#0369a1;

font-weight:900;

}





/* LESSON */


.lesson-area{


margin-top:35px;

padding:35px;

width:100%;

border-radius:25px;

background:#f8fafc;

border:1px solid #dbeafe;

}





.lesson-title{

font-size:25px;

font-weight:900;

color:#0369a1;

margin-bottom:25px;

}





.content{


width:100%;

font-size:18px;

line-height:2;

color:#334155;

text-align:left;

}





.content p{

margin-bottom:18px;

}





/* PDF */


.resource{


margin-top:35px;

padding:30px;

border-radius:25px;

background:

linear-gradient(
135deg,
#eff6ff,
#dbeafe
);

}





.resource h3{

font-size:23px;

color:#0369a1;

font-weight:900;

}




.resource p{

margin-top:10px;

color:#475569;

}




.pdf-btn{


display:inline-flex;

margin-top:20px;

padding:15px 30px;

border-radius:14px;

background:#16a34a;

color:white;

text-decoration:none;

font-weight:900;

}



.pdf-btn:hover{

background:#15803d;

}





/* BUTTON */


.actions{

margin-top:35px;

}



.back{


display:inline-flex;

padding:14px 30px;

border-radius:14px;

background:#0f172a;

color:white;

text-decoration:none;

font-weight:900;

}



.back:hover{

background:#0284c7;

}





@media(max-width:768px){


.hero h1{

font-size:30px;

}


.learning-card{

padding:25px;

}


.course-title{

font-size:28px;

}


.content{

font-size:16px;

}


}



</style>


</head>



<body>



<div class="container">





<section class="hero">


<div class="tag">

⚓ Learning Resource

</div>



<h1>

📘 {{ $note->title }}

</h1>



<p>

ShipEquipAR Maritime Engineering Learning Module

</p>


</section>








<section class="learning-card">





<h2 class="course-title">

{{ $note->title }}

</h2>





<div class="module">

📚 Module:

{{ $note->module->name ?? 'General Module' }}

</div>









<div class="lesson-area">


<div class="lesson-title">

📚 Lesson Content

</div>




<div class="content">

{!! $note->content !!}

</div>



</div>









@if($note->pdf)


@php

$pdfPath = str_replace(
'public/',
'',
$note->pdf
);


$pdfPath = str_replace(
'storage/',
'',
$pdfPath
);


@endphp






<div class="resource">


<h3>

📄 Additional Learning Resource

</h3>



<p>

Open official PDF learning document for this module.

</p>





<a

href="{{ asset('storage/'.$pdfPath) }}"

target="_blank"

rel="noopener noreferrer"

class="pdf-btn"

>

📄 Open Notes

</a>



</div>



@endif







<div class="actions">


<a

href="{{ route('user.notes') }}"

class="back"

>

← Back To Notes List

</a>


</div>







</section>





</div>



</body>

</html>