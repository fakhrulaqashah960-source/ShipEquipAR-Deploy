<!DOCTYPE html>

<html>

<head>

<title>
Edit User
</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

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

}




/* SIDEBAR */


.sidebar{

position:fixed;

width:250px;

height:100vh;

background:#0f172a;

padding:25px;

color:white;

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

padding:40px;

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

margin-bottom:35px;

color:white;

}



.header h1{

font-size:38px;

}



.header p{

margin-top:8px;

}




/* FORM CARD */


.form-card{


background:white;

width:600px;

padding:35px;

border-radius:25px;

box-shadow:

0 10px 25px rgba(0,0,0,.15);


}



.form-card h2{

color:#0f172a;

margin-bottom:25px;

}




.form-group{

margin-bottom:20px;

}



.form-group label{

display:block;

color:#0f172a;

font-weight:600;

margin-bottom:8px;

}



.form-group input,
.form-group select{


width:100%;

padding:13px;

border:1px solid #cbd5e1;

border-radius:10px;

font-size:15px;

outline:none;

}




.form-group input:focus,
.form-group select:focus{

border-color:#0284c7;

}




.btn{


margin-top:10px;

padding:13px 25px;

background:#0284c7;

border:none;

border-radius:10px;

color:white;

font-size:15px;

font-weight:600;

cursor:pointer;

}



.btn:hover{

background:#0369a1;

}



.back-btn{

margin-left:10px;

padding:13px 25px;

background:#64748b;

border-radius:10px;

color:white;

text-decoration:none;

font-weight:600;

}


</style>


</head>



<body>




<!-- SIDEBAR -->


<div class="sidebar">


<div class="logo">

⚓ Ship<span>EquipAR</span>

</div>




<div class="menu">


<a href="/admin">

🏠 Dashboard

</a>



<a href="/admin/users">

👥 Users

</a>



<a href="/admin/modules">

📚 Learning Module

</a>



<a href="/admin/equipment">

🦺 Equipment

</a>



<a href="/admin/ship-model">

🚢 Ship Model

</a>



<a href="/admin/course">

📝 Quiz Management

</a>



<a href="#">

🏆 Certificate

</a>



<form method="POST" action="{{route('logout')}}">

@csrf

<button class="logout-btn">

🚪 Logout

</button>

</form>


</div>


</div>







<!-- CONTENT -->


<div class="content">



<div class="header">


<h1>

✏️ Edit User

</h1>


<p>

Update user information and account role.

</p>


</div>






<div class="form-card">


<h2>

User Information

</h2>





<form method="POST"
action="{{route('admin.users.update',$user->id)}}">


@csrf

@method('PUT')





<div class="form-group">


<label>

Name

</label>


<input type="text"
name="name"
value="{{$user->name}}">


</div>





<div class="form-group">


<label>

Email

</label>


<input type="email"
name="email"
value="{{$user->email}}">


</div>






<div class="form-group">


<label>

Role

</label>


<select name="role">


<option value="admin"
@if($user->role=='admin')
selected
@endif
>

Admin

</option>



<option value="user"
@if($user->role=='user')
selected
@endif
>

User

</option>



</select>


</div>







<button class="btn">

💾 Save Changes

</button>



<a href="/admin/users"
class="back-btn">

⬅ Back

</a>




</form>



</div>


</div>





</body>

</html>