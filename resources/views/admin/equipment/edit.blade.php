<!DOCTYPE html>
<html>

<head>

<title>Edit Equipment</title>

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
    --green:#16a34a;
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
    background-attachment:fixed;
    background-repeat:no-repeat;
}


/* =========================================================
   MAIN CONTAINER
========================================================= */

.container{
    width:100%;
    max-width:1180px;
    margin:0 auto;
    padding:28px;

    background:rgba(255,255,255,.97);

    border-radius:24px;

    box-shadow:
        0 18px 42px rgba(0,0,0,.20);

    overflow:hidden;
}


/* =========================================================
   PAGE TITLE / HEADER
========================================================= */

h1{
    color:var(--text);

    font-size:clamp(28px,4vw,40px);
    line-height:1.2;
    font-weight:900;

    margin-bottom:10px;
}

h1::first-letter{
    color:var(--blue);
}

.subtitle,
.description,
.page-description{
    color:var(--muted);
    font-size:14px;
    line-height:1.7;
}


/* =========================================================
   ADD BUTTON
========================================================= */

.add-btn,
.btn-add{
    display:inline-flex;
    align-items:center;
    justify-content:center;

    min-height:46px;

    margin:18px 0 24px;

    padding:11px 20px;

    border:none;
    border-radius:12px;

    background:var(--blue);
    color:white;

    text-decoration:none;

    font-size:14px;
    font-weight:800;

    cursor:pointer;

    transition:.2s ease;
}

.add-btn:hover,
.btn-add:hover{
    background:var(--blue-dark);
    transform:translateY(-2px);
}


/* =========================================================
   EQUIPMENT LIST / CARDS
========================================================= */

.grid,
.equipment-grid{
    width:100%;

    display:grid;

    grid-template-columns:
        repeat(2,minmax(0,1fr));

    gap:20px;
}

.card,
.equipment-card{
    min-width:0;

    padding:20px;

    background:#f8fafc;

    border:1px solid #e2e8f0;

    border-radius:18px;

    box-shadow:
        0 8px 22px rgba(15,23,42,.08);
}

.card img,
.equipment-card img{
    display:block;

    width:180px;
    height:120px;

    max-width:100%;

    margin:0 auto 16px;

    object-fit:contain;

    padding:6px;

    background:white;

    border:1px solid #e2e8f0;

    border-radius:14px;
}

.card h2,
.equipment-card h2{
    color:var(--blue-dark);

    font-size:20px;
    font-weight:900;
    line-height:1.35;

    margin-bottom:10px;
}

.card p,
.equipment-card p{
    color:#475569;

    font-size:13px;
    line-height:1.7;

    overflow-wrap:anywhere;
}

.card strong,
.equipment-card strong{
    color:#334155;
}


/* =========================================================
   FORMS
========================================================= */

form{
    width:100%;
}

.form-group{
    width:100%;
    margin-bottom:18px;
}

label{
    display:block;

    margin-bottom:8px;

    color:var(--text);

    font-size:14px;
    font-weight:800;
}

input[type="text"],
input[type="url"],
input[type="file"],
input[type="number"],
select,
textarea{
    width:100%;

    min-height:50px;

    padding:12px 14px;

    border:1px solid #cbd5e1;

    border-radius:12px;

    background:white;

    color:var(--text);

    font-size:14px;

    outline:none;

    transition:.2s ease;
}

textarea{
    min-height:150px;

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


/* =========================================================
   CURRENT IMAGE / PREVIEW
========================================================= */

.current-image,
.image-preview,
.preview-box{
    width:100%;

    margin-top:10px;

    padding:15px;

    border-radius:16px;

    background:#f8fafc;

    border:1px solid #e2e8f0;
}

.current-image img,
.image-preview img,
.preview-box img{
    display:block;

    width:180px;
    height:120px;

    max-width:100%;

    object-fit:contain;

    margin-top:10px;

    padding:6px;

    border-radius:12px;

    background:white;

    border:1px solid #e2e8f0;
}


/* =========================================================
   ACTION BUTTONS
========================================================= */

.actions,
.form-actions,
.button-group{
    display:flex;

    align-items:center;

    gap:10px;

    flex-wrap:wrap;

    margin-top:20px;
}

.btn,
button,
.back,
.back-dashboard{
    display:inline-flex;

    align-items:center;
    justify-content:center;

    min-height:44px;

    padding:10px 17px;

    border:none;

    border-radius:11px;

    text-decoration:none;

    font-size:13px;
    font-weight:800;

    cursor:pointer;

    transition:.2s ease;
}

.btn:hover,
button:hover,
.back:hover,
.back-dashboard:hover{
    transform:translateY(-2px);
}

.edit,
.btn-edit{
    background:#2563eb;
    color:white;
}

.delete,
.btn-delete{
    background:var(--red);
    color:white;
}

.save,
.update,
.btn-save,
.btn-update,
button[type="submit"]{
    background:var(--blue);
    color:white;
}

.back,
.back-dashboard,
.btn-back{
    background:var(--navy);
    color:white;
}

.back:hover,
.back-dashboard:hover,
.btn-back:hover{
    background:var(--blue);
}


/* =========================================================
   AR BADGE
========================================================= */

.ar-status,
.ar-badge{
    display:inline-flex;

    align-items:center;

    gap:7px;

    margin-top:12px;

    padding:8px 12px;

    border-radius:10px;

    background:#dcfce7;

    color:#166534;

    font-size:12px;
    font-weight:800;
}


/* =========================================================
   TABLET
========================================================= */

@media(max-width:850px){

    .grid,
    .equipment-grid{
        grid-template-columns:1fr;
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

    .container{
        min-height:100vh;

        padding:18px 12px 28px;

        border-radius:0;
    }

    h1{
        font-size:28px;
    }

    .card,
    .equipment-card{
        padding:16px;

        border-radius:16px;
    }

    .card img,
    .equipment-card img,
    .current-image img,
    .image-preview img,
    .preview-box img{
        width:160px;
        height:105px;
    }

    .actions,
    .form-actions,
    .button-group{
        display:grid;

        grid-template-columns:1fr;
    }

    .actions .btn,
    .actions button,
    .form-actions .btn,
    .form-actions button,
    .button-group .btn,
    .button-group button,
    .back,
    .back-dashboard,
    .btn-back{
        width:100%;
    }

    .add-btn,
    .btn-add{
        width:100%;
    }

}

</style>



</head>


<body>


<div class="container">



<h1>
⚓ Edit Equipment
</h1>



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

enctype="multipart/form-data">



@csrf

@method('PUT')





<label>
Module
</label>


<select name="module_id" required>


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








<label>
Equipment Name
</label>


<input

type="text"

name="name"

value="{{ $equipment->name }}"

required>








<label>
Description
</label>


<textarea

name="description"

required>{{ $equipment->description }}</textarea>








<label>
Function
</label>


<textarea

name="function"

required>{{ $equipment->function }}</textarea>









@if($equipment->image)


<label>
Current Image
</label>


<br><br>


<img

src="{{ (str_starts_with($equipment->image, 'http://') || str_starts_with($equipment->image, 'https://'))
    ? $equipment->image
    : asset('uploads/equipment/' . $equipment->image) }}"



@endif







<label>
Change Equipment Image
</label>


<input

type="file"

name="image"

accept="image/*">








<label>
AR Reality File
</label>


<input

type="file"

name="model_file">






@if($equipment->model_file)


<p>

<b>Current AR File:</b>

{{ $equipment->model_file }}

</p>


@endif






<button type="submit">

💾 Update Equipment

</button>



<a href="{{ route('admin.equipment.index') }}"

class="back-btn">

← Back

</a>




</form>



</div>



</body>

</html>