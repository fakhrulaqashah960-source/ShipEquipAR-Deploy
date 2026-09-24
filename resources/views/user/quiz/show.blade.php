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

    background:
    linear-gradient(
        rgba(2,24,45,.92),
        rgba(3,105,161,.75)
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

    padding:45px;

    border-radius:30px;

    color:white;

    box-shadow:
    0 20px 40px rgba(0,0,0,.3);

}



.header h1{

    font-size:42px;
    font-weight:900;

}



.header p{

    margin-top:15px;

    color:#dbeafe;

    font-size:18px;

}





.note-card{

    margin-top:35px;

    background:white;

    padding:40px;

    border-radius:30px;

    box-shadow:
    0 20px 40px rgba(0,0,0,.25);

}





.note-title{

    color:#0369a1;

    font-size:32px;

    font-weight:900;

    margin-bottom:20px;

}





.module{

    display:inline-block;

    background:#e0f2fe;

    color:#0369a1;

    padding:8px 18px;

    border-radius:20px;

    font-weight:700;

    margin-bottom:25px;

}





.content{

    background:#f8fafc;

    padding:30px;

    border-radius:20px;

    line-height:1.8;

    color:#334155;

    font-size:17px;

}





.pdf-box{

    margin-top:30px;

    background:#eff6ff;

    padding:25px;

    border-radius:20px;

}



.pdf-btn{

    display:inline-block;

    margin-top:15px;

    background:#0284c7;

    color:white;

    padding:14px 30px;

    border-radius:15px;

    text-decoration:none;

    font-weight:800;

}



.back{

    display:inline-block;

    margin-top:30px;

    background:#0f172a;

    color:white;

    padding:14px 30px;

    border-radius:15px;

    text-decoration:none;

    font-weight:800;

}



.back:hover{

    background:#0284c7;

}


</style>


</head>


<body>


<div class="container">



<div class="header">


<h1>
📘 ShipEquipAR Learning Notes
</h1>


<p>
Access maritime engineering learning materials and module resources.
</p>


</div>





<div class="note-card">



<h2 class="note-title">

{{ $note->title }}

</h2>




@if($note->module)

<div class="module">

📚 {{ $note->module->name }}

</div>

@endif






<div class="content">


{!! $note->content !!}


</div>





@if($note->pdf)

<div class="pdf-box">


<h3>
📄 PDF Resource
</h3>


<a href="{{ route('pdf.view',$note->pdf) }}"
class="pdf-btn"
target="_blank">

Open PDF Notes →

</a>


</div>

@endif

<a href="{{ route('dashboard') }}"
class="back">

← Back to Dashboard

</a>


</div>



</div>


</body>


</html>