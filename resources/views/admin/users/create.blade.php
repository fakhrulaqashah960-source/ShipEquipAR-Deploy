<!DOCTYPE html>
<html>

<head>

<title>
Add User
</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>

body{

font-family:'Segoe UI',sans-serif;
background:#f1f5f9;
padding:40px;

}


.container{

max-width:600px;
margin:auto;
background:white;
padding:30px;
border-radius:20px;
box-shadow:0 10px 25px rgba(0,0,0,.1);

}


h1{

color:#0284c7;
margin-bottom:25px;

}


label{

display:block;
margin-top:15px;
font-weight:600;

}


input,
select{

width:100%;
padding:12px;
margin-top:8px;
border-radius:8px;
border:1px solid #cbd5e1;

}



button{

margin-top:25px;
width:100%;
padding:12px;
background:#0284c7;
color:white;
border:none;
border-radius:10px;
font-weight:600;
cursor:pointer;

}


button:hover{

background:#0369a1;

}


.back{

display:block;
margin-top:15px;
text-align:center;
text-decoration:none;
color:#0284c7;

}

</style>

</head>


<body>


<div class="container">


<h1>
➕ Add New User
</h1>



<form method="POST" action="{{route('admin.users.store')}}">

@csrf



<label>
Name
</label>

<input 
type="text"
name="name"
required>



<label>
Email
</label>

<input
type="email"
name="email"
required>




<label>
Password
</label>

<input
type="password"
name="password"
required>



<label>
Role
</label>


<select name="role">


<option value="user">
User
</option>


<option value="admin">
Admin
</option>


</select>




<button type="submit">

Create User

</button>



<a href="{{route('admin.users.index')}}" class="back">

← Back to Users

</a>



</form>


</div>


</body>

</html>