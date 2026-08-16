<!DOCTYPE html>
<html>

<head>

<title>
ShipEquipAR Quiz
</title>


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



/* ================= HEADER ================= */


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






/* ================= CONTAINER ================= */


.container{


max-width:1100px;

margin:35px auto;


}






/* ================= QUIZ CARD ================= */


.quiz-card{


background:white;

padding:35px;


border-radius:25px;


box-shadow:

0 10px 25px rgba(0,0,0,.2);


margin-bottom:25px;


}




.quiz-card h2{


font-size:30px;

color:#0284c7;

margin-bottom:20px;


}







.info{


background:#eff6ff;

padding:20px;

border-radius:15px;


}




.info p{


margin:10px 0;

color:#334155;

font-weight:600;


}







/* ================= BUTTON ================= */


.btn{


display:inline-block;


margin-top:25px;


padding:14px 30px;


background:#0284c7;


color:white;


border-radius:12px;


text-decoration:none;


font-weight:700;


font-size:16px;


transition:.3s;


}



.btn:hover{


background:#0369a1;

transform:translateY(-2px);


}






/* ================= EMPTY ================= */


.empty{


background:white;

padding:40px;

border-radius:20px;

text-align:center;


}








/* ================= BACK BUTTON ================= */


.back-area{

margin-top:35px;

}



.back-btn{


display:inline-block;


padding:14px 30px;


background:#0f172a;


color:white;


border-radius:12px;


text-decoration:none;


font-weight:700;


font-size:16px;


transition:.3s;


}



.back-btn:hover{


background:#0284c7;


transform:translateY(-2px);


}





</style>


</head>





<body>




<!-- HEADER -->


<div class="header">


<h1>

📄 ShipEquipAR Quiz

</h1>


<p>

Complete assessment to receive your official certificate.

</p>


</div>








<!-- QUIZ LIST -->


<div class="container">






@if(count($quizzes)==0)



<div class="empty">


<h2>

No Quiz Available

</h2>


<p>

Please complete learning module first.

</p>


</div>



@endif







@foreach($quizzes as $quiz)





<div class="quiz-card">





<h2>

📄 {{ $quiz->title }}

</h2>







<div class="info">



<p>

🎯 Passing Score :

{{ $quiz->passing_score }}%

</p>




<p>

🌐 Platform :

{{ $quiz->platform }}

</p>





<p>

🏆 Certificate :

Available after successful completion

</p>




</div>









<a href="{{ route('quiz.show',$quiz->id) }}"
class="btn">


Start Quiz →


</a>







</div>






@endforeach







<div class="back-area">


<a href="{{ route('dashboard') }}"
class="back-btn">


🏠 Back to Dashboard


</a>


</div>



</div>





</body>


</html>