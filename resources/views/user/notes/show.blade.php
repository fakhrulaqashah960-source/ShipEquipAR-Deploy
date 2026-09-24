<!DOCTYPE html>
<html lang="en">

<head>

<title>
{{ $note->title }} - ShipEquipAR Notes
</title>


@vite(['resources/css/app.css','resources/js/app.js'])


<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}


body{

min-height:100vh;

padding:35px 18px;


background:
linear-gradient(
135deg,
rgba(15,23,42,.92),
rgba(2,132,199,.75)
),
url('/images/ship-bg.jpg');


background-size:cover;
background-position:center;

}


.container{

max-width:1180px;
margin:auto;

}



.hero{

padding:35px;

border-radius:28px;

background:
linear-gradient(
135deg,
#0284c7,
#0f172a
);

color:white;

box-shadow:
0 20px 40px rgba(0,0,0,.25);

}


.hero h1{

font-size:42px;
font-weight:900;

}


.hero p{

margin-top:12px;

color:#dbeafe;

}





.card{

margin-top:25px;

background:white;

padding:40px;

border-radius:28px;


box-shadow:
0 20px 40px rgba(0,0,0,.2);

}




.title{

font-size:32px;

font-weight:900;

color:#0369a1;

}



.module{


margin-top:20px;

padding:15px;

border-radius:15px;

background:#e0f2fe;

color:#0369a1;

font-weight:800;

}




.content{

margin-top:30px;

padding:30px;

border-radius:20px;

background:#f8fafc;

color:#334155;

line-height:1.8;

font-size:17px;

}



.pdf-box{


margin-top:30px;

padding:25px;

border-radius:20px;

background:#eff6ff;

}



.pdf-box h3{

color:#0369a1;

}



.pdf-box p{

margin-top:8px;

color:#64748b;

}



.pdf-btn{


display:inline-flex;

margin-top:18px;

padding:13px 25px;


border-radius:12px;


background:#16a34a;

color:white;

text-decoration:none;


font-weight:900;


}




.back{


display:inline-flex;


margin-top:25px;


padding:13px 25px;


border-radius:12px;


background:#0f172a;


color:white;


text-decoration:none;


font-weight:900;


}



.back:hover{

background:#0284c7;

}



</style>


</head>


<body>


<div class="container">



<div class="hero">


<h1>
📘 Module Notes
</h1>


<p>
ShipEquipAR maritime learning resources
</p>


</div>




<div class="card">



<h2 class="title">

{{ $note->title }}

</h2>




<div class="module">

📚 Module:

{{ $note->module->name ?? 'General Module' }}


</div>





<div class="content">

{!! $note->content !!}

</div>







@if($note->pdf)


<div class="pdf-box">


<h3>
📄 PDF Learning Resource
</h3>


<p>
Open the official module PDF document.
</p>




<a

href="{{ route('pdf.view',$note->pdf) }}"

target="_blank"

class="pdf-btn"

>

📄 Open PDF Resource

</a>



</div>


@endif






<a

href="{{ route('dashboard') }}"

class="back"

>

← Back To Dashboard

</a>




</div>


</div>



</body>

</html>