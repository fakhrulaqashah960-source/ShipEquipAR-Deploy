<!-- DESKTOP + MOBILE NAVIGATION -->

<div class="flex justify-between h-16">


    <!-- LOGO -->
    <div class="flex items-center">

        <a href="{{ route('dashboard') }}">

            <x-application-logo 
                class="block h-9 w-auto fill-current text-gray-800" />

        </a>

    </div>





    <!-- DESKTOP MENU -->
    <div class="hidden sm:flex items-center space-x-8">



        <!-- DASHBOARD -->

        <x-nav-link 
            :href="route('dashboard')"
            :active="request()->routeIs('dashboard')">


            🏠 Dashboard


        </x-nav-link>








        <!-- LEARNING MODULE -->

        <div class="relative"
             x-data="{ moduleOpen:false }">


            <button
                @click="moduleOpen=!moduleOpen"
                class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700">


                📚 Learning Module


                <span x-text="moduleOpen ? '▲':'▼'"></span>


            </button>








            <div
                x-show="moduleOpen"
                @click.outside="moduleOpen=false"
                class="absolute mt-2 w-64 bg-white rounded-lg shadow-lg border z-50">





                @foreach(\App\Models\Module::all() as $module)


                    <a href="{{ route('learning.show',$module->id) }}"
                       class="block px-4 py-3 text-sm text-gray-600 hover:bg-gray-100">


                        📖 Introduction to {{ $module->title }}


                    </a>



                @endforeach





            </div>



        </div>






    </div>









    <!-- USER DROPDOWN -->

    <div class="hidden sm:flex sm:items-center sm:ms-6">



        <x-dropdown align="right" width="48">



            <x-slot name="trigger">


                <button
                    class="inline-flex items-center px-3 py-2 
                    border border-transparent text-sm 
                    font-medium rounded-md 
                    text-gray-500 bg-white hover:text-gray-700">


                    {{ Auth::user()->name }}



                    <svg class="fill-current h-4 w-4 ms-2"
                         xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20">


                        <path 
                        fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"/>


                    </svg>


                </button>


            </x-slot>







            <x-slot name="content">



                <x-dropdown-link :href="route('profile.edit')">


                    👤 Profile


                </x-dropdown-link>







                <form method="POST" action="{{ route('logout') }}">


                    @csrf



                    <x-dropdown-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">


                        🚪 Logout


                    </x-dropdown-link>



                </form>




            </x-slot>




        </x-dropdown>




    </div>









    <!-- MOBILE BUTTON -->


    <div class="-me-2 flex items-center sm:hidden">


        <button
            @click="open=!open"
            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400">



            <svg class="h-6 w-6"
                 stroke="currentColor"
                 fill="none"
                 viewBox="0 0 24 24">


                <path 
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"/>



            </svg>



        </button>


    </div>





</div>









<!-- MOBILE MENU -->


<div 
    x-show="open"
    class="sm:hidden">



    <div class="pt-2 pb-3 space-y-1">






        <!-- DASHBOARD -->


        <x-responsive-nav-link 
            :href="route('dashboard')">


            🏠 Dashboard


        </x-responsive-nav-link>








        <!-- MOBILE LEARNING MODULE -->


        <div class="px-4 py-3"
             x-data="{ moduleOpen:false }">



            <button
                @click="moduleOpen=!moduleOpen"
                class="font-medium text-gray-600">


                📚 Learning Module


                <span x-text="moduleOpen ? '▲':'▼'"></span>


            </button>








            <div x-show="moduleOpen"
                 class="mt-2">





                @foreach(\App\Models\Module::all() as $module)



                    <a href="{{ route('learning.show',$module->id) }}"
                       class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-100">



                        📖 Introduction to {{ $module->title }}



                    </a>



                @endforeach





            </div>




        </div>







    </div>



</div>