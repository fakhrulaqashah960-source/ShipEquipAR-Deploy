<!DOCTYPE html>
<html>

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
    font-family:'Segoe UI',sans-serif;
}



body{

    min-height:100vh;

    background:
    linear-gradient(
        rgba(3,37,65,.85),
        rgba(2,132,199,.65)
    ),
    url('https://images.unsplash.com/photo-1569263979104-865ab7cd8d13');


    background-size:cover;

    background-position:center;

    padding:40px;

}



/* HEADER */


.header{


    max-width:1100px;

    margin:auto;

    background:
    linear-gradient(
        135deg,
        #0284c7,
        #0f172a
    );


    padding:40px;

    border-radius:30px;

    color:white;

    box-shadow:
    0 15px 30px rgba(0,0,0,.25);


}



.header h1{

    font-size:42px;

    font-weight:900;

}



.header p{

    margin-top:12px;

    font-size:18px;

    color:#dbeafe;

}





/* QUIZ CARD */


.quiz-container{


    max-width:1100px;

    margin:35px auto;


    background:white;

    padding:30px;

    border-radius:30px;


    box-shadow:

    0 15px 35px rgba(0,0,0,.25);


}



.quiz-title{


    display:flex;

    align-items:center;

    gap:15px;

    margin-bottom:25px;


}



.icon{

    font-size:40px;

}



.quiz-title h2{

    font-size:32px;

    color:#0284c7;

}




.info{


    background:#eff6ff;

    padding:20px;

    border-radius:15px;

    margin-bottom:25px;


}



.info p{

    margin:8px 0;

    color:#334155;

    font-weight:600;

}





/* GOOGLE FORM */


.form-wrapper{


    border-radius:20px;

    overflow:hidden;

    border:1px solid #dbeafe;


}



iframe{


    width:100%;

    min-height:1000px;

    border:none;


}





.back{


    display:inline-block;

    margin-top:25px;

    padding:12px 25px;

    background:#0f172a;

    color:white;

    border-radius:12px;

    text-decoration:none;

    font-weight:700;


}


.back:hover{

    background:#0284c7;

}



</style>


</head>


<body>




<div class="header">


<h1>

⚓ ShipEquipAR Quiz

</h1>


<p>

Complete assessment to unlock your certificate.

</p>


</div>





<div class="quiz-container">


<div class="quiz-title">


<div class="icon">

📄

</div>


<h2>

{{ $quiz->title }}

</h2>


</div>





<div class="info">


<p>

🎯 Passing Score:
{{ $quiz->passing_score }}%

</p>


<p>

🌐 Platform:
{{ $quiz->platform }}

</p>



<p>

🏆 Certificate will be generated after completion.

</p>


</div>





<div class="form-wrapper">


<iframe

src="{{ $quiz->google_form_url }}">

</iframe>


</div>





<a href="{{ route('quiz.index') }}"
class="back">

← Back to Quiz List

</a>




</div>




</body>

</html>