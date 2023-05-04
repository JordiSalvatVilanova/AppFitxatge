<?php

namespace App\Http\Controllers;

use App\Models\Fitxatge;
use Carbon\Carbon;

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

    public function pausa()
    {
        $fitxatge = Fitxatge::where('id_treballador', 1)->orderBy("id", "DESC")->first();

        // si ya hay una pausa en curso, la cerramos
        /*         if ($fitxatge->pausa) {
            $fitxatge->continuitat = now();
            $fitxatge->update();
        } else {
            // añadimos la fecha de inicio de la pausa
            $fitxatge->pausa = now();
            $fitxatge->update();
        } */

        $fitxatge->pausa = now();
        $fitxatge->update();

        return redirect()->route('inici')->with('success', 'Has iniciado una pausa');
    }

    public function continuacio()
    {
        $fitxatge = Fitxatge::where('id_treballador', 1)->orderBy("id", "DESC")->first();
        $fitxatge->continuitat = now();
        $fitxatge->update();

        return redirect()->route('inici')->with('success', 'Has retomado tu actividad laboral');
    }

    public function sortida()
    {
        $fitxatge = Fitxatge::where('id_treballador', 1)->orderBy("id", "DESC")->first();
        $fitxatge->sortida = now();
        $fitxatge->update();

        return redirect()->route('inici')->with('success', 'Has finalizado tu jornada laboral');
    }

    public function devolverfitxarge($fecha)
    {

        $fitxatges = Fitxatge::where('id_treballador', 1)->where("entrada", "LIKE", "$fecha%")->whereNotNull("sortida")->get();

        if ($fitxatges->isEmpty()) {
            return response()->json([
                "fecha" => $fecha,
                "total" => 0,
                "entrada" => "No has acabat una jornada",
                "sortida" => "No has acabat una jornada",
                "descans" => 0
            ]);
        }

        $total = 0;

        foreach ($fitxatges as $fitxatge) {
            $timestamp1 = strtotime($fitxatge->sortida);
            $timestamp2 = strtotime($fitxatge->entrada);

            $diferencia = ($timestamp1 - $timestamp2) / (60 * 60);

            if ($fitxatge->pausa && $fitxatge->continuitat) {
                $timestamp1 = strtotime($fitxatge->sortida);
                $timestamp2 = strtotime($fitxatge->entrada);

                $difpausa = ($timestamp1 - $timestamp2) / (60 * 60);
                $diferencia -= $difpausa;
            }

            $total += floor($diferencia);
        }

        return response()->json([
            "fecha" => $fecha,
            "total" => $total,
            "entrada" => Carbon::createFromFormat('Y-m-d H:i:s', $fitxatges[0]->entrada)->format('d/m/Y H:i:s'),
            "sortida" => Carbon::createFromFormat('Y-m-d H:i:s', $fitxatges[count($fitxatges) - 1]->sortida)->format('d/m/Y H:i:s'),
            "descans" => 0
        ]);
    }
}
