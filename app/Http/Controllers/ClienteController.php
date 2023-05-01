<?php

namespace App\Http\Controllers;

use App\Models\Fitxatge;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function inici()
    {

        $ultim_fitxatge = Fitxatge::where('id_treballador', 1)->orderBy("id", "DESC")->first();

        if ($ultim_fitxatge && !$ultim_fitxatge->sortida) {
            $fitxatge = $ultim_fitxatge;
        } else {
            $fitxatge = null;
        }

        return view('cliente.inici', compact("fitxatge"));
    }
}
