<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraficosController extends Controller
{
    public function graficos()
    {

        return view('admin.graficos');
    }
}
