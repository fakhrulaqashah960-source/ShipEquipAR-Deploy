<!DOCTYPE html>
<html lang="en">

<head>

<title>{{ $quiz->title }}</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])


<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', Arial, sans-serif;
}


body{

    min-height:100vh;

    background:
    linear-gradient(
        rgba(3,37,65,.93),
        rgba(2,132,199,.75)
    ),
    url('https://images.unsplash.com/photo-1569263979104-865ab7cd8d13');

    background-size:cover;
    background-position:center;

    padding:40px 20px;

}



/* MAIN WRAPPER */

.quiz-wrapper{

    max-width:1000px;

    margin:auto;

}



/* TOP HEADER */

.portal-header{

    background:
    linear-gradient(
        135deg,
        #0f172a,
        #0369a1
    );

    padding:40px;

    border-radius:25px;

    color:white;

    box-shadow:
    0 20px 40px rgba(0,0,0,.25);

}



.portal-header .badge{

    display:inline-block;

    background:#38bdf8;

    color:#082f49;

    padding:6px 15px;

    border-radius:20px;

    font-size:13px;

    font-weight:700;

    margin-bottom:15px;

}



.portal-header h1{

    font-size:38px;

    font-weight:900;

}



.portal-header p{

    margin-top:15px;

    color:#dbeafe;

    font-size:17px;

}




/* CONTENT CARD */


.quiz-card{

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

    margin-bottom:25px;

}



.quiz-title .icon{

    width:55px;

    height:55px;

    display:flex;

    align-items:center;

    justify-content:center;

    background:#e0f2fe;

    border-radius:15px;

    font-size:30px;

}



.quiz-title h2{

    color:#0369a1;

    font-size:28px;

    font-weight:800;

}




/* INFORMATION */


.info-grid{

    display:grid;

    grid-template-columns:
    repeat(3,1fr);

    gap:20px;

    margin-bottom:35px;

}



.info-box{

    background:#f0f9ff;

    border-left:5px solid #0284c7;

    padding:20px;

    border-radius:15px;

}



.info-box h4{

    color:#0369a1;

    font-size:14px;

    margin-bottom:8px;

}



.info-box p{

    color:#334155;

    font-weight:700;

}



/* QUIZ AREA */


.quiz-frame{

    background:#ffffff;

    border-radius:20px;

    padding:15px;

    border:

    1px solid #dbeafe;

    box-shadow:

    0 10px 25px rgba(0,0,0,.12);

    text-align:center;

}



#proprofs{

    width:720px !important;

    max-width:100% !important;

    height:1100px;

    border:none;

}




/* BACK BUTTON */


.back-btn{

    display:inline-block;

    margin-top:30px;

    background:#0f172a;

    color:white;

    padding:14px 28px;

    border-radius:12px;

    text-decoration:none;

    font-weight:700;

}



.back-btn:hover{

    background:#0284c7;

}




/* MOBILE */

@media(max-width:768px){


    body{

        padding:20px 10px;

    }


    .portal-header{

        padding:25px;

    }


    .portal-header h1{

        font-size:28px;

    }



    .quiz-card{

        padding:20px;

    }



    .info-grid{

        grid-template-columns:1fr;

    }


}



</style>

</head>



<body>


<div class="quiz-wrapper">



<!-- HEADER -->


<div class="portal-header">


<div class="badge">

⚓ Maritime Assessment

</div>


<h1>

ShipEquipAR Knowledge Evaluation

</h1>


<p>

Complete the maritime engineering assessment and achieve the required score to receive your certificate.

</p>


</div>





<!-- QUIZ CONTENT -->


<div class="quiz-card">



<div class="quiz-title">


<div class="icon">

📘

</div>


<h2>

{{ $quiz->title }}

</h2>


</div>





<div class="info-grid">



<div class="info-box">

<h4>

🎯 PASSING SCORE

</h4>

<p>

{{ $quiz->passing_score }}%

</p>

</div>




<div class="info-box">

<h4>

🌐 PLATFORM

</h4>

<p>

{{ $quiz->platform }}

</p>

</div>




<div class="info-box">

<h4>

🏆 CERTIFICATE

</h4>

<p>

Available after passing

</p>

</div>



</div>





<div class="quiz-frame">


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

class="back-btn">

← Back to Quiz List

</a>



</div>



</div>



</body>

</html>