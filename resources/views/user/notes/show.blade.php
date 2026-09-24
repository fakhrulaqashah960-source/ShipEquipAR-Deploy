<!DOCTYPE html>
<html lang="en">

<head>

<title>
{{ $note->title }}
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

background:
linear-gradient(
rgba(2,24,45,.9),
rgba(3,105,161,.7)
),
url('https://images.unsplash.com/photo-1569263979104-865ab7cd8d13');

background-size:cover;
background-position:center;

padding:40px 20px;

}



.container{

max-width:1100px;
margin:auto;

}



.header{

background:
linear-gradient(
135deg,
#082f49,
#0369a1
);

padding:40px;

border-radius:30px;

color:white;

box-shadow:
0 20px 40px rgba(0,0,0,.3);

}


.header h1{

font-size:38px;
font-weight:900;

}


.header p{

margin-top:15px;
color:#dbeafe;

}



.card{

background:white;

margin-top:30px;

padding:40px;

border-radius:30px;

box-shadow:
0 15px 35px rgba(0,0,0,.25);

}



.card h2{

color:#0369a1;

font-size:32px;

margin-bottom:15px;

}



.module{

background:#e0f2fe;

padding:15px;

border-radius:15px;

color:#0369a1;

font-weight:700;

}



.content{

margin-top:30px;

color:#334155;

line-height:1.8;

font-size:17px;

}



.pdf-btn{

display:inline-block;

margin-top:30px;

background:#0284c7;

color:white;

padding:14px 25px;

border-radius:12px;

text-decoration:none;

font-weight:700;

}


.back{

display:inline-block;

margin-top:20px;

background:#0f172a;

color:white;

padding:12px 25px;

border-radius:12px;

text-decoration:none;

}


</style>

</head>


<body>


<div class="container">


<div class="header">

<h1>
📘 Module Notes
</h1>


<p>
ShipEquipAR maritime learning resources
</p>


</div>




<div class="card">


<h2>

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

<a href="{{ route('pdf.view',$note->pdf) }}"
class="pdf-btn"
target="_blank">

📄 Open PDF Resource

</a>

@endif




<br>


<a href="{{ route('user.notes') }}"
class="back">

← Back To Notes

</a>



</div>


</div>


</body>

</html>