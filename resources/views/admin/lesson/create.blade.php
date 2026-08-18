<!DOCTYPE html>

<html>

<head>

<title>
Add Lesson
</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>

body{

font-family:'Segoe UI';

background:#f1f5f9;

padding:40px;

}


.container{

background:white;

width:700px;

margin:auto;

padding:30px;

border-radius:20px;

}


input,textarea{

width:100%;

padding:12px;

margin-bottom:15px;

border-radius:10px;

border:1px solid #ddd;

}


textarea{

height:120px;

}


button{

background:#0284c7;

color:white;

padding:12px 25px;

border:none;

border-radius:10px;

cursor:pointer;

}

</style>


</head>


<body>


<div class="container">


<h1>
🎥 Add Lesson
</h1>


<form action="/admin/lesson" method="POST">


@csrf



<input 
type="hidden"
name="course_id"
value="{{ $course->id }}">



<label>
Lesson Title
</label>

<input
type="text"
name="title"
placeholder="Introduction To PPE Video">



<label>
Video URL
</label>

<input
type="text"
name="video"
placeholder="Youtube embed link">



<label>
Duration
</label>

<input
type="text"
name="duration"
placeholder="15 Minutes">



<label>
Content
</label>

<textarea
name="content"
placeholder="Lesson description">
</textarea>



<button>

Save Lesson

</button>


</form>


</div>


</body>


</html>