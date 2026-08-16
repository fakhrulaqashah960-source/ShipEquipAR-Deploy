<!DOCTYPE html>
<html>


<head>

<title>
Lesson
</title>


<style>


body{

font-family:'Segoe UI';

background:#f1f5f9;

padding:40px;

}



.container{

max-width:900px;

margin:auto;

background:white;

padding:35px;

border-radius:20px;


}



.video iframe{

width:100%;

height:450px;

border-radius:15px;

}



.btn{

display:inline-block;

background:#0284c7;

color:white;

padding:12px 25px;

border-radius:10px;

text-decoration:none;

margin-top:20px;

}



</style>


</head>


<body>


<div class="container">


<h1>

🎥 {{ $lesson->title }}

</h1>



<p>

{{ $lesson->content }}

</p>




<div class="video">


<iframe

src="{{ $lesson->video }}"

allowfullscreen>

</iframe>


</div>




<a 

href="#"

class="btn"

>

✅ Video Completed - Start Quiz

</a>




</div>



</body>

</html>