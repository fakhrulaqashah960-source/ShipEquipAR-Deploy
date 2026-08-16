<!DOCTYPE html>
<html>

<head>

<title>
Add Type of Ship
</title>


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

padding:35px;

border-radius:25px;

box-shadow:0 10px 25px rgba(0,0,0,.15);

}



h1{

font-size:35px;

margin-bottom:25px;

color:#0f172a;

}




label{

font-weight:600;

display:block;

margin-bottom:8px;

}





input,
textarea,
select{


width:100%;

padding:12px;

margin-bottom:20px;

border-radius:10px;

border:1px solid #cbd5e1;

font-size:15px;

}




textarea{

height:120px;

resize:none;

}




button{


background:#0284c7;

color:white;

padding:13px 25px;

border:none;

border-radius:10px;

font-weight:600;

cursor:pointer;

}



button:hover{

background:#0369a1;

}




.back{


margin-left:10px;

padding:13px 25px;

background:#0f172a;

color:white;

text-decoration:none;

border-radius:10px;

}




.back:hover{

background:#020617;

}



</style>


</head>


<body>




<div class="container">



<h1>

🚢 Add Type of Ship

</h1>





<form method="POST"

action="{{ route('admin.ships.store') }}"

enctype="multipart/form-data">


@csrf





<!-- LEARNING MODULE -->

<label>

Learning Module

</label>


<!-- SHIP NAME -->


<label>

Ship Name

</label>


<input

type="text"

name="name"

placeholder="Example: Container Vessel"

required>







<!-- SHIP IMAGE -->


<label>

Ship Image

</label>


<input

type="file"

name="image"

accept="image/*">








<!-- REALITY FILE -->


<label>

AR Reality File

</label>


<input

type="file"

name="ar_model"

accept=".reality">





<p style="
font-size:14px;
color:#64748b;
margin-top:-15px;
margin-bottom:20px;
">

Upload Reality Composer file (.reality) for AR viewing

</p>




<!-- DESCRIPTION -->


<label>

Description

</label>


<textarea

name="description"

placeholder="Enter ship description">

</textarea>








<button>

💾 Save Ship Type

</button>





<a href="{{ route('admin.ships.index') }}"

class="back">

← Back

</a>




</form>




</div>





</body>


</html>