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
font-family:'Segoe UI',Arial,sans-serif;
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
background-attachment:fixed;

}





.container{

max-width:1180px;

margin:auto;

}




/* HERO */

.hero{

padding:40px;

border-radius:30px;

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

font-weight:950;

}




.hero p{

margin-top:12px;

font-size:16px;

color:#dbeafe;

}




/* CONTENT CARD */


.card{


margin-top:30px;


background:white;


padding:45px;


border-radius:30px;



box-shadow:

0 20px 45px rgba(0,0,0,.22);


}




.title{


font-size:38px;


font-weight:900;


line-height:1.3;


color:#0369a1;


margin-bottom:20px;


}






.module{


display:inline-block;


margin-top:10px;


padding:14px 22px;


border-radius:999px;


background:#e0f2fe;


color:#0369a1;


font-size:15px;


font-weight:900;


}






/* NOTE CONTENT */


.content{


margin-top:35px;


padding:35px;


border-radius:22px;


background:#f8fafc;


border:1px solid #e2e8f0;


color:#334155;


font-size:18px;


line-height:2;


letter-spacing:.2px;


}




.content p{

margin-bottom:15px;

}





/* PDF */


.pdf-box{


margin-top:35px;


padding:30px;


border-radius:22px;


background:#eff6ff;


border:1px solid #dbeafe;


}




.pdf-box h3{


color:#0369a1;


font-size:22px;


font-weight:900;


}




.pdf-box p{


margin-top:10px;


color:#64748b;


}




.pdf-btn{


display:inline-flex;


align-items:center;


justify-content:center;


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






/* BACK */


.back{


display:inline-flex;


margin-top:30px;


padding:14px 30px;


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


.card{

padding:25px;

}



.title{

font-size:28px;

}



.hero h1{

font-size:32px;

}



.content{

font-size:16px;

padding:22px;

}


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


@php

$pdfPath = str_replace(
'public/',
'',
$note->pdf
);


$pdfPath = str_replace(
'storage/',
'',
$pdfPath
);


@endphp




<div class="pdf-box">


<h3>

📄 PDF Learning Resource

</h3>


<p>

Open the official module PDF document.

</p>





<a

href="{{ asset('storage/'.$pdfPath) }}"

target="_blank"

rel="noopener noreferrer"

class="pdf-btn"

>

📄 Open PDF Resource

</a>




</div>


@endif







<a

href="{{ route('user.notes') }}"

class="back"

>

← Back To Notes List

</a>






</div>





</div>


</body>


</html>