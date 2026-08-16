<!DOCTYPE html>
<html>

<head>

<title>
View Ship
</title>


<style>

body{

font-family:'Segoe UI';

background:#eef6fb;

padding:40px;

}


.card{

background:white;

padding:35px;

border-radius:20px;

max-width:800px;

margin:auto;

box-shadow:0 10px 25px rgba(0,0,0,.15);

}


img{

width:300px;

border-radius:15px;

}


h1{

color:#0284c7;

}


p{

font-size:18px;

color:#475569;

}


.btn{

display:inline-block;

margin-top:20px;

padding:12px 25px;

background:#0f172a;

color:white;

border-radius:10px;

text-decoration:none;

}


</style>


</head>


<body>


<div class="card">


<h1>

🚢 {{ $ship->name }}

</h1>



@if($ship->image)

<img src="{{ asset('uploads/ships/'.$ship->image) }}">

@endif



<h2>
Description
</h2>


<p>

{{ $ship->description }}

</p>



<h2>
AR Model File
</h2>


<p>

📦 {{ $ship->ar_model }}

</p>



<a href="{{ route('admin.ships.index') }}"
class="btn">

← Back

</a>


</div>


</body>

</html>