<!DOCTYPE html>
<html>

<head>

<title>Edit Ship</title>


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

    padding:35px;

    border-radius:25px;

    box-shadow:0 10px 25px rgba(0,0,0,.08);

    border:1px solid #e2e8f0;

}



h1{

    font-size:32px;

    font-weight:800;

    margin-bottom:30px;

    display:flex;

    align-items:center;

    gap:12px;

}



label{

    display:block;

    font-weight:700;

    margin-top:18px;

    margin-bottom:8px;

}



input,
textarea{


    width:100%;

    padding:14px;

    border-radius:12px;

    border:1px solid #cbd5e1;

    font-size:15px;

}



textarea{

    height:150px;

    resize:none;

}



input:focus,
textarea:focus{

    outline:none;

    border-color:#0284c7;

}




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

    text-decoration:none;

    padding:13px 30px;

    border-radius:10px;

    font-weight:700;

}



.back-btn:hover{

    background:black;

}



.error-box{

    background:#fee2e2;

    color:#991b1b;

    padding:15px;

    border-radius:12px;

    margin-bottom:20px;

}


</style>


</head>


<body>



<div class="container">



<h1>

⚓ Edit Ship

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






<form action="{{ route('admin.ships.update',$ship->id) }}"

method="POST">


@csrf

@method('PUT')




<label>

Ship Name

</label>


<input

type="text"

name="name"

value="{{ $ship->name }}"

required>





<label>

Description

</label>



<textarea

name="description"

required>{{ $ship->description }}</textarea>







<div class="button-group">



<button

type="submit"

class="update-btn">

💾 Update Ship

</button>





<a href="{{ route('admin.ships.index') }}"

class="back-btn">

← Back

</a>



</div>





</form>



</div>



</body>

</html>