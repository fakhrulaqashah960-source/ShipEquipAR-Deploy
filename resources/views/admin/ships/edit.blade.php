<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Ship</title>


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


        .container {
            width: 700px;
            max-width: 100%;
            margin: auto;
            background: white;
            padding: 35px;
            border-radius: 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,.08);
            border: 1px solid #e2e8f0;
        }


        h1 {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 12px;
        }


        label {
            display: block;
            font-weight: 700;
            margin-top: 22px;
            margin-bottom: 8px;
        }


        input,
        textarea {
            width: 100%;
            padding: 14px;
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            font-size: 15px;
            background: white;
        }


        input[type="file"] {
            padding: 12px;
            cursor: pointer;
        }


        textarea {
            height: 170px;
            resize: vertical;
        }


        input:focus,
        textarea:focus {
            outline: none;
            border-color: #0284c7;
            box-shadow: 0 0 0 3px rgba(2,132,199,.08);
        }


        .current-box {
            margin-top: 15px;
            padding: 18px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
        }


        .current-box h3 {
            font-size: 16px;
            margin-bottom: 12px;
            color: #334155;
        }


        .current-image {
            width: 240px;
            max-width: 100%;
            max-height: 180px;
            object-fit: cover;
            border-radius: 12px;
            display: block;
        }


        .file-note {
            margin-top: 8px;
            font-size: 13px;
            color: #64748b;
            line-height: 1.5;
        }


        .ar-btn {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 10px;
            background: #7c3aed;
            color: white;
            text-decoration: none;
            font-weight: 700;
        }


        .ar-btn:hover {
            background: #6d28d9;
        }


        .no-file {
            color: #94a3b8;
            font-size: 14px;
        }


        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 35px;
            flex-wrap: wrap;
        }


        .update-btn {
            background: #0284c7;
            color: white;
            border: none;
            padding: 13px 30px;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            font-size: 15px;
        }


        .update-btn:hover {
            background: #0369a1;
        }


        .back-btn {
            background: #111827;
            color: white;
            text-decoration: none;
            padding: 13px 30px;
            border-radius: 10px;
            font-weight: 700;
        }


        .back-btn:hover {
            background: black;
        }


        .error-box {
            background: #fee2e2;
            color: #991b1b;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
        }


        .error-box ul {
            padding-left: 20px;
        }


        .field-error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 7px;
        }


        @media(max-width: 768px) {

            body {
                padding: 20px;
            }


            .container {
                padding: 25px;
            }


            h1 {
                font-size: 27px;
            }


            .button-group {
                flex-direction: column;
            }


            .update-btn,
            .back-btn {
                width: 100%;
                text-align: center;
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