<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Edit Equipment</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])


<style>

:root{
    --navy:#0f172a;
    --blue:#0284c7;
    --blue-dark:#0369a1;
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


.page-wrapper{
    width:100%;
    max-width:1000px;
    margin:0 auto;
}


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

    box-shadow:0 18px 40px rgba(0,0,0,.22);
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


.container{
    width:100%;
    padding:30px;

    border-radius:24px;

    background:rgba(255,255,255,.97);

    box-shadow:0 16px 38px rgba(0,0,0,.18);
}


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


.form-grid{
    display:grid;
    grid-template-columns:repeat(2,minmax(0,1fr));
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
select,
textarea{
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
    min-height:165px;

    resize:vertical;

    line-height:1.65;
}


input:focus,
select:focus,
textarea:focus{
    border-color:var(--blue);

    box-shadow:
        0 0 0 3px rgba(2,132,199,.12);
}


.current-box{
    width:100%;
    margin-top:4px;
    padding:16px;

    border:1px solid #e2e8f0;
    border-radius:16px;

    background:#f8fafc;
}


.current-image{
    display:block;

    width:190px;
    height:125px;
    max-width:100%;

    object-fit:contain;

    padding:6px;

    background:white;

    border:1px solid #e2e8f0;
    border-radius:13px;
}


.current-file{
    color:#475569;

    font-size:13px;
    line-height:1.6;

    overflow-wrap:anywhere;
}


.help-text{
    margin-top:7px;

    color:var(--muted);

    font-size:12px;
    line-height:1.5;
}


.form-actions{
    grid-column:1 / -1;

    display:flex;
    align-items:center;

    gap:10px;

    flex-wrap:wrap;

    padding-top:5px;
}


.update-btn,
.back-btn{
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


.update-btn{
    background:var(--blue);
    color:white;
}


.update-btn:hover{
    background:var(--blue-dark);
    transform:translateY(-2px);
}


.back-btn{
    background:var(--navy);
    color:white;
}


.back-btn:hover{
    background:var(--blue);
    transform:translateY(-2px);
}


@media(max-width:800px){

    .form-grid{
        grid-template-columns:1fr;
    }

    .form-group.full,
    .form-actions{
        grid-column:1;
    }

}


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


    .update-btn,
    .back-btn{
        width:100%;
    }

}

</style>

</head>


<body>


<div class="page-wrapper">


    <section class="page-hero">

        <div class="page-hero-label">
            ⚓ Equipment Administration
        </div>

        <h1>
            Edit Equipment
        </h1>

        <p>
            Update equipment information, image and AR Reality model.
        </p>

    </section>


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
            action="{{ route('admin.equipment.update',$equipment->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')


            <div class="form-grid">


                <div class="form-group">

                    <label for="module_id">
                        Module
                    </label>

                    <select
                        id="module_id"
                        name="module_id"
                        required
                    >

                        <option value="">
                            -- Select Module --
                        </option>

                        @foreach($modules as $module)

                            <option
                                value="{{ $module->id }}"
                                {{ $equipment->module_id == $module->id ? 'selected' : '' }}
                            >
                                {{ $module->title }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="form-group">

                    <label for="name">
                        Equipment Name
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $equipment->name) }}"
                        required
                    >

                </div>


                <div class="form-group full">

                    <label for="description">
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        required
                    >{{ old('description', $equipment->description) }}</textarea>

                </div>


                <div class="form-group full">

                    <label for="function">
                        Function
                    </label>

                    <textarea
                        id="function"
                        name="function"
                        required
                    >{{ old('function', $equipment->function) }}</textarea>

                </div>


                <div class="form-group">

                    <label>
                        Current Image
                    </label>

                    <div class="current-box">

                        @if($equipment->image)

                            <img
                                src="{{ (str_starts_with($equipment->image, 'http://') || str_starts_with($equipment->image, 'https://'))
                                    ? $equipment->image
                                    : asset('uploads/equipment/' . $equipment->image) }}"
                                alt="{{ $equipment->name }}"
                                class="current-image"
                                onerror="this.style.display='none';"
                            >

                        @else

                            <div class="current-file">
                                No image uploaded.
                            </div>

                        @endif

                    </div>

                </div>


                <div class="form-group">

                    <label for="image">
                        Change Equipment Image
                    </label>

                    <input
                        type="file"
                        id="image"
                        name="image"
                        accept="image/*"
                    >

                    <div class="help-text">
                        Leave empty to keep the current image.
                    </div>

                </div>


                <div class="form-group full">

                    <label for="model_file">
                        AR Reality File
                    </label>

                    <input
                        type="file"
                        id="model_file"
                        name="model_file"
                        accept=".reality"
                    >

                    @if($equipment->model_file)

                        <div class="current-box">

                            <div class="current-file">
                                <strong>Current AR File:</strong><br>
                                {{ $equipment->model_file }}
                            </div>

                        </div>

                    @endif

                </div>


                <div class="form-actions">

                    <button
                        type="submit"
                        class="update-btn"
                    >
                        💾 Update Equipment
                    </button>


                    <a
                        href="{{ route('admin.equipment.index') }}"
                        class="back-btn"
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
