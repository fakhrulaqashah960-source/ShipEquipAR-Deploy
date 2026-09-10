<!DOCTYPE html>
<html>

<head>

<title>ShipEquipAR Forgot Password</title>


<style>

*{

margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;

}


body{

height:100vh;

display:flex;

justify-content:center;

align-items:center;


background:

linear-gradient(
rgba(2,15,35,.75),
rgba(2,15,35,.75)
),

url('/images/ship-bg.jpg');


background-size:cover;

background-position:center;

}



.card{


width:400px;


background:rgba(255,255,255,.15);


backdrop-filter:blur(15px);


padding:35px;


border-radius:25px;


border:1px solid rgba(255,255,255,.2);


}



.logo{


text-align:center;

font-size:32px;

font-weight:800;

color:#38bdf8;

margin-bottom:20px;


}



h2{

text-align:center;

color:white;

margin-bottom:15px;

}



p{

color:white;

text-align:center;

font-size:14px;

margin-bottom:20px;

}



input{


width:100%;

padding:12px;

border:none;

border-radius:10px;

margin-bottom:15px;

}



button{


width:100%;

padding:13px;

border:none;

border-radius:30px;

background:#0284c7;

color:white;

font-weight:bold;

cursor:pointer;

}



button:hover{

background:#0ea5e9;

}



.success-box{


background:#16a34a;

color:white;

padding:12px;

border-radius:10px;

margin-bottom:15px;

text-align:center;

font-weight:bold;

}



.error-box{


background:#fee2e2;

color:#991b1b;

padding:12px;

border-radius:10px;

margin-bottom:15px;

text-align:center;

}



.back{


text-align:center;

margin-top:20px;

}



.back a{


color:#38bdf8;

text-decoration:none;

font-weight:bold;

}


</style>


</head>


<body>


<div class="card">


<div class="logo">

⚓ ShipEquipAR

</div>


<h2>

Forgot Password

</h2>



<p>

Enter your email and we will send a password reset link.

</p>



@if(session('status'))

<div class="success-box">

✅ {{ session('status') }}

</div>

@endif




@if($errors->any())

<div class="error-box">

{{ $errors->first() }}

</div>

@endif





<form method="POST" action="{{ route('password.email') }}">

@csrf


<input

type="email"

name="email"

placeholder="Enter your email"

required

>


<button>

SEND RESET LINK

</button>


</form>



<div class="back">

<a href="{{route('login')}}">

← Back to Login

</a>

</div>


</div>


</body>


</html>