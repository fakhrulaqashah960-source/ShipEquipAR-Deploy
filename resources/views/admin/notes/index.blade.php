<!DOCTYPE html>
<html>

<head>

<title>
Admin Module Notes
</title>


<style>

body{
    background:#f1f5f9;
    font-family:'Segoe UI',sans-serif;
}


.container{

    width:90%;
    margin:40px auto;
    background:white;
    padding:35px;
    border-radius:25px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);

}



table{

    width:100%;
    margin-top:35px;
    border-collapse:collapse;
    overflow:hidden;
    border-radius:15px;

}


thead{

    background:#0284c7;
    color:white;

}


th{

    padding:18px;
    text-align:center;
    font-size:16px;

}


td{

    padding:20px;
    text-align:center;
    border-bottom:1px solid #e5e7eb;

}



tr:hover{

    background:#f8fafc;

}



.action{

    display:flex;
    justify-content:center;
    gap:10px;

}



.edit-btn{

    background:#2563eb;
    color:white;
    padding:10px 20px;
    border-radius:10px;
    text-decoration:none;
    font-weight:bold;

}



.delete-btn{

    background:#dc2626;
    color:white;
    padding:10px 20px;
    border-radius:10px;
    border:none;
    font-weight:bold;
    cursor:pointer;

}



.pdf-btn{

    background:#16a34a;
    color:white;
    padding:10px 20px;
    border-radius:10px;
    text-decoration:none;
    font-weight:bold;

}



.back-btn{


display:inline-block;

margin-top:35px;

background:#0f172a;

color:white;

padding:14px 30px;

border-radius:12px;

text-decoration:none;

font-weight:bold;


}



.back-btn:hover{

background:#1e293b;

}

.add-btn{

display:inline-block;
background:#0284c7;
color:white;
padding:12px 25px;
border-radius:10px;
text-decoration:none;
font-weight:bold;
margin-bottom:25px;

}


.add-btn:hover{

background:#0369a1;

}


</style>

</head>


<body>


<div class="container">


<div class="header-card">

<h1>
📘 Module Notes Management
</h1>

<p>
Manage maritime learning notes created for users.
</p>


<a href="{{ route('admin.notes.create') }}" class="add-btn">
    ＋ Add Notes
</a>


</div>



<table>

<thead>

<tr>

<th>Title</th>

<th>Module</th>

<th>PDF</th>

<th>Action</th>

</tr>

</thead>



<tbody>


@foreach($notes as $note)


<tr>


<td>
{{ $note->title }}
</td>



<td>

{{ $note->module->title ?? 'No Module' }}

</td>



<td>

@if($note->pdf)

<a href="{{ asset('storage/'.$note->pdf) }}"
target="_blank"
class="pdf-btn">

📄 View PDF

</a>

@else

<span>
No PDF
</span>

@endif


</td>




<td class="action">


<a href="{{ route('admin.notes.edit',$note->id) }}" class="edit-btn">
    ✏ Edit
</a>



<form action="{{ route('admin.notes.destroy',$note->id) }}" method="POST">

@csrf
@method('DELETE')

<button type="submit" class="delete-btn">
    🗑 Delete
</button>

</form>


</td>


</tr>


@endforeach


</tbody>


</table>

<a href="{{ route('admin.dashboard') }}" class="back-btn">
    ← Back to Dashboard
</a>



</div>


</div>


</body>


</html>