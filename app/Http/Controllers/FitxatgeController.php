<?php

namespace App\Http\Controllers;

use App\Models\Fitxatge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FitxatgeController extends Controller
{
    public function entrada()
    {
        $fitxatge = new Fitxatge();
        //$fitxatge->id_empresa = Auth::user()->id_empresa;
        $fitxatge->id_treballador = 1;
        $fitxatge->entrada = now();
        $fitxatge->save();

        return redirect()->route('inici')->with('success', 'Has iniciado tu jornada laboral');
    }

    public function sortida()
    {
        $fitxatge = Fitxatge::where('id_treballador', 1)->orderBy("id", "DESC")->first();
        $fitxatge->sortida = now();
        $fitxatge->update();

        return redirect()->route('inici')->with('success', 'Has finalizado tu jornada laboral');
    }
}
