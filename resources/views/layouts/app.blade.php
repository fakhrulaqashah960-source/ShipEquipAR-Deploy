<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">


<meta name="csrf-token" content="{{ csrf_token() }}">


<title>
{{ config('app.name','ShipEquipAR') }}
</title>



<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">



<link rel="preconnect" href="https://fonts.bunny.net">


<link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap"
rel="stylesheet">



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

background:#eef6fb;

}




/* MAIN WRAPPER */


.admin-wrapper{

min-height:100vh;

}



/* SIDEBAR AREA */


.admin-sidebar{


width:320px;

height:100vh;

position:fixed;

left:0;

top:0;


z-index:100;


}





/* CONTENT AREA */


.admin-content{


margin-left:320px;

padding:40px;

min-height:100vh;


background:


linear-gradient(
rgba(3,37,65,.85),
rgba(2,132,199,.65)
),
url('https://images.unsplash.com/photo-1569263979104-865ab7cd8d13');

background-size:cover;

background-position:center;


}





/* HEADER STYLE */


.admin-header{


background:

linear-gradient(
135deg,
rgba(14,116,144,.95),
rgba(15,23,42,.95)
);


padding:40px;

border-radius:30px;

color:white;

margin-bottom:30px;


}


.admin-header h1{

font-size:42px;

font-weight:900;

}



.admin-header p{

margin-top:10px;

font-size:17px;

}



</style>



</head>



<body>


<div class="admin-wrapper">



{{-- SIDEBAR --}}


@if(!request()->routeIs('profile.edit'))


<div class="admin-sidebar">


@include('layouts.sidebar')


</div>


@endif







{{-- CONTENT --}}


<div class="admin-content">



@isset($header)

<div class="admin-header">

{{ $header }}

</div>

@endisset





<main>


{{ $slot }}


</main>



</div>





</div>








<script>


/*
Prevent Back After Logout
*/


window.addEventListener(
"pageshow",
function(event){

if(event.persisted){

window.location.reload();

}

});





@if(!Auth::check())


window.location.href="{{ route('login') }}";


@endif




window.onload=function(){


if(window.history.replaceState){


window.history.replaceState(
null,
null,
window.location.href
);


}


};




</script>





</body>


</html>