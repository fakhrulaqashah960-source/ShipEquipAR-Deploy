<!DOCTYPE html>
<html>

<head>

<title>
Edit Module Notes
</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>

body{

font-family:'Segoe UI';
background:#f1f5f9;
padding:40px;

}


.container{

max-width:750px;
margin:auto;
background:white;
padding:35px;
border-radius:25px;
box-shadow:0 10px 30px rgba(0,0,0,0.1);

}



h1{

color:#0284c7;

}



label{

font-weight:bold;
display:block;
margin-top:15px;

}



input,
textarea,
select{

width:100%;
padding:12px;
margin-top:8px;
border:1px solid #cbd5e1;
border-radius:10px;

}



textarea{

height:180px;

}



button{

background:#0284c7;
color:white;
border:none;
padding:12px 25px;
border-radius:10px;
font-weight:bold;
cursor:pointer;
margin-top:20px;

}



.back{

background:#0f172a;
color:white;
padding:12px 25px;
border-radius:10px;
text-decoration:none;
margin-left:10px;

}


.pdf-box{

margin-top:15px;
padding:10px;
background:#f1f5f9;
border-radius:10px;

}

.button-group{

display:flex;
gap:15px;
margin-top:30px;
align-items:center;

}


.update-btn,
.back-btn{

height:45px;
padding:0 28px;

display:flex;
align-items:center;
justify-content:center;

border-radius:10px;

font-size:15px;
font-weight:600;

text-decoration:none;

cursor:pointer;

}


.update-btn{

background:#0284c7;
color:white;
border:none;

}


.update-btn:hover{

background:#0369a1;

}



.back-btn{

background:#0f172a;
color:white;

}


.back-btn:hover{

background:#1e293b;

}

</style>


</head>


<body>


<div class="container">


<h1>
📘 Edit Module Notes
</h1>



<form method="POST" action="{{ route('admin.notes.update',$note->id) }}" enctype="multipart/form-data">


@csrf

@method('PUT')



<label>
Select Module
</label>


<select name="module_id">


@foreach($modules as $module)


<option value="{{$module->id}}"

@if($note->module_id == $module->id)

selected

@endif

>

{{$module->title}}

</option>


@endforeach


</select>




<label>
Note Title
</label>


<input

type="text"

name="title"

value="{{$note->title}}"

required

>




<label>
Short Description
</label>


<textarea name="description">

{{$note->description}}

</textarea>




<label>
Notes Content
</label>


<textarea name="content">

{{$note->content}}

</textarea>




<label>
Replace PDF (Optional)
</label>


<input

type="file"

name="pdf"

accept=".pdf"

>



@if($note->pdf)


<div class="pdf-box">


Current PDF:

<a href="{{asset('storage/'.$note->pdf)}}"
target="_blank">

View PDF

</a>


</div>


@endif




<div class="button-group">

    <button type="submit" class="update-btn">
        💾 Update Notes
    </button>


    <a href="{{ route('admin.notes.index') }}" class="back-btn">
← Back
</a>

</div>



</form>



</div>


</body>

</html>