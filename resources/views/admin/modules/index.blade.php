<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Module Management</title>


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


/* =========================================================
   HEADER
========================================================= */

.header{
    background:white;
    padding:35px;
    border-radius:25px;
    box-shadow:0 10px 25px rgba(0,0,0,.12);
    margin-bottom:25px;
}


.header h1{
    font-size:38px;
    font-weight:800;
}


.header p{
    margin-top:10px;
    color:#64748b;
    font-size:16px;
}


/* =========================================================
   ADD BUTTON
========================================================= */

.button-group{
    display:flex;
    gap:20px;
    margin-bottom:30px;
}


.add-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;

    padding:13px 25px;

    border-radius:10px;

    background:#0284c7;

    color:white;

    text-decoration:none;

    font-weight:700;

    transition:.3s;
}


.add-btn:hover{
    background:#0369a1;
    transform:translateY(-2px);
}


/* =========================================================
   MODULE CARD
========================================================= */

.card{
    background:white;

    padding:30px;

    margin-bottom:25px;

    border-radius:22px;

    box-shadow:0 8px 20px rgba(0,0,0,.12);
}


/* =========================================================
   MODULE IMAGE
========================================================= */

.image-wrapper{
    width:220px;
    height:150px;

    background:#f1f5f9;

    border-radius:15px;

    overflow:hidden;

    display:flex;
    align-items:center;
    justify-content:center;

    margin-bottom:20px;

    border:1px solid #e2e8f0;
}


.module-image{
    width:100%;
    height:100%;

    object-fit:cover;

    display:block;
}


.no-image{
    width:100%;
    height:100%;

    display:flex;
    align-items:center;
    justify-content:center;

    color:#64748b;

    font-size:14px;

    font-weight:600;

    text-align:center;
}


/* =========================================================
   TEXT
========================================================= */

.card h2{
    font-size:30px;
    margin-bottom:10px;
}


.category{
    color:#0284c7;
    font-weight:700;
    margin-bottom:20px;
}


.card h3{
    margin-top:20px;
    margin-bottom:8px;
    font-size:17px;
}


.card p{
    color:#475569;
    line-height:1.7;
}


/* =========================================================
   ACTIONS
========================================================= */

.actions{
    margin-top:25px;

    display:flex;

    align-items:center;

    gap:10px;

    flex-wrap:wrap;
}


.actions form{
    display:inline-flex;
}


/* =========================================================
   NORMAL BUTTON
========================================================= */

.btn,
.view-btn{
    display:inline-flex;

    align-items:center;

    justify-content:center;

    gap:7px;

    min-height:42px;

    padding:11px 18px;

    border-radius:10px;

    text-decoration:none;

    color:white;

    font-weight:700;

    font-size:14px;

    border:none;

    cursor:pointer;

    transition:.3s;
}


/* EDIT */

.edit{
    background:#2563eb;
}


.edit:hover{
    background:#1d4ed8;
    transform:translateY(-2px);
}


/* DELETE */

.delete{
    background:#dc2626;
}


.delete:hover{
    background:#b91c1c;
    transform:translateY(-2px);
}


/* =========================================================
   VIEW SHIP
========================================================= */

.ship-btn{
    background:#0284c7;
}


.ship-btn:hover{
    background:#0369a1;
    transform:translateY(-2px);
}


/* =========================================================
   VIEW EQUIPMENT
========================================================= */

.equipment-btn{
    background:#059669;
}


.equipment-btn:hover{
    background:#047857;
    transform:translateY(-2px);
}


/* =========================================================
   VIEW CONTENT
========================================================= */

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
    background:white;

    padding:40px;

    border-radius:20px;

    text-align:center;

    box-shadow:0 8px 20px rgba(0,0,0,.08);
}


.empty h2{
    margin-bottom:10px;
}


.empty p{
    color:#64748b;
}


/* =========================================================
   BACK
========================================================= */

.back-dashboard{
    display:inline-block;

    margin-top:40px;

    padding:12px 25px;

    background:#0f172a;

    color:white;

    border-radius:12px;

    text-decoration:none;

    font-weight:700;

    transition:.3s;
}


.back-dashboard:hover{
    background:#0284c7;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width:700px){

    body{
        padding:20px;
    }

    .header{
        padding:25px;
    }

    .header h1{
        font-size:28px;
    }

    .card{
        padding:22px;
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
    .view-btn{
        width:100%;
    }

    .actions form{
        width:100%;
    }

    .actions form button{
        width:100%;
    }

}

</style>


</head>


<body>


{{-- =========================================================
     HEADER
========================================================= --}}

<div class="header">

    <h1>
        ⚓ ShipEquipAR Learning Management
    </h1>

    <p>
        Manage marine learning modules
    </p>

</div>



{{-- =========================================================
     ADD MODULE
========================================================= --}}

<div class="button-group">

    <a
        href="/admin/modules/create"
        class="add-btn"
    >
        + Add Module
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
            Please add new learning module.
        </p>

    </div>

@endif



{{-- =========================================================
     MODULE LIST
========================================================= --}}

@foreach($modules as $module)


    @php

        /*
        |--------------------------------------------------------------------------
        | MODULE IMAGE URL
        |--------------------------------------------------------------------------
        |
        | Support:
        |
        | 1. Full URL
        | 2. public/uploads/modules
        | 3. public/images/modules
        |
        */

        $moduleImageUrl = null;


        if ($module->image) {


            if (
                str_starts_with($module->image, 'http://')
                ||
                str_starts_with($module->image, 'https://')
            ) {

                $moduleImageUrl =
                    $module->image;

            }

            elseif (
                file_exists(
                    public_path(
                        'uploads/modules/' .
                        $module->image
                    )
                )
            ) {

                $moduleImageUrl =
                    asset(
                        'uploads/modules/' .
                        $module->image
                    );

            }

            elseif (
                file_exists(
                    public_path(
                        'images/modules/' .
                        $module->image
                    )
                )
            ) {

                $moduleImageUrl =
                    asset(
                        'images/modules/' .
                        $module->image
                    );

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

    @endphp



    <div class="card">


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
                    🖼️ Image unavailable
                </div>


            @else

                <div class="no-image">
                    🖼️ No Module Image
                </div>

            @endif


        </div>



        {{-- =================================================
             TITLE
        ================================================== --}}

        <h2>
            {{ $module->title }}
        </h2>



        {{-- =================================================
             CATEGORY
        ================================================== --}}

        <p class="category">

            📚 {{ $module->category }}

        </p>



        {{-- =================================================
             DESCRIPTION
        ================================================== --}}

        <h3>
            Description
        </h3>


        <p>

            {{ $module->description }}

        </p>



        {{-- =================================================
             FUNCTION
        ================================================== --}}

        <h3>
            Function
        </h3>


        <p>

            {{ $module->function }}

        </p>



        {{-- =================================================
             ACTIONS
        ================================================== --}}

        <div class="actions">


            {{-- EDIT --}}

            <a
                href="/admin/modules/{{ $module->id }}/edit"
                class="btn edit"
            >
                ✏ Edit
            </a>



            {{-- DELETE --}}

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



            {{-- =================================================
                 SHIP MODEL
            ================================================== --}}

            @if($isShipModel)

                <a
                    href="{{ route('admin.ships.index') }}"
                    class="view-btn ship-btn"
                >
                    🚢 View Ships
                </a>



            {{-- =================================================
                 SAFETY EQUIPMENT
            ================================================== --}}

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



            {{-- =================================================
                 OTHER MODULES
            ================================================== --}}

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


    </div>


@endforeach



{{-- =========================================================
     BACK DASHBOARD
========================================================= --}}

<a
    href="{{ route('admin.dashboard') }}"
    class="back-dashboard"
>
    ← Back to Dashboard
</a>


</body>

</html>