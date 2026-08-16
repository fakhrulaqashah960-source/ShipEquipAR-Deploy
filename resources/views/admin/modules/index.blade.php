<!DOCTYPE html>
<html>

<head>

<title>Module Management</title>

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

.button-group{

display:flex;
gap:20px;
margin-bottom:30px;

}


.add-btn{

padding:13px 25px;
border-radius:10px;
background:#0284c7;
color:white;
text-decoration:none;
font-weight:600;

}


.add-btn:hover{

background:#0369a1;

}



/* CARD */

.card{

background:white;
padding:30px;
margin-bottom:25px;
border-radius:22px;
box-shadow:0 8px 20px rgba(0,0,0,.12);

}



.card img{

width:220px;
height:170px;
object-fit:cover;
border-radius:15px;
margin-bottom:20px;

}



.card h2{

font-size:30px;
margin-bottom:10px;

}



.category{

color:#0284c7;
font-weight:700;
margin-bottom:20px;

}



.card h3{

margin-top:20px;
margin-bottom:8px;

}



.card p{

color:#475569;
line-height:1.7;

}




/* BUTTON */

.actions{

margin-top:25px;

}



.btn{

display:inline-block;
padding:11px 18px;
border-radius:10px;
text-decoration:none;
color:white;
font-weight:600;
border:none;
cursor:pointer;
margin-right:8px;

}


.edit{

background:#2563eb;

}



.delete{

background:#dc2626;

}



.view{

background:#0284c7;

}



/* EMPTY */

.empty{

background:white;
padding:40px;
border-radius:20px;
text-align:center;

}



/* BACK */

.back-dashboard{

display:inline-block;
margin-top:40px;
padding:12px 25px;
background:#0f172a;
color:white;
border-radius:12px;
text-decoration:none;

}


.back-dashboard:hover{

background:#0284c7;

}

.view-btn{

display:inline-flex;

align-items:center;

justify-content:center;

gap:8px;

padding:12px 22px;

border-radius:10px;

text-decoration:none;

font-weight:700;

font-size:14px;

color:white;

transition:.3s;

margin-left:10px;

}



.ship-btn{

background:#0284c7;

}



.ship-btn:hover{

background:#0369a1;

transform:translateY(-2px);

}




.equipment-btn{

background:#059669;

}



.equipment-btn:hover{

background:#047857;

transform:translateY(-2px);

}


</style>


</head>



<body>



<div class="header">


<h1>

⚓ ShipEquipAR Learning Management

</h1>


<p>

Manage marine learning modules

</p>


</div>





<div class="button-group">


<a href="/admin/modules/create"
class="add-btn">

+ Add Module

</a>


</div>








@if(count($modules)==0)


<div class="empty">

<h2>
No Module Available
</h2>


<p>
Please add new learning module.
</p>


</div>


@endif







@foreach($modules as $module)



<div class="card">



@if($module->image)

<img 

src="{{ asset('uploads/modules/'.$module->image) }}"

style="
width:220px;
height:140px;
object-fit:cover;
border-radius:15px;
">


@endif




<h2>

{{ $module->title }}

</h2>



<p class="category">

📚 {{ $module->category }}

</p>





<h3>

Description

</h3>


<p>

{{ $module->description }}

</p>





<h3>

Function

</h3>


<p>

{{ $module->function }}

</p>







<div class="actions">



<a href="/admin/modules/{{ $module->id }}/edit"
class="btn edit">

✏ Edit

</a>






<form action="/admin/modules/{{ $module->id }}"
method="POST"
style="display:inline">


@csrf

@method('DELETE')


<button class="btn delete"
onclick="return confirm('Delete module?')">

🗑 Delete

</button>


</form>



@if($module->category == 'Cargo & Freight Ships')

<a href="{{ route('admin.module.equipment',$module->id) }}"
class="view-btn ship-btn">

🚢 View Ship

</a>


@elseif($module->category == 'PPE')


<a href="{{ route('admin.module.equipment',$module->id) }}"
class="view-btn equipment-btn">

⚓ View Equipment

</a>


@else


<a href="{{ route('admin.module.equipment',$module->id) }}"
class="view-btn">

📚 View Content

</a>


@endif


</div>





</div>





@endforeach







<a href="{{ route('admin.dashboard') }}"
class="back-dashboard">

← Back to Dashboard

</a>





</body>

</html>