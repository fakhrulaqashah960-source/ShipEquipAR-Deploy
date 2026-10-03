<!DOCTYPE html>
<html lang="en">

<head>

<title>ShipEquipAR</title>

<meta 
name="viewport" 
content="width=device-width, initial-scale=1.0">


@vite([
'resources/css/app.css',
'resources/js/app.js'
])


<style>


*{

margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;

}



body{

height:100vh;

background:#061426;

color:white;

overflow:hidden;

}



/* =====================
NAVBAR
===================== */


nav{

width:100%;

z-index:20;

display:flex;

justify-content:space-between;

align-items:center;

padding:25px 70px;


background:

linear-gradient(
rgba(3,15,35,.75),
transparent
);

}



.logo{

display:flex;

align-items:center;

gap:10px;

font-size:34px;

font-weight:800;

color:#38bdf8;

letter-spacing:1px;

}



.logo span:first-child{

font-size:38px;

}



.auth-buttons{

display:flex;

gap:15px;

}



.auth-btn{

text-decoration:none;

color:white;

padding:12px 30px;

border-radius:30px;

background:#0284c7;

font-weight:600;

transition:.3s;

}



.auth-btn:hover{

background:#0ea5e9;

transform:translateY(-2px);

}




/* =====================
FULL SCREEN CAROUSEL
===================== */


.carousel{

height:100vh;

width:100%;

position:relative;

overflow:hidden;

}



.slide{

position:absolute;

width:100%;

height:100%;

opacity:0;

transition:

opacity 1.5s ease-in-out;

}



.slide.active{

opacity:1;

z-index:2;

}



.slide img{

width:100%;

height:100%;

object-fit:cover;

}



.overlay{

position:absolute;

inset:0;


background:


linear-gradient(

90deg,

rgba(0,25,70,.85),

rgba(0,100,180,.35),

rgba(0,20,60,.85)

),


linear-gradient(

0deg,

rgba(3,15,35,.85),

transparent

);


}



/* =====================
CONTENT CARD
===================== */


.carousel-content{

position:absolute;

top:50%;

left:50%;

transform:

translate(-50%,-50%);


width:480px;

max-width:85%;


padding:30px 35px;


background:

rgba(5,25,55,.72);


backdrop-filter:blur(12px);


border-radius:25px;


border:

1px solid rgba(255,255,255,.25);


text-align:center;


box-shadow:

0 20px 45px rgba(0,0,0,.5);


z-index:5;


}



.carousel-content h2{

font-size:34px;

line-height:1.3;

color:#38bdf8;

margin-bottom:15px;


text-shadow:

0 3px 10px black;


}



.carousel-content h3{

font-size:22px;

color:#7dd3fc;

margin-bottom:15px;


}



.carousel-content p{

font-size:15px;

line-height:1.6;

color:#e2e8f0;


}



.carousel-content a{

display:inline-block;

margin-top:25px;

padding:12px 35px;

background:#0284c7;

color:white;

border-radius:30px;

text-decoration:none;

font-size:16px;

transition:.3s;


}



.carousel-content a:hover{

background:#0ea5e9;

transform:translateY(-3px);

}




/* =====================
WELCOME
===================== */


.welcome h2{

font-size:48px;

}


.welcome h2 span{

color:#38bdf8;

}



.welcome p{

font-size:18px;

}




/* =====================
DOTS
===================== */


.dots{

position:absolute;

bottom:35px;

left:50%;

transform:translateX(-50%);

z-index:10;

}



.dots span{

display:inline-block;

width:12px;

height:12px;

border-radius:50%;

border:2px solid white;

margin:6px;

}



.dots .active-dot{

background:#38bdf8;

transform:scale(1.3);

}
/* =====================
TABLET
===================== */


@media(max-width:900px){


nav{

padding:20px 35px;

}



.logo{

font-size:28px;

}



.logo span:first-child{

font-size:32px;

}



.auth-btn{

padding:11px 25px;

}



.carousel-content{

width:450px;

}



.carousel-content h2{

font-size:32px;

}



.welcome h2{

font-size:40px;

}



}




/* =====================
MOBILE IMPROVED
===================== */


@media(max-width:600px){


body{

overflow:hidden;

}



/* NAVBAR */

nav{


padding:18px 20px;


flex-direction:column;


gap:15px;


background:

linear-gradient(
rgba(3,15,35,.95),
transparent
);


}



.logo{


font-size:24px;


gap:8px;


}



.logo span:first-child{


font-size:28px;


}




.auth-buttons{


display:flex;


gap:10px;


}



.auth-btn{


padding:

9px 22px;


font-size:14px;


border-radius:25px;


}




/* IMAGE */

.slide img{


object-position:center;


}




/* OVERLAY */

.overlay{


background:


linear-gradient(

180deg,

rgba(0,25,70,.75),

rgba(0,20,60,.90)

);


}




/* CARD */


.carousel-content{


width:88%;


max-width:none;


padding:24px 18px;


border-radius:22px;


top:56%;


animation:

fadeIn .8s ease;


}




.carousel-content h2{


font-size:28px;


margin-bottom:10px;


}



.carousel-content h3{


font-size:17px;


line-height:1.4;


margin-bottom:12px;


}



.carousel-content p{


font-size:14px;


line-height:1.7;


}




.carousel-content a{


padding:11px 30px;


font-size:14px;


margin-top:20px;


}




.welcome h2{


font-size:31px;


}



.welcome p{


font-size:14px;


}



/* DOTS */


.dots{


bottom:22px;


}



.dots span{


width:10px;


height:10px;


}



}




/* =====================
ANIMATION
===================== */


@keyframes fadeIn{


from{


opacity:0;


transform:

translate(-50%,-45%);


}



to{


opacity:1;


transform:

translate(-50%,-50%);


}


}
</style>

</head>

<body>


<!-- =====================
NAVIGATION
===================== -->


<nav>


<div class="logo">

<span>
⚓
</span>

<span>
ShipEquipAR
</span>

</div>



<div class="auth-buttons">
    <a href="{{ route('login') }}" class="auth-btn">
        Login
    </a>

    <a href="{{ route('register') }}" class="auth-btn">
        Register
    </a>
</div>

</nav>



<!-- =====================
FULL SCREEN CAROUSEL
===================== -->


<section class="carousel">





<!-- =====================
SLIDE 1 : WELCOME
===================== -->


<div class="slide active">


<img src="/images/carousel/ship-model.png">



<div class="overlay"></div>


<div class="carousel-content welcome">


<h2>

Welcome To

<span>
ShipEquipAR
</span>


</h2>




<h3>

Augmented Reality Marine Learning Platform

</h3>




<p>

Explore ship structures, marine equipment and safety knowledge through an interactive AR-based learning platform.

</p>




<a href="{{route('register')}}">

Start Learning

</a>




</div>



</div>









<!-- =====================
SLIDE 2 : MARINE LEARNING MODULE
===================== -->


<div class="slide">


<img src="/images/carousel/module-overview.png">



<div class="overlay"></div>





<div class="carousel-content">


<h2>

📚 Learning Module with AR


</h2>



<h3>

Explore Maritime Knowledge

</h3>




<p>

Discover structured learning modules covering Type of Ship, PPE Equipment, Safety and Security System, and Type of Engine for better understanding of marine engineering concepts.

</p>




<a href="{{route('login')}}">

Explore Module

</a>




</div>



</div>









<!-- =====================
SLIDE 3 : SHIP MODEL AR
===================== -->


<div class="slide">


<img src="/images/carousel/module.png">



<div class="overlay"></div>





<div class="carousel-content">


<h2>

📝 Quiz & Certificate

</h2>




<h3>

Test Your Knowledge

</h3>




<p>

Evaluate your understanding through interactive quizzes covering ship types, marine equipment, safety systems and engine knowledge. Complete assessments and earn certificates to recognize your maritime learning achievement.

</p>




<a href="{{route('login')}}">

Take Quiz

</a>




</div>



</div>










<!-- =====================
DOT INDICATOR
===================== -->


<div class="dots">


<span class="active-dot"></span>


<span></span>


<span></span>


</div>




</section>

<script>


let slideIndex = 0;


let slides = document.querySelectorAll(".slide");


let dots = document.querySelectorAll(".dots span");






function changeSlide(){



// remove active slide

slides.forEach(function(slide){


slide.classList.remove("active");


});





// remove active dot

dots.forEach(function(dot){


dot.classList.remove("active-dot");


});







slideIndex++;





// reset ke slide pertama

if(slideIndex >= slides.length){


slideIndex = 0;


}






// add active

slides[slideIndex].classList.add("active");


dots[slideIndex].classList.add("active-dot");



}






// AUTO TRANSITION EVERY 4 SECOND


setInterval(changeSlide,4000);



</script>





</body>

</html>