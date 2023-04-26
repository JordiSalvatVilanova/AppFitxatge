<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendariController extends Controller
{
    public function fullcalendari()
    {
        return view('cliente.calendari');
    }
}
