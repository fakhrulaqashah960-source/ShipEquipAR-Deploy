<!DOCTYPE html>
<html>

<head>

<title>
Add Equipment
</title>


<style>

body{

font-family:'Segoe UI';

background:#f1f5f9;

padding:40px;

}


.container{

background:white;

padding:30px;

border-radius:20px;

width:700px;

margin:auto;

}


input,textarea,select{

width:100%;

padding:12px;

margin:10px 0;

border-radius:10px;

border:1px solid #ddd;

}


button{

background:#0284c7;

color:white;

border:none;

padding:12px 25px;

border-radius:10px;

}

.button-group{
    display:flex;
    align-items:center;
    gap:20px;
    margin-top:25px;
}


button{
    background:#0284c7;
    color:white;
    border:none;
    padding:12px 25px;
    border-radius:10px;
    cursor:pointer;
    font-size:15px;
    font-weight:bold;
}


.back-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    background:#111827;
    color:white;
    padding:12px 30px;
    border-radius:10px;
    text-decoration:none;
    font-weight:bold;
}


.back-btn:hover{
    background:#000;
}

</style>

</head>



<body>


<div class="container">


<h1>
Add Equipment
</h1>



<form action="{{ route('admin.equipment.store') }}"
method="POST"
enctype="multipart/form-data">


@csrf



<label>
Select Module
</label>


<select name="module_id" required>


@foreach($modules as $module)

<option value="{{ $module->id }}">

{{ $module->title }}

</option>

@endforeach


</select>





<label>
Equipment Name
</label>


<input 
type="text"
name="name"
required>





<label>
Equipment Image
</label>


<input
type="file"
name="image"
accept="image/*">






<label>
Description
</label>


<textarea
name="description"
required></textarea>






<label>
Function
</label>


<textarea
name="function"
required></textarea>







<label>
AR Reality File
</label>


<input
type="file"
name="model_file"
accept=".reality">



<div class="button-group">

    <button type="submit">
        💾 Save Equipment
    </button>


    <a href="{{ route('admin.equipment.index') }}" class="back-btn">
        ← Back
    </a>

</div>



</form>


</div>


</body>


</html>