<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Module;
use App\Models\Equipment;


class AdminDashboardController extends Controller
{


    public function index()
    {


        $totalUsers = User::count();


        $totalModules = Module::count();


        $totalEquipment = Equipment::count();



        return view(
            'admin.dashboard',
            compact(
                'totalUsers',
                'totalModules',
                'totalEquipment'
            )
        );


    }


}