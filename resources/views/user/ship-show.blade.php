<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>{{ $ship->name }}</title>


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
    max-width:1000px;
    margin:auto;
}


.ship-card{
    background:white;

    padding:40px;

    border-radius:25px;

    box-shadow:
        0 10px 25px rgba(0,0,0,.08);

    border:1px solid #e2e8f0;
}


.ship-title{
    text-align:center;
    color:#075985;

    font-size:32px;

    margin-bottom:35px;
}


.ship-image{
    display:block;

    width:100%;
    max-width:500px;

    height:300px;

    object-fit:contain;

    margin:0 auto 40px;

    border-radius:20px;
}


.no-image{
    width:100%;
    max-width:500px;

    height:300px;

    background:#f1f5f9;

    display:flex;
    align-items:center;
    justify-content:center;

    margin:0 auto 40px;

    border-radius:20px;

    color:#64748b;
}


.info-section{
    margin-top:25px;
}


.info-section h3{
    color:#0284c7;
    margin-bottom:10px;
    font-size:20px;
}


.info-section p{
    color:#475569;
    line-height:1.8;
    font-size:16px;
}


.btn-ar{
    display:block;

    width:max-content;

    margin:35px auto 0;

    padding:14px 30px;

    background:#0284c7;

    color:white;

    text-decoration:none;

    border-radius:30px;

    font-weight:700;
}


.btn-ar:hover{
    background:#0369a1;
}


.no-ar{
    display:block;

    width:max-content;

    margin:35px auto 0;

    padding:13px 25px;

    background:#e2e8f0;

    color:#64748b;

    border-radius:20px;

    font-weight:600;
}


.back-btn{
    display:inline-block;

    margin-top:30px;

    padding:13px 25px;

    background:#0f172a;

    color:white;

    border-radius:10px;

    text-decoration:none;

    font-weight:600;
}


@media(max-width:700px){

    body{
        padding:20px;
    }

    .ship-card{
        padding:25px;
    }

    .ship-title{
        font-size:27px;
    }

}

</style>

</head>


<body>


@php

    /*
    |--------------------------------------------------------------------------
    | IMAGE URL
    |--------------------------------------------------------------------------
    */

    $imageUrl = null;

    if ($ship->image) {

        if (
            str_starts_with(
                $ship->image,
                'http://'
            )
            ||
            str_starts_with(
                $ship->image,
                'https://'
            )
        ) {

            $imageUrl =
                $ship->image;

        } else {

            $imageUrl =
                asset(
                    'uploads/ships/' .
                    $ship->image
                );

        }

    }


    /*
    |--------------------------------------------------------------------------
    | AR URL
    |--------------------------------------------------------------------------
    */

    $arUrl = null;

    if ($ship->ar_model) {

        if (
            str_starts_with(
                $ship->ar_model,
                'http://'
            )
            ||
            str_starts_with(
                $ship->ar_model,
                'https://'
            )
        ) {

            $arUrl =
                $ship->ar_model;

        } else {

            $arUrl =
                'https://github.com/' .
                'fakhrulaqashah960-source/' .
                'ShipEquipAR/' .
                'releases/latest/download/' .
                rawurlencode(
                    $ship->ar_model
                );

        }

    }

@endphp



<div class="container">


<div class="ship-card">


    {{-- NAME --}}

    <h1 class="ship-title">

        🚢 {{ $ship->name }}

    </h1>



    {{-- IMAGE --}}

    @if($imageUrl)

        <img
            src="{{ $imageUrl }}"
            alt="{{ $ship->name }}"
            class="ship-image"
        >

    @else

        <div class="no-image">

            🚢 No Ship Image

        </div>

    @endif



    {{-- ABOUT --}}

    <div class="info-section">

        <h3>
            📌 About Ship
        </h3>

        <p>

            @if($ship->description)

                {{ $ship->description }}

            @else

                No description available.

            @endif

        </p>

    </div>



    {{-- AR --}}

    @if($arUrl)

        <a
            href="{{ $arUrl }}"
            class="btn-ar"
            rel="ar"
        >
            📱 Open AR Model
        </a>

    @else

        <span class="no-ar">

            AR Model Not Available

        </span>

    @endif


</div>



<a
    href="{{ url()->previous() }}"
    class="back-btn"
>
    ← Back
</a>


</div>


</body>

</html>