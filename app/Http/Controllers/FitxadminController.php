<?php

namespace App\Http\Controllers;

use App\Models\Fitxatge;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FitxadminController extends Controller
{
    public function fitxadmin()
    {
        $fitxatges = Fitxatge::orderBy('data', 'asc')->get();

        foreach ($fitxatges as $fitxatge) {
            $fitxatge->entrada = Carbon::parse($fitxatge->entrada)->format('H:i:s');
            $fitxatge->pausa = Carbon::parse($fitxatge->pausa)->format('H:i:s');
            $fitxatge->continuitat = Carbon::parse($fitxatge->continuitat)->format('H:i:s');
            $fitxatge->sortida = Carbon::parse($fitxatge->sortida)->format('H:i:s');

            // calcular horas totales
            $entrada = Carbon::parse($fitxatge->entrada);
            $sortida = Carbon::parse($fitxatge->sortida);
            $diferencia = $sortida->diff($entrada);
            $fitxatge->hores_totals = $diferencia->format('%H:%I:%S');
        }

        return view('admin.fitxadmin', compact('fitxatges'));
    }
}
