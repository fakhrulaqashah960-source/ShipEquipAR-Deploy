<!DOCTYPE html>
<html>

<head>

<title>Equipment Management</title>


<style>

body{

    font-family:'Segoe UI',sans-serif;
    background:#f1f5f9;
    padding:40px;

}


.container{

    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,.1);

}



h1{

    color:#0f172a;

}



.add-btn{

    display:inline-block;
    background:#0284c7;
    color:white;
    padding:12px 20px;
    border-radius:10px;
    text-decoration:none;
    margin-bottom:20px;

}



hr{

    border:none;
    border-top:1px solid #ddd;

}



.card{

    background:#ffffff;
    border:1px solid #ddd;
    padding:25px;
    margin-bottom:20px;
    border-radius:15px;

}



.card h2{

    color:#0f172a;
    margin-bottom:15px;

}



.card p{

    color:#475569;
    line-height:1.6;

}



.image{

    width:180px;
    height:120px;
    object-fit:contain;
    border-radius:10px;
    background:#f8fafc;

}



.edit{

    background:#2563eb;
    color:white;
    padding:8px 15px;
    border-radius:8px;
    text-decoration:none;

}



.delete{

    background:#dc2626;
    color:white;
    padding:8px 15px;
    border:none;
    border-radius:8px;
    cursor:pointer;

}

.edit-btn{

display:inline-flex;
align-items:center;
justify-content:center;

background:#2563eb;
color:white;

padding:10px 20px;

border-radius:8px;

text-decoration:none;

font-weight:bold;

font-size:14px;

}



.edit-btn:hover{

background:#1d4ed8;

}



.delete-btn{

background:#dc2626;

color:white;

border:none;

padding:10px 20px;

border-radius:8px;

font-weight:bold;

font-size:14px;

cursor:pointer;

margin-left:8px;

}



.delete-btn:hover{

background:#b91c1c;

}

.back-dashboard{

    display:inline-flex;
    align-items:center;
    justify-content:center;

    background:#111827;
    color:white;

    padding:12px 28px;

    border-radius:10px;

    text-decoration:none;

    font-weight:bold;

    margin-top:30px;

    font-size:15px;

}


.back-dashboard:hover{

    background:#000000;

    color:white;

}

</style>


</head>


<body>


<div class="container">


<h1>
⚓ Equipment Management
</h1>



<a class="add-btn" href="/admin/equipment/create">

+ Add Equipment

</a>



<hr>



@foreach($equipments as $equipment)



<div class="card">



@if($equipment->image)

<img class="image"
src="{{ asset('uploads/equipment/'.$equipment->image) }}">

@endif




<h2>

🪖 {{ $equipment->name }}

</h2>




<p>

<b>Module:</b><br>

{{ $equipment->module->title ?? 'No Module' }}

</p>




<p>

<b>Description:</b><br>

{{ $equipment->description }}

</p>




<p>

<b>Function:</b><br>

{{ $equipment->function }}

</p>




<p>

<b>AR Model:</b><br>

{{ $equipment->model_file ?? 'No AR Model' }}

</p>




<br>



<a href="{{ route('admin.equipment.edit',$equipment->id) }}"
class="edit-btn">

✏️ Edit

</a>


<form action="{{ route('admin.equipment.destroy',$equipment->id) }}"
method="POST"
style="display:inline;">

@csrf
@method('DELETE')


<button type="submit"
class="delete-btn"
onclick="return confirm('Delete this equipment?')">

🗑 Delete

</button>


</form>




</div>



@endforeach

<a href="{{ route('admin.dashboard') }}" class="back-dashboard">
    ← Back to Dashboard
</a>


</div>



</body>


</html>