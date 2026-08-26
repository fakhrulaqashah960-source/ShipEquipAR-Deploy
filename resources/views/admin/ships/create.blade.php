<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Add Type of Ship</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])


<style>

:root{
    --navy:#0f172a;
    --blue:#0284c7;
    --blue-dark:#0369a1;
    --cyan:#38bdf8;
    --text:#0f172a;
    --muted:#64748b;
    --line:#cbd5e1;
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

    padding:34px 18px;

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
    background-repeat:no-repeat;
    background-attachment:fixed;
}


/* =========================================================
   WRAPPER
========================================================= */

.page-wrapper{
    width:100%;
    max-width:1000px;
    margin:0 auto;
}


/* =========================================================
   HERO
========================================================= */

.page-hero{
    width:100%;

    margin-bottom:20px;

    padding:30px;

    border-radius:24px;

    color:white;

    background:
        linear-gradient(
            135deg,
            rgba(2,132,199,.96),
            rgba(15,23,42,.98)
        );

    box-shadow:
        0 18px 40px rgba(0,0,0,.22);
}


.page-hero-label{
    display:inline-flex;
    align-items:center;
    gap:7px;

    margin-bottom:10px;

    padding:7px 12px;

    border-radius:999px;

    background:rgba(255,255,255,.13);

    color:#e0f2fe;

    font-size:12px;
    font-weight:800;
}


.page-hero h1{
    font-size:clamp(30px,4vw,42px);
    line-height:1.2;
    font-weight:900;
}


.page-hero p{
    max-width:700px;

    margin-top:10px;

    color:#dbeafe;

    font-size:14px;
    line-height:1.7;
}


/* =========================================================
   FORM CARD
========================================================= */

.container{
    width:100%;

    padding:30px;

    border-radius:24px;

    background:rgba(255,255,255,.97);

    box-shadow:
        0 16px 38px rgba(0,0,0,.18);
}


/* =========================================================
   ERRORS
========================================================= */

.error-box{
    margin-bottom:20px;

    padding:14px 16px;

    border-radius:12px;

    background:#fee2e2;

    border:1px solid #fecaca;

    color:#991b1b;

    font-size:13px;
}


.error-box ul{
    padding-left:18px;
}


/* =========================================================
   FORM
========================================================= */

.form-grid{
    display:grid;

    grid-template-columns:
        repeat(2,minmax(0,1fr));

    gap:18px;
}


.form-group{
    min-width:0;
}


.form-group.full{
    grid-column:1 / -1;
}


label{
    display:block;

    margin-bottom:8px;

    color:#0f172a;

    font-size:14px;
    font-weight:800;
}


input,
textarea,
select{
    width:100%;

    min-height:52px;

    padding:12px 14px;

    border:1px solid var(--line);

    border-radius:12px;

    background:white;

    color:#0f172a;

    font-size:14px;

    outline:none;

    transition:.2s ease;
}


input[type="file"]{
    padding:13px;
}


textarea{
    min-height:170px;

    resize:vertical;

    line-height:1.65;
}


input:focus,
textarea:focus,
select:focus{
    border-color:var(--blue);

    box-shadow:
        0 0 0 3px rgba(2,132,199,.12);
}


.help-text{
    margin-top:7px;

    color:var(--muted);

    font-size:12px;
    line-height:1.5;
}


/* =========================================================
   BUTTONS
========================================================= */

.form-actions{
    grid-column:1 / -1;

    display:flex;

    align-items:center;

    gap:10px;

    flex-wrap:wrap;

    padding-top:4px;
}


.save-btn,
.back{
    min-height:45px;

    display:inline-flex;

    align-items:center;
    justify-content:center;

    padding:10px 18px;

    border:none;

    border-radius:11px;

    text-decoration:none;

    font-size:13px;
    font-weight:800;

    cursor:pointer;

    transition:.2s ease;
}


.save-btn{
    background:var(--blue);
    color:white;
}


.save-btn:hover{
    background:var(--blue-dark);
    transform:translateY(-2px);
}


.back{
    background:var(--navy);
    color:white;
}


.back:hover{
    background:var(--blue);
    transform:translateY(-2px);
}


/* =========================================================
   TABLET
========================================================= */

@media(max-width:800px){

    .form-grid{
        grid-template-columns:1fr;
    }


    .form-group.full,
    .form-actions{
        grid-column:1;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media(max-width:600px){

    body{
        padding:0;

        background-attachment:scroll;
    }


    .page-wrapper{
        max-width:none;
    }


    .page-hero{
        margin-bottom:10px;

        padding:24px 17px;

        border-radius:0 0 22px 22px;
    }


    .page-hero h1{
        font-size:28px;
    }


    .container{
        width:calc(100% - 16px);

        margin:0 8px 12px;

        padding:18px 15px 24px;

        border-radius:18px;
    }


    .form-actions{
        display:grid;

        grid-template-columns:1fr;
    }


    .save-btn,
    .back{
        width:100%;
    }

}

</style>

</head>


<body>


<div class="page-wrapper">


    {{-- =========================================================
         HEADER
    ========================================================= --}}

    <section class="page-hero">

        <div class="page-hero-label">
            🚢 Ship Administration
        </div>

        <h1>
            Add Type of Ship
        </h1>

        <p>
            Add a new ship type, upload its image and attach
            the Reality Composer AR model for ShipEquipAR.
        </p>

    </section>



    {{-- =========================================================
         FORM CARD
    ========================================================= --}}

    <div class="container">


        @if($errors->any())

            <div class="error-box">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif



        <form
            method="POST"
            action="{{ route('admin.ships.store') }}"
            enctype="multipart/form-data"
        >

            @csrf


            <div class="form-grid">


                {{-- =================================================
                     SHIP NAME
                ================================================== --}}

                <div class="form-group full">

                    <label for="name">
                        Ship Name
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Example: Container Vessel"
                        required
                    >

                </div>



                {{-- =================================================
                     SHIP IMAGE
                ================================================== --}}

                <div class="form-group">

                    <label for="image">
                        Ship Image
                    </label>

                    <input
                        type="file"
                        id="image"
                        name="image"
                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                    >

                    <div class="help-text">
                        Accepted: JPG, JPEG, PNG or WEBP.
                    </div>

                </div>



                {{-- =================================================
                     AR REALITY FILE
                ================================================== --}}

                <div class="form-group">

                    <label for="ar_model">
                        AR Reality File
                    </label>

                    <input
                        type="file"
                        id="ar_model"
                        name="ar_model"
                        accept=".reality"
                    >

                    <div class="help-text">
                        Upload a Reality Composer (.reality) file
                        for AR viewing.
                    </div>

                </div>



                {{-- =================================================
                     DESCRIPTION
                ================================================== --}}

                <div class="form-group full">

                    <label for="description">
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        placeholder="Enter ship description"
                    >{{ old('description') }}</textarea>

                </div>



                {{-- =================================================
                     BUTTONS
                ================================================== --}}

                <div class="form-actions">

                    <button
                        type="submit"
                        class="save-btn"
                    >
                        💾 Save Ship Type
                    </button>


                    <a
                        href="{{ route('admin.ships.index') }}"
                        class="back"
                    >
                        ← Back
                    </a>

                </div>


            </div>


        </form>


    </div>


</div>


</body>

</html>
