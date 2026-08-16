<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>{{ $module->title }}</title>


<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}



body{

    background:#eef6fb;

    padding:40px;

    color:#0f172a;

}



.container{

    max-width:1200px;

    margin:auto;

}



/* ================= CARD ================= */


.module-card{

    background:white;

    padding:40px;

    border-radius:25px;

    margin-bottom:30px;

    box-shadow:0 10px 25px rgba(0,0,0,.08);

    border:1px solid #e2e8f0;

}






/* ================= HEADER ================= */


.module-header{


    display:flex;

    align-items:center;

    gap:20px;


}




.module-icon{


    width:65px;

    height:65px;


    display:flex;

    align-items:center;

    justify-content:center;


    background:linear-gradient(
        135deg,
        #38bdf8,
        #0284c7
    );


    border-radius:18px;


    font-size:30px;


    line-height:1;


}




.module-header h1{


    font-size:40px;

    font-weight:800;

    margin:0;


}






/* ================= SECTION TITLE ================= */



.section-title{


    display:flex;

    align-items:center;

    gap:15px;

    margin-bottom:25px;


}



.section-icon{


    width:42px;

    height:42px;


    display:flex;

    align-items:center;

    justify-content:center;


    background:#e0f2fe;


    border-radius:12px;


    font-size:25px;


    line-height:1;


    flex-shrink:0;


}





.section-title h2{


    margin:0;

    font-size:28px;

    font-weight:800;


}







p{


    color:#475569;

    font-size:16px;

    line-height:1.8;

    margin-bottom:15px;


}







/* ================= EQUIPMENT ================= */


.equipment-grid{


display:grid;


grid-template-columns:
repeat(auto-fit,minmax(300px,1fr));


gap:30px;


}





.equipment-card{


background:#f8fafc;


padding:25px;


border-radius:25px;


border:1px solid #dbeafe;


}





.equipment-image{


width:100%;


height:210px;


object-fit:contain;


background:white;


padding:15px;


border-radius:20px;


}





.equipment-card h2{


margin-top:20px;

font-size:22px;


}








/* ================= EMPTY ================= */


.empty-equipment{


text-align:center;


padding:35px;


background:#f8fafc;


border-radius:18px;


border:1px dashed #cbd5e1;


}









/* ================= BUTTON ================= */



.btn-ar{


display:block;


width:max-content;


margin:25px auto 0;


padding:13px 30px;


background:#0284c7;


color:white;


border-radius:30px;


text-decoration:none;


font-weight:700;


}





.back-btn{


display:inline-flex;


margin-top:20px;


padding:14px 30px;


background:#0284c7;


color:white;


border-radius:12px;


text-decoration:none;


font-weight:700;


transition:.3s;


}



.back-btn:hover{


background:#0369a1;


transform:translateX(-5px);


}





</style>


</head>



<body>


<div class="container">





<!-- HEADER -->


<div class="module-card">


<div class="module-header">



<div class="module-icon">


@if(
str_contains(strtolower($module->category),'ship')
||
str_contains(strtolower($module->title),'ship')
)

🚢


@elseif(
str_contains(strtolower($module->category),'ppe')
||
str_contains(strtolower($module->category),'safety')
)

🦺


@else

📚


@endif



</div>




<h1>

{{ $module->title }}

</h1>



</div>


</div>








<!-- ABOUT -->


<div class="module-card">


<div class="section-title">


<div class="section-icon">

📖

</div>


<h2>

About {{ $module->title }}

</h2>


</div>




<p>

{{ $module->description }}

</p>


<p>

{{ $module->function }}

</p>



</div>








<!-- VIDEO -->


@if($module->video_url)


<div class="module-card">


<div class="section-title">


<div class="section-icon">

🎥

</div>


<h2>

Learning Video

</h2>


</div>



<iframe

width="100%"

height="400"

src="{{ $module->video_url }}"

frameborder="0"

allowfullscreen>


</iframe>



</div>


@endif








<!-- SHIP -->

@if(
str_contains(strtolower($module->title),'ship')
||
str_contains(strtolower($module->category),'ship')
)



<div class="module-card">


<div class="section-title">


<div class="section-icon">

🚢

</div>



<h2>

Ship Model

</h2>


</div>




<p>

Explore different types of maritime vessels through Augmented Reality technology.

</p>




@if(isset($module->ship))


<a href="#"
class="btn-ar">

🚢 Open Ship AR Model

</a>


@else


<div class="empty-equipment">

No AR ship model available.

</div>


@endif



</div>







@else






<!-- EQUIPMENT -->


<div class="module-card">



<div class="section-title">


<div class="section-icon">

⚓

</div>


<h2>

Equipment List

</h2>


</div>






@if($module->equipments->count()>0)



<div class="equipment-grid">


@foreach($module->equipments as $equipment)



<div class="equipment-card">


@if($equipment->image)


<img

src="{{ asset('uploads/equipment/'.$equipment->image) }}"

class="equipment-image"


>


@endif



<h2>

{{ $equipment->name }}

</h2>




<p>

{{ $equipment->description }}

</p>



<a href="#"

class="btn-ar">


📱 Open AR Model

</a>



</div>



@endforeach


</div>



@else


<div class="empty-equipment">

No equipment available for this module.

</div>


@endif



</div>



@endif







<a href="{{ route('dashboard') }}"

class="back-btn">


← Back to Dashboard


</a>





</div>


</body>


</html>