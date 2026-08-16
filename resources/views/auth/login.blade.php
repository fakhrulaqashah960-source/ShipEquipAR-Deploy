<!DOCTYPE html>
<html>

<head>

<title>ShipEquipAR Login</title>


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



.login-card{


width:380px;


background:rgba(255,255,255,.15);


backdrop-filter:blur(15px);


padding:35px;


border-radius:25px;


box-shadow:
0 20px 40px rgba(0,0,0,.3);


border:1px solid rgba(255,255,255,.2);


}



.logo{


text-align:center;


font-size:32px;


font-weight:800;


color:#38bdf8;


margin-bottom:25px;


}



.subtitle{


text-align:center;


color:white;


margin-bottom:25px;


font-size:20px;


}



label{


color:white;

font-size:14px;


}



input{


width:100%;

padding:12px;

margin-top:8px;

margin-bottom:8px;

border-radius:10px;

border:none;

outline:none;


}



.error-box{


background:#fee2e2;

color:#991b1b;

padding:10px;

border-radius:10px;

font-size:14px;

margin-bottom:15px;

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



.register{


text-align:center;


margin-top:20px;


color:white;


}



.register a{


color:#38bdf8;


text-decoration:none;


font-weight:bold;


}


</style>


</head>



<body>



<div class="login-card">



<div class="logo">

⚓ ShipEquipAR

</div>



<div class="subtitle">

Welcome Back

</div>



{{-- LOGIN ERROR --}}

@if($errors->any())

<div class="error-box">

{{ $errors->first() }}

</div>

@endif





<form method="POST" action="{{ route('login') }}">

@csrf



<label>

Email

</label>


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





<label>

Password

</label>


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





<button>

LOGIN

</button>



</form>





<div class="register">


Don't have an account?


<a href="{{route('register')}}">

Register

</a>



</div>




</div>



</body>

</html>