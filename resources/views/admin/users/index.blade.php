<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Manage Users</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])


<style>

:root{
    --navy:#0f172a;
    --navy-soft:#1e293b;
    --blue:#0284c7;
    --blue-dark:#0369a1;
    --cyan:#38bdf8;
    --text:#0f172a;
    --muted:#64748b;
    --line:#e2e8f0;
    --white:#ffffff;
    --green:#16a34a;
    --red:#dc2626;
    --yellow:#f59e0b;
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

    color:var(--text);

    background:
        linear-gradient(
            135deg,
            rgba(3,37,65,.88),
            rgba(2,132,199,.70)
        ),
        url('/images/ship-bg.jpg');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    background-attachment:fixed;

    overflow-x:hidden;
}


/* =========================================================
   MOBILE TOPBAR
========================================================= */

.admin-mobile-topbar{
    display:none;
}


/* =========================================================
   SIDEBAR
========================================================= */

.admin-sidebar{
    position:fixed;

    top:0;
    left:0;
    bottom:0;

    width:280px;

    padding:28px 20px;

    background:#0f172a;

    color:white;

    z-index:1100;

    overflow-y:auto;
}


.admin-logo{
    margin-bottom:30px;

    padding:6px 10px;
}


.admin-logo-icon{
    margin-bottom:7px;

    font-size:28px;
}


.admin-logo-name{
    color:white;

    font-size:29px;

    font-weight:900;
}


.admin-logo-name span{
    color:var(--cyan);
}


.admin-menu{
    display:flex;

    flex-direction:column;

    gap:9px;
}


.admin-menu-link{
    display:flex;

    align-items:center;

    gap:11px;

    min-height:54px;

    padding:12px 15px;

    border-radius:12px;

    color:#e2e8f0;

    text-decoration:none;

    font-size:14px;

    font-weight:700;

    transition:.2s ease;
}


.admin-menu-link:hover,
.admin-menu-link.active{
    background:#0284c7;

    color:white;
}


.admin-menu-icon{
    width:24px;

    text-align:center;

    flex:0 0 auto;
}


.admin-logout-form{
    margin-top:14px;
}


.admin-logout-btn{
    width:100%;

    min-height:52px;

    padding:12px 15px;

    border:none;

    border-radius:12px;

    background:#dc2626;

    color:white;

    font-size:14px;

    font-weight:800;

    cursor:pointer;

    transition:.2s ease;
}


.admin-logout-btn:hover{
    background:#b91c1c;
}


/* =========================================================
   OVERLAY
========================================================= */

.admin-sidebar-overlay{
    display:none;
}


/* =========================================================
   CONTENT
========================================================= */

.admin-content{
    min-height:100vh;

    margin-left:280px;

    padding:34px;
}


.admin-content-inner{
    width:100%;

    max-width:1350px;

    margin:0 auto;
}


/* =========================================================
   HERO
========================================================= */

.admin-users-hero{
    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:22px;

    padding:32px;

    margin-bottom:22px;

    border-radius:26px;

    color:white;

    background:
        linear-gradient(
            135deg,
            rgba(14,116,144,.96),
            rgba(15,23,42,.98)
        );

    box-shadow:
        0 18px 40px rgba(0,0,0,.22);
}


.admin-users-hero-copy{
    min-width:0;
}


.admin-users-label{
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


.admin-users-hero h1{
    font-size:clamp(31px,4vw,44px);

    line-height:1.15;

    font-weight:900;
}


.admin-users-hero p{
    max-width:750px;

    margin-top:10px;

    color:#dbeafe;

    font-size:15px;

    line-height:1.7;
}


.admin-users-hero-icon{
    width:90px;
    height:90px;

    flex:0 0 auto;

    display:flex;

    align-items:center;
    justify-content:center;

    border-radius:23px;

    background:rgba(255,255,255,.12);

    font-size:44px;
}


/* =========================================================
   PANEL
========================================================= */

.admin-users-panel{
    width:100%;

    padding:25px;

    border-radius:24px;

    background:rgba(255,255,255,.98);

    box-shadow:
        0 16px 38px rgba(0,0,0,.18);
}


.admin-users-toolbar{
    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:16px;

    margin-bottom:20px;

    padding-bottom:18px;

    border-bottom:1px solid var(--line);
}


.admin-users-toolbar-copy h2{
    color:#0f172a;

    font-size:24px;

    font-weight:900;
}


.admin-users-toolbar-copy p{
    margin-top:5px;

    color:#64748b;

    font-size:13px;

    line-height:1.6;
}


.admin-add-user-btn{
    display:inline-flex;

    align-items:center;
    justify-content:center;

    min-height:46px;

    padding:11px 19px;

    border-radius:11px;

    background:#0284c7;

    color:white;

    text-decoration:none;

    font-size:13px;

    font-weight:800;

    white-space:nowrap;

    transition:.2s ease;
}


.admin-add-user-btn:hover{
    background:#0369a1;

    transform:translateY(-2px);
}


/* =========================================================
   DESKTOP TABLE
========================================================= */

.admin-users-table-wrap{
    width:100%;

    overflow-x:auto;

    border:1px solid #e2e8f0;

    border-radius:16px;
}


.admin-users-table{
    width:100%;

    min-width:900px;

    border-collapse:collapse;

    table-layout:auto;

    background:white;
}


.admin-users-table thead th{
    padding:15px 16px;

    background:#0284c7;

    color:white;

    text-align:left;

    font-size:13px;

    font-weight:800;

    white-space:nowrap;
}


.admin-users-table tbody td{
    padding:15px 16px;

    border-bottom:1px solid #e2e8f0;

    color:#334155;

    font-size:13px;

    line-height:1.5;

    vertical-align:middle;
}


.admin-users-table tbody tr:last-child td{
    border-bottom:none;
}


.admin-users-table tbody tr:hover{
    background:#f8fafc;
}


.admin-users-table td.email-cell{
    max-width:300px;

    overflow-wrap:anywhere;

    word-break:break-word;
}


.admin-users-table th:last-child,
.admin-users-table td:last-child{
    text-align:center;
}


/* =========================================================
   BADGES
========================================================= */

.admin-role-badge{
    display:inline-flex;

    align-items:center;

    justify-content:center;

    min-width:68px;

    padding:7px 12px;

    border-radius:999px;

    color:white;

    background:#16a34a;

    font-size:11px;

    font-weight:800;
}


.admin-role-badge.admin{
    background:#dc2626;
}


/* =========================================================
   ACTIONS
========================================================= */

.admin-action-cell{
    display:flex;

    align-items:center;

    justify-content:center;

    gap:8px;

    flex-wrap:wrap;
}


.admin-action-cell form{
    display:inline-flex;

    margin:0;
}


.admin-user-edit,
.admin-user-delete{
    display:inline-flex;

    align-items:center;
    justify-content:center;

    min-height:40px;

    padding:9px 13px;

    border:none;

    border-radius:9px;

    color:white;

    text-decoration:none;

    font-size:12px;

    font-weight:800;

    cursor:pointer;

    transition:.2s ease;
}


.admin-user-edit{
    background:#2563eb;
}


.admin-user-edit:hover{
    background:#1d4ed8;

    transform:translateY(-2px);
}


.admin-user-delete{
    background:#dc2626;
}


.admin-user-delete:hover{
    background:#b91c1c;

    transform:translateY(-2px);
}


/* =========================================================
   MOBILE USER CARDS
========================================================= */

.admin-user-cards{
    display:none;
}


.admin-user-card{
    padding:17px;

    border:1px solid #e2e8f0;

    border-radius:17px;

    background:#f8fafc;

    box-shadow:
        0 7px 18px rgba(15,23,42,.07);
}


.admin-user-card-head{
    display:flex;

    align-items:flex-start;

    justify-content:space-between;

    gap:12px;

    margin-bottom:14px;
}


.admin-user-card-name{
    min-width:0;
}


.admin-user-card-name h3{
    color:#0f172a;

    font-size:18px;

    line-height:1.35;

    font-weight:900;

    overflow-wrap:anywhere;
}


.admin-user-id{
    margin-top:3px;

    color:#64748b;

    font-size:11px;

    font-weight:700;
}


.admin-user-details{
    display:grid;

    gap:11px;

    padding-top:13px;

    border-top:1px solid #e2e8f0;
}


.admin-user-detail{
    min-width:0;
}


.admin-user-detail-label{
    display:block;

    margin-bottom:3px;

    color:#64748b;

    font-size:10px;

    font-weight:900;

    letter-spacing:.06em;

    text-transform:uppercase;
}


.admin-user-detail-value{
    color:#334155;

    font-size:13px;

    line-height:1.55;

    overflow-wrap:anywhere;

    word-break:break-word;
}


.admin-user-card-actions{
    display:grid;

    grid-template-columns:1fr 1fr;

    gap:8px;

    margin-top:15px;
}


.admin-user-card-actions form,
.admin-user-card-actions a,
.admin-user-card-actions button{
    width:100%;
}


/* =========================================================
   EMPTY
========================================================= */

.admin-empty-users{
    padding:42px 20px;

    border:1px dashed #cbd5e1;

    border-radius:17px;

    background:#f8fafc;

    text-align:center;
}


.admin-empty-users div{
    font-size:40px;
}


.admin-empty-users h3{
    margin-top:9px;

    color:#0f172a;

    font-size:20px;
}


.admin-empty-users p{
    margin-top:6px;

    color:#64748b;

    font-size:13px;
}


/* =========================================================
   TABLET
========================================================= */

@media(max-width:1050px){

    .admin-content{
        padding:24px;
    }


    .admin-users-hero{
        padding:27px;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media(max-width:768px){

    body{
        background-attachment:scroll;
    }


    .admin-mobile-topbar{
        position:sticky;

        top:0;

        z-index:1200;

        height:68px;

        display:grid;

        grid-template-columns:52px 1fr 52px;

        align-items:center;

        padding:8px 10px;

        background:#0f172a;

        color:white;
    }


    .admin-mobile-menu-btn{
        width:48px;
        height:48px;

        display:flex;

        align-items:center;
        justify-content:center;

        border:none;

        border-radius:12px;

        background:#0284c7;

        color:white;

        font-size:25px;

        cursor:pointer;
    }


    .admin-mobile-brand{
        text-align:center;

        font-size:22px;

        font-weight:900;
    }


    .admin-mobile-brand span{
        color:#38bdf8;
    }


    .admin-mobile-topbar-spacer{
        width:48px;
        height:48px;
    }


    .admin-sidebar{
        width:min(82vw,300px);

        transform:translateX(-105%);

        transition:transform .25s ease;

        box-shadow:
            8px 0 25px rgba(0,0,0,.28);
    }


    .admin-sidebar.open{
        transform:translateX(0);
    }


    .admin-sidebar-overlay{
        position:fixed;

        inset:0;

        z-index:1050;

        display:block;

        background:rgba(2,6,23,.58);

        opacity:0;

        visibility:hidden;

        transition:.2s ease;
    }


    .admin-sidebar-overlay.open{
        opacity:1;

        visibility:visible;
    }


    body.admin-drawer-open{
        overflow:hidden;
    }


    .admin-content{
        margin-left:0;

        padding:12px 10px 26px;
    }


    .admin-users-hero{
        padding:23px 18px;

        border-radius:20px;

        margin-bottom:12px;
    }


    .admin-users-hero-icon{
        display:none;
    }


    .admin-users-hero h1{
        font-size:29px;
    }


    .admin-users-panel{
        padding:15px;

        border-radius:18px;
    }


    .admin-users-toolbar{
        flex-direction:column;

        align-items:stretch;
    }


    .admin-add-user-btn{
        width:100%;
    }


    .admin-users-table-wrap{
        display:none;
    }


    .admin-user-cards{
        display:grid;

        grid-template-columns:1fr;

        gap:12px;
    }

}


/* =========================================================
   SMALL MOBILE
========================================================= */

@media(max-width:430px){

    .admin-user-card-actions{
        grid-template-columns:1fr;
    }

}

</style>

</head>


<body>


{{-- =========================================================
     MOBILE TOPBAR
========================================================= --}}

<header class="admin-mobile-topbar">

    <button
        type="button"
        class="admin-mobile-menu-btn"
        onclick="toggleAdminSidebar()"
        aria-label="Open menu"
    >
        ☰
    </button>


    <div class="admin-mobile-brand">
        Ship<span>EquipAR</span>
    </div>


    <div class="admin-mobile-topbar-spacer"></div>

</header>



{{-- =========================================================
     SIDEBAR OVERLAY
========================================================= --}}

<div
    id="adminSidebarOverlay"
    class="admin-sidebar-overlay"
    onclick="closeAdminSidebar()"
></div>



{{-- =========================================================
     SIDEBAR
========================================================= --}}

<aside
    id="adminSidebar"
    class="admin-sidebar"
>


    <div class="admin-logo">

        <div class="admin-logo-icon">
            ⚓
        </div>

        <div class="admin-logo-name">
            Ship<span>EquipAR</span>
        </div>

    </div>



    <nav class="admin-menu">


        <a
            href="{{ route('admin.dashboard') }}"
            class="admin-menu-link"
            onclick="closeAdminSidebar()"
        >
            <span class="admin-menu-icon">🏠</span>
            <span>Admin Dashboard</span>
        </a>


        <a
            href="{{ route('admin.users.index') }}"
            class="admin-menu-link active"
            onclick="closeAdminSidebar()"
        >
            <span class="admin-menu-icon">👥</span>
            <span>Manage Users</span>
        </a>


        <a
            href="/admin/modules"
            class="admin-menu-link"
            onclick="closeAdminSidebar()"
        >
            <span class="admin-menu-icon">📚</span>
            <span>Manage Module</span>
        </a>


        <a
            href="{{ route('admin.notes.index') }}"
            class="admin-menu-link"
            onclick="closeAdminSidebar()"
        >
            <span class="admin-menu-icon">📘</span>
            <span>Manage Notes</span>
        </a>


        <a
            href="{{ route('admin.equipment.index') }}"
            class="admin-menu-link"
            onclick="closeAdminSidebar()"
        >
            <span class="admin-menu-icon">🦺</span>
            <span>Manage Equipments</span>
        </a>


        <a
            href="{{ route('admin.ships.index') }}"
            class="admin-menu-link"
            onclick="closeAdminSidebar()"
        >
            <span class="admin-menu-icon">🚢</span>
            <span>Manage Ships</span>
        </a>


        <a
            href="{{ route('admin.quiz.index') }}"
            class="admin-menu-link"
            onclick="closeAdminSidebar()"
        >
            <span class="admin-menu-icon">📝</span>
            <span>Manage Quiz</span>
        </a>


        <form
            method="POST"
            action="{{ route('logout') }}"
            class="admin-logout-form"
        >

            @csrf

            <button
                type="submit"
                class="admin-logout-btn"
            >
                🚪 Logout
            </button>

        </form>


    </nav>


</aside>



{{-- =========================================================
     CONTENT
========================================================= --}}

<main class="admin-content">


    <div class="admin-content-inner">


        {{-- =====================================================
             HERO
        ====================================================== --}}

        <section class="admin-users-hero">


            <div class="admin-users-hero-copy">

                <div class="admin-users-label">
                    👥 User Administration
                </div>

                <h1>
                    Manage Users
                </h1>

                <p>
                    Manage registered ShipEquipAR users,
                    account roles and user access.
                </p>

            </div>


            <div class="admin-users-hero-icon">
                👥
            </div>


        </section>



        {{-- =====================================================
             USERS PANEL
        ====================================================== --}}

        <section class="admin-users-panel">


            <div class="admin-users-toolbar">


                <div class="admin-users-toolbar-copy">

                    <h2>
                        User List
                    </h2>

                    <p>
                        View, edit or remove registered accounts.
                    </p>

                </div>


                <a
                    href="{{ route('admin.users.create') }}"
                    class="admin-add-user-btn"
                >
                    ＋ Add User
                </a>


            </div>



            @if($users->count())


                {{-- =================================================
                     DESKTOP / TABLET TABLE
                ================================================== --}}

                <div class="admin-users-table-wrap">


                    <table class="admin-users-table">


                        <thead>

                            <tr>

                                <th>ID</th>

                                <th>Name</th>

                                <th>Email</th>

                                <th>Role</th>

                                <th>Created</th>

                                <th>Action</th>

                            </tr>

                        </thead>



                        <tbody>


                            @foreach($users as $user)


                                <tr>

                                    <td>
                                        {{ $user->id }}
                                    </td>


                                    <td>
                                        {{ $user->name }}
                                    </td>


                                    <td class="email-cell">
                                        {{ $user->email }}
                                    </td>


                                    <td>

                                        @if($user->role == 'admin')

                                            <span class="admin-role-badge admin">
                                                Admin
                                            </span>

                                        @else

                                            <span class="admin-role-badge">
                                                User
                                            </span>

                                        @endif

                                    </td>


                                    <td>
                                        {{ date(
                                            'd M Y',
                                            strtotime($user->created_at)
                                        ) }}
                                    </td>


                                    <td>

                                        <div class="admin-action-cell">


                                            <a
                                                href="{{ route(
                                                    'admin.users.edit',
                                                    $user->id
                                                ) }}"
                                                class="admin-user-edit"
                                            >
                                                ✏️ Edit
                                            </a>


                                            <form
                                                action="{{ route(
                                                    'admin.users.destroy',
                                                    $user->id
                                                ) }}"
                                                method="POST"
                                                onsubmit="return confirm('Delete this user?');"
                                            >

                                                @csrf

                                                @method('DELETE')


                                                <button
                                                    type="submit"
                                                    class="admin-user-delete"
                                                >
                                                    🗑 Delete
                                                </button>


                                            </form>


                                        </div>

                                    </td>


                                </tr>


                            @endforeach


                        </tbody>


                    </table>


                </div>



                {{-- =================================================
                     MOBILE CARDS
                ================================================== --}}

                <div class="admin-user-cards">


                    @foreach($users as $user)


                        <article class="admin-user-card">


                            <div class="admin-user-card-head">


                                <div class="admin-user-card-name">

                                    <h3>
                                        {{ $user->name }}
                                    </h3>

                                    <div class="admin-user-id">
                                        User ID: {{ $user->id }}
                                    </div>

                                </div>



                                @if($user->role == 'admin')

                                    <span class="admin-role-badge admin">
                                        Admin
                                    </span>

                                @else

                                    <span class="admin-role-badge">
                                        User
                                    </span>

                                @endif


                            </div>



                            <div class="admin-user-details">


                                <div class="admin-user-detail">

                                    <span class="admin-user-detail-label">
                                        Email
                                    </span>

                                    <div class="admin-user-detail-value">
                                        {{ $user->email }}
                                    </div>

                                </div>


                                <div class="admin-user-detail">

                                    <span class="admin-user-detail-label">
                                        Created
                                    </span>

                                    <div class="admin-user-detail-value">

                                        {{ date(
                                            'd M Y',
                                            strtotime($user->created_at)
                                        ) }}

                                    </div>

                                </div>


                            </div>



                            <div class="admin-user-card-actions">


                                <a
                                    href="{{ route(
                                        'admin.users.edit',
                                        $user->id
                                    ) }}"
                                    class="admin-user-edit"
                                >
                                    ✏️ Edit
                                </a>


                                <form
                                    action="{{ route(
                                        'admin.users.destroy',
                                        $user->id
                                    ) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this user?');"
                                >

                                    @csrf

                                    @method('DELETE')


                                    <button
                                        type="submit"
                                        class="admin-user-delete"
                                    >
                                        🗑 Delete
                                    </button>


                                </form>


                            </div>


                        </article>


                    @endforeach


                </div>


            @else


                <div class="admin-empty-users">

                    <div>
                        👥
                    </div>

                    <h3>
                        No Users Available
                    </h3>

                    <p>
                        Add a user account to begin.
                    </p>

                </div>


            @endif


        </section>


    </div>


</main>



{{-- =========================================================
     JAVASCRIPT
========================================================= --}}

<script>

function toggleAdminSidebar()
{
    const sidebar =
        document.getElementById(
            'adminSidebar'
        );

    const overlay =
        document.getElementById(
            'adminSidebarOverlay'
        );


    const isOpen =
        sidebar.classList.toggle(
            'open'
        );


    overlay.classList.toggle(
        'open',
        isOpen
    );


    document.body.classList.toggle(
        'admin-drawer-open',
        isOpen
    );
}


function closeAdminSidebar()
{
    const sidebar =
        document.getElementById(
            'adminSidebar'
        );

    const overlay =
        document.getElementById(
            'adminSidebarOverlay'
        );


    sidebar.classList.remove(
        'open'
    );


    overlay.classList.remove(
        'open'
    );


    document.body.classList.remove(
        'admin-drawer-open'
    );
}


document.addEventListener(
    'keydown',
    function(event)
    {
        if(event.key === 'Escape'){
            closeAdminSidebar();
        }
    }
);


window.addEventListener(
    'resize',
    function()
    {
        if(window.innerWidth > 768){
            closeAdminSidebar();
        }
    }
);

</script>


</body>

</html>
