<!DOCTYPE html>
<html lang="en">

<head>

<title>
Module Notes
</title>

@vite(['resources/css/app.css','resources/js/app.js'])

<style>

body{
    min-height:100vh;
    background:#0f172a;
    font-family:'Segoe UI',sans-serif;
    padding:40px;
}


.container{

    max-width:1000px;
    margin:auto;

}


.card{

    background:white;
    padding:30px;
    border-radius:20px;

}


h1{

    color:#0369a1;

}


.note{

    margin-top:20px;
    background:#eff6ff;
    padding:20px;
    border-radius:15px;

}


a{

    text-decoration:none;
    color:#0369a1;
    font-weight:bold;

}


</style>


</head>


<body>


<div class="container">


<div class="card">


<h1>
📘 Module Notes
</h1>



@foreach($notes as $note)


<div class="note">


<h3>

{{ $note->title }}

</h3>


<p>

{{ $note->description ?? '' }}

</p>



</div>


@endforeach



</div>


</div>


</body>

</html>