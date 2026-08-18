<!DOCTYPE html>
<html>

<head>

<title>
{{ $course->title }}
</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>

body{

font-family:Segoe UI;
background:#f1f5f9;
padding:40px;

}


.container{

max-width:1000px;
margin:auto;

}



.course-header{

background:white;
padding:35px;
border-radius:20px;
box-shadow:0 8px 20px rgba(0,0,0,0.08);
margin-bottom:30px;

}


.course-header h1{

font-size:32px;
color:#0f172a;

}



.course-header p{

color:#64748b;
font-size:16px;

}




.section-title{

font-size:25px;
margin-bottom:20px;

}




.lesson-card{

background:white;
padding:25px;
border-radius:18px;
margin-bottom:20px;

box-shadow:0 5px 15px rgba(0,0,0,0.08);

transition:.3s;

}



.lesson-card:hover{

transform:translateY(-5px);

}




.lesson-card h3{

color:#0369a1;
font-size:22px;

}



.lesson-content{

color:#475569;
line-height:1.6;

}




.info{

display:flex;
gap:20px;
margin-top:15px;
color:#64748b;
font-size:14px;

}




.btn{


display:inline-block;
margin-top:20px;

background:#0284c7;
color:white;

padding:12px 25px;

border-radius:10px;

text-decoration:none;

font-weight:bold;


}



.btn:hover{

background:#0369a1;

}



</style>


</head>


<body>


<div class="container">



<div class="course-header">


<h1>
📘 {{ $course->title }}
</h1>


<p>
{{ $course->description }}
</p>


</div>





<h2 class="section-title">
📚 Course Lessons
</h2>





@foreach($course->lessons as $lesson)



<div class="lesson-card">


<h3>

{{ $lesson->title }}

</h3>



<p class="lesson-content">

{{ $lesson->content }}

</p>




<div class="info">

<span>
🎬 Video Lesson
</span>


<span>
⏱ {{ $lesson->duration ?? '10 min' }}
</span>


</div>





<a class="btn"

href="{{ url('/lesson/'.$lesson->id) }}">

▶ Start Lesson

</a>




</div>



@endforeach





</div>


</body>


</html>