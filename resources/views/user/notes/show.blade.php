<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>{{ $note->title }} - Module Notes</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])


<style>

:root{
    --navy:#0f172a;
    --blue:#0284c7;
    --blue-dark:#0369a1;
    --green:#16a34a;
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


body{
    min-height:100vh;

    padding:34px 18px;

    color:var(--text);

    background:
        linear-gradient(
            135deg,
            rgba(15,23,42,.93),
            rgba(2,132,199,.70)
        ),
        url('/images/ship-bg.jpg');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    background-attachment:fixed;
}


.page-wrapper{
    width:100%;
    max-width:1050px;
    margin:0 auto;
}


/* =========================================================
   HEADER
========================================================= */

.note-hero{
    padding:30px;

    margin-bottom:20px;

    border-radius:24px;

    color:white;

    background:
        linear-gradient(
            135deg,
            rgba(14,116,144,.96),
            rgba(15,23,42,.97)
        );

    box-shadow:
        0 16px 36px rgba(0,0,0,.22);
}


.note-label{
    display:inline-flex;

    align-items:center;

    gap:7px;

    margin-bottom:10px;

    padding:7px 12px;

    border-radius:999px;

    background:rgba(255,255,255,.12);

    color:#e0f2fe;

    font-size:12px;
    font-weight:800;
}


.note-hero h1{
    font-size:clamp(29px,4vw,40px);

    line-height:1.2;

    font-weight:900;

    overflow-wrap:anywhere;
}


.note-module{
    display:inline-flex;

    align-items:center;

    margin-top:12px;

    padding:7px 11px;

    border-radius:999px;

    background:rgba(56,189,248,.16);

    color:#bae6fd;

    font-size:12px;
    font-weight:800;
}


/* =========================================================
   CONTENT CARD
========================================================= */

.note-card{
    padding:28px;

    border-radius:24px;

    background:rgba(255,255,255,.98);

    box-shadow:
        0 16px 38px rgba(0,0,0,.18);
}


.content-title{
    padding-bottom:15px;

    margin-bottom:18px;

    border-bottom:1px solid #e2e8f0;

    color:#0f172a;

    font-size:19px;
    font-weight:900;
}


.note-content{
    white-space:pre-line;

    color:#334155;

    font-size:14.5px;

    line-height:1.85;

    overflow-wrap:anywhere;
}


/* =========================================================
   BUTTONS
========================================================= */

.note-actions{
    display:flex;

    align-items:center;

    gap:10px;

    flex-wrap:wrap;

    margin-top:25px;

    padding-top:20px;

    border-top:1px solid #e2e8f0;
}


.pdf-btn,
.back{
    min-height:44px;

    display:inline-flex;

    align-items:center;
    justify-content:center;

    padding:10px 18px;

    border-radius:11px;

    color:white;

    text-decoration:none;

    font-size:13px;
    font-weight:800;

    transition:.2s ease;
}


.pdf-btn{
    background:#16a34a;
}


.pdf-btn:hover{
    background:#15803d;

    transform:translateY(-2px);
}


.back{
    background:#0f172a;
}


.back:hover{
    background:#0284c7;

    transform:translateY(-2px);
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


    .note-hero{
        margin-bottom:10px;

        padding:23px 17px;

        border-radius:0 0 22px 22px;
    }


    .note-hero h1{
        font-size:27px;
    }


    .note-card{
        width:calc(100% - 16px);

        margin:0 8px 12px;

        padding:18px;

        border-radius:18px;
    }


    .note-content{
        font-size:14px;

        line-height:1.78;
    }


    .note-actions{
        display:grid;

        grid-template-columns:1fr;
    }


    .pdf-btn,
    .back{
        width:100%;
    }

}

</style>

</head>


<body>


<div class="page-wrapper">


    <section class="note-hero">

        <div class="note-label">
            📘 Module Note
        </div>


        <h1>
            {{ $note->title }}
        </h1>


        <div class="note-module">
            📚
            {{ $note->module->title
                ?? $note->module->name
                ?? '-' }}
        </div>

    </section>



    <article class="note-card">


        <div class="content-title">
            Learning Notes
        </div>


        <div class="note-content">
            {{ $note->content }}
        </div>



        <div class="note-actions">


            @if($note->pdf)

                @php

                    $rawPdf =
                        trim(
                            (string) $note->pdf
                        );


                    if (
                        str_starts_with($rawPdf, 'http://')
                        ||
                        str_starts_with($rawPdf, 'https://')
                    ) {

                        $pdfUrl =
                            $rawPdf;

                    }

                    else {

                        $normalizedPdf =
                            ltrim(
                                str_replace(
                                    '\\',
                                    '/',
                                    $rawPdf
                                ),
                                '/'
                            );


                        if (
                            str_starts_with(
                                $normalizedPdf,
                                'storage/'
                            )
                        ) {

                            $pdfUrl =
                                asset(
                                    $normalizedPdf
                                );

                        }

                        elseif (
                            str_starts_with(
                                $normalizedPdf,
                                'notes/'
                            )
                        ) {

                            $pdfUrl =
                                asset(
                                    'storage/' .
                                    $normalizedPdf
                                );

                        }

                        else {

                            $pdfUrl =
                                asset(
                                    'storage/notes/' .
                                    basename(
                                        $normalizedPdf
                                    )
                                );

                        }

                    }

                @endphp


                <a
                    class="pdf-btn"
                    href="{{ $pdfUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    📄 View PDF
                </a>

            @endif



            <a
                class="back"
                href="{{ route('user.notes') }}"
            >
                ← Back
            </a>


        </div>


    </article>


</div>


</body>

</html>
