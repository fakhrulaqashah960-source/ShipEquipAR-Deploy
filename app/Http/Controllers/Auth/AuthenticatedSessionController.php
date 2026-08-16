<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;



class AuthenticatedSessionController extends Controller
{


    /**
     * Display login page
     */
    public function create(): View
    {

        return view('auth.login');

    }






    /**
     * Handle login request
     */
    public function store(LoginRequest $request): RedirectResponse
    {


        /*
        |--------------------------------------------------------------------------
        | Authenticate User
        |--------------------------------------------------------------------------
        */


        $request->authenticate();




        /*
        |--------------------------------------------------------------------------
        | Regenerate Session
        |--------------------------------------------------------------------------
        */


        $request->session()->regenerate();





        /*
        |--------------------------------------------------------------------------
        | Get Current User
        |--------------------------------------------------------------------------
        */


        $user = Auth::user();






        /*
        |--------------------------------------------------------------------------
        | Redirect According To Role
        |--------------------------------------------------------------------------
        */


        if($user->role === 'admin')
        {

            return redirect()
                ->route('admin.dashboard');

        }






        if($user->role === 'user')
        {

            return redirect()
                ->route('dashboard');

        }







        /*
        |--------------------------------------------------------------------------
        | Invalid Role
        |--------------------------------------------------------------------------
        */


        Auth::guard('web')->logout();



        $request->session()->invalidate();



        $request->session()->regenerateToken();




        return redirect()
            ->route('login')
            ->withErrors([
                'email'=>'Your account role is not recognised.'
            ]);



    }









    /**
     * Logout user
     */
    public function destroy(Request $request): RedirectResponse
    {



        /*
        |--------------------------------------------------------------------------
        | Logout
        |--------------------------------------------------------------------------
        */


        Auth::guard('web')->logout();






        /*
        |--------------------------------------------------------------------------
        | Clear Session
        |--------------------------------------------------------------------------
        */


        $request->session()->invalidate();





        /*
        |--------------------------------------------------------------------------
        | Prevent Previous Page Access
        |--------------------------------------------------------------------------
        */


        $request->session()->regenerateToken();






        return redirect('/');



    }



}