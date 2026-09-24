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
rgba(2,24,45,.90),
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

border-radius:30px;

color:white;


}



.header h1{

font-size:38px;

font-weight:900;

}



.header p{

margin-top:15px;

color:#dbeafe;

}




.quiz-box{


margin-top:30px;

background:white;

padding:30px;

border-radius:30px;


box-shadow:

0 15px 35px rgba(0,0,0,.25);


}



.title{

color:#0369a1;

font-size:30px;

font-weight:800;

margin-bottom:20px;


}



.info{

background:#eff6ff;

padding:20px;

border-radius:15px;

margin-bottom:25px;


}



.info p{

margin:8px 0;

font-weight:600;

color:#334155;

}





.proprofs-container{


border-radius:20px;

overflow:hidden;

border:1px solid #dbeafe;


display:flex;

justify-content:center;


}



#proprofs{


width:100%;

max-width:900px;

height:1200px;

border:none;


}



.back{


display:inline-block;

margin-top:25px;

background:#0f172a;

color:white;

padding:12px 25px;

border-radius:12px;

text-decoration:none;

font-weight:700;


}



.back:hover{

background:#0369a1;

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

Complete the maritime assessment to unlock your certificate.

</p>


</div>





<div class="quiz-box">



<div class="title">

{{ $quiz->title }}

</div>



<div class="info">


<p>

🎯 Passing Score:

{{ $quiz->passing_score }}%

</p>


<p>

🌐 Platform:

ProProfs Quiz Maker

</p>


<p>

🏆 Certificate:

Generated after successful completion

</p>


</div>




<div class="proprofs-container">



<iframe

id="proprofs"

name="proprofs"

src="https://www.proprofs.com/quiz-school/ugc/story.php?title=shipequipar-maritime-knowledge-quiz-272&id=4794765&ew=900"

allow="camera *; microphone *; fullscreen"

allowfullscreen>

</iframe>



</div>




<a href="{{ route('quiz.index') }}"

class="back">

← Back to Quiz List

</a>




</div>


</div>


</body>


</html>