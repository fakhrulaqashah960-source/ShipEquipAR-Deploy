<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Ship</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>

        :root {
            --navy:#0f172a;
            --blue:#0284c7;
            --blue-dark:#0369a1;
            --text:#0f172a;
            --muted:#64748b;
        }

        * {
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI',sans-serif;
        }

        html,
        body {
            width:100%;
            min-height:100%;
        }

        body {
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

        .container {
            width:100%;
            max-width:900px;
            margin:0 auto;
            padding:32px;

            background:rgba(255,255,255,.97);

            border-radius:24px;

            box-shadow:
                0 18px 42px rgba(0,0,0,.20);
        }

        h1 {
            margin-bottom:28px;

            color:#0f172a;

            font-size:clamp(30px,4vw,40px);
            line-height:1.2;
            font-weight:900;

            display:flex;
            align-items:center;
            gap:12px;
        }

        label {
            display:block;

            margin-top:20px;
            margin-bottom:8px;

            color:#0f172a;

            font-size:14px;
            font-weight:800;
        }

        input,
        textarea {
            width:100%;
            min-height:52px;

            padding:12px 14px;

            border:1px solid #cbd5e1;
            border-radius:12px;

            background:white;

            color:#0f172a;

            font-size:14px;

            outline:none;

            transition:.2s ease;
        }

        input[type="file"] {
            padding:13px;
        }

        textarea {
            min-height:170px;

            resize:vertical;

            line-height:1.65;
        }

        input:focus,
        textarea:focus {
            border-color:#0284c7;

            box-shadow:
                0 0 0 3px rgba(2,132,199,.12);
        }

        .current-box {
            margin-top:10px;

            padding:16px;

            background:#f8fafc;

            border:1px solid #e2e8f0;
            border-radius:16px;
        }

        .current-box h3 {
            margin-bottom:12px;

            color:#334155;

            font-size:15px;
        }

        .current-image {
            display:block;

            width:240px;
            height:155px;
            max-width:100%;

            object-fit:contain;

            padding:6px;

            background:white;

            border:1px solid #e2e8f0;
            border-radius:13px;
        }

        .file-note {
            margin-top:7px;

            color:#64748b;

            font-size:12px;
            line-height:1.5;
        }

        .ar-btn {
            display:inline-flex;
            align-items:center;
            justify-content:center;

            min-height:44px;

            padding:10px 17px;

            border-radius:11px;

            background:#7c3aed;

            color:white;

            text-decoration:none;

            font-size:13px;
            font-weight:800;
        }

        .ar-btn:hover {
            background:#6d28d9;
        }

        .no-file {
            color:#64748b;
            font-size:13px;
        }

        .button-group {
            display:flex;
            align-items:center;

            gap:10px;

            margin-top:28px;

            flex-wrap:wrap;
        }

        .update-btn,
        .back-btn {
            min-height:45px;

            display:inline-flex;
            align-items:center;
            justify-content:center;

            padding:10px 18px;

            border:none;
            border-radius:11px;

            font-size:13px;
            font-weight:800;

            text-decoration:none;

            cursor:pointer;

            transition:.2s ease;
        }

        .update-btn {
            background:#0284c7;
            color:white;
        }

        .update-btn:hover {
            background:#0369a1;
            transform:translateY(-2px);
        }

        .back-btn {
            background:#0f172a;
            color:white;
        }

        .back-btn:hover {
            background:#0284c7;
            transform:translateY(-2px);
        }

        .error-box {
            margin-bottom:20px;

            padding:14px 16px;

            border-radius:12px;

            background:#fee2e2;

            border:1px solid #fecaca;

            color:#991b1b;

            font-size:13px;
        }

        .error-box ul {
            padding-left:18px;
        }

        .field-error {
            margin-top:7px;

            color:#dc2626;

            font-size:12px;
        }

        @media(max-width:600px) {

            body {
                padding:0;
                background-attachment:scroll;
            }

            .container {
                min-height:100vh;

                padding:22px 14px 30px;

                border-radius:0;
            }

            h1 {
                font-size:28px;
            }

            .button-group {
                display:grid;

                grid-template-columns:1fr;
            }

            .update-btn,
            .back-btn {
                width:100%;
            }
        }

    </style>


</head>


<body>


@php

    /*
    |--------------------------------------------------------------------------
    | Current Image URL
    |--------------------------------------------------------------------------
    |
    | New data:
    | Full GitHub Release URL
    |
    | Old data:
    | Just filename
    |
    */

    $currentImage = null;

    if ($ship->image) {

        if (
            str_starts_with($ship->image, 'http://') ||
            str_starts_with($ship->image, 'https://')
        ) {

            $currentImage = $ship->image;

        } else {

            $currentImage =
                asset('uploads/ships/' . $ship->image);

        }

    }


    /*
    |--------------------------------------------------------------------------
    | Current AR URL
    |--------------------------------------------------------------------------
    |
    | New data:
    | Full GitHub Release URL
    |
    | Old data:
    | Just .reality filename
    |
    */

    $currentAr = null;

    if ($ship->ar_model) {

        if (
            str_starts_with($ship->ar_model, 'http://') ||
            str_starts_with($ship->ar_model, 'https://')
        ) {

            $currentAr = $ship->ar_model;

        } else {

            $currentAr =
                'https://github.com/' .
                'fakhrulaqashah960-source/' .
                'ShipEquipAR/' .
                'releases/latest/download/' .
                rawurlencode($ship->ar_model);

        }

    }

@endphp



<div class="container">


    <h1>
        ⚓ Edit Ship
    </h1>


    {{-- =========================
         VALIDATION ERRORS
    ========================== --}}

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



    {{-- =========================
         UPDATE FORM
    ========================== --}}

    <form
        action="{{ route('admin.ships.update', $ship->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        @method('PUT')



        {{-- =========================
             SHIP NAME
        ========================== --}}

        <label for="name">
            Ship Name
        </label>


        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $ship->name) }}"
            required
        >


        @error('name')

            <div class="field-error">
                {{ $message }}
            </div>

        @enderror



        {{-- =========================
             DESCRIPTION
        ========================== --}}

        <label for="description">
            Description
        </label>


        <textarea
            name="description"
            id="description"
        >{{ old('description', $ship->description) }}</textarea>


        @error('description')

            <div class="field-error">
                {{ $message }}
            </div>

        @enderror



        {{-- =========================
             CURRENT IMAGE
        ========================== --}}

        <label>
            Current Ship Image
        </label>


        <div class="current-box">

            @if($currentImage)

                <img
                    src="{{ $currentImage }}"
                    alt="{{ $ship->name }}"
                    class="current-image"
                    onerror="this.style.display='none';"
                >

            @else

                <span class="no-file">
                    No image uploaded.
                </span>

            @endif

        </div>



        {{-- =========================
             CHANGE IMAGE
        ========================== --}}

        <label for="image">
            Change Ship Image
        </label>


        <input
            type="file"
            name="image"
            id="image"
            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
        >


        <div class="file-note">
            Leave empty if you want to keep the current image.
            Accepted: JPG, JPEG, PNG or WEBP.
        </div>


        @error('image')

            <div class="field-error">
                {{ $message }}
            </div>

        @enderror



        {{-- =========================
             CURRENT AR MODEL
        ========================== --}}

        <label>
            Current AR Model
        </label>


        <div class="current-box">

            @if($currentAr)

                <h3>
                    📦 AR Model Available
                </h3>


                <a
                    href="{{ $currentAr }}"
                    class="ar-btn"
                    rel="ar"
                >
                    📱 Open Current AR Model
                </a>

            @else

                <span class="no-file">
                    No AR model uploaded.
                </span>

            @endif

        </div>



        {{-- =========================
             CHANGE AR MODEL
        ========================== --}}

        <label for="ar_model">
            Change AR Model (.reality)
        </label>


        <input
            type="file"
            name="ar_model"
            id="ar_model"
            accept=".reality"
        >


        <div class="file-note">
            Leave empty if you want to keep the current AR model.
            Only .reality files are accepted.
        </div>


        @error('ar_model')

            <div class="field-error">
                {{ $message }}
            </div>

        @enderror



        {{-- =========================
             BUTTONS
        ========================== --}}

        <div class="button-group">


            <button
                type="submit"
                class="update-btn"
            >
                💾 Update Ship
            </button>


            <a
                href="{{ route('admin.ships.index') }}"
                class="back-btn"
            >
                ← Back
            </a>


        </div>


    </form>


</div>


</body>

</html>