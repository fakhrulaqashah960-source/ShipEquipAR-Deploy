<!DOCTYPE html>
<html>

<head>

<title>
Add Module Notes
</title>


<style>

body{

font-family:'Segoe UI',sans-serif;
background:#f1f5f9;
padding:40px;

}


.container{

max-width:700px;
margin:auto;
background:white;
padding:35px;
border-radius:20px;
box-shadow:0 10px 25px rgba(0,0,0,.1);

}


h1{

color:#0284c7;
margin-bottom:25px;

}


label{

display:block;
font-weight:600;
margin-top:15px;

}


input,
select,
textarea{

width:100%;
padding:12px;
margin-top:8px;
border-radius:10px;
border:1px solid #cbd5e1;

}


textarea{

height:180px;

}



button{

margin-top:25px;
background:#0284c7;
color:white;
padding:12px 25px;
border:none;
border-radius:10px;
font-weight:600;
cursor:pointer;

}


button:hover{

background:#0369a1;

}


.back{

display:inline-block;
margin-top:20px;
color:#0284c7;
text-decoration:none;

}

.back-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    background: #111827;
    color: white;

    padding: 12px 28px;

    border-radius: 10px;

    font-size: 15px;
    font-weight: 600;

    text-decoration: none;

    margin-left: 10px;

    transition: 0.3s ease;
}


</style>

</head>


<body>


<div class="container">


<h1>
📘 Add Module Notes
</h1>



<form method="POST"
action="{{ route('admin.notes.store') }}"
enctype="multipart/form-data">

@csrf



<label>
Select Module
</label>


<select name="module_id" required>


<option value="">
-- Select Module --
</option>


@foreach($modules as $module)


<option value="{{$module->id}}">

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
placeholder="Example: Introduction to PPE"
required>





<label>
Short Description
</label>


<textarea 
name="content"
rows="8"
placeholder="Write module notes here..."
required></textarea>





<label>
Notes Content
</label>


<textarea
name="content"
placeholder="Write learning notes here..."
required></textarea>





<label>
Upload PDF (Optional)
</label>


<input
type="file"
name="pdf"
accept=".pdf">





<button type="submit">

💾 Save Notes

</button>




<a href="{{ route('admin.notes.index') }}" class="back-btn">
    ← Back
</a>



</form>



</div>


</body>

</html>