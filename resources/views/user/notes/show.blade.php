<!DOCTYPE html>

<html>

<head>

<style>

body{

background:#f1f5f9;
font-family:Arial;

}


.container{

width:80%;
margin:40px auto;

}


.card{

background:white;

padding:35px;

border-radius:20px;

box-shadow:0 10px 25px rgba(0,0,0,.1);

}



h1{

color:#0284c7;

}



.content{

white-space:pre-line;

line-height:1.8;

}



.pdf-btn{

display:inline-block;

background:#16a34a;

color:white;

padding:12px 25px;

border-radius:10px;

text-decoration:none;

margin-top:20px;

}



.back{

display:inline-block;

background:#111827;

color:white;

padding:12px 25px;

border-radius:10px;

text-decoration:none;

margin-top:20px;

}



</style>

</head>


<body>


<div class="container">


<div class="card">


<h1>
📘 {{$note->title}}
</h1>


<h3>
Module:
{{$note->module->name ?? '-'}}
</h3>



<hr>


<div class="content">

{{$note->content}}

</div>




@if($note->pdf)

<a class="pdf-btn"
href="{{asset('storage/'.$note->pdf)}}"
target="_blank">

📄 View PDF

</a>

@endif




<br>


<a class="back"
href="{{route('user.notes')}}">

← Back

</a>



</div>


</div>



</body>


</html>