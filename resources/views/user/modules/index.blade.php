<!DOCTYPE html>
<html>

<head>

<title>
Learning Module
</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>

body{

background:#eef6fb;
font-family:'Segoe UI',sans-serif;
padding:40px;

}


.container{

max-width:1200px;
margin:auto;

}


.title{

background:white;
padding:35px;
border-radius:25px;
box-shadow:0 10px 25px rgba(0,0,0,.1);

}


.title h1{

font-size:38px;

}



.grid{

margin-top:30px;

display:grid;

grid-template-columns:repeat(3,1fr);

gap:25px;

}



.card{

background:white;
padding:30px;
border-radius:20px;
box-shadow:0 10px 20px rgba(0,0,0,.1);

}



.card h2{

color:#0284c7;

}



.card p{

color:#64748b;

}



.btn{

display:inline-block;

margin-top:20px;

background:#0284c7;

color:white;

padding:12px 25px;

border-radius:10px;

text-decoration:none;

}


</style>

</head>



<body>


<div class="container">


<div class="title">


<h1>
⚓ ShipEquipAR Learning Module
</h1>


<p>
Explore maritime knowledge and AR learning content
</p>


</div>




<div class="grid">


@foreach($modules as $module)


<div class="card">


<h2>

{{ $module->title }}

</h2>



<p>

📚 {{ $module->category }}

</p>



<p>

{{ $module->description }}

</p>



<a href="{{ route('learning.show',$module->id) }}"
class="btn">

Start Learning

</a>


</div>


@endforeach



</div>



</div>


</body>

</html>