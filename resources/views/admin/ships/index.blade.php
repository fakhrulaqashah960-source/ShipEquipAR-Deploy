<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Type of Ship Management
    </title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }


        body {
            background: #eef6fb;
            padding: 40px;
            color: #0f172a;
        }


        /* =========================
           HEADER
        ========================= */

        .header {
            background: white;
            padding: 35px;
            border-radius: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .12);
            margin-bottom: 25px;
        }


        .header h1 {
            font-size: 38px;
            font-weight: 800;
        }


        .header p {
            margin-top: 10px;
            color: #64748b;
            font-size: 17px;
        }



        /* =========================
           ADD BUTTON
        ========================= */

        .add-btn {
            display: inline-block;
            background: #0284c7;
            color: white;
            padding: 13px 25px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 30px;
        }


        .add-btn:hover {
            background: #0369a1;
        }



        /* =========================
           CARD
        ========================= */

        .card {
            background: white;
            padding: 30px;
            border-radius: 22px;
            margin-bottom: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .12);
        }


        .card img {
            width: 250px;
            height: 160px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 20px;
            display: block;
        }


        .card h2 {
            font-size: 30px;
            margin-bottom: 15px;
        }


        .card p {
            color: #64748b;
            line-height: 1.7;
        }



        /* =========================
           AR MODEL
        ========================= */

        .ar-section {
            margin-top: 18px;
            margin-bottom: 20px;
        }


        .ar-title {
            font-weight: 700;
            color: #334155;
            margin-bottom: 10px;
        }


        .ar-btn {
            display: inline-block;
            padding: 10px 18px;
            background: #7c3aed;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
        }


        .ar-btn:hover {
            background: #6d28d9;
        }


        .no-ar {
            color: #94a3b8;
        }



        /* =========================
           ACTION BUTTONS
        ========================= */

        .actions {
            margin-top: 25px;
        }


        .btn {
            display: inline-block;
            padding: 11px 20px;
            border-radius: 10px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            margin-right: 10px;
        }


        .view {
            background: #0284c7;
        }


        .edit {
            background: #2563eb;
        }


        .delete {
            background: #dc2626;
        }


        .delete:hover {
            background: #b91c1c;
        }


        button {
            border: none;
            cursor: pointer;
        }



        /* =========================
           EMPTY
        ========================= */

        .empty {
            background: white;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            margin-bottom: 25px;
        }


        .empty h2 {
            margin-bottom: 10px;
        }


        .empty p {
            color: #64748b;
        }



        /* =========================
           BACK BUTTON
        ========================= */

        .back {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 25px;
            background: #0f172a;
            color: white;
            border-radius: 10px;
            text-decoration: none;
        }


        .back:hover {
            background: #1e293b;
        }



        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            body {
                padding: 20px;
            }


            .header {
                padding: 25px;
            }


            .header h1 {
                font-size: 29px;
            }


            .card img {
                width: 100%;
                height: auto;
                max-height: 260px;
            }


            .btn {
                margin-bottom: 10px;
            }
        }

    </style>

</head>


<body>


    {{-- =========================
         HEADER
    ========================== --}}

    <div class="header">

        <h1>
            🚢 Type of Ship Management
        </h1>

        <p>
            Manage ship categories and AR learning models
        </p>

    </div>



    {{-- =========================
         ADD SHIP
    ========================== --}}

    <a href="{{ route('admin.ships.create') }}"
       class="add-btn">

        + Add Ship

    </a>



    {{-- =========================
         SUCCESS MESSAGE
    ========================== --}}

    @if(session('success'))

        <div style="
            background:#dcfce7;
            color:#166534;
            padding:15px 20px;
            border-radius:10px;
            margin-bottom:25px;
            font-weight:600;
        ">

            {{ session('success') }}

        </div>

    @endif



    {{-- =========================
         NO SHIPS
    ========================== --}}

    @if($ships->count() == 0)

        <div class="empty">

            <h2>
                No Ship Type Available
            </h2>

            <p>
                Please add ship category.
            </p>

        </div>

    @endif



    {{-- =========================
         SHIP LIST
    ========================== --}}

    @foreach($ships as $ship)

        @php

            /*
            |--------------------------------------------------------------------------
            | IMAGE URL
            |--------------------------------------------------------------------------
            |
            | Data baru:
            | https://github.com/.../image.jpg
            |
            | Data lama:
            | filename.jpg
            |
            */

            $shipImageUrl = null;

            if ($ship->image) {

                if (
                    str_starts_with($ship->image, 'http://') ||
                    str_starts_with($ship->image, 'https://')
                ) {

                    $shipImageUrl = $ship->image;

                } else {

                    $shipImageUrl =
                        asset('uploads/ships/' . $ship->image);

                }

            }


            /*
            |--------------------------------------------------------------------------
            | AR MODEL URL
            |--------------------------------------------------------------------------
            |
            | Data baru:
            | URL penuh GitHub Release
            |
            | Data lama:
            | nama fail .reality
            |
            */

            $shipArUrl = null;

            if ($ship->ar_model) {

                if (
                    str_starts_with($ship->ar_model, 'http://') ||
                    str_starts_with($ship->ar_model, 'https://')
                ) {

                    $shipArUrl = $ship->ar_model;

                } else {

                    $shipArUrl =
                        'https://github.com/' .
                        'fakhrulaqashah960-source/' .
                        'ShipEquipAR/' .
                        'releases/latest/download/' .
                        rawurlencode($ship->ar_model);

                }

            }

        @endphp



        <div class="card">


            {{-- =========================
                 SHIP IMAGE
            ========================== --}}

            @if($shipImageUrl)

                <img
                    src="{{ $shipImageUrl }}"
                    alt="{{ $ship->name }}"
                    loading="lazy"
                    onerror="this.style.display='none';"
                >

            @endif



            {{-- =========================
                 SHIP NAME
            ========================== --}}

            <h2>
                🚢 {{ $ship->name }}
            </h2>



            {{-- =========================
                 DESCRIPTION
            ========================== --}}

            @if($ship->description)

                <p>
                    {{ $ship->description }}
                </p>

            @else

                <p>
                    No description available.
                </p>

            @endif



            {{-- =========================
                 AR MODEL
            ========================== --}}

            <div class="ar-section">

                <div class="ar-title">
                    📦 AR Model
                </div>


                @if($shipArUrl)

                    <a
                        href="{{ $shipArUrl }}"
                        class="ar-btn"
                        rel="ar"
                    >

                        📱 Open AR Model

                    </a>

                @else

                    <span class="no-ar">
                        No AR model uploaded
                    </span>

                @endif

            </div>



            {{-- =========================
                 ACTIONS
            ========================== --}}

            <div class="actions">


                <a
                    href="{{ route('admin.ships.edit', $ship->id) }}"
                    class="btn edit"
                >

                    ✏ Edit

                </a>



                <form
                    action="{{ route('admin.ships.destroy', $ship->id) }}"
                    method="POST"
                    style="display:inline"
                    onsubmit="return confirm('Delete this ship?')"
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


            </div>


        </div>

    @endforeach



    {{-- =========================
         BACK
    ========================== --}}

    <a
        href="{{ route('admin.dashboard') }}"
        class="back"
    >

        ← Back Dashboard

    </a>


</body>

</html>