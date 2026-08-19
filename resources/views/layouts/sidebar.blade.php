<div class="sidebar">


    <!-- LOGO -->

    <div class="logo">

        ⚓ Ship<span>EquipAR</span>

    </div>




    <div class="menu">



        <!-- DASHBOARD -->

        <a href="{{ route('dashboard') }}"
        class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

            🏠 Dashboard

        </a>






        <!-- ==========================
             LEARNING MODULE DROPDOWN
        =========================== -->


        <div class="module-title"
        onclick="toggleModule()">



            <span>

                📚 Learning Module

            </span>



            <span id="mainArrow">

                ▲

            </span>



        </div>





        <div id="moduleContent"
        class="module-content active">





            @if(isset($modules) && $modules->count() > 0)



                @foreach($modules as $module)



                    <a href="{{ route('learning.show',$module->id) }}"


                    class="

                    @if(request()->route('id') == $module->id)

                    active

                    @endif

                    ">





                        @php

                        $category = strtolower($module->category);

                        @endphp





                        @if(str_contains($category,'ppe')
                        || str_contains($category,'safety'))

                            🦺 {{ $module->title }}



                        @elseif(str_contains($category,'cargo')
                        || str_contains($category,'ship')
                        || str_contains($category,'freight'))


                            🚢 {{ $module->title }}




                        @elseif(str_contains($category,'engine'))


                            ⚙️ {{ $module->title }}




                        @else


                            📖 {{ $module->title }}




                        @endif





                    </a>



                @endforeach




            @else



                <p style="
                color:#94a3b8;
                padding:15px;
                font-size:14px;
                ">

                    No module available

                </p>



            @endif




        </div>








        <!-- NOTES -->


        <a href="{{ route('user.notes') }}"

        class="{{ request()->routeIs('user.notes*') ? 'active':'' }}">


            📘 Module Notes


        </a>








        <!-- QUIZ -->


        <a href="{{ route('quiz.index') }}"

        class="{{ request()->routeIs('quiz.*') ? 'active':'' }}">


            📝 Start Quiz


        </a>








        <!-- CERTIFICATE -->


        <a href="#">


            🏆 Get Certificate


        </a>


        <!-- AI CHAT -->

        <a
    href="javascript:void(0)"
    id="naviBotButton"
    class="nav-item"
>
    <span>🤖</span>
    <span>NaviBot</span>
</a>
        <!-- PROFILE -->


        <a href="{{ route('profile.edit') }}"

        class="{{ request()->routeIs('profile.*') ? 'active':'' }}">


            👤 Profile


        </a>








        <!-- LOGOUT -->


        <form method="POST"
        action="{{ route('logout') }}">


            @csrf



            <button class="logout-btn">


                🚪 Logout


            </button>



        </form>





    </div>



</div>









<script>


function toggleModule(){


    let box = document.getElementById("moduleContent");


    let arrow = document.getElementById("mainArrow");



    box.classList.toggle("active");



    if(box.classList.contains("active")){


        arrow.innerHTML="▲";


    }

    else{


        arrow.innerHTML="▼";


    }



}



</script>