<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Module Equipment</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])


<style>

:root{
    --navy:#0f172a;
    --blue:#0284c7;
    --blue-dark:#0369a1;
    --cyan:#38bdf8;
    --text:#0f172a;
    --muted:#64748b;
}


*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}


html,
body{
    width:100%;
    min-height:100%;
}


body{
    min-height:100vh;

    padding:35px 18px;

    color:var(--text);

    background:
        linear-gradient(
            135deg,
            rgba(3,37,65,.88),
            rgba(2,132,199,.70)
        ),
        url('https://images.unsplash.com/photo-1569263979104-865ab7cd8d13');

    background-size:cover;
    background-position:center;
    background-attachment:fixed;
}


/* =========================================================
   CONTAINER
========================================================= */

.container{
    width:100%;
    max-width:1180px;

    margin:0 auto;

    padding:28px;

    border-radius:24px;

    background:rgba(255,255,255,.96);

    box-shadow:
        0 18px 45px rgba(0,0,0,.22);

    overflow:hidden;
}


/* =========================================================
   HEADER
========================================================= */

.module-header{
    margin-bottom:25px;

    padding:26px;

    border-radius:20px;

    color:white;

    background:
        linear-gradient(
            135deg,
            rgba(2,132,199,.96),
            rgba(15,23,42,.97)
        );
}


.module-header h1{
    margin:0;

    font-size:clamp(26px,4vw,38px);

    line-height:1.2;

    font-weight:900;
}


.module-info{
    margin-top:12px;

    color:#dbeafe;

    font-size:14px;

    line-height:1.75;
}


/* =========================================================
   GRID
========================================================= */

.grid{
    display:grid;

    grid-template-columns:
        repeat(2,minmax(0,1fr));

    gap:20px;
}


/* =========================================================
   CARD
========================================================= */

.card{
    min-width:0;

    display:flex;

    flex-direction:column;

    padding:18px;

    border-radius:18px;

    background:#f8fafc;

    border:1px solid #e2e8f0;

    box-shadow:
        0 7px 20px rgba(15,23,42,.09);
}


.image-wrapper{
    width:180px;

    height:120px;

    margin:0 auto 16px;

    border-radius:14px;

    overflow:hidden;

    background:white;

    display:flex;

    align-items:center;

    justify-content:center;

    border:1px solid #e2e8f0;
}


.card img{
    width:100%;

    height:100%;

    display:block;

    object-fit:contain;

    padding:6px;
}


.no-image{
    width:100%;

    height:100%;

    display:flex;

    flex-direction:column;

    align-items:center;

    justify-content:center;

    gap:7px;

    color:#64748b;

    text-align:center;

    padding:15px;
}


.no-image span{
    font-size:38px;
}


.no-image strong{
    font-size:13px;

    color:#334155;
}


.card h2{
    color:var(--blue-dark);

    font-size:20px;

    line-height:1.35;

    font-weight:850;

    margin-bottom:12px;

    overflow-wrap:anywhere;
}


.info-block{
    margin-top:12px;

    padding-top:12px;

    border-top:1px solid #e2e8f0;
}


.info-block strong{
    display:block;

    margin-bottom:5px;

    color:#334155;

    font-size:12px;

    text-transform:uppercase;

    letter-spacing:.04em;
}


.info-block p{
    color:#475569;

    font-size:13px;

    line-height:1.7;

    overflow-wrap:anywhere;
}


/* =========================================================
   EMPTY
========================================================= */

.empty{
    padding:35px 20px;

    border-radius:18px;

    background:#f8fafc;

    border:1px dashed #cbd5e1;

    text-align:center;

    color:#64748b;
}


/* =========================================================
   BACK
========================================================= */

.back-area{
    width:100%;

    display:flex;

    justify-content:flex-start;

    margin-top:25px;
}


.back{
    display:inline-flex;

    align-items:center;

    justify-content:center;

    min-height:44px;

    padding:10px 18px;

    border-radius:11px;

    background:var(--navy);

    color:white;

    text-decoration:none;

    font-size:14px;

    font-weight:800;

    transition:.2s ease;
}


.back:hover{
    background:var(--blue);

    transform:translateY(-2px);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width:820px){

    .grid{
        grid-template-columns:1fr;
    }

}


@media(max-width:600px){

    body{
        padding:0;

        background-attachment:scroll;
    }


    .container{
        min-height:100vh;

        padding:14px 11px 25px;

        border-radius:0;
    }


    .module-header{
        padding:22px 17px;

        border-radius:16px;
    }


    .module-header h1{
        font-size:27px;
    }


    .image-wrapper{
        width:160px;
        height:105px;
    }


    .card{
        padding:15px;

        border-radius:16px;
    }


    .back{
        width:auto;
    }

}

</style>

</head>


<body>


<div class="container">


    {{-- =========================================================
         MODULE HEADER
    ========================================================= --}}

    <section class="module-header">

        <h1>
            ⚓ {{ $module->title }}
        </h1>

        <p class="module-info">
            {{ $module->description }}
        </p>

    </section>



    {{-- =========================================================
         EQUIPMENT LIST
    ========================================================= --}}

    @if(count($equipments) > 0)

        <section class="grid">


            @foreach($equipments as $equipment)


                @php

                    /*
                    |--------------------------------------------------------------------------
                    | EQUIPMENT IMAGE URL
                    |--------------------------------------------------------------------------
                    |
                    | Supports:
                    | - full http / https URL
                    | - filename only
                    | - uploads/equipment/filename
                    | - /uploads/equipment/filename
                    |
                    */

                    $equipmentImageUrl = null;

                    $rawImage =
                        trim(
                            (string) ($equipment->image ?? '')
                        );


                    if ($rawImage !== '') {


                        if (
                            str_starts_with(
                                $rawImage,
                                'http://'
                            )
                            ||
                            str_starts_with(
                                $rawImage,
                                'https://'
                            )
                        ) {

                            $equipmentImageUrl =
                                $rawImage;

                        }


                        else {

                            $normalizedImage =
                                str_replace(
                                    '\\',
                                    '/',
                                    $rawImage
                                );

                            $normalizedImage =
                                ltrim(
                                    $normalizedImage,
                                    '/'
                                );


                            if (
                                str_starts_with(
                                    $normalizedImage,
                                    'public/'
                                )
                            ) {

                                $normalizedImage =
                                    substr(
                                        $normalizedImage,
                                        7
                                    );

                            }


                            if (
                                str_starts_with(
                                    $normalizedImage,
                                    'uploads/equipment/'
                                )
                            ) {

                                $equipmentImageUrl =
                                    asset(
                                        $normalizedImage
                                    );

                            }

                            else {

                                $equipmentImageUrl =
                                    asset(
                                        'uploads/equipment/' .
                                        basename(
                                            $normalizedImage
                                        )
                                    );

                            }

                        }

                    }

                @endphp



                <article class="card">


                    {{-- =================================================
                         IMAGE
                    ================================================== --}}

                    <div class="image-wrapper">


                        @if($equipmentImageUrl)

                            <img
                                src="{{ $equipmentImageUrl }}"
                                alt="{{ $equipment->name }}"
                                loading="lazy"

                                onerror="
                                    this.style.display='none';
                                    this.nextElementSibling.style.display='flex';
                                "
                            >


                            <div
                                class="no-image"
                                style="display:none;"
                            >
                                <span>⚓</span>

                                <strong>
                                    Image unavailable
                                </strong>
                            </div>


                        @else

                            <div class="no-image">

                                <span>⚓</span>

                                <strong>
                                    No Equipment Image
                                </strong>

                            </div>

                        @endif


                    </div>



                    {{-- =================================================
                         NAME
                    ================================================== --}}

                    <h2>
                        {{ $equipment->name }}
                    </h2>



                    {{-- =================================================
                         DESCRIPTION
                    ================================================== --}}

                    <div class="info-block">

                        <strong>
                            Description
                        </strong>

                        <p>
                            {{ $equipment->description }}
                        </p>

                    </div>



                    {{-- =================================================
                         FUNCTION
                    ================================================== --}}

                    <div class="info-block">

                        <strong>
                            Function
                        </strong>

                        <p>
                            {{ $equipment->function }}
                        </p>

                    </div>


                </article>


            @endforeach


        </section>


    @else


        <div class="empty">

            No equipment available for this module.

        </div>


    @endif



    {{-- =========================================================
         BACK
    ========================================================= --}}

    <div class="back-area">

        <a
            href="{{ route('modules.index') }}"
            class="back"
        >
            ← Back
        </a>

    </div>


</div>


</body>

</html>
