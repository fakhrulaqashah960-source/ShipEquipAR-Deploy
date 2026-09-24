<!DOCTYPE html>
<html lang="en">

<head>

<title>
ShipEquipAR Maritime Engineering Quiz
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
#0284c7,
#0f172a
);

padding:45px;

border-radius:30px;

color:white;

box-shadow:
0 20px 40px rgba(0,0,0,.3);

}




.header h1{

font-size:42px;
font-weight:900;

}




.header p{

margin-top:15px;

color:#dbeafe;

font-size:18px;

}





.card{


margin-top:35px;

background:white;

padding:35px;

border-radius:30px;


box-shadow:

0 20px 40px rgba(0,0,0,.25);


}





.title{

color:#0369a1;

font-size:32px;

font-weight:900;

margin-bottom:25px;

}




.info{


background:#eff6ff;

padding:25px;

border-radius:20px;

margin-bottom:30px;


}




.info p{

margin:10px 0;

font-weight:700;

color:#334155;

}




.quiz-box{


border-radius:25px;

overflow:hidden;

border:2px solid #dbeafe;


}




iframe{


width:100%;

height:1100px;

border:none;


}





.back{


display:inline-block;

margin-top:30px;

background:#0f172a;

color:white;

padding:14px 30px;

border-radius:15px;

text-decoration:none;

font-weight:800;


}



.back:hover{

background:#0284c7;

}




</style>


</head>



<body>


<div class="container">



<div class="header">


<h1>

⚓ ShipEquipAR Quiz

</h1>


<p>

Complete the maritime engineering assessment to obtain your certificate.

</p>


</div>






<div class="card">



<h2 class="title">

Maritime Engineering Fundamentals:
<br>
Ships, Safety, Security and Propulsion

</h2>





<div class="info">


<p>
🎯 Passing Score:
<strong>
80%
</strong>
</p>



<p>
🌐 Platform:
<strong>
ProProfs Quiz Maker
</strong>
</p>




<p>
🏆 Certificate:
<strong>
Available after successful completion
</strong>
</p>



</div>







<div class="quiz-box">


<iframe

src="https://www.proprofs.com/quiz-school/ugc/story.php?title=shipequipar-maritime-knowledge-quiz-272&id=4794765&ew=720"

allow="camera *; microphone *; fullscreen"

allowfullscreen>

</iframe>



</div>






<a href="{{ route('dashboard') }}" class="back">

← Back to Dashboard

</a>





</div>


</div>


</body>


</html>