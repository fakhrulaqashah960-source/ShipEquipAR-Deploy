<!DOCTYPE html>

<html>

<head>

<title>
Add Module
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

url('/images/ship-bg.jpg');


background-size:cover;

background-position:center;

}



.container{

margin-left:250px;

padding:50px;

}



.card{

background:white;

border-radius:25px;

padding:40px;

max-width:900px;

margin:auto;

box-shadow:0 15px 30px rgba(0,0,0,.2);

}



.title{

font-size:35px;

font-weight:800;

color:#0f172a;

margin-bottom:30px;

}



label{

display:block;

font-weight:600;

color:#0f172a;

margin-bottom:8px;

}



input,
textarea{

width:100%;

padding:15px;

border:1px solid #cbd5e1;

border-radius:12px;

margin-bottom:25px;

font-size:15px;

}



textarea{

height:150px;

resize:none;

}




.btn{

padding:13px 25px;

border:none;

border-radius:10px;

cursor:pointer;

font-size:15px;

font-weight:600;

}



.save{

background:#0284c7;

color:white;

}



.back{

background:#64748b;

color:white;

text-decoration:none;

margin-left:10px;

}



</style>


</head>



<body>


<div class="container">


<div class="card">


<div class="title">

⚓ Add New Module

</div>




<form method="POST"

action="{{route('modules.store')}}"

enctype="multipart/form-data">


@csrf



<label>

Module Name

</label>


<input type="text"
name="title"
placeholder="Example: PPE Marine Engineer">





<label>

Category

</label>


<input type="text"
name="category"
placeholder="Example: Safety Equipment">






<label>

Description

</label>


<textarea

name="description"

placeholder="Enter module description">

</textarea>

<label>
Function
</label>

<textarea
name="function"
placeholder="Enter module function">
</textarea>


<label>

Module Image

</label>


<input type="file"
name="image">





<button class="btn save">

Save Module

</button>



<a href="/admin/modules"
class="btn back">

Back

</a>



</form>



</div>


</div>


</body>

</html>