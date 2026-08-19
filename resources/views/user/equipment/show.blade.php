<!DOCTYPE html>
<html>

<head>

<title>
{{$equipment->name}}
</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>


*{

margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;

}


body{


background:#f1f5f9;

padding:40px;


}



.container{


width:90%;

max-width:900px;

margin:auto;


}



/* HEADER */


.header{


background:

linear-gradient(
135deg,
#0284c7,
#0f172a
);


color:white;

padding:30px;

border-radius:25px;

margin-bottom:25px;


}



.header h1{


font-size:35px;


}


.header p{


margin-top:10px;

line-height:1.6;


}





/* MAIN CARD */


.card{


background:white;

border-radius:25px;

padding:35px;

box-shadow:

0 15px 35px rgba(0,0,0,.15);


}





.title{


text-align:center;

font-size:32px;

color:#075985;

margin-bottom:20px;


}




.equipment-image{


width:100%;

height:300px;

object-fit:contain;

margin-bottom:25px;


}






.section{


margin-top:25px;


}



.section h2{


color:#0284c7;

font-size:20px;

margin-bottom:10px;


}




.section p{


color:#475569;

line-height:1.8;

font-size:16px;


}






/* AR BUTTON */


.ar-btn{


display:block;

width:220px;

margin:35px auto 10px;

text-align:center;

padding:15px;

background:#0284c7;

color:white;

text-decoration:none;

border-radius:30px;

font-weight:bold;


}



.ar-btn:hover{


background:#0369a1;


}

.ar-quicklook {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.ar-quicklook img {
    position: absolute;
    width: 1px;
    height: 1px;
    opacity: 0;
    pointer-events: none;
}

.ar-quicklook::after {
    content: "📱 Open AR Model";
}


.item{


background:#e0f2fe;

padding:15px;

border-radius:15px;

text-align:center;

color:#075985;

font-weight:bold;


}





.back-btn{

    display:inline-block;

    margin-top:30px;

    background:#0284c7;

    color:white;

    padding:12px 25px;

    border-radius:12px;

    text-decoration:none;

    font-size:16px;

    font-weight:600;

    transition:.3s;

}


.back-btn:hover{

    background:#0369a1;

    transform:translateY(-2px);

}



</style>


</head>




<body>



<div class="container">





<div class="header">


<h1>

⚓ PPE Marine Engineer

</h1>



<p>

Marine Personal Protective Equipment (PPE) provides essential protection for marine engineers against workplace hazards onboard ships.

</p>



</div>







<div class="card">





<h1 class="title">


@if(str_contains($equipment->name,'Helmet'))

⛑️

@elseif(str_contains($equipment->name,'Glasses'))

🥽

@elseif(str_contains($equipment->name,'Gloves'))

🧤

@elseif(str_contains($equipment->name,'Coverall'))

🥼

@elseif(str_contains($equipment->name,'Boots'))

🥾

@else

⚓

@endif



{{$equipment->name}}


</h1>






<img 
src="{{ (str_starts_with($equipment->image, 'http://') || str_starts_with($equipment->image, 'https://'))
    ? $equipment->image
    : asset('uploads/equipment/' . $equipment->image) }}"
class="equipment-image">







<div class="section">


<h2>

📌 About Equipment

</h2>


<p>

{{$equipment->description}}

</p>


</div>




<div class="section">


<h2>

⚙️ Main Function

</h2>


<p>

{{$equipment->function}}

</p>


</div>


@if($equipment->model_file)

    @php
        $arUrl =
            \Illuminate\Support\Facades\URL::temporarySignedRoute(
                'equipment.ar',
                now()->addMinutes(30),
                [
                    'id' => $equipment->id,
                ]
            );
    @endphp

    <a href="{{ $arUrl }}"
       rel="ar"
       class="ar-btn ar-quicklook">

        <img
            src="{{ asset('favicon.ico') }}"
            alt="Open AR Model">

    </a>

@endif


<a href="{{ route('dashboard') }}"
   class="back-btn">

    ← Back to Dashboard

</a>


</div>

</div>

</body>


</html>