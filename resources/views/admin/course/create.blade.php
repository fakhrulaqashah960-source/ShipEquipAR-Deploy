<!DOCTYPE html>
<html>

<head>

<title>
Create Course
</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>

body{

font-family:'Segoe UI';
background:#f1f5f9;
padding:40px;

}


.container{

width:700px;
margin:auto;
background:white;
padding:35px;
border-radius:20px;
box-shadow:0 10px 25px rgba(0,0,0,.1);

}



h1{

color:#0f172a;

}



label{

font-weight:600;
display:block;
margin-top:15px;

}



input,textarea{

width:100%;
padding:12px;
margin-top:8px;
border-radius:10px;
border:1px solid #ddd;
font-size:15px;

}



textarea{

height:150px;

}



button{

margin-top:20px;
background:#0284c7;
color:white;
border:none;
padding:12px 25px;
border-radius:10px;
cursor:pointer;

}



.back{

margin-left:10px;
text-decoration:none;
color:#0284c7;

}


</style>


</head>


<body>


<div class="container">


<h1>
📚 Create Course
</h1>



<form action="/admin/course" method="POST">


@csrf



<label>
Course Title
</label>


<input
type="text"
name="title"
placeholder="Enter course title"
required>




<label>
Course Description
</label>


<textarea
name="description"
placeholder="Enter course description"
required></textarea>




<button>

Save Course

</button>



<a class="back"
href="/admin/course">

Back

</a>



</form>



</div>



</body>


</html>