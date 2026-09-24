<!DOCTYPE html>
<html lang="en">

<head>

<title>
{{ $note->title }} - ShipEquipAR Learning
</title>


@vite(['resources/css/app.css','resources/js/app.js'])


<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',Arial,sans-serif;
}


body{

min-height:100vh;

padding:35px 20px;

background:

linear-gradient(
135deg,
rgba(15,23,42,.95),
rgba(2,132,199,.75)
),

url('/images/ship-bg.jpg');


background-size:cover;
background-position:center;
background-attachment:fixed;

color:#0f172a;

}




.container{

max-width:1200px;
margin:auto;

}




/* LMS HERO */

.hero{


display:flex;

justify-content:space-between;

align-items:center;

gap:30px;


padding:45px;


border-radius:30px;


background:

linear-gradient(
135deg,
#0369a1,
#0f172a
);


color:white;


box-shadow:

0 25px 50px rgba(0,0,0,.3);


}



.hero-left{

max-width:800px;

}




.tag{


display:inline-flex;

padding:8px 16px;

border-radius:999px;


background:rgba(255,255,255,.15);


font-size:13px;

font-weight:900;


}





.hero h1{


margin-top:20px;


font-size:42px;


font-weight:950;


line-height:1.2;


}




.hero p{


margin-top:15px;


color:#dbeafe;


font-size:17px;


}





.hero-icon{


width:110px;

height:110px;


display:flex;

align-items:center;

justify-content:center;


font-size:55px;


border-radius:30px;


background:rgba(255,255,255,.15);


}





/* MAIN CARD */


.learning-card{


margin-top:30px;


background:white;


padding:40px;


border-radius:30px;


box-shadow:

0 20px 45px rgba(0,0,0,.25);


}





.course-header{


display:flex;

justify-content:space-between;

align-items:center;

gap:20px;

flex-wrap:wrap;


}




.course-title{


font-size:36px;


font-weight:950;


color:#0369a1;


line-height:1.3;


}





.module{


margin-top:18px;


display:inline-flex;


padding:10px 18px;


border-radius:999px;


background:#e0f2fe;


color:#0369a1;


font-weight:900;


}




/* LEARNING INFO */


.info-grid{


margin-top:30px;


display:grid;


grid-template-columns:

repeat(3,1fr);


gap:20px;


}





.info-box{


padding:22px;


border-radius:20px;


background:#f0f9ff;


border:1px solid #dbeafe;


}



.info-box h4{


color:#0369a1;

font-size:14px;


}



.info-box p{


margin-top:8px;


font-weight:900;


}





/* CONTENT */


.lesson-area{


margin-top:35px;


padding:35px;


border-radius:25px;


background:#f8fafc;


border:1px solid #e2e8f0;


}




.lesson-area h3{


font-size:24px;


color:#0369a1;


margin-bottom:20px;


}



.content{


font-size:18px;


line-height:2;


color:#334155;


}




.content p{


margin-bottom:15px;


}





/* PDF */


.resource{


margin-top:35px;


padding:30px;


border-radius:25px;


background:

linear-gradient(
135deg,
#eff6ff,
#dbeafe
);


}




.resource h3{


font-size:22px;


color:#0369a1;


}



.resource p{


margin-top:8px;


color:#475569;


}



.pdf-btn{


display:inline-flex;


margin-top:20px;


padding:14px 28px;


border-radius:14px;


background:#16a34a;


color:white;


text-decoration:none;


font-weight:900;


}





.pdf-btn:hover{


background:#15803d;


}





/* FOOTER ACTION */


.actions{


margin-top:35px;


display:flex;


justify-content:space-between;


align-items:center;


gap:20px;


}




.back{


padding:14px 28px;


border-radius:14px;


background:#0f172a;


color:white;


text-decoration:none;


font-weight:900;


}




.back:hover{


background:#0284c7;


}




@media(max-width:768px){


.hero{

flex-direction:column;

align-items:flex-start;

}



.hero h1{

font-size:30px;

}



.info-grid{

grid-template-columns:1fr;

}



.course-title{

font-size:28px;

}


.learning-card{

padding:25px;

}


}



</style>

</head>


<body>



<div class="container">





<section class="hero">


<div class="hero-left">


<div class="tag">

⚓ Learning Resource

</div>


<h1>

📘 {{ $note->title }}

</h1>


<p>

ShipEquipAR Maritime Engineering Learning Module

</p>


</div>




<div class="hero-icon">

📚

</div>



</section>







<section class="learning-card">





<div class="course-header">


<div>


<h2 class="course-title">

{{ $note->title }}

</h2>


<div class="module">

📚 

{{ $note->module->name ?? 'General Module' }}

</div>


</div>


</div>







<div class="info-grid">


<div class="info-box">

<h4>
📖 CONTENT TYPE
</h4>


<p>
Learning Notes
</p>


</div>




<div class="info-box">

<h4>
🎓 CATEGORY
</h4>


<p>
Maritime Engineering
</p>


</div>





<div class="info-box">

<h4>
🏆 STATUS
</h4>


<p>
Available
</p>


</div>


</div>









<div class="lesson-area">


<h3>

📚 Lesson Content

</h3>



<div class="content">

{!! $note->content !!}

</div>



</div>







@if($note->pdf)


<div class="resource">


<h3>

📄 Additional Learning Resource

</h3>


<p>

Download or open the official PDF module document.

</p>




<a

href="{{ route('pdf.view',$note->pdf) }}"

target="_blank"

rel="noopener noreferrer"

class="pdf-btn"

>

📄 Open PDF Resource

</a>




</div>


@endif








<div class="actions">


<a

href="{{ route('user.notes') }}"

class="back"

>

← Back To Notes List

</a>



</div>





</section>






</div>



</body>

</html>