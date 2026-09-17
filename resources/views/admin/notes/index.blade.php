<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">


<title>
Admin Module Notes
</title>


@vite([
    'resources/css/app.css',
    'resources/js/app.js'
])


<style>

:root{

    --navy:#0f172a;
    --blue:#0284c7;
    --blue-dark:#0369a1;
    --green:#16a34a;
    --red:#dc2626;
    --text:#0f172a;
    --muted:#64748b;
    --line:#dbe5ef;

}


*{

    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;

}



body.notes-page{

    min-height:100vh;

    padding:35px 18px;

    color:var(--text);


    background:

    linear-gradient(
        135deg,
        rgba(15,23,42,.90),
        rgba(2,132,199,.70)
    ),

    url('/images/ship-bg.jpg');


    background-size:cover;

    background-position:center;

    background-attachment:fixed;

}




.notes-shell{

    width:100%;

    max-width:1180px;

    margin:auto;

}





/* HERO */


.notes-hero{

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:20px;


    padding:35px;


    margin-bottom:25px;


    border-radius:25px;


    color:white;


    background:

    linear-gradient(
        135deg,
        #0284c7,
        #0f172a
    );


    box-shadow:

    0 18px 40px rgba(0,0,0,.25);

}



.notes-eyebrow{

    display:inline-flex;

    padding:8px 14px;

    border-radius:999px;

    background:rgba(255,255,255,.15);

    color:#e0f2fe;

    font-size:12px;

    font-weight:900;

}



.notes-hero h1{

    margin-top:15px;

    font-size:clamp(30px,4vw,42px);

    font-weight:950;

}



.notes-hero p{

    margin-top:10px;

    color:#dbeafe;

    line-height:1.7;

}



.notes-hero-icon{

    width:90px;

    height:90px;

    display:flex;

    align-items:center;

    justify-content:center;

    border-radius:22px;

    background:rgba(255,255,255,.15);

    font-size:45px;

}





/* PANEL */


.notes-panel{

    padding:25px;

    border-radius:25px;

    background:white;

    box-shadow:

    0 16px 38px rgba(0,0,0,.18);

}



.alert{

    padding:14px;

    margin-bottom:20px;

    border-radius:12px;

    background:#dcfce7;

    color:#166534;

    font-weight:700;

}





.notes-toolbar{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:25px;

}



.notes-toolbar h2{

    font-size:24px;

    font-weight:950;

}



.notes-toolbar p{

    margin-top:5px;

    color:var(--muted);

    font-size:13px;

}




.notes-btn{

    display:inline-flex;

    align-items:center;

    justify-content:center;

    padding:11px 18px;

    border-radius:12px;

    color:white;

    text-decoration:none;

    font-size:13px;

    font-weight:900;

    border:none;

    cursor:pointer;

}



.notes-btn-blue{

    background:#0284c7;

}


.notes-btn-edit{

    background:#2563eb;

}


.notes-btn-red{

    background:#dc2626;

}


.notes-btn-dark{

    background:#0f172a;

}



.notes-btn-green{

    background:#16a34a;

}
.notes-list{

    display:grid;

    grid-template-columns:repeat(
        auto-fit,
        minmax(280px,1fr)
    );

    gap:20px;

}



.note-card{

    padding:22px;

    border-radius:20px;

    border:1px solid var(--line);

    background:#f8fafc;

}



.note-card h3{

    font-size:20px;

    font-weight:950;

    margin-bottom:10px;

}



.note-module{

    display:inline-flex;

    padding:6px 12px;

    border-radius:999px;

    background:#e0f2fe;

    color:#0369a1;

    font-size:12px;

    font-weight:900;

    margin-bottom:15px;

}



.note-content-preview{

    color:#475569;

    font-size:14px;

    line-height:1.6;

    min-height:70px;

}



.note-actions{

    display:flex;

    gap:8px;

    flex-wrap:wrap;

    margin-top:20px;

}



.pdf-btn{

    display:inline-flex;

    align-items:center;

    justify-content:center;

    padding:10px 15px;

    border-radius:10px;

    background:#16a34a;

    color:white;

    text-decoration:none;

    font-size:12px;

    font-weight:900;

}



.empty-box{

    text-align:center;

    padding:40px;

    color:#64748b;

}



@media(max-width:700px){


    body.notes-page{

        padding:15px;

    }


    .notes-hero{

        flex-direction:column;

        align-items:flex-start;

        padding:25px;

    }



    .notes-panel{

        padding:18px;

    }



    .notes-toolbar{

        flex-direction:column;

        align-items:flex-start;

        gap:15px;

    }


    .notes-btn{

        width:100%;

    }


}

.action-area{

    margin-top:40px;

    padding-top:25px;

    border-top:1px solid #e2e8f0;

}


.back-button{

    display:inline-flex;

    padding:13px 30px;

    border-radius:14px;

    background:#0f172a;

    color:white;

    text-decoration:none;

    font-weight:900;

}


.back-button:hover{

    background:#0284c7;

}


</style>


</head>


<body class="notes-page">


<div class="notes-shell">



<section class="notes-hero">


<div>


<div class="notes-eyebrow">

⚓ Admin Learning Management

</div>



<h1>

Module Notes

</h1>



<p>

Manage learning notes, PDF resources
and marine engineering modules.

</p>


</div>



<div class="notes-hero-icon">

📘

</div>


</section>





<section class="notes-panel">


@if(session('success'))


<div class="alert">

{{ session('success') }}


</div>


@endif





<div class="notes-toolbar">


<div>

<h2>

All Notes

</h2>


<p>

Create, update and manage module learning content.

</p>


</div>




<a

href="{{ route('admin.notes.create') }}"

class="notes-btn notes-btn-blue"

>

＋ Add New Note

</a>



</div>





@if($notes->count())



<div class="notes-list">



@foreach($notes as $note)



@php


$pdfUrl = null;


if($note->pdf){


    $pdfPath = trim(
        str_replace(
            '\\',
            '/',
            $note->pdf
        )
    );


    $pdfPath = str_replace(
        'public/',
        '',
        $pdfPath
    );


    $pdfPath = str_replace(
        'storage/',
        '',
        $pdfPath
    );


   $pdfUrl = asset($note->pdf);


}


@endphp




<article class="note-card">


<h3>

{{ $note->title }}

</h3>




<div class="note-module">

📚

{{ $note->module->title 
?? $note->module->name 
?? '-' }}

</div>




<div class="note-content-preview">

{{ Str::limit(
    $note->content,
    120
) }}

</div>





<div class="note-actions">



@if($pdfUrl)


<a

href="{{ $pdfUrl }}"

target="_blank"

rel="noopener noreferrer"

class="pdf-btn"

>

📄 View PDF

</a>


@endif


<a

href="{{ route('admin.notes.edit',$note->id) }}"

class="notes-btn notes-btn-edit"

>

✏ Edit

</a>




<form

action="{{ route('admin.notes.destroy',$note->id) }}"

method="POST"

onsubmit="return confirm('Delete this note?')"

>


@csrf

@method('DELETE')



<button

type="submit"

class="notes-btn notes-btn-red"

>

🗑 Delete

</button>


</form>




</div>



</article>





@endforeach



</div>



@else



<div class="empty-box">

📘

<br>

No notes available yet.

<br>

Create your first learning note.

</div>



@endif





</section>


<div class="action-area">

<a 
href="{{ route('admin.dashboard') }}"
class="back-button"
>

← Back to Dashboard

</a>

</div>


</div>



</body>


</html>