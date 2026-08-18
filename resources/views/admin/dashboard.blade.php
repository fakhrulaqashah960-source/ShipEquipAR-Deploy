<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>ShipEquipAR Admin Dashboard</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}


body{

    min-height:100vh;

    background:
    linear-gradient(
    rgba(3,37,65,.88),
    rgba(2,132,199,.72)
    ),
    url('https://images.unsplash.com/photo-1569263979104-865ab7cd8d13');

    background-size:cover;

    background-position:center;

}



/* ================= SIDEBAR ================= */


.sidebar{

    width:320px;

    height:100vh;

    position:fixed;

    left:0;
    top:0;

    background:
    rgba(15,23,42,.98);

    color:white;

    padding:35px 25px;

    overflow-y:auto;

}





/* LOGO */


.logo{

    display:flex;

    align-items:center;

    gap:15px;

    margin-bottom:55px;

}



.logo-icon{

    font-size:45px;

}



.logo-name{

    font-size:32px;

    font-weight:900;

    letter-spacing:-1px;

}


.logo-name span{

    color:#38bdf8;

}





/* MENU */


.menu a{


    display:flex;

    align-items:center;

    gap:12px;


    padding:16px 18px;


    margin-bottom:12px;


    color:#cbd5e1;


    text-decoration:none;


    border-radius:15px;


    font-size:18px;


    font-weight:700;


    transition:.3s;


}




.menu a:hover{


    background:#0284c7;


    color:white;


    transform:translateX(8px);


}




/* LOGOUT */


.logout-btn{


    width:100%;


    margin-top:45px;


    padding:16px;


    background:#dc2626;


    color:white;


    border:none;


    border-radius:15px;


    cursor:pointer;


    font-size:18px;


    font-weight:800;


}



.logout-btn:hover{


    background:#b91c1c;


}





/* ================= CONTENT ================= */


.content{


    margin-left:320px;


    padding:45px;


}





/* WELCOME */


.welcome{


    background:


    linear-gradient(
    135deg,
    rgba(14,116,144,.95),
    rgba(15,23,42,.95)
    );


    border-radius:30px;


    padding:50px;


    color:white;


    display:flex;


    justify-content:space-between;


    align-items:center;


}



.welcome h1{


    font-size:48px;


    font-weight:900;


}



.welcome p{


    margin-top:15px;


    font-size:19px;


}




.ship{


    font-size:110px;


}







/* STATISTICS */


.stats{


    margin-top:40px;


    display:grid;


    grid-template-columns:repeat(4,1fr);


    gap:25px;


}





.stat-card{


    background:white;


    padding:32px;


    border-radius:25px;


    display:flex;


    align-items:center;


    gap:20px;


    box-shadow:
    0 10px 30px rgba(0,0,0,.15);


}




.stat-icon{


    font-size:50px;


}





.stat-card h2{


    color:#0f172a;


    font-size:35px;


    font-weight:900;


}




.stat-card p{


    color:#64748b;


    font-size:17px;


}

/* ================= TITLE ================= */


.title{


    margin:45px 0 30px;


    color:white;


    font-size:36px;


    font-weight:900;


}






/* ================= DASHBOARD CARD ================= */



.modules{


    display:grid;


    grid-template-columns:repeat(3,1fr);


    gap:30px;


}





.card{


    background:white;


    padding:38px;


    border-radius:30px;


    box-shadow:

    0 10px 30px rgba(0,0,0,.18);


    min-height:350px;


    display:flex;


    flex-direction:column;


}





.icon{


    font-size:60px;


}





.card h2{


    margin-top:25px;


    color:#0284c7;


    font-size:25px;


    font-weight:900;


}





.card p{


    margin-top:18px;


    color:#64748b;


    font-size:17px;


    line-height:1.8;


    flex-grow:1;


}





.btn{


    display:block;


    width:max-content;


    margin:auto;


    padding:15px 35px;


    background:#0284c7;


    color:white;


    border-radius:15px;


    text-decoration:none;


    font-weight:800;


    font-size:17px;


}



.btn:hover{


    background:#0369a1;


}





</style>





<body>



<!-- ================= SIDEBAR ================= -->


<div class="sidebar">



<div class="logo">


<div class="logo-icon">

⚓

</div>


<div class="logo-name">

Ship<span>EquipAR</span>

</div>


</div>





<div class="menu">



<a href="/admin">

🏠 Admin Dashboard

</a>




<a href="/admin/users">

👥 Manage Users
</a>





<a href="/admin/modules">

📚 Manage Module

</a>





<a href="/admin/notes">

📘 Manage Notes

</a>





<a href="/admin/equipment">

🦺 Manage Equipments

</a>





<a href="{{ route('admin.ships.index') }}">

🚢 Manage Ships

</a>





<a href="/admin/course">

📝 Manage Quiz

</a>





<a href="#">

🏆 Manage Cerificate

</a>







<form method="POST" action="{{route('logout')}}">

@csrf


<button class="logout-btn">

🚪 Logout

</button>


</form>



</div>


</div>








<!-- ================= CONTENT ================= -->


<div class="content">





<div class="welcome">


<div>


<h1>

Welcome Admin to ShipEquipAR

</h1>


<p>

Admin Management Panel

</p>


<p>

Manage maritime learning modules, ships, equipment and digital content.

</p>


</div>




<div class="ship">

🚢

</div>


</div>









<!-- STAT -->


<div class="stats">



<div class="stat-card">


<div class="stat-icon">

👥

</div>


<div>

<h2>

{{\App\Models\User::count()}}

</h2>


<p>

Total Users

</p>

</div>


</div>







<div class="stat-card">


<div class="stat-icon">

📚

</div>


<div>

<h2>

{{\App\Models\Module::count()}}

</h2>


<p>

Learning Modules

</p>

</div>


</div>








<div class="stat-card">


<div class="stat-icon">

🦺

</div>


<div>

<h2>

{{\App\Models\Equipment::count()}}

</h2>


<p>

Equipment

</p>

</div>


</div>








<div class="stat-card">


<div class="stat-icon">

🚢

</div>


<div>

<h2>

{{\App\Models\Ship::count()}}

</h2>


<p>

Ships

</p>

</div>


</div>




</div>









<div class="title">

📊 System Overview

</div>








<div class="modules">







<!-- MODULE -->


<div class="card">


<div class="icon">

📚

</div>


<h2>

Learning Module Management

</h2>



<p>

Manage maritime learning contents such as PPE Equipment, Safety System and Engine Knowledge.

</p>




<a href="/admin/modules" class="btn">

Manage Module

</a>



</div>









<!-- SHIP -->


<div class="card">


<div class="icon">

🚢

</div>


<h2>

Ship Management

</h2>



<p>

Manage ship categories, upload Reality Composer AR files and provide ship information for users.

</p>




<a href="{{ route('admin.ships.index') }}" class="btn">

Manage Ship

</a>



</div>








<!-- EQUIPMENT -->


<div class="card">


<div class="icon">

🦺

</div>


<h2>

Equipment Management

</h2>



<p>

Maintain marine equipment database including safety equipment and specifications.

</p>




<a href="/admin/equipment" class="btn">

Manage Equipment

</a>



</div>







</div>





</div>





</body>

</html>