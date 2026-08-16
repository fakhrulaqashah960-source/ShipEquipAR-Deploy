<!DOCTYPE html>
<html>

<head>

<title>
Type of Ship Management
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

color:#0f172a;

}


/* HEADER */

.header{

background:white;

padding:35px;

border-radius:25px;

box-shadow:0 10px 25px rgba(0,0,0,.12);

margin-bottom:25px;

}


.header h1{

font-size:38px;

font-weight:800;

}


.header p{

margin-top:10px;

color:#64748b;

}





/* BUTTON */

.add-btn{

display:inline-block;

background:#0284c7;

color:white;

padding:13px 25px;

border-radius:10px;

text-decoration:none;

font-weight:600;

margin-bottom:30px;

}



.add-btn:hover{

background:#0369a1;

}





/* CARD */


.card{

background:white;

padding:30px;

border-radius:22px;

margin-bottom:25px;

box-shadow:0 10px 25px rgba(0,0,0,.12);

}





.card img{

width:250px;

height:160px;

object-fit:cover;

border-radius:15px;

margin-bottom:20px;

}





.card h2{

font-size:30px;

margin-bottom:15px;

}



.card p{

color:#64748b;

line-height:1.7;

}





.ar{

margin-top:15px;

font-weight:600;

color:#0284c7;

}





.actions{

margin-top:25px;

}



.btn{

display:inline-block;

padding:11px 20px;

border-radius:10px;

color:white;

text-decoration:none;

font-weight:600;

margin-right:10px;

}



.view{

background:#0284c7;

}



.edit{

background:#2563eb;

}



.delete{

background:#dc2626;

}



button{

border:none;

cursor:pointer;

}





.empty{

background:white;

padding:40px;

border-radius:20px;

text-align:center;

}


.back{

display:inline-block;

margin-top:30px;

padding:12px 25px;

background:#0f172a;

color:white;

border-radius:10px;

text-decoration:none;

}


</style>


</head>


<body>



<div class="header">


<h1>

🚢 Type of Ship Management

</h1>


<p>

Manage ship categories and AR learning models

</p>


</div>





<a href="{{ route('admin.ships.create') }}"
class="add-btn">

+ Add Ship

</a>






@if($ships->count()==0)


<div class="empty">

<h2>
No Ship Type Available
</h2>

<p>
Please add ship category.
</p>

</div>


@endif







@foreach($ships as $ship)


<div class="card">


@if($ship->image)

<img src="{{ asset('uploads/ships/'.$ship->image) }}">

@endif



<h2>

🚢 {{ $ship->name }}

</h2>


<p>

{{ $ship->description }}

</p>



<p>

📦 AR Model:

{{ $ship->ar_model }}

</p>




<a href="{{ route('admin.ships.edit',$ship->id) }}"
class="btn edit">

✏ Edit

</a>





<form action="{{ route('admin.ships.destroy',$ship->id) }}"
method="POST"
style="display:inline">


@csrf

@method('DELETE')


<button class="btn delete">

🗑 Delete

</button>


</form>


</div>


@endforeach





<a href="{{ route('admin.dashboard') }}"
class="back">

← Back Dashboard

</a>




</body>

</html>