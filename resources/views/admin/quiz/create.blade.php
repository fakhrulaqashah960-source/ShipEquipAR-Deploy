<!DOCTYPE html>
<html>

<head>

<title>Add Quiz</title>


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

}



.container{


background:white;

max-width:700px;

margin:auto;

padding:40px;

border-radius:25px;

box-shadow:0 10px 25px rgba(0,0,0,.15);

}



h1{

font-size:35px;

margin-bottom:30px;

}



label{

font-weight:700;

display:block;

margin-top:20px;

}



input,
textarea,
select{


width:100%;

padding:14px;

margin-top:8px;

border:1px solid #cbd5e1;

border-radius:10px;

}



textarea{

height:120px;

}




button{


margin-top:30px;

padding:14px 30px;

background:#0284c7;

color:white;

border:none;

border-radius:12px;

font-weight:700;

cursor:pointer;

}



.back{


margin-left:10px;

background:#64748b;

padding:14px 30px;

color:white;

text-decoration:none;

border-radius:12px;

font-weight:700;

}



</style>


</head>



<body>


<div class="container">


<h1>

📄 Add New Quiz

</h1>




<form method="POST"
action="{{ route('admin.quiz.store') }}">


@csrf




<label>

Quiz Title

</label>


<input

type="text"

name="title"

placeholder="Example: PPE Assessment"

>




<label>

Description

</label>


<textarea

name="description"

placeholder="Quiz description">

</textarea>





<label>

Google Form URL

</label>


<input

type="text"

name="google_form_url"

placeholder="https://forms.google.com/..."

>






<label>

Platform

</label>


<select name="platform">


<option value="Google Forms">

Google Forms

</option>


</select>






<label>

Passing Score

</label>


<input

type="number"

name="passing_score"

value="80"

>




<label>

Status

</label>


<select name="status">


<option value="Active">

Active

</option>


<option value="Inactive">

Inactive

</option>


</select>





<button>

Save Quiz

</button>



<a href="{{ route('admin.quiz.index') }}"
class="back">

Back

</a>



</form>



</div>


</body>

</html>