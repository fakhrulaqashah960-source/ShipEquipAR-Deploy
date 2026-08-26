<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Equipment Management</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])


<style>

:root{
    --navy:#0f172a;
    --blue:#0284c7;
    --blue-dark:#0369a1;
    --cyan:#38bdf8;
    --text:#0f172a;
    --muted:#64748b;
    --line:#dbe5ef;
    --white:#ffffff;
    --red:#dc2626;
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
   PAGE WRAPPER
========================================================= */

.page-wrapper{
    width:100%;
    max-width:1180px;
    margin:0 auto;
}


/* =========================================================
   HERO
========================================================= */

.page-hero{
    width:100%;

    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:22px;

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


.page-hero-copy{
    min-width:0;
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
    margin:0;

    font-size:clamp(30px,4vw,42px);

    line-height:1.2;

    font-weight:900;
}


.page-hero p{
    max-width:730px;

    margin-top:10px;

    color:#dbeafe;

    font-size:14px;

    line-height:1.7;
}


.page-hero-icon{
    width:86px;
    height:86px;

    flex:0 0 auto;

    display:flex;

    align-items:center;
    justify-content:center;

    border-radius:22px;

    background:rgba(255,255,255,.12);

    font-size:42px;
}


/* =========================================================
   MAIN PANEL
========================================================= */

.container{
    width:100%;

    padding:26px;

    background:rgba(255,255,255,.97);

    border-radius:24px;

    box-shadow:
        0 16px 38px rgba(0,0,0,.18);

    overflow:hidden;
}


/* =========================================================
   TOOLBAR
========================================================= */

.toolbar{
    width:100%;

    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:15px;

    margin-bottom:22px;

    padding-bottom:20px;

    border-bottom:1px solid #e2e8f0;
}


.toolbar-copy h2{
    color:#0f172a;

    font-size:22px;

    font-weight:900;
}


.toolbar-copy p{
    margin-top:5px;

    color:#64748b;

    font-size:13px;

    line-height:1.6;
}


.add-btn{
    display:inline-flex;

    align-items:center;
    justify-content:center;

    min-height:46px;

    padding:11px 19px;

    background:#0284c7;

    color:white;

    border:none;

    border-radius:11px;

    text-decoration:none;

    font-size:13px;

    font-weight:800;

    white-space:nowrap;

    transition:.2s ease;
}


.add-btn:hover{
    background:#0369a1;

    transform:translateY(-2px);
}


/* =========================================================
   EQUIPMENT LIST
========================================================= */

.equipment-list{
    width:100%;

    display:grid;

    grid-template-columns:1fr;

    gap:20px;
}


/* =========================================================
   EQUIPMENT CARD
========================================================= */

.equipment-card{
    width:100%;

    display:grid;

    grid-template-columns:210px minmax(0,1fr);

    gap:26px;

    align-items:start;

    padding:24px;

    background:#f8fafc;

    border:1px solid #e2e8f0;

    border-radius:20px;

    box-shadow:
        0 8px 22px rgba(15,23,42,.08);

    transition:.2s ease;
}


.equipment-card:hover{
    transform:translateY(-2px);

    box-shadow:
        0 14px 30px rgba(15,23,42,.12);
}


/* =========================================================
   IMAGE
========================================================= */

.equipment-image-wrap{
    width:210px;
    height:150px;

    display:flex;

    align-items:center;
    justify-content:center;

    overflow:hidden;

    background:white;

    border:1px solid #dbe5ef;

    border-radius:16px;
}


.equipment-image{
    width:100%;
    height:100%;

    display:block;

    object-fit:contain;

    padding:10px;
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
}


.no-image span{
    font-size:35px;
}


.no-image strong{
    color:#334155;

    font-size:12px;
}


/* =========================================================
   CONTENT
========================================================= */

.equipment-content{
    min-width:0;
}


.equipment-title{
    display:flex;

    align-items:center;

    gap:9px;

    margin-bottom:9px;
}


.equipment-title-icon{
    font-size:22px;

    line-height:1;
}


.equipment-title h3{
    min-width:0;

    color:#0f172a;

    font-size:23px;

    line-height:1.3;

    font-weight:900;

    letter-spacing:-.02em;

    overflow-wrap:anywhere;
}


.module-badge{
    display:inline-flex;

    align-items:center;

    gap:6px;

    margin-bottom:16px;

    padding:6px 10px;

    border-radius:999px;

    background:#e0f2fe;

    color:#0369a1;

    font-size:11px;

    font-weight:800;
}


.info-grid{
    display:grid;

    grid-template-columns:1fr;

    gap:14px;
}


.info-block{
    min-width:0;

    padding-top:13px;

    border-top:1px solid #e2e8f0;
}


.info-label{
    display:block;

    margin-bottom:5px;

    color:#334155;

    font-size:11px;

    line-height:1.3;

    font-weight:900;

    text-transform:uppercase;

    letter-spacing:.065em;
}


.info-text{
    color:#475569;

    font-size:13.5px;

    line-height:1.72;

    overflow-wrap:anywhere;

    word-break:break-word;
}


.ar-file{
    display:inline-flex;

    max-width:100%;

    padding:7px 10px;

    background:#eef2ff;

    color:#4338ca;

    border-radius:9px;

    font-size:12px;

    line-height:1.5;

    overflow-wrap:anywhere;

    word-break:break-word;
}


/* =========================================================
   ACTION BUTTONS
========================================================= */

.actions{
    display:flex;

    align-items:center;

    gap:9px;

    flex-wrap:wrap;

    margin-top:18px;

    padding-top:16px;

    border-top:1px solid #e2e8f0;
}


.actions form{
    display:inline-flex;

    width:auto;

    margin:0;
}


.edit-btn,
.delete-btn{
    display:inline-flex;

    align-items:center;
    justify-content:center;

    min-height:43px;

    padding:10px 16px;

    border:none;

    border-radius:10px;

    color:white;

    text-decoration:none;

    font-size:13px;

    font-weight:800;

    line-height:1;

    cursor:pointer;

    transition:.2s ease;
}


.edit-btn{
    background:#2563eb;
}


.edit-btn:hover{
    background:#1d4ed8;

    transform:translateY(-2px);
}


.delete-btn{
    background:#dc2626;
}


.delete-btn:hover{
    background:#b91c1c;

    transform:translateY(-2px);
}


/* =========================================================
   EMPTY STATE
========================================================= */

.empty-state{
    width:100%;

    padding:42px 20px;

    text-align:center;

    background:#f8fafc;

    border:1px dashed #cbd5e1;

    border-radius:18px;
}


.empty-state div{
    font-size:40px;
}


.empty-state h3{
    margin-top:9px;

    color:#0f172a;

    font-size:20px;
}


.empty-state p{
    margin-top:6px;

    color:#64748b;

    font-size:13px;
}


/* =========================================================
   BACK TO DASHBOARD
========================================================= */

.dashboard-back-area{
    width:100%;

    display:flex;

    justify-content:flex-start;

    align-items:center;

    margin-top:22px;

    padding-top:20px;

    border-top:1px solid #e2e8f0;
}


.back-dashboard{
    display:inline-flex;

    align-items:center;
    justify-content:center;

    min-height:46px;

    padding:11px 19px;

    background:#0f172a;

    color:white;

    border:none;

    border-radius:11px;

    text-decoration:none;

    font-size:13px;

    font-weight:800;

    box-shadow:
        0 6px 16px rgba(15,23,42,.16);

    transition:.2s ease;
}


.back-dashboard:hover{
    background:#0284c7;

    transform:translateY(-2px);
}


/* =========================================================
   TABLET
========================================================= */

@media(max-width:800px){

    .equipment-card{
        grid-template-columns:175px minmax(0,1fr);

        gap:20px;
    }


    .equipment-image-wrap{
        width:175px;

        height:125px;
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

        padding:23px 17px;

        border-radius:0 0 22px 22px;
    }


    .page-hero-icon{
        display:none;
    }


    .page-hero h1{
        font-size:28px;
    }


    .container{
        width:calc(100% - 16px);

        margin:0 8px 12px;

        padding:16px;

        border-radius:18px;
    }


    .toolbar{
        flex-direction:column;

        align-items:stretch;
    }


    .add-btn{
        width:100%;
    }


    .equipment-card{
        display:block;

        padding:17px;

        border-radius:17px;
    }


    .equipment-image-wrap{
        width:175px;

        height:125px;

        margin:0 auto 17px;
    }


    .equipment-title h3{
        font-size:20px;
    }


    .info-text{
        font-size:13px;
    }


    .actions{
        display:grid;

        grid-template-columns:1fr 1fr;
    }


    .actions form,
    .edit-btn,
    .delete-btn{
        width:100%;
    }


    .dashboard-back-area{
        margin-top:17px;

        padding-top:16px;
    }


    .back-dashboard{
        width:100%;
    }

}


@media(max-width:420px){

    .actions{
        grid-template-columns:1fr;
    }

}

</style>

</head>


<body>


<div class="page-wrapper">


    {{-- =========================================================
         HERO
    ========================================================= --}}

    <section class="page-hero">

        <div class="page-hero-copy">

            <div class="page-hero-label">
                ⚓ Equipment Administration
            </div>

            <h1>
                Equipment Management
            </h1>

            <p>
                Manage maritime learning equipment, images,
                descriptions, functions and AR Reality models.
            </p>

        </div>


        <div class="page-hero-icon">
            🦺
        </div>

    </section>



    {{-- =========================================================
         MAIN CONTENT
    ========================================================= --}}

    <main class="container">


        <div class="toolbar">

            <div class="toolbar-copy">

                <h2>
                    Equipment List
                </h2>

                <p>
                    Review and maintain all ShipEquipAR equipment records.
                </p>

            </div>


            <a
                href="/admin/equipment/create"
                class="add-btn"
            >
                ＋ Add Equipment
            </a>

        </div>



        {{-- =====================================================
             EQUIPMENT LIST
        ====================================================== --}}

        @if($equipments->count())


            <section class="equipment-list">


                @foreach($equipments as $equipment)


                    @php

                        $equipmentImageUrl = null;

                        $rawImage =
                            trim(
                                (string) ($equipment->image ?? '')
                            );


                        if ($rawImage !== '') {

                            if (
                                str_starts_with($rawImage, 'http://')
                                ||
                                str_starts_with($rawImage, 'https://')
                            ) {

                                $equipmentImageUrl =
                                    $rawImage;

                            }

                            else {

                                $normalizedImage =
                                    ltrim(
                                        str_replace(
                                            '\\',
                                            '/',
                                            $rawImage
                                        ),
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


                        $arModel =
                            trim(
                                (string) ($equipment->model_file ?? '')
                            );

                    @endphp



                    <article class="equipment-card">


                        {{-- =============================================
                             IMAGE
                        ============================================== --}}

                        <div class="equipment-image-wrap">


                            @if($equipmentImageUrl)

                                <img
                                    src="{{ $equipmentImageUrl }}"
                                    alt="{{ $equipment->name }}"
                                    class="equipment-image"
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



                        {{-- =============================================
                             CONTENT
                        ============================================== --}}

                        <div class="equipment-content">


                            <div class="equipment-title">

                                <span class="equipment-title-icon">
                                    🪖
                                </span>

                                <h3>
                                    {{ $equipment->name }}
                                </h3>

                            </div>



                            <div class="module-badge">
                                📚 {{ $equipment->module->title ?? 'No Module' }}
                            </div>



                            <div class="info-grid">


                                <div class="info-block">

                                    <span class="info-label">
                                        Description
                                    </span>

                                    <div class="info-text">
                                        {{ $equipment->description }}
                                    </div>

                                </div>



                                <div class="info-block">

                                    <span class="info-label">
                                        Function
                                    </span>

                                    <div class="info-text">
                                        {{ $equipment->function }}
                                    </div>

                                </div>



                                <div class="info-block">

                                    <span class="info-label">
                                        AR Model
                                    </span>


                                    @if($arModel !== '')

                                        <div class="ar-file">
                                            {{ $arModel }}
                                        </div>

                                    @else

                                        <div class="info-text">
                                            No AR Model
                                        </div>

                                    @endif

                                </div>


                            </div>



                            {{-- =========================================
                                 ACTIONS
                            ========================================== --}}

                            <div class="actions">


                                <a
                                    href="{{ route(
                                        'admin.equipment.edit',
                                        $equipment->id
                                    ) }}"
                                    class="edit-btn"
                                >
                                    ✏️ Edit
                                </a>


                                <form
                                    action="{{ route(
                                        'admin.equipment.destroy',
                                        $equipment->id
                                    ) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this equipment?')"
                                >

                                    @csrf

                                    @method('DELETE')


                                    <button
                                        type="submit"
                                        class="delete-btn"
                                    >
                                        🗑 Delete
                                    </button>

                                </form>


                            </div>


                        </div>


                    </article>


                @endforeach


            </section>


        @else


            <div class="empty-state">

                <div>
                    ⚓
                </div>

                <h3>
                    No Equipment Available
                </h3>

                <p>
                    Add your first equipment record to begin.
                </p>

            </div>


        @endif



        {{-- =====================================================
             BACK TO DASHBOARD
        ====================================================== --}}

        <div class="dashboard-back-area">

            <a
                href="{{ route('admin.dashboard') }}"
                class="back-dashboard"
            >
                ← Back to Dashboard
            </a>

        </div>


    </main>


</div>


</body>

</html>
