<!DOCTYPE html>
<html>

<head>

<style>

body{
    background:#f1f5f9;
    font-family:Arial;
}


.container{

    width:90%;
    margin:40px auto;

}


.card{

    background:white;

    padding:30px;

    border-radius:20px;

    box-shadow:0 10px 25px rgba(0,0,0,.1);

}



h1{

    color:#0284c7;

}



table{

    width:100%;

    border-collapse:collapse;

    margin-top:25px;

}



th{

    background:#0284c7;

    color:white;

    padding:15px;

}



td{

    padding:15px;

    border-bottom:1px solid #ddd;

}



.view-btn{

    background:#16a34a;

    color:white;

    padding:10px 20px;

    border-radius:8px;

    text-decoration:none;

}


.back{

    display:inline-block;

    margin-top:25px;

    background:#111827;

    color:white;

    padding:12px 25px;

    border-radius:10px;

    text-decoration:none;

}


</style>


</head>


<body>


<div class="container">


<div class="card">


<h1>
📘 Module Notes
</h1>


<p>
Access learning notes prepared by ShipEquipAR administrators.
</p>



<table>


<tr>

<th>
Title
</th>


<th>
Module
</th>


<th>
Action
</th>


</tr>



@foreach($notes as $note)


<tr>


<td>
{{ $note->title }}
</td>


<td>
{{ $note->module->name ?? '-' }}
</td>



<td>

<a class="view-btn"
href="{{route('user.notes.show',$note->id)}}">

View Notes

</a>

</td>


</tr>


@endforeach



</table>



<a class="back"
href="{{route('dashboard')}}">

← Back

</a>



</div>


</div>


</body>

</html>