<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Module Notes</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
:root{
    --navy:#0f172a;
    --navy2:#102a43;
    --blue:#0284c7;
    --blue-dark:#0369a1;
    --cyan:#38bdf8;
    --white:#ffffff;
    --text:#0f172a;
    --muted:#64748b;
    --line:#dbe5ef;
    --green:#16a34a;
    --red:#dc2626;
}

*{
    box-sizing:border-box;
    margin:0;
    padding:0;
    font-family:'Segoe UI',sans-serif;
}

html,body{
    width:100%;
    min-height:100%;
}

body.notes-page{
    min-height:100vh;
    padding:34px 18px;
    color:var(--text);
    background:
        linear-gradient(135deg,rgba(3,37,65,.88),rgba(2,132,199,.70)),
        url('https://images.unsplash.com/photo-1569263979104-865ab7cd8d13');
    background-size:cover;
    background-position:center;
    background-attachment:fixed;
}

.notes-shell{
    width:100%;
    max-width:1180px;
    margin:0 auto;
}

.notes-hero{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:22px;
    padding:30px;
    border-radius:24px;
    color:white;
    background:linear-gradient(135deg,rgba(2,132,199,.96),rgba(15,23,42,.98));
    box-shadow:0 18px 40px rgba(0,0,0,.22);
    margin-bottom:20px;
}

.notes-hero-copy{
    min-width:0;
}

.notes-eyebrow{
    display:inline-flex;
    align-items:center;
    gap:7px;
    padding:7px 12px;
    border-radius:999px;
    margin-bottom:10px;
    background:rgba(255,255,255,.12);
    color:#e0f2fe;
    font-size:12px;
    font-weight:800;
}

.notes-hero h1{
    font-size:clamp(28px,4vw,42px);
    line-height:1.15;
    font-weight:900;
}

.notes-hero p{
    max-width:760px;
    margin-top:10px;
    color:#dbeafe;
    line-height:1.7;
    font-size:15px;
}

.notes-hero-icon{
    flex:0 0 auto;
    width:86px;
    height:86px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:22px;
    background:rgba(255,255,255,.12);
    font-size:42px;
}

.notes-panel{
    width:100%;
    padding:24px;
    border-radius:24px;
    background:rgba(255,255,255,.97);
    box-shadow:0 16px 38px rgba(0,0,0,.18);
}

.notes-toolbar{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:14px;
    margin-bottom:20px;
}

.notes-toolbar-copy h2{
    font-size:22px;
    font-weight:900;
}

.notes-toolbar-copy p{
    margin-top:5px;
    color:var(--muted);
    font-size:13px;
}

.notes-btn{
    min-height:44px;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:7px;
    padding:10px 17px;
    border:none;
    border-radius:11px;
    text-decoration:none;
    color:white;
    font-size:13px;
    font-weight:800;
    cursor:pointer;
    transition:.2s ease;
    white-space:nowrap;
}

.notes-btn:hover{
    transform:translateY(-2px);
}

.notes-btn-blue{ background:#0284c7; }
.notes-btn-blue:hover{ background:#0369a1; }

.notes-btn-edit{ background:#2563eb; }
.notes-btn-edit:hover{ background:#1d4ed8; }

.notes-btn-green{ background:#16a34a; }
.notes-btn-green:hover{ background:#15803d; }

.notes-btn-red{ background:#dc2626; }
.notes-btn-red:hover{ background:#b91c1c; }

.notes-btn-dark{ background:#0f172a; }
.notes-btn-dark:hover{ background:#0284c7; }

.notes-grid{
    display:grid;
    grid-template-columns:repeat(2,minmax(0,1fr));
    gap:18px;
}

.note-card{
    min-width:0;
    display:flex;
    flex-direction:column;
    padding:20px;
    border:1px solid #e2e8f0;
    border-radius:18px;
    background:#f8fafc;
    box-shadow:0 8px 22px rgba(15,23,42,.08);
}

.note-card-top{
    display:flex;
    align-items:flex-start;
    gap:14px;
}

.note-icon{
    flex:0 0 auto;
    width:50px;
    height:50px;
    border-radius:14px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#e0f2fe;
    font-size:25px;
}

.note-main{
    min-width:0;
}

.note-main h3{
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

.note-desc{
    margin-top:16px;
    color:#475569;
    font-size:13px;
    line-height:1.65;
    overflow-wrap:anywhere;
}

.note-actions{
    margin-top:auto;
    padding-top:18px;
    display:flex;
    gap:9px;
    flex-wrap:wrap;
}

.note-actions form{
    display:inline-flex;
}

.empty-notes{
    padding:42px 20px;
    border:1px dashed #cbd5e1;
    border-radius:18px;
    text-align:center;
    background:#f8fafc;
}

.empty-notes .empty-icon{
    font-size:42px;
}

.empty-notes h3{
    margin-top:10px;
    font-size:21px;
}

.empty-notes p{
    margin-top:6px;
    color:var(--muted);
}

.notes-bottom{
    margin-top:20px;
    display:flex;
    justify-content:flex-start;
}

/* FORM */
.form-card{
    padding:26px;
    border-radius:24px;
    background:rgba(255,255,255,.97);
    box-shadow:0 16px 38px rgba(0,0,0,.18);
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

.form-label{
    display:block;
    margin-bottom:8px;
    color:#0f172a;
    font-size:14px;
    font-weight:850;
}

.form-control{
    width:100%;
    min-height:50px;
    padding:12px 14px;
    border:1px solid #cbd5e1;
    border-radius:12px;
    background:white;
    color:#0f172a;
    font-size:14px;
    outline:none;
    transition:.2s ease;
}

.form-control:focus{
    border-color:#0284c7;
    box-shadow:0 0 0 3px rgba(2,132,199,.12);
}

textarea.form-control{
    resize:vertical;
    line-height:1.65;
}

textarea.description-box{
    min-height:130px;
}

textarea.content-box{
    min-height:230px;
}

.file-box{
    padding:14px;
    border:1px dashed #94a3b8;
    border-radius:14px;
    background:#f8fafc;
}

.file-box input[type="file"]{
    width:100%;
}

.file-help{
    margin-top:7px;
    color:#64748b;
    font-size:12px;
    line-height:1.5;
}

.current-pdf{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:12px;
    margin-top:10px;
    padding:12px 14px;
    border-radius:12px;
    background:#f1f5f9;
    color:#334155;
    font-size:13px;
}

.form-actions{
    grid-column:1 / -1;
    display:flex;
    align-items:center;
    gap:10px;
    flex-wrap:wrap;
    padding-top:4px;
}

.alert{
    margin-bottom:18px;
    padding:13px 15px;
    border-radius:12px;
    font-size:13px;
    line-height:1.6;
}

.alert-success{
    background:#dcfce7;
    color:#166534;
    border:1px solid #bbf7d0;
}

.alert-error{
    background:#fee2e2;
    color:#991b1b;
    border:1px solid #fecaca;
}

.alert-error ul{
    padding-left:18px;
}

/* TABLET */
@media(max-width:850px){
    .notes-grid{
        grid-template-columns:1fr;
    }

    .form-grid{
        grid-template-columns:1fr;
    }

    .form-group.full,
    .form-actions{
        grid-column:1;
    }
}

/* MOBILE */
@media(max-width:600px){
    body.notes-page{
        padding:0;
        background-attachment:scroll;
    }

    .notes-shell{
        max-width:none;
    }

    .notes-hero{
        border-radius:0 0 22px 22px;
        padding:22px 17px;
        margin-bottom:10px;
    }

    .notes-hero-icon{
        display:none;
    }

    .notes-hero h1{
        font-size:28px;
    }

    .notes-panel,
    .form-card{
        margin:0 8px 12px;
        width:calc(100% - 16px);
        padding:16px;
        border-radius:18px;
    }

    .notes-toolbar{
        align-items:stretch;
        flex-direction:column;
    }

    .notes-toolbar .notes-btn{
        width:100%;
    }

    .note-card{
        padding:16px;
    }

    .note-actions{
        display:grid;
        grid-template-columns:1fr;
    }

    .note-actions .notes-btn,
    .note-actions form,
    .note-actions form .notes-btn{
        width:100%;
    }

    .form-actions{
        display:grid;
        grid-template-columns:1fr;
    }

    .form-actions .notes-btn{
        width:100%;
    }

    .current-pdf{
        align-items:flex-start;
        flex-direction:column;
    }

    .notes-bottom{
        padding:0 8px 12px;
    }

    .notes-bottom .notes-btn{
        width:100%;
    }
}
</style>

</head>

<body class="notes-page">

<div class="notes-shell">

    <section class="notes-hero">
        <div class="notes-hero-copy">
            <div class="notes-eyebrow">📘 Learning Resources</div>
            <h1>Module Notes Management</h1>
            <p>Manage maritime learning notes, PDF references and module resources for ShipEquipAR users.</p>
        </div>

        <div class="notes-hero-icon">📚</div>
    </section>

    <section class="notes-panel">

        @if(session('success'))
            <div class="alert alert-success">
                { session('success') }
            </div>
        @endif

        <div class="notes-toolbar">
            <div class="notes-toolbar-copy">
                <h2>Learning Notes</h2>
                <p>Create, review and maintain notes for each learning module.</p>
            </div>

            <a href="{{ route('admin.notes.create') }}" class="notes-btn notes-btn-blue">
                ＋ Add Notes
            </a>
        </div>

        @if($notes->count())

            <div class="notes-grid">

                @foreach($notes as $note)

                    @php
                        $rawPdf = trim((string) ($note->pdf ?? ''));
                        $pdfUrl = null;

                        if ($rawPdf !== '') {
                            if (
                                str_starts_with($rawPdf, 'http://')
                                || str_starts_with($rawPdf, 'https://')
                            ) {
                                $pdfUrl = $rawPdf;
                            } else {
                                $normalizedPdf = ltrim(str_replace('\\', '/', $rawPdf), '/');

                                if (str_starts_with($normalizedPdf, 'public/')) {
                                    $normalizedPdf = substr($normalizedPdf, 7);
                                }

                                $pdfUrl = str_contains($normalizedPdf, '/')
                                    ? asset($normalizedPdf)
                                    : asset('uploads/notes/' . $normalizedPdf);
                            }
                        }
                    @endphp

                    <article class="note-card">

                        <div class="note-card-top">
                            <div class="note-icon">📄</div>

                            <div class="note-main">
                                <h3>{{ $note->title }}</h3>

                                <span class="module-badge">
                                    📚 {{ $note->module->title ?? 'No Module' }}
                                </span>
                            </div>
                        </div>

                        @if(!empty($note->description))
                            <p class="note-desc">
                                {{ \Illuminate\Support\Str::limit($note->description, 180) }}
                            </p>
                        @endif

                        <div class="note-actions">

                            @if($pdfUrl)
                                <a href="{{ $pdfUrl }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="notes-btn notes-btn-green">
                                    📄 View PDF
                                </a>
                            @endif

                            <a href="{{ route('admin.notes.edit', $note->id) }}"
                               class="notes-btn notes-btn-edit">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('admin.notes.destroy', $note->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this note?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="notes-btn notes-btn-red">
                                    🗑 Delete
                                </button>
                            </form>

                        </div>

                    </article>

                @endforeach

            </div>

        @else

            <div class="empty-notes">
                <div class="empty-icon">📘</div>
                <h3>No Notes Available</h3>
                <p>Add your first module note to begin.</p>
            </div>

        @endif

    </section>

    <div class="notes-bottom">
        <a href="{{ route('admin.dashboard') }}"
           class="notes-btn notes-btn-dark">
            ← Back to Dashboard
        </a>
    </div>

</div>

</body>
</html>
