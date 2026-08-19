<!DOCTYPE html>
<html>

<head>

<title>Edit Equipment</title>

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

    box-shadow:0 10px 25px #ddd;

}



h1{

    color:#0f172a;

}



label{

    font-weight:600;

    display:block;

    margin-top:15px;

}



input,
textarea,
select{

    width:100%;

    padding:12px;

    margin-top:8px;

    border-radius:10px;

    border:1px solid #ddd;

    font-size:15px;

}



textarea{

    height:120px;

}



img{

    width:180px;

    height:120px;

    object-fit:contain;

    border-radius:10px;

    background:#f8fafc;

}



button{

    margin-top:20px;

    background:#0284c7;

    color:white;

    border:none;

    padding:12px 25px;

    border-radius:10px;

    cursor:pointer;

    font-size:15px;

    font-weight:600;

}



button:hover{

    background:#0369a1;

}




.back-btn {

    display:inline-flex;

    align-items:center;

    justify-content:center;

    background:#111827;

    color:white;

    padding:12px 30px;

    border-radius:8px;

    text-decoration:none;

    font-weight:bold;

    margin-left:15px;

}



.back-btn:hover {

    background:#000;

}



.error-box{

    background:#fee2e2;

    color:#991b1b;

    padding:15px;

    border-radius:10px;

    margin-bottom:20px;

}



</style>


</head>


<body>


<div class="container">



<h1>
⚓ Edit Equipment
</h1>



@if($errors->any())

<div class="error-box">

<ul>

@foreach($errors->all() as $error)

<li>
{{ $error }}
</li>

@endforeach

</ul>

</div>

@endif





<form 

action="{{ route('admin.equipment.update',$equipment->id) }}"

method="POST"

enctype="multipart/form-data">



@csrf

@method('PUT')





<label>
Module
</label>


<select name="module_id" required>


<option value="">
-- Select Module --
</option>



@foreach($modules as $module)


<option

value="{{ $module->id }}"

{{ $equipment->module_id == $module->id ? 'selected' : '' }}

>

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

value="{{ $equipment->name }}"

required>








<label>
Description
</label>


<textarea

name="description"

required>{{ $equipment->description }}</textarea>








<label>
Function
</label>


<textarea

name="function"

required>{{ $equipment->function }}</textarea>









@if($equipment->image)


<label>
Current Image
</label>


<br><br>


<img

src="{{ (str_starts_with($equipment->image, 'http://') || str_starts_with($equipment->image, 'https://'))
    ? $equipment->image
    : asset('uploads/equipment/' . $equipment->image) }}"



@endif







<label>
Change Equipment Image
</label>


<input

type="file"

name="image"

accept="image/*">








<label>
AR Reality File
</label>


<input

type="file"

name="model_file">






@if($equipment->model_file)


<p>

<b>Current AR File:</b>

{{ $equipment->model_file }}

</p>


@endif






<button type="submit">

💾 Update Equipment

</button>



<a href="{{ route('admin.equipment.index') }}"

class="back-btn">

← Back

</a>




</form>



</div>



</body>

</html>