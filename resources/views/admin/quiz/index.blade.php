<!DOCTYPE html>
<html>

<head>

<title>Manage Quiz</title>


<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}


body{

background:#eef6fb;
padding:40px;
color:#0f172a;

}



.header{

background:white;

padding:35px;

border-radius:25px;

box-shadow:0 10px 25px rgba(0,0,0,.12);

margin-bottom:30px;

}



.header h1{

font-size:38px;

font-weight:900;

}



.header p{

margin-top:10px;

color:#64748b;

}




.add-btn{

display:inline-block;

background:#0284c7;

color:white;

padding:13px 25px;

border-radius:12px;

text-decoration:none;

font-weight:700;

margin-bottom:30px;

}




.card{

background:white;

padding:30px;

border-radius:25px;

box-shadow:0 10px 25px rgba(0,0,0,.12);

margin-bottom:25px;

}



.card h2{

color:#0284c7;

font-size:28px;

margin-bottom:15px;

}



.info{

line-height:2;

color:#475569;

}



.btn{

display:inline-block;

padding:12px 25px;

border-radius:10px;

text-decoration:none;

color:white;

font-weight:700;

margin-top:20px;

margin-right:10px;

}



.open{

background:#0284c7;

}



.delete{

background:#dc2626;

border:none;

cursor:pointer;

}



.empty{

background:white;

padding:40px;

border-radius:20px;

text-align:center;

}



</style>

</head>


<body>



<div class="header">


<h1>

📄 Manage Quiz

</h1>


<p>

Manage external quiz assessment for ShipEquipAR learning platform.

</p>


</div>





<a href="{{ route('admin.quiz.create') }}"
class="add-btn">

+ Add Quiz

</a>






@if($quizzes->count()==0)


<div class="empty">

<h2>

No Quiz Available

</h2>

</div>


@endif






@foreach($quizzes as $quiz)



<div class="card">



<h2>

{{ $quiz->title }}

</h2>



<div class="info">


<p>

📚 Description:

{{ $quiz->description }}

</p>



<p>

🌐 Platform:

{{ $quiz->platform }}

</p>




<p>

🎯 Passing Score:

{{ $quiz->passing_score }}%

</p>




<p>

Status:

{{ $quiz->status }}

</p>



</div>

<a href="{{ $quiz->google_form_url }}"
class="btn open">

Open Quiz

</a>


<form

action="{{ route('admin.quiz.destroy',$quiz->id) }}"

method="POST"

style="display:inline">


@csrf

@method('DELETE')


<button

class="btn delete"

onclick="return confirm('Delete quiz?')">

Delete

</button>


</form>




</div>



@endforeach




</body>

</html>