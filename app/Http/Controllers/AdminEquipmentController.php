<?php

namespace App\Http\Controllers;

use App\Models\Equipment;


class AdminEquipmentController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | ADMIN EQUIPMENT LIST
    |--------------------------------------------------------------------------
    */

    public function index()
    {

        $equipments = Equipment::with('module')
            ->get();


        return view(
            'admin.equipment.index',
            compact('equipments')
        );

    }

}