<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Module Management</title>

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


body.admin-modules-page{
    min-height:100vh;

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

    padding:32px 20px 45px;

    color:var(--text);

    overflow-x:hidden;
}


.admin-modules-wrapper{
    width:100%;
    max-width:1250px;
    margin:0 auto;
}


/* =========================================================
   TOP BAR
========================================================= */

.admin-modules-topbar{
    width:100%;

    display:flex;
    align-items:center;
    justify-content:flex-start;

    gap:15px;

    margin-bottom:20px;
}


.admin-modules-brand{
    color:white;

    font-size:26px;
    font-weight:900;
}


.admin-modules-brand span{
    color:var(--cyan);
}


.back-dashboard{
    display:inline-flex;

    align-items:center;
    justify-content:center;

    min-height:45px;

    padding:10px 18px;

    background:var(--navy);

    color:white;

    border-radius:12px;

    text-decoration:none;

    font-size:14px;
    font-weight:700;

    transition:.2s ease;
}


.back-dashboard:hover{
    background:var(--blue);

    transform:translateY(-2px);
}


/* =========================================================
   HEADER
========================================================= */

.header{
    width:100%;

    padding:34px;

    border-radius:25px;

    background:
        linear-gradient(
            135deg,
            rgba(2,132,199,.96),
            rgba(15,23,42,.97)
        );

    color:white;

    box-shadow:
        0 15px 35px rgba(0,0,0,.20);

    margin-bottom:22px;
}


.header-label{
    display:inline-flex;

    align-items:center;

    gap:7px;

    margin-bottom:11px;

    padding:7px 12px;

    border-radius:999px;

    background:rgba(255,255,255,.12);

    color:#e0f2fe;

    font-size:12px;
    font-weight:700;
}


.header h1{
    font-size:clamp(30px,4vw,43px);

    line-height:1.2;

    font-weight:900;
}


.header p{
    max-width:760px;

    margin-top:10px;

    color:#dbeafe;

    font-size:15px;
    line-height:1.7;
}


/* =========================================================
   ADD BUTTON
========================================================= */

.button-group{
    display:flex;

    align-items:center;

    justify-content:flex-start;

    margin-bottom:22px;
}


.add-btn{
    display:inline-flex;

    align-items:center;
    justify-content:center;

    min-height:47px;

    padding:11px 22px;

    border-radius:12px;

    background:white;

    color:var(--blue-dark);

    text-decoration:none;

    font-size:14px;
    font-weight:800;

    box-shadow:
        0 8px 20px rgba(0,0,0,.14);

    transition:.2s ease;
}


.add-btn:hover{
    background:#e0f2fe;

    transform:translateY(-2px);
}


/* =========================================================
   MODULE GRID
========================================================= */

.modules-grid{
    width:100%;

    display:grid;

    grid-template-columns:
        repeat(2,minmax(0,1fr));

    gap:20px;
}


/* =========================================================
   MODULE CARD
========================================================= */

.card{
    min-width:0;

    display:flex;
    flex-direction:column;

    background:rgba(255,255,255,.97);

    padding:22px;

    border-radius:22px;

    box-shadow:
        0 10px 28px rgba(0,0,0,.18);

    border:
        1px solid rgba(255,255,255,.65);
}


.card-top{
    display:grid;

    grid-template-columns:220px minmax(0,1fr);

    gap:22px;

    align-items:start;
}


/* =========================================================
   MODULE IMAGE
========================================================= */

.image-wrapper{
    width:220px;
    height:150px;

    background:#eaf2f8;

    border-radius:16px;

    overflow:hidden;

    display:flex;

    align-items:center;
    justify-content:center;

    border:1px solid #dbe4ee;

    box-shadow:
        0 5px 14px rgba(15,23,42,.08);
}


.module-image{
    width:100%;
    height:100%;

    object-fit:contain;

    padding:8px;

    background:white;

    display:block;
}


.no-image{
    width:100%;
    height:100%;

    display:flex;

    flex-direction:column;

    align-items:center;
    justify-content:center;

    gap:7px;

    padding:15px;

    color:#475569;

    text-align:center;
}


.no-image-icon{
    font-size:36px;
}


.no-image strong{
    color:#334155;

    font-size:13px;
}


.no-image small{
    color:#64748b;

    font-size:10px;
    line-height:1.4;
}


/* =========================================================
   TEXT
========================================================= */

.module-main{
    min-width:0;
}


.card h2{
    color:var(--text);

    font-size:clamp(22px,2.4vw,29px);

    line-height:1.3;

    font-weight:900;
}


.category{
    display:inline-flex;

    align-items:center;

    margin-top:8px;

    padding:6px 10px;

    border-radius:999px;

    background:#e0f2fe;

    color:#0369a1;

    font-size:11px;
    font-weight:800;
}


.module-copy{
    margin-top:20px;

    display:grid;

    grid-template-columns:1fr;

    gap:16px;
}


.module-copy-block{
    padding-top:15px;

    border-top:1px solid #e2e8f0;
}


.card h3{
    margin-bottom:6px;

    color:#334155;

    font-size:13px;
    font-weight:900;

    text-transform:uppercase;

    letter-spacing:.04em;
}


.card p{
    color:#475569;

    font-size:13px;

    line-height:1.7;

    overflow-wrap:anywhere;
}


/* =========================================================
   ACTIONS
========================================================= */

.actions{
    margin-top:auto;
    padding-top:22px;

    display:flex;

    align-items:center;

    gap:9px;

    flex-wrap:wrap;
}


.actions form{
    display:inline-flex;
}


.btn,
.view-btn{
    display:inline-flex;

    align-items:center;
    justify-content:center;

    gap:6px;

    min-height:41px;

    padding:10px 15px;

    border-radius:10px;

    text-decoration:none;

    color:white;

    font-weight:800;

    font-size:12px;

    border:none;

    cursor:pointer;

    transition:.2s ease;
}


.edit{
    background:#2563eb;
}


.edit:hover{
    background:#1d4ed8;

    transform:translateY(-2px);
}


.delete{
    background:#dc2626;
}


.delete:hover{
    background:#b91c1c;

    transform:translateY(-2px);
}


.ship-btn{
    background:#0284c7;
}


.ship-btn:hover{
    background:#0369a1;

    transform:translateY(-2px);
}


.equipment-btn{
    background:#059669;
}


.equipment-btn:hover{
    background:#047857;

    transform:translateY(-2px);
}


.content-btn{
    background:#7c3aed;
}


.content-btn:hover{
    background:#6d28d9;

    transform:translateY(-2px);
}


/* =========================================================
   EMPTY
========================================================= */

.empty{
    width:100%;

    padding:45px 25px;

    border-radius:22px;

    background:rgba(255,255,255,.97);

    text-align:center;

    box-shadow:
        0 10px 28px rgba(0,0,0,.18);
}


.empty h2{
    color:var(--text);

    font-size:25px;
}


.empty p{
    margin-top:8px;

    color:var(--muted);
}



/* =========================================================
   BOTTOM BACK BUTTON
========================================================= */

.bottom-back-area{
    width:100%;

    display:flex;

    justify-content:flex-start;

    margin-top:24px;
}


.bottom-back-area .back-dashboard{
    margin:0;
}


/* =========================================================
   TABLET
========================================================= */

@media(max-width:950px){

    .modules-grid{
        grid-template-columns:1fr;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media(max-width:650px){

    body.admin-modules-page{
        padding:0 0 25px;

        background-attachment:scroll;
    }


    .admin-modules-topbar{
        position:sticky;

        top:0;

        z-index:1000;

        min-height:67px;

        padding:10px 14px;

        margin-bottom:0;

        background:var(--navy);
    }


    .admin-modules-brand{
        font-size:21px;
    }


    .back-dashboard{
        min-height:41px;

        padding:9px 12px;

        font-size:11px;
    }


    .header{
        padding:24px 17px;

        border-radius:0;

        margin-bottom:12px;
    }


    .header h1{
        font-size:29px;
    }


    .header p{
        font-size:14px;
    }


    .button-group{
        padding:0 12px;

        margin-bottom:12px;
    }


    .add-btn{
        width:100%;
    }


    .modules-grid{
        padding:0 10px;

        gap:12px;
    }


    .card{
        padding:16px;

        border-radius:17px;
    }


    .card-top{
        grid-template-columns:1fr;

        gap:15px;
    }


    .image-wrapper{
        width:100%;

        height:220px;
    }


    .actions{
        flex-direction:column;

        align-items:stretch;
    }


    .btn,
    .view-btn,
    .actions form,
    .actions form button{
        width:100%;
    }

}

</style>

</head>


<body class="admin-modules-page">


<div class="admin-modules-wrapper">


    {{-- =========================================================
         TOPBAR
    ========================================================= --}}

    <div class="admin-modules-topbar">

        <div class="admin-modules-brand">
            Ship<span>EquipAR</span>
        </div>

    </div>



    {{-- =========================================================
         HEADER
    ========================================================= --}}

    <section class="header">

        <div class="header-label">
            ⚓ Module Administration
        </div>

        <h1>
            Learning Module Management
        </h1>

        <p>
            Manage ShipEquipAR marine learning modules,
            module information, images and learning content.
        </p>

    </section>



    {{-- =========================================================
         ADD MODULE
    ========================================================= --}}

    <div class="button-group">

        <a
            href="/admin/modules/create"
            class="add-btn"
        >
            ＋ Add Module
        </a>

    </div>



    {{-- =========================================================
         EMPTY
    ========================================================= --}}

    @if(count($modules) == 0)

        <div class="empty">

            <h2>
                No Module Available
            </h2>

            <p>
                Please add a new learning module.
            </p>

        </div>

    @else



        {{-- =====================================================
             MODULE LIST
        ====================================================== --}}

        <section class="modules-grid">


        @foreach($modules as $module)


            @php

                /*
                |--------------------------------------------------------------------------
                | MODULE IMAGE
                |--------------------------------------------------------------------------
                |
                | Supports:
                |
                | - Full http / https URL
                | - /uploads/modules/file.jpg
                | - uploads/modules/file.jpg
                | - public/uploads/modules/file.jpg
                | - images/modules/file.jpg
                | - storage/modules/file.jpg
                | - modules/file.jpg
                | - filename only
                |
                */

                $moduleImageUrl = null;

                $rawModuleImage =
                    trim(
                        (string) ($module->image ?? '')
                    );


                if ($rawModuleImage !== '') {


                    /*
                    |--------------------------------------------------------------
                    | REMOTE URL
                    |--------------------------------------------------------------
                    */

                    if (
                        str_starts_with(
                            $rawModuleImage,
                            'http://'
                        )
                        ||
                        str_starts_with(
                            $rawModuleImage,
                            'https://'
                        )
                    ) {

                        $moduleImageUrl =
                            $rawModuleImage;

                    }


                    /*
                    |--------------------------------------------------------------
                    | LOCAL FILE
                    |--------------------------------------------------------------
                    */

                    else {

                        $normalizedImage =
                            str_replace(
                                '\\',
                                '/',
                                $rawModuleImage
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


                        $imageBasename =
                            basename(
                                $normalizedImage
                            );


                        /*
                        |----------------------------------------------------------
                        | PUBLIC CANDIDATES
                        |----------------------------------------------------------
                        */

                        $publicCandidates = array_unique([
                            $normalizedImage,
                            'uploads/modules/' . $imageBasename,
                            'images/modules/' . $imageBasename,
                            'storage/modules/' . $imageBasename,
                        ]);


                        foreach (
                            $publicCandidates
                            as $candidate
                        ) {

                            if (
                                $candidate !== ''
                                &&
                                file_exists(
                                    public_path(
                                        $candidate
                                    )
                                )
                            ) {

                                $moduleImageUrl =
                                    asset(
                                        $candidate
                                    );

                                break;

                            }

                        }


                        /*
                        |----------------------------------------------------------
                        | STORAGE APP/PUBLIC CANDIDATES
                        |----------------------------------------------------------
                        */

                        if (! $moduleImageUrl) {

                            $storageCandidates = array_unique([
                                $normalizedImage,
                                'modules/' . $imageBasename,
                            ]);


                            foreach (
                                $storageCandidates
                                as $candidate
                            ) {

                                if (
                                    $candidate !== ''
                                    &&
                                    file_exists(
                                        storage_path(
                                            'app/public/' .
                                            $candidate
                                        )
                                    )
                                ) {

                                    $moduleImageUrl =
                                        asset(
                                            'storage/' .
                                            $candidate
                                        );

                                    break;

                                }

                            }

                        }

                    }

                }




                /*
                |--------------------------------------------------------------------------
                | FALLBACK TO FIRST EQUIPMENT IMAGE
                |--------------------------------------------------------------------------
                |
                | Useful when a module image was uploaded to Render's local filesystem
                | and disappears after a redeploy. If the module has no usable image,
                | use the first equipment image as the module thumbnail.
                |
                */

                if (! $moduleImageUrl) {

                    $firstEquipment =
                        $module->equipments()
                            ->whereNotNull('image')
                            ->where('image', '!=', '')
                            ->first();


                    if ($firstEquipment) {

                        $equipmentImage =
                            trim(
                                (string) $firstEquipment->image
                            );


                        if (
                            str_starts_with(
                                $equipmentImage,
                                'http://'
                            )
                            ||
                            str_starts_with(
                                $equipmentImage,
                                'https://'
                            )
                        ) {

                            $moduleImageUrl =
                                $equipmentImage;

                        }

                        else {

                            $equipmentImage =
                                str_replace(
                                    '\\',
                                    '/',
                                    $equipmentImage
                                );

                            $equipmentImage =
                                ltrim(
                                    $equipmentImage,
                                    '/'
                                );


                            if (
                                str_starts_with(
                                    $equipmentImage,
                                    'public/'
                                )
                            ) {

                                $equipmentImage =
                                    substr(
                                        $equipmentImage,
                                        7
                                    );

                            }


                            if (
                                str_starts_with(
                                    $equipmentImage,
                                    'uploads/equipment/'
                                )
                            ) {

                                $moduleImageUrl =
                                    asset(
                                        $equipmentImage
                                    );

                            }

                            else {

                                $moduleImageUrl =
                                    asset(
                                        'uploads/equipment/' .
                                        basename(
                                            $equipmentImage
                                        )
                                    );

                            }

                        }

                    }

                }


                /*
                |--------------------------------------------------------------------------
                | MODULE TYPE
                |--------------------------------------------------------------------------
                */

                $moduleTitle =
                    strtolower(
                        $module->title ?? ''
                    );


                $moduleCategory =
                    strtolower(
                        $module->category ?? ''
                    );


                /*
                |--------------------------------------------------------------------------
                | SHIP MODEL
                |--------------------------------------------------------------------------
                */

                $isShipModel =

                    str_contains(
                        $moduleTitle,
                        'ship model'
                    )

                    ||

                    str_contains(
                        $moduleCategory,
                        'cargo'
                    )

                    ||

                    str_contains(
                        $moduleCategory,
                        'freight'
                    )

                    ||

                    str_contains(
                        $moduleCategory,
                        'passenger'
                    )

                    ||

                    str_contains(
                        $moduleCategory,
                        'offshore'
                    );


                /*
                |--------------------------------------------------------------------------
                | SAFETY / PPE
                |--------------------------------------------------------------------------
                */

                $isSafetyEquipment =

                    str_contains(
                        $moduleTitle,
                        'safety equipment'
                    )

                    ||

                    str_contains(
                        $moduleCategory,
                        'ppe'
                    )

                    ||

                    str_contains(
                        $moduleCategory,
                        'safety'
                    );


                /*
                |--------------------------------------------------------------------------
                | FALLBACK ICON
                |--------------------------------------------------------------------------
                */

                $fallbackIcon = '📚';

                if (
                    str_contains(
                        $moduleTitle,
                        'engine'
                    )
                ) {

                    $fallbackIcon = '⚙️';

                }

                elseif ($isShipModel) {

                    $fallbackIcon = '🚢';

                }

                elseif ($isSafetyEquipment) {

                    $fallbackIcon = '🦺';

                }

            @endphp



            <article class="card">


                <div class="card-top">


                    {{-- =================================================
                         IMAGE
                    ================================================== --}}

                    <div class="image-wrapper">


                        @if($moduleImageUrl)

                            <img
                                src="{{ $moduleImageUrl }}"
                                alt="{{ $module->title }}"
                                class="module-image"

                                onerror="
                                    this.style.display='none';
                                    this.nextElementSibling.style.display='flex';
                                "
                            >


                            <div
                                class="no-image"
                                style="display:none;"
                            >

                                <div class="no-image-icon">
                                    {{ $fallbackIcon }}
                                </div>

                                <strong>
                                    Image unavailable
                                </strong>

                                <small>
                                    Edit this module and upload
                                    a valid module image.
                                </small>

                            </div>


                        @else

                            <div class="no-image">

                                <div class="no-image-icon">
                                    {{ $fallbackIcon }}
                                </div>

                                <strong>
                                    No Module Image
                                </strong>

                                <small>
                                    Edit this module and upload
                                    an image to display it here.
                                </small>

                            </div>

                        @endif


                    </div>



                    {{-- =================================================
                         TITLE + CATEGORY
                    ================================================== --}}

                    <div class="module-main">


                        <h2>
                            {{ $module->title }}
                        </h2>


                        <div class="category">
                            📚 {{ $module->category }}
                        </div>


                    </div>


                </div>



                {{-- =====================================================
                     DESCRIPTION + FUNCTION
                ====================================================== --}}

                <div class="module-copy">


                    <div class="module-copy-block">

                        <h3>
                            Description
                        </h3>

                        <p>
                            {{ $module->description }}
                        </p>

                    </div>


                    <div class="module-copy-block">

                        <h3>
                            Function
                        </h3>

                        <p>
                            {{ $module->function }}
                        </p>

                    </div>


                </div>



                {{-- =====================================================
                     ACTIONS
                ====================================================== --}}

                <div class="actions">


                    <a
                        href="/admin/modules/{{ $module->id }}/edit"
                        class="btn edit"
                    >
                        ✏ Edit
                    </a>


                    <form
                        action="/admin/modules/{{ $module->id }}"
                        method="POST"
                        onsubmit="return confirm('Delete this module?')"
                    >

                        @csrf

                        @method('DELETE')


                        <button
                            type="submit"
                            class="btn delete"
                        >
                            🗑 Delete
                        </button>

                    </form>



                    @if($isShipModel)

                        <a
                            href="{{ route('admin.ships.index') }}"
                            class="view-btn ship-btn"
                        >
                            🚢 View Ships
                        </a>


                    @elseif($isSafetyEquipment)

                        <a
                            href="{{ route(
                                'admin.module.equipment',
                                $module->id
                            ) }}"
                            class="view-btn equipment-btn"
                        >
                            ⚓ View Equipment
                        </a>


                    @else

                        <a
                            href="{{ route(
                                'admin.module.equipment',
                                $module->id
                            ) }}"
                            class="view-btn content-btn"
                        >
                            📚 View Content
                        </a>

                    @endif


                </div>


            </article>


        @endforeach


        </section>


    @endif


    {{-- =========================================================
         BACK TO DASHBOARD - BOTTOM LEFT
    ========================================================= --}}

    <div class="bottom-back-area">

        <a
            href="{{ route('admin.dashboard') }}"
            class="back-dashboard"
        >
            ← Back to Dashboard
        </a>

    </div>


</div>


</body>

</html>
