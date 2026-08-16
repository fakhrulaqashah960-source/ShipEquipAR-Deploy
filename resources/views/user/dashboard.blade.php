<!DOCTYPE html>
<html>

<head>

<title>
ShipEquipAR Dashboard
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
135deg,
rgba(15,23,42,.95),
rgba(2,132,199,.75)
),
url('/images/ship-bg.jpg');

background-size:cover;
background-position:center;

color:white;

}


/* SIDEBAR */

.sidebar{

position:fixed;

left:0;
top:0;

width:245px;

height:100vh;

background:#0f172a;

padding:25px 20px;

overflow-y:auto;

}



.logo{

font-size:25px;

font-weight:800;

text-align:center;

margin-bottom:35px;

}



.logo span{

color:#38bdf8;

}



.menu{

display:flex;

flex-direction:column;

gap:8px;

}



/* NORMAL MENU */


.menu>a{

display:flex;

align-items:center;

padding:12px 14px;

border-radius:10px;

color:#cbd5e1;

text-decoration:none;

font-size:14px;

font-weight:400;

transition:.3s;

}




.menu>a:hover{

background:#0284c7;

color:white;

}




.menu>a.active{

background:#0284c7;

color:white;

font-weight:700;

}



/* LEARNING MODULE */


.module-title{

display:flex;

justify-content:space-between;

align-items:center;

background:#1e293b;

padding:13px 14px;

border-radius:10px;

cursor:pointer;

font-size:14px;

font-weight:400;

color:#cbd5e1;

transition:.3s;

}




.module-title.active{

background:#0284c7;

color:white;

font-weight:700;

}




.module-title span:last-child{

font-size:15px;

}





.module-content{

display:none;

margin-top:8px;

margin-left:14px;

}



.module-content.active{

display:block;

}





.module-item{


display:flex;

justify-content:space-between;

align-items:center;

background:#1e293b;

padding:12px;

border-radius:10px;

margin-bottom:8px;

cursor:pointer;

font-size:14px;

font-weight:400;

}



.module-item:hover{

background:#0284c7;

}







.module-list{

display:none;

margin-left:10px;

}



.module-list.active{

display:block;

}







.intro-link{

display:block;

background:#0f766e;

padding:10px;

border-radius:10px;

margin-bottom:8px;

color:white;

text-decoration:none;

font-size:13px;

font-weight:600;

}





.equipment-card{

display:flex;

align-items:center;

gap:10px;

background:#172554;

padding:10px;

border-radius:10px;

margin-bottom:7px;

text-decoration:none;

color:white;

font-size:13px;

}




.equipment-card:hover{

background:#0284c7;

}




.equipment-icon{

font-size:18px;

}




.equipment-card strong{

color:#bae6fd;

font-weight:500;

}

/* LOGOUT */

.logout-btn{

margin-top:30px;

width:100%;

padding:12px;

background:#ef4444;

border:none;

border-radius:10px;

color:white;

font-weight:600;

cursor:pointer;

}



/* CONTENT */


.content{

margin-left:245px;

padding:35px;

}



.welcome{


background:

linear-gradient(
135deg,
#0e7490,
#0f172a
);


padding:45px;

border-radius:25px;

display:flex;

justify-content:space-between;

align-items:center;

}



.welcome h1{

font-size:40px;

}



.welcome h2{

color:#7dd3fc;

margin-top:10px;

}



.welcome p{

margin-top:20px;

line-height:1.7;

max-width:650px;

}



.ship{

font-size:90px;

}



.introduction-section{

margin-top:35px;

display:grid;

grid-template-columns:repeat(2,1fr);

gap:20px;

}



.section-title{

grid-column:1/3;

font-size:30px;

color:#bae6fd;

}



.intro-item{

background:rgba(255,255,255,.15);

padding:25px;

border-radius:20px;

}



.intro-item h3{

margin-bottom:15px;

}



.intro-item p{

line-height:1.7;

}

.notes-btn{

background:#0284c7;

color:white;

padding:12px 25px;

border-radius:10px;

text-decoration:none;

}


</style>


</head>


<body>


<div class="sidebar">



<div class="logo">

⚓ Ship<span>EquipAR</span>

</div>




<div class="menu">





<a href="/dashboard"
class="{{request()->is('dashboard') ? 'active':''}}">

🏠 Dashboard

</a>





<div>



<div id="learningTitle"
class="module-title"
onclick="toggleModule()">



<span>

📚 Learning Module

</span>


<span id="mainArrow">

▼

</span>


</div>







<div id="moduleContent"
class="module-content">



@foreach($modules as $module)



<div class="module-item"
onclick="toggleEquipment({{$module->id}})">



<span>

📘 {{$module->title}}

</span>



<span id="arrow{{$module->id}}">

▼

</span>


</div>







<div id="equipment{{$module->id}}"
class="module-list">





<a href="{{route('learning.show',$module->id)}}"
class="intro-link">

📖 Introduction to {{ ucfirst($module->category) }}

</a>






@foreach($module->equipments as $equipments)



<a href="{{route('equipment.show',$equipments->id)}}"
class="equipment-card">



<span class="equipment-icon">


@if(str_contains($equipments->name,'Helmet'))

⛑️


@elseif(str_contains($equipments->name,'Glasses'))

🥽


@elseif(str_contains($equipments->name,'Gloves'))

🧤


@elseif(str_contains($equipments->name,'Coverall'))

🥼


@elseif(str_contains($equipments->name,'Boots'))

🥾


@elseif(str_contains($equipments->name,'CCTV'))

📹


@elseif(str_contains($equipments->name,'Alarm'))

🚨


@elseif(str_contains($equipments->name,'Radar'))

📡

@elseif(str_contains($equipments->name,'Ear muffs'))

🎧

@else

⚓

@endif


</span>



<strong>

{{$equipments->name}}

</strong>


</a>



@endforeach




</div>



@endforeach



</div>



</div>


<a href="{{ route('user.notes') }}">

📘 Module Notes

</a>


<a href="{{ route('quiz.index') }}">

📝 Start Quiz

</a>


<a href="#">

🏆 Get Certificate

</a>





<a href="#">

🤖 Ship Bot

</a>





<a href="/profile">

👤 Profile

</a>





<form method="POST" action="{{route('logout')}}">

@csrf


<button class="logout-btn">

Logout

</button>


</form>






</div>


</div>







<div class="content">





<div class="welcome">



<div>


<h1>

⚓ Welcome to ShipEquipAR

</h1>



<h2>

Augmented Reality Maritime Learning Platform

</h2>



<p>

Explore ship equipment, marine components and safety systems through interactive AR-based learning.

</p>


</div>




<div class="ship">

🚢

</div>



</div>








<div class="introduction-section">



<div class="section-title">

Website Introduction

</div>





<div class="intro-item">


<h3>

⚓ What is ShipEquipAR?

</h3>


<p>

ShipEquipAR is an Augmented Reality maritime learning platform designed to help users understand ship equipment through interactive digital learning.

</p>


</div>





<div class="intro-item">


<h3>

🎯 System Objectives

</h3>


<p>

The system provides learning materials, equipment information, AR visualization and interactive maritime education.

</p>


</div>






<div class="intro-item">


<h3>

📱 AR Application

</h3>


<p>

AR technology allows users to visualize marine equipment models in a real-world environment.

</p>


</div>






<div class="intro-item">


<h3>

✨ Platform Benefits

</h3>


<p>

Provides immersive learning experience, easy information access and interactive maritime education.

</p>


</div>



</div>




</div>







<script>


function toggleModule()

{


let box=document.getElementById("moduleContent");

let arrow=document.getElementById("mainArrow");

let title=document.getElementById("learningTitle");



box.classList.toggle("active");

title.classList.toggle("active");



if(box.classList.contains("active"))

{

arrow.innerHTML="▲";

}

else

{

arrow.innerHTML="▼";

}


}






function toggleEquipment(id)

{


let box=document.getElementById("equipment"+id);

let arrow=document.getElementById("arrow"+id);



box.classList.toggle("active");



if(box.classList.contains("active"))

{

arrow.innerHTML="▲";

}

else

{

arrow.innerHTML="▼";

}



}


</script>



</body>

</html>