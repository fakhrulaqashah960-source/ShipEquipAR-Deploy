<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Module Notes</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])


<style>

:root{
    --navy:#0f172a;
    --blue:#0284c7;
    --blue-dark:#0369a1;
    --cyan:#38bdf8;
    --green:#16a34a;
    --text:#0f172a;
    --muted:#64748b;
    --line:#e2e8f0;
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
    max-width:1180px;
    margin:0 auto;
}


/* =========================================================
   HERO
========================================================= */

.notes-hero{
    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:24px;

    margin-bottom:20px;

    padding:32px;

    border-radius:26px;

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


.notes-hero-copy{
    min-width:0;
}


.notes-label{
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


.notes-hero h1{
    font-size:clamp(30px,4vw,42px);
    line-height:1.2;
    font-weight:900;
}


.notes-hero p{
    max-width:720px;

    margin-top:10px;

    color:#e0f2fe;

    font-size:15px;
    line-height:1.7;
}


.notes-hero-icon{
    flex:0 0 auto;

    width:88px;
    height:88px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:22px;

    background:rgba(255,255,255,.12);

    font-size:42px;
}


/* =========================================================
   PANEL
========================================================= */

.notes-panel{
    width:100%;

    padding:24px;

    border-radius:24px;

    background:rgba(255,255,255,.97);

    box-shadow:
        0 16px 38px rgba(0,0,0,.18);
}


.notes-panel-title{
    margin-bottom:18px;
}


.notes-panel-title h2{
    color:#0f172a;

    font-size:22px;
    font-weight:900;
}


.notes-panel-title p{
    margin-top:5px;

    color:#64748b;

    font-size:13px;
    line-height:1.6;
}


/* =========================================================
   NOTES GRID
========================================================= */

.notes-grid{
    display:grid;

    grid-template-columns:
        repeat(2,minmax(0,1fr));

    gap:17px;
}


.note-card{
    min-width:0;

    display:flex;
    flex-direction:column;

    padding:20px;

    border:1px solid #e2e8f0;

    border-radius:18px;

    background:#f8fafc;

    box-shadow:
        0 8px 20px rgba(15,23,42,.07);

    transition:.2s ease;
}


.note-card:hover{
    transform:translateY(-2px);

    box-shadow:
        0 13px 28px rgba(15,23,42,.11);
}


.note-card-top{
    display:flex;

    align-items:flex-start;

    gap:13px;
}


.note-icon{
    width:48px;
    height:48px;

    flex:0 0 auto;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:13px;

    background:#e0f2fe;

    font-size:24px;
}


.note-copy{
    min-width:0;
}


.note-copy h3{
    color:#0f172a;

    font-size:19px;
    line-height:1.35;
    font-weight:900;

    overflow-wrap:anywhere;
}


.module-badge{
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


.note-action{
    margin-top:auto;

    padding-top:18px;
}


.view-btn{
    display:inline-flex;

    align-items:center;
    justify-content:center;

    min-height:43px;

    padding:10px 16px;

    border-radius:10px;

    background:#16a34a;

    color:white;

    text-decoration:none;

    font-size:13px;
    font-weight:800;

    transition:.2s ease;
}


.view-btn:hover{
    background:#15803d;

    transform:translateY(-2px);
}


/* =========================================================
   EMPTY
========================================================= */

.empty-state{
    padding:42px 20px;

    border:1px dashed #cbd5e1;

    border-radius:18px;

    background:#f8fafc;

    text-align:center;
}


.empty-state div{
    font-size:40px;
}


.empty-state h3{
    margin-top:9px;

    color:#0f172a;

    font-size:20px;
}


.empty-state p{
    margin-top:6px;

    color:#64748b;

    font-size:13px;
}


/* =========================================================
   BACK
========================================================= */

.back-area{
    display:flex;

    justify-content:flex-start;

    margin-top:20px;
}


.back{
    display:inline-flex;

    align-items:center;
    justify-content:center;

    min-height:44px;

    padding:10px 18px;

    border-radius:11px;

    background:#0f172a;

    color:white;

    text-decoration:none;

    font-size:13px;
    font-weight:800;

    transition:.2s ease;
}


.back:hover{
    background:#0284c7;

    transform:translateY(-2px);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width:800px){

    .notes-grid{
        grid-template-columns:1fr;
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


    .notes-hero{
        margin-bottom:10px;

        padding:23px 17px;

        border-radius:0 0 22px 22px;
    }


    .notes-hero-icon{
        display:none;
    }


    .notes-hero h1{
        font-size:28px;
    }


    .notes-panel{
        width:calc(100% - 16px);

        margin:0 8px 12px;

        padding:16px;

        border-radius:18px;
    }


    .note-card{
        padding:16px;
    }


    .view-btn{
        width:100%;
    }


    .back-area{
        padding:0 8px 12px;
    }


    .back{
        width:100%;
    }

}

</style>

</head>


<body>


<div class="page-wrapper">


    <section class="notes-hero">

        <div class="notes-hero-copy">

            <div class="notes-label">
                📘 Learning Resources
            </div>

            <h1>
                Module Notes
            </h1>

            <p>
                Access learning notes prepared by ShipEquipAR
                administrators for your maritime learning modules.
            </p>

        </div>


        <div class="notes-hero-icon">
            📚
        </div>

    </section>



    <section class="notes-panel">


        <div class="notes-panel-title">

            <h2>
                Available Notes
            </h2>

            <p>
                Select a note to view its learning content and PDF resource.
            </p>

        </div>



        @if($notes->count())


            <div class="notes-grid">


                @foreach($notes as $note)


                    <article class="note-card">


                        <div class="note-card-top">

                            <div class="note-icon">
                                📄
                            </div>


                            <div class="note-copy">

                                <h3>
                                    {{ $note->title }}
                                </h3>


                                <div class="module-badge">
                                    📚
                                    {{ $note->module->title
                                        ?? $note->module->name
                                        ?? '-' }}
                                </div>

                            </div>

                        </div>



                        <div class="note-action">

                            <a
                                class="view-btn"
                                href="{{ route(
                                    'user.notes.show',
                                    $note->id
                                ) }}"
                            >
                                View Notes →
                            </a>

                        </div>


                    </article>


                @endforeach


            </div>


        @else


            <div class="empty-state">

                <div>
                    📘
                </div>

                <h3>
                    No Notes Available
                </h3>

                <p>
                    Learning notes have not been added yet.
                </p>

            </div>


        @endif


    </section>



    <div class="back-area">

        <a
            class="back"
            href="{{ route('dashboard') }}"
        >
            ← Back
        </a>

    </div>


</div>


</body>

</html>
