<!DOCTYPE html>
<html lang="en">

<head>

<title>
{{ $quiz->title }}
</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])


<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',Arial,sans-serif;
}


body{

    min-height:100vh;

    background:
    linear-gradient(
        rgba(2,24,45,.92),
        rgba(3,105,161,.78)
    ),
    url('https://images.unsplash.com/photo-1569263979104-865ab7cd8d13');

    background-size:cover;

    background-position:center;

    padding:35px 20px;

}



/* MAIN */

.container{

    max-width:1050px;

    margin:auto;

}



/* HEADER */

.header{

    background:
    linear-gradient(
        135deg,
        #082f49,
        #0369a1
    );

    padding:35px;

    border-radius:25px;

    color:white;

    box-shadow:
    0 15px 35px rgba(0,0,0,.3);

}



.badge{

    display:inline-block;

    background:#38bdf8;

    color:#082f49;

    padding:7px 16px;

    border-radius:20px;

    font-size:13px;

    font-weight:800;

    margin-bottom:15px;

}



.header h1{

    font-size:36px;

    font-weight:900;

}



.header p{

    margin-top:12px;

    color:#dbeafe;

    font-size:16px;

}



/* CARD */


.card{

    background:white;

    margin-top:30px;

    padding:35px;

    border-radius:25px;

    box-shadow:
    0 15px 35px rgba(0,0,0,.25);

}



/* TITLE */


.quiz-title{

    display:flex;

    align-items:center;

    gap:15px;

    margin-bottom:30px;

}



.quiz-icon{

    width:60px;

    height:60px;

    background:#e0f2fe;

    border-radius:15px;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:32px;

}



.quiz-title h2{

    color:#0369a1;

    font-size:28px;

    font-weight:800;

}



/* INFO */


.info{

    display:grid;

    grid-template-columns:
    repeat(3,1fr);

    gap:20px;

    margin-bottom:35px;

}



.info-card{

    background:#f0f9ff;

    padding:20px;

    border-radius:15px;

    border-left:5px solid #0284c7;

}



.info-card span{

    display:block;

    font-size:13px;

    color:#0369a1;

    font-weight:700;

    margin-bottom:8px;

}



.info-card strong{

    color:#0f172a;

}



/* PROPROFS */


.quiz-box{

    background:#ffffff;

    border-radius:20px;

    padding:15px;

    border:1px solid #dbeafe;

    box-shadow:
    0 10px 25px rgba(0,0,0,.12);

    text-align:center;

}



#proprofs{

    width:100% !important;

    max-width:800px;

    height:1100px;

    border:none;

}



/* BUTTON */


.back{

    display:inline-block;

    margin-top:30px;

    background:#0f172a;

    color:white;

    padding:14px 30px;

    border-radius:12px;

    text-decoration:none;

    font-weight:700;

}



.back:hover{

    background:#0369a1;

}



/* RESPONSIVE */


@media(max-width:768px){


.info{

    grid-template-columns:1fr;

}


.header h1{

    font-size:28px;

}


.card{

    padding:20px;

}


#proprofs{

    height:1200px;

}


}


</style>


</head>


<body>



<div class="container">



<div class="header">


<div class="badge">

⚓ Maritime Assessment Module

</div>


<h1>

ShipEquipAR Knowledge Evaluation

</h1>


<p>

Complete this assessment to evaluate your understanding of maritime engineering, ship operations, safety and propulsion fundamentals.

</p>


</div>





<div class="card">



<div class="quiz-title">


<div class="quiz-icon">

📘

</div>


<h2>

{{ $quiz->title }}

</h2>


</div>





<div class="info">



<div class="info-card">

<span>

🎯 PASSING SCORE

</span>


<strong>

{{ $quiz->passing_score }}%

</strong>


</div>



<div class="info-card">

<span>

🌐 QUIZ PLATFORM

</span>


<strong>

{{ $quiz->platform }}

</strong>


</div>




<div class="info-card">

<span>

🏆 CERTIFICATE

</span>


<strong>

Available After Passing

</strong>


</div>



</div>






<div class="quiz-box">



@php

$proProfsUrl =
'https://www.proprofs.com/quiz-school/ugc/story.php?' .
http_build_query([

'title' => 'shipequipar-maritime-knowledge-quiz-272',

'id' => '4794765',

'ew' => '720',

'user_name' => auth()->user()->name ?? 'Guest',

'user_email' => auth()->user()->email ?? '',

'user_id' => auth()->id() ?? ''

]);


@endphp




<iframe

name="proprofs"

id="proprofs"

src="{{ $proProfsUrl }}"

allow="camera *; microphone *; fullscreen"

allowfullscreen>

</iframe>



</div>






<a href="{{ route('quiz.index') }}"

class="back">

← Back to Dashboard

</a>



</div>



</div>



</body>

</html>