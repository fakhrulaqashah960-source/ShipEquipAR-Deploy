<!DOCTYPE html>
<html>

<head>

<title>
Ship Model AR
</title>


<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}



body{

background:#f1f5f9;

padding:30px;

}





.header{

background:
linear-gradient(
135deg,
#0284c7,
#075985
);

color:white;

padding:40px;

border-radius:25px;

box-shadow:0 10px 25px rgba(0,0,0,.15);

margin-bottom:35px;

}




.header h1{

font-size:38px;

margin-bottom:15px;

}




.header p{

font-size:16px;

line-height:1.7;

}





.ship-list{


display:grid;

grid-template-columns:repeat(3,1fr);

gap:25px;


}







.card{


background:white;

padding:25px;

border-radius:20px;

min-height:450px;

display:flex;

flex-direction:column;


box-shadow:
0 8px 20px rgba(0,0,0,.12);


transition:.3s;


}




.card:hover{

transform:translateY(-8px);

}






.card img{


width:100%;

height:180px;

object-fit:contain;

margin-bottom:20px;


}






.card-content{

flex:1;

}






.card h2{

font-size:22px;

color:#0f172a;

margin-bottom:18px;

}






.card h3{

font-size:16px;

color:#0284c7;

margin-bottom:8px;

}






.card p{

font-size:14px;

color:#475569;

line-height:1.6;


}






.btn{


display:block;

width:170px;


margin:20px auto 0;


padding:12px;


background:#0284c7;


color:white;


text-decoration:none;


text-align:center;


border-radius:10px;


font-weight:600;


}




.btn:hover{

background:#0369a1;

}







@media(max-width:1000px){


.ship-list{

grid-template-columns:repeat(2,1fr);

}


}






@media(max-width:700px){


.ship-list{

grid-template-columns:1fr;

}


}



</style>


</head>



<body>





<div class="header">


<h1>

🚢 Ship Model AR

</h1>



<p>

Explore interactive 3D ship models using Augmented Reality technology.
Users can visualize ship structures and components digitally.

</p>


</div>








<div class="ship-list">





@foreach($ships as $ship)





<div class="card">





@if($ship->marker_image)

<img 
src="{{ asset('uploads/markers/'.$ship->marker_image) }}"
alt="{{ $ship->name }}">

@endif







<div class="card-content">





<h2>

🚢 {{ $ship->name }}

</h2>





<h3>

Description

</h3>





<p>

{{ $ship->description }}

</p>





</div>







<a class="btn"

href="{{ asset('uploads/reality/'.$ship->model_file) }}"

rel="ar">

📱 Open AR Model

</a>







</div>





@endforeach







</div>







</body>


</html>