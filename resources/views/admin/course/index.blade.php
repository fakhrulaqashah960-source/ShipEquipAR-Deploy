<!DOCTYPE html>
<html>

<head>

<title>
Course Management
</title>


<style>

body{

font-family:'Segoe UI';
background:#f1f5f9;
padding:40px;

}


.card{

background:white;
padding:25px;
border-radius:20px;
margin-bottom:20px;

}



.btn{

background:#0284c7;
color:white;
padding:10px 20px;
border-radius:10px;
text-decoration:none;

}


.edit{

background:#2563eb;

}


.delete{

background:#dc2626;
color:white;
border:none;
padding:10px;

}


</style>

</head>


<body>


<h1>
📚 Course Management
</h1>


<a class="btn"
href="/admin/course/create">

+ Add Course

</a>



<br><br>



@foreach($courses as $course)



<div class="card">


<h2>

{{ $course->title }}

</h2>



<p>

{{ $course->description }}

</p>



<a class="btn edit"

href="/admin/course/{{ $course->id }}/edit">

Edit

</a>

<a href="/admin/lesson/create?course={{$course->id}}"
style="
background:#0284c7;
color:white;
padding:8px 15px;
border-radius:8px;
text-decoration:none;
margin-left:10px;
">

🎥 Add Lesson

</a>


<form
method="POST"
action="/admin/course/{{ $course->id }}"
style="display:inline">


@csrf

@method('DELETE')


<button class="delete">

Delete

</button>


</form>


</div>



@endforeach



</body>

</html>