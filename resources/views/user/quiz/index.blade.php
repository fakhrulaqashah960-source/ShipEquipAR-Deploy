<!DOCTYPE html>
<html lang="en">

<head>

<title>
ShipEquipAR Maritime Assessment
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
        rgba(2,24,45,.90),
        rgba(3,105,161,.75)
    ),
    url('https://images.unsplash.com/photo-1569263979104-865ab7cd8d13');

    background-size:cover;
    background-position:center;

    padding:40px 20px;

}




.container{

    max-width:1150px;

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

    padding:45px;

    border-radius:30px;

    color:white;

    box-shadow:
    0 20px 40px rgba(0,0,0,.35);

}



.badge{

    display:inline-block;

    background:#38bdf8;

    color:#082f49;

    padding:8px 18px;

    border-radius:30px;

    font-size:13px;

    font-weight:800;

}



.header h1{

    margin-top:20px;

    font-size:42px;

    font-weight:900;

}



.header p{

    margin-top:15px;

    color:#dbeafe;

    max-width:800px;

    line-height:1.6;

}







/* QUIZ CARD */


.quiz-list{

    margin-top:35px;

    display:grid;

    grid-template-columns:
    repeat(2,1fr);

    gap:30px;

}





.quiz-card{


    background:white;

    padding:35px;

    border-radius:25px;


    box-shadow:

    0 15px 35px rgba(0,0,0,.25);


    transition:.3s;


}




.quiz-card:hover{

    transform:translateY(-5px);

}




.icon{


    width:65px;

    height:65px;

    background:#e0f2fe;

    border-radius:18px;


    display:flex;

    align-items:center;

    justify-content:center;

    font-size:35px;


}



.quiz-card h2{

    margin-top:20px;

    color:#0369a1;

    font-size:25px;

}



.quiz-card p{

    margin-top:15px;

    color:#475569;

    line-height:1.6;

}





.info{


    margin-top:25px;

    background:#f0f9ff;

    padding:18px;

    border-radius:15px;


}



.info div{

    margin-bottom:10px;

    color:#334155;

    font-weight:600;

}


.info strong{

    color:#0369a1;

}







.start-btn{


    display:inline-block;


    margin-top:25px;


    background:#0f172a;


    color:white;


    padding:14px 30px;


    border-radius:15px;


    text-decoration:none;


    font-weight:800;


}



.start-btn:hover{


    background:#0369a1;


}







.empty{


    background:white;

    padding:40px;

    border-radius:20px;

    text-align:center;

}







@media(max-width:768px){


.quiz-list{

    grid-template-columns:1fr;

}


.header h1{

    font-size:30px;

}


}




</style>


</head>




<body>



<div class="container">





<div class="header">


<div class="badge">

⚓ Maritime Learning Platform

</div>



<h1>

ShipEquipAR Knowledge Assessment

</h1>



<p>

Test your knowledge in maritime engineering, ship classification, safety systems, security and propulsion. Complete the assessment to receive your certificate.

</p>



</div>








<div class="quiz-list">



@if($quizzes->count() > 0)



@foreach($quizzes as $quiz)



<div class="quiz-card">



<div class="icon">

🚢

</div>




<h2>

{{ $quiz->title }}

</h2>




<p>

This assessment is conducted through ProProfs Quiz Maker. Complete all questions and achieve the required passing score.

</p>






<div class="info">


<div>

🎯 Passing Score:

<strong>
{{ $quiz->passing_score }}%
</strong>

</div>



<div>

🌐 Platform:

<strong>
{{ $quiz->platform }}
</strong>

</div>



<div>

🏆 Certificate:

<strong>
Available after passing
</strong>

</div>



</div>





<a href="{{ route('quiz.show',$quiz->id) }}"

class="start-btn">

Start Assessment →

</a>




</div>



@endforeach



@else



<div class="empty">

<h2>No Quiz Available</h2>

<p>
Please check again later.
</p>

</div>



@endif



</div>






</div>



</body>


</html>