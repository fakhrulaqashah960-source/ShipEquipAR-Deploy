<!DOCTYPE html>

<html>

<head>

<title>
Manage Users
</title>


<style>


*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}


body{

min-height:100vh;

background:

linear-gradient(
rgba(3,37,65,.85),
rgba(2,132,199,.65)
),
url('/images/ship-bg.jpg');

background-size:cover;

background-position:center;

color:white;

}


/* SIDEBAR */


.sidebar{

position:fixed;

width:250px;

height:100vh;

background:#0f172a;

padding:25px;

}


.logo{

font-size:26px;

font-weight:800;

margin-bottom:35px;

}


.logo span{

color:#38bdf8;

}



.menu a{

display:block;

padding:12px;

margin:8px 0;

color:#cbd5e1;

text-decoration:none;

border-radius:10px;

}


.menu a:hover{

background:#0284c7;

color:white;

}



.logout-btn{

margin-top:25px;

width:100%;

padding:12px;

background:#dc2626;

border:none;

border-radius:10px;

color:white;

cursor:pointer;

}




/* CONTENT */


.content{

margin-left:250px;

padding:35px;

}




.header{

background:

linear-gradient(
135deg,
#0e7490,
#0f172a
);


padding:35px 40px;

border-radius:25px;

margin-bottom:30px;

}


.header h1{

font-size:38px;

margin-bottom:8px;

}


.header p{

font-size:16px;

}





/* TABLE */


.table-box{

background:white;

padding:30px;

border-radius:22px;

color:#0f172a;

width:90%;

margin:auto;

box-shadow:

0 10px 25px rgba(0,0,0,.15);

}



.table-box h2{

margin-bottom:25px;

font-size:25px;

}





table{

width:100%;

border-collapse:collapse;

}




thead th{

background:#0284c7;

color:white;

padding:16px;

text-align:left;

font-size:15px;

}




tbody td{

padding:16px;

border-bottom:1px solid #e2e8f0;

color:#0f172a;

font-size:15px;

}




tbody tr:hover{

background:#f1f5f9;

}




/* COLUMN ALIGN */


th:nth-child(1),
td:nth-child(1){

width:8%;

}



th:nth-child(2),
td:nth-child(2){

width:18%;

}



th:nth-child(3),
td:nth-child(3){

width:35%;

}



th:nth-child(4),
td:nth-child(4){

width:15%;

}



th:nth-child(5),
td:nth-child(5){

width:24%;

}

th:last-child,
td:last-child{

    text-align:center;

}




/* BADGE */


.badge{

background:#16a34a;

color:white;

padding:6px 15px;

border-radius:20px;

font-size:13px;

font-weight:600;

display:inline-block;

}


.badge.admin{

background:#dc2626;

}

.table-header{

display:flex;

justify-content:space-between;

align-items:center;

margin-bottom:25px;

}

.edit-btn,
.delete-btn{


padding:7px 12px;

border:none;

border-radius:8px;

text-decoration:none;

cursor:pointer;

font-size:14px;

}



.edit-btn{

background:#facc15;

}



.delete-btn{

background:#dc2626;

color:white;

}

.add-btn{

display:inline-block;
background:#0284c7;
color:white;
padding:12px 22px;
border-radius:10px;
text-decoration:none;
font-weight:600;
margin-bottom:20px;

}


.add-btn:hover{

background:#0369a1;

}

.action-cell{

    display:flex;
    justify-content:center;
    align-items:center;
    gap:10px;

}


.btn-edit,
.btn-delete{

    padding:8px 14px;
    border-radius:8px;
    color:white;
    text-decoration:none;
    font-size:13px;
    font-weight:600;
    border:none;
    cursor:pointer;
    display:inline-flex;
    align-items:center;
    gap:5px;

}


.btn-edit{

    background:#facc15;

}


.btn-edit:hover{

    background:#eab308;

}



.btn-delete{

    background:#ef4444;

}


.btn-delete:hover{

    background:#dc2626;

}


</style>


</head>



<body>



<div class="sidebar">



<div class="logo">


<div class="logo-icon">

⚓

</div>


<div class="logo-name">

Ship<span>EquipAR</span>

</div>


</div>



<div class="menu">


<a href="/admin">

🏠 Admin Dashboard

</a>




<a href="/admin/users">

👥 Manage Users
</a>





<a href="/admin/modules">

📚 Manage Module

</a>





<a href="/admin/notes">

📘 Manage Notes

</a>





<a href="/admin/equipment">

🦺 Manage Equipments

</a>





<a href="{{ route('admin.ships.index') }}">

🚢 Manage Ships

</a>





<a href="/admin/course">

📝 Manage Quiz

</a>





<a href="#">

🏆 Manage Certificate

</a>



<form method="POST" action="{{route('logout')}}">

@csrf

<button class="logout-btn">

🚪 Logout

</button>

</form>


</div>


</div>







<div class="content">



<div class="header">


<h1>

👥 Manage Users

</h1>


<p>

Manage registered users in ShipEquipAR system.

</p>


</div>

<a href="{{ route('admin.users.create') }}"
class="add-btn">

➕ Add User

</a>


<div class="table-box">


<div class="table-header">


<h2>
User List
</h2>


</div>





<table>


<thead>

<tr>

<th>
ID
</th>


<th>
Name
</th>


<th>
Email
</th>


<th>
Role
</th>


<th>
Created
</th>

<th>
Action
</th>


</tr>

</thead>





<tbody>


@foreach($users as $user)


<tr>


<td>

{{$user->id}}

</td>


<td>

{{$user->name}}

</td>


<td>

{{$user->email}}

</td>



<td>


@if($user->role == 'admin')


<span class="badge admin">

Admin

</span>


@else


<span class="badge">

User

</span>


@endif


</td>




<td>

{{date('d M Y',strtotime($user->created_at))}}

</td>

<td class="action-cell">

    <a href="{{ route('admin.users.edit',$user->id) }}"
       class="btn-edit">

        ✏️ Edit

    </a>


    <form action="{{ route('admin.users.destroy',$user->id) }}"
          method="POST"
          onsubmit="return confirm('Delete this user?');">

        @csrf
        @method('DELETE')


        <button type="submit"
                class="btn-delete">

            🗑 Delete

        </button>


    </form>

</td>



</tr>



@endforeach


</tbody>


</table>




</div>





</div>




</body>

</html>