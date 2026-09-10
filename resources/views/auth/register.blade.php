<!DOCTYPE html>
<html>

<head>

<title>ShipEquipAR Register</title>


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

margin-bottom:15px;


}



h2{


text-align:center;

color:white;

margin-bottom:25px;


}



label{

color:white;

font-size:14px;

}



input{


width:100%;

padding:12px;

margin-top:7px;

margin-bottom:8px;

border:none;

border-radius:10px;


}



/* SUCCESS MESSAGE */

.success-box{


background:#16a34a;

color:white;

padding:12px;

border-radius:10px;

margin-bottom:20px;

font-size:14px;

text-align:center;

font-weight:600;

box-shadow:
0 5px 15px rgba(22,163,74,.4);


animation:fadeIn .4s ease;


}



@keyframes fadeIn{

from{

opacity:0;

transform:translateY(-10px);

}

to{

opacity:1;

transform:translateY(0);

}

}



/* ERROR MESSAGE */

.error-box{


background:#fee2e2;

color:#991b1b;

padding:12px;

border-radius:10px;

margin-bottom:20px;

font-size:14px;

text-align:center;

}




.error-text{


color:#fecaca;

font-size:13px;

margin-bottom:10px;


}



button{


width:100%;

padding:13px;


background:#0284c7;


border:none;


border-radius:30px;


color:white;


font-weight:bold;

cursor:pointer;


}


button:hover{

background:#0ea5e9;

}



.login{


text-align:center;

margin-top:20px;

color:white;


}



.login a{

color:#38bdf8;

font-weight:bold;

text-decoration:none;


}

.success-box{

transition:0.5s;

}

</style>


</head>



<body>


<div class="card">



<div class="logo">

⚓ ShipEquipAR

</div>



<h2>

Create Account

</h2>



{{-- SUCCESS MESSAGE --}}

@if(session('success'))

<div class="success-box" id="successMessage">

✅ {{ session('success') }}

</div>


<script>

setTimeout(function(){

let message = document.getElementById('successMessage');


if(message){

message.style.opacity = "0";


setTimeout(function(){

message.style.display = "none";

},500);

}


},3000);


</script>


@endif





{{-- ERROR MESSAGE --}}

@if($errors->any())

<div class="error-box">

{{ $errors->first() }}

</div>

@endif





<form method="POST" action="{{route('register')}}">

@csrf



<label>Name</label>


<input 
type="text"
name="name"
value="{{ old('name') }}"
required
>



@error('name')

<div class="error-text">

{{ $message }}

</div>

@enderror





<label>Email</label>


<input 
type="email"
name="email"
value="{{ old('email') }}"
required
>



@error('email')

<div class="error-text">

{{ $message }}

</div>

@enderror





<label>Password</label>


<input
type="password"
name="password"
required
>



@error('password')

<div class="error-text">

{{ $message }}

</div>

@enderror





<label>Confirm Password</label>


<input
type="password"
name="password_confirmation"
required
>




<button>

CREATE ACCOUNT

</button>



</form>




<div class="login">

Already registered?


<a href="{{route('login')}}">

Login

</a>


</div>



</div>



</body>


</html>