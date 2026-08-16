<!DOCTYPE html>
<html>

<head>

<title>Edit Module</title>


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



.container{


    width:700px;

    margin:auto;

    background:white;

    padding:40px;

    border-radius:25px;

    box-shadow:
    0 10px 25px rgba(0,0,0,.12);

}




h1{

    font-size:32px;

    margin-bottom:25px;

    color:#0f172a;

}



label{

    display:block;

    font-weight:700;

    margin-top:18px;

}



input,
textarea{


    width:100%;

    padding:13px;

    margin-top:8px;

    border-radius:12px;

    border:1px solid #cbd5e1;

    font-size:15px;

}



textarea{

    height:140px;

    resize:none;

}





/* CURRENT IMAGE */

.current-image{


    margin-top:15px;

}



.current-image img{


    width:220px;

    height:140px;

    object-fit:cover;

    border-radius:15px;

    border:1px solid #dbeafe;

}





small{

    display:block;

    margin-top:8px;

    color:#64748b;

}





/* ERROR */


.error-box{


    background:#fee2e2;

    color:#991b1b;

    padding:15px;

    border-radius:12px;

    margin-bottom:20px;

}





/* BUTTON */


.button-group{


    display:flex;

    gap:15px;

    margin-top:30px;

}



.update-btn{


    background:#0284c7;

    color:white;

    border:none;

    padding:13px 30px;

    border-radius:10px;

    font-weight:700;

    cursor:pointer;

}



.update-btn:hover{


    background:#0369a1;

}





.back-btn{


    background:#111827;

    color:white;

    padding:13px 30px;

    border-radius:10px;

    text-decoration:none;

    font-weight:700;

}



.back-btn:hover{


    background:#000;

}




</style>


</head>



<body>



<div class="container">





<h1>

⚓ Edit Module

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

action="{{ route('modules.update',$module->id) }}"

method="POST"

enctype="multipart/form-data">



@csrf

@method('PUT')








<label>

Module Title

</label>


<input

type="text"

name="title"

value="{{ $module->title }}"

required>










<label>

Category

</label>


<input

type="text"

name="category"

value="{{ $module->category }}"

required>









<!-- IMAGE -->


<label>

Module Image

</label>



@if($module->image)


<div class="current-image">


<p>

Current Image:

</p>



<img

src="{{ asset('uploads/modules/'.$module->image) }}"

alt="Module Image">


</div>


@endif






<input

type="file"

name="image"

accept="image/*">



<small>

Leave empty if you don't want to change the current image.

</small>









<label>

Description

</label>


<textarea

name="description"

required>{{ $module->description }}</textarea>









<label>

Function

</label>


<textarea

name="function"

required>{{ $module->function }}</textarea>









<div class="button-group">



<button

type="submit"

class="update-btn">


💾 Update Module


</button>






<a

href="{{ route('modules.index') }}"

class="back-btn">


← Back


</a>



</div>








</form>






</div>



</body>


</html>