<!DOCTYPE html>
<html>

<head>

<title>
Ship Model AR
</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>


body{

    background:#eef6fb;

    font-family:'Segoe UI',sans-serif;

    padding:40px;

    color:#0f172a;

}




h1{

    font-size:40px;

    margin-bottom:20px;

}





.header-card{


    background:linear-gradient(135deg,#0284c7,#075985);

    color:white;

    padding:40px;

    border-radius:25px;

    margin-bottom:30px;

    box-shadow:0 10px 25px rgba(0,0,0,.15);


}




.header-card h1{


    margin:0;

    font-size:40px;


}




.header-card p{


    margin-top:15px;

    line-height:1.8;

}





.container{


    display:grid;

    grid-template-columns:repeat(auto-fit,minmax(280px,300px));

    gap:30px;


}






.card{


    background:white;

    padding:25px;

    border-radius:20px;

    box-shadow:
    0 10px 25px rgba(0,0,0,.12);


}







.card img{


    width:100%;

    height:150px;

    object-fit:contain;

    margin-bottom:20px;


}


.ship-image{

    width:100%;
    height:150px;
    object-fit:contain;
    margin-bottom:20px;

}




.card h2{


    font-size:22px;

    margin-bottom:15px;


}







.card h3{


    font-size:16px;

    margin-top:20px;

    color:#0284c7;


}





.card p{


    line-height:1.7;

    color:#475569;


}







.btn{


    display:inline-block;

    margin-top:20px;

    background:#0284c7;

    color:white;

    padding:12px 22px;

    border-radius:10px;

    text-decoration:none;

    font-weight:bold;


}



.btn:hover{


    background:#0369a1;


}





.back-btn{


    display:inline-block;

    margin-top:40px;

    background:#0f172a;

    color:white;

    padding:12px 25px;

    border-radius:10px;

    text-decoration:none;

    font-weight:bold;


}



.back-btn:hover{


    background:#1e293b;


}



</style>



</head>




<body>




<div class="header-card">


<h1>

🚢 Ship Model AR

</h1>



<p>

Explore interactive 3D ship models using Augmented Reality technology. 
Users can visualize ship structures and components digitally.

</p>


</div>







<div class="container">





@foreach($markers as $marker)





<div class="card">





@if($marker->marker_image)

<img 
src="{{ asset('uploads/markers/'.$marker->marker_image) }}"
class="ship-image">

@endif






<h2>

🚢 {{ $marker->name }}

</h2>






<h3>

Description

</h3>




<p>

{{ $marker->description }}

</p>






href="{{ 'https://github.com/fakhrulaqashah960-source/ShipEquipAR/releases/latest/download/' . rawurlencode($marker->model_file) }}"
class="btn"

target="_blank">


📱 Open AR Model


</a>






</div>






@endforeach






</div>








<a href="{{ route('dashboard') }}"

class="back-btn">


← Back to Dashboard


</a>







</body>


</html>