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
           SUCCESS MESSAGE
        ========================= */

        .success-box {
            background: #dcfce7;
            color: #166534;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            font-weight: 600;
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
            width: 310px;
            height: 200px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 25px;
            display: block;
        }


        .card h2 {
            font-size: 30px;
            margin-bottom: 15px;
        }


        .card p {
            color: #64748b;
            line-height: 1.8;
            font-size: 16px;
        }



        /* =========================
           STATUS
        ========================= */

        .model-status {
            margin-top: 18px;
            padding: 12px 16px;
            background: #f8fafc;
            border-radius: 10px;
            display: inline-block;
            font-weight: 600;
            color: #475569;
        }


        .model-ready {
            color: #166534;
            background: #dcfce7;
        }


        .model-empty {
            color: #64748b;
            background: #f1f5f9;
        }



        /* =========================
           ACTION BUTTONS
        ========================= */

        .actions {
            margin-top: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }


        .btn {
            display: inline-block;
            padding: 11px 20px;
            border-radius: 10px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            border: none;
            cursor: pointer;
            font-size: 15px;
        }


        .edit {
            background: #2563eb;
        }


        .edit:hover {
            background: #1d4ed8;
        }


        .delete {
            background: #dc2626;
        }


        .delete:hover {
            background: #b91c1c;
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
            font-weight: 600;
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


            .card {
                padding: 22px;
            }


            .card img {
                width: 100%;
                height: auto;
                max-height: 260px;
            }


            .actions {
                flex-direction: column;
                align-items: stretch;
            }


            .btn {
                width: 100%;
                text-align: center;
            }


            .actions form {
                width: 100%;
            }


            .actions form button {
                width: 100%;
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
            Manage ship categories, images and AR learning models
        </p>

    </div>



    {{-- =========================
         ADD SHIP
    ========================== --}}

    <a
        href="{{ route('admin.ships.create') }}"
        class="add-btn"
    >
        + Add Ship
    </a>



    {{-- =========================
         SUCCESS MESSAGE
    ========================== --}}

    @if(session('success'))

        <div class="success-box">
            {{ session('success') }}
        </div>

    @endif



    {{-- =========================
         EMPTY
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
            | GitHub Release full URL
            |
            | Data lama:
            | filename sahaja
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
                 AR STATUS ONLY
                 ADMIN TAK BOLEH OPEN
            ========================== --}}

            @if($ship->ar_model)

                <div class="model-status model-ready">
                    ✅ AR Model Uploaded
                </div>

            @else

                <div class="model-status model-empty">
                    No AR Model Uploaded
                </div>

            @endif



            {{-- =========================
                 ADMIN ACTIONS
            ========================== --}}

            <div class="actions">


                {{-- EDIT --}}

                <a
                    href="{{ route('admin.ships.edit', $ship->id) }}"
                    class="btn edit"
                >
                    ✏ Edit
                </a>



                {{-- DELETE --}}

                <form
                    action="{{ route('admin.ships.destroy', $ship->id) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this ship?')"
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