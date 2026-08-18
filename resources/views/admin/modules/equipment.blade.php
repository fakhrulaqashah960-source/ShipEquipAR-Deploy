<!DOCTYPE html>
<html>

<head>

<title>
Module Equipment
</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>

body{

    font-family:'Segoe UI',sans-serif;
    background:#f1f5f9;
    padding:40px;

}


.container{

    max-width:1000px;
    margin:auto;
    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,.1);

}


h1{

    color:#0284c7;
    margin-bottom:10px;

}


.module-info{

    color:#475569;
    margin-bottom:25px;

}



.grid{

    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;

}



.card{

    background:#f8fafc;
    padding:20px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);

}



.card img{

    width:100%;
    height:160px;
    object-fit:contain;
    border-radius:10px;

}



.card h2{

    color:#0284c7;
    font-size:18px;
    margin-top:15px;

}



.card p{

    color:#475569;
    font-size:14px;
    line-height:1.6;

}



.back{

    display:inline-block;
    margin-top:25px;
    padding:10px 18px;
    background:#0284c7;
    color:white;
    text-decoration:none;
    border-radius:10px;

}



.back:hover{

    background:#0369a1;

}


</style>


</head>


<body>


<div class="container">


<h1>
⚓ {{$module->title}} 
</h1>


<p class="module-info">

{{$module->description}}

</p>



<div class="grid">


@foreach($equipments as $equipment)


<div class="card">


@if($equipment->image)

<img src="{{asset('uploads/equipment/'.$equipment->image)}}">

@endif



<h2>

{{$equipment->name}}

</h2>



<p>

<strong>Description</strong><br>

{{$equipment->description}}

</p>



<p>

<strong>Function</strong><br>

{{$equipment->function}}

</p>



</div>


@endforeach


</div>



<a href="{{route('modules.index')}}" class="back">

← Back

</a>



</div>


</body>

</html>