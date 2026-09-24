<!DOCTYPE html>
<html lang="en">

<head>

<title>
ShipEquipAR Maritime Quiz
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
        rgba(3,105,161,.75)
    ),
    url('https://images.unsplash.com/photo-1569263979104-865ab7cd8d13');


    background-size:cover;

    background-position:center;

    padding:40px 20px;

}




.container{

    max-width:1100px;

    margin:auto;

}




.header{


    background:
    linear-gradient(
        135deg,
        #082f49,
        #0369a1
    );


    padding:40px;

    border-radius:25px;

    color:white;

    box-shadow:
    0 20px 40px rgba(0,0,0,.3);


}



.badge{

    display:inline-block;

    background:#38bdf8;

    color:#082f49;

    padding:7px 15px;

    border-radius:20px;

    font-size:13px;

    font-weight:800;

}



.header h1{

    margin-top:15px;

    font-size:38px;

}



.header p{

    margin-top:15px;

    color:#dbeafe;

}




.quiz-list{


    margin-top:35px;


    display:grid;

    grid-template-columns:
    repeat(2,1fr);

    gap:25px;


}





.quiz-card{


    background:white;

    padding:30px;

    border-radius:25px;


    box-shadow:
    0 15px 30px rgba(0,0,0,.2);


}



.quiz-icon{


    width:60px;

    height:60px;

    background:#e0f2fe;

    border-radius:15px;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:32px;

    margin-bottom:20px;


}



.quiz-card h2{


    color:#0369a1;

    font-size:24px;

}



.quiz-card p{


    margin-top:15px;

    color:#475569;

    line-height:1.6;


}



.details{


    margin-top:20px;

    background:#f0f9ff;

    padding:15px;

    border-radius:15px;

}



.details strong{


    color:#0369a1;


}




.start-btn{


    display:inline-block;

    margin-top:25px;

    background:#0f172a;

    color:white;

    padding:12px 25px;

    border-radius:12px;

    text-decoration:none;

    font-weight:700;


}



.start-btn:hover{

    background:#0369a1;

}



@media(max-width:768px){


.quiz-list{

    grid-template-columns:1fr;

}


.header h1{

    font-size:28px;

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

Select an assessment below to test your understanding of maritime engineering, ship safety, security and propulsion.

</p>



</div>





<div class="quiz-list">



@foreach($quizzes as $quiz)



<div class="quiz-card">


<div class="quiz-icon">

📘

</div>



<h2>

{{ $quiz->title }}

</h2>



<p>

Complete this maritime assessment and achieve the required passing score to receive your certificate.

</p>




<div class="details">


<p>

🎯 Passing Score:

<strong>
{{ $quiz->passing_score }}%
</strong>

</p>



<p>

🌐 Platform:

<strong>
{{ $quiz->platform }}
</strong>

</p>



<p>

🏆 Certificate:

<strong>
Available
</strong>

</p>


</div>




<a href="{{ route('quiz.show',$quiz->id) }}"

class="start-btn">

Start Assessment →

</a>



</div>



@endforeach



</div>



</div>



</body>

</html>