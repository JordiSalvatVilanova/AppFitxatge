<?php

namespace App\Http\Controllers;

use App\Models\Fitxatge;
use Carbon\Carbon;

class FitxatgeController extends Controller
{
    public function entrada()
    {
        $fitxatgeHoy = Fitxatge::where('id_treballador', 1)
            ->whereDate('entrada', now()->toDateString())
            ->first();
        if ($fitxatgeHoy) {
            return redirect()->route('inici')->with('error', 'Ja heu registrat l/entrada avui');
        }

        $fitxatge = new Fitxatge();
        //$fitxatge->id_empresa = Auth::user()->id_empresa;
        $fitxatge->id_treballador = 1;
        $fitxatge->entrada = now();
        $fitxatge->save();

        return redirect()->route('inici')->with('success', 'Has iniciat la teva jornada laboral')->with('alert-type', 'success');
    }

    public function hacerPausasYContinuidades()
    {
        for ($i = 0; $i < 5; $i++) {
            $this->pausa();
            $this->continuacio();
        }
    }

    public function pausa()
    {
        $fitxatge = Fitxatge::where('id_treballador', 1)
            ->whereDate('entrada', now()->toDateString())
            ->orderBy("id_jornada", "DESC")
            ->first();
        if (!$fitxatge || $fitxatge->sortida) {
            return redirect()->route('inici')->with('error', 'No has iniciat la jornada laboral avui');
        }

        $fitxatge->pausa = now();
        $fitxatge->update();

        return redirect()->route('inici')->with('success', 'Has iniciat una pausa')->with('alert-type', 'success');
    }

    public function continuacio()
    {
        $fitxatge = Fitxatge::where('id_treballador', 1)
            ->whereDate('entrada', now()->toDateString())
            ->orderBy("id_jornada", "DESC")
            ->first();
        if (!$fitxatge || $fitxatge->sortida) {
            return redirect()->route('inici')->with('error', 'No has iniciat la jornada laboral avui');
        }
        if (!$fitxatge->pausa) {
            return redirect()->route('inici')->with('error', 'Heu d/iniciar una pausa abans de continuar');
        }

        $fitxatge->continuitat = now();
        $fitxatge->update();

        return redirect()->route('inici')->with('success', 'Has reprès la teva activitat laboral')->with('alert-type', 'success');
    }

    public function sortida()
    {
        $date = now()->format('Y-m-d');
        $fitxatge = Fitxatge::where('id_treballador', 1)->whereDate('entrada', $date)->orderBy("id", "DESC")->first();
        if ($fitxatge) {
            if (!$fitxatge->sortida) {
                $fitxatge->sortida = now();
                $fitxatge->update();

                $title = 'Has finalitzat la teva jornada laboral';
                $text = 'Gràcies per la teva feina avui!';
                $type = 'success';

                return redirect()->route('inici')->with('sweet-alert', compact('title', 'text', 'type'));
            } else {
                $title = 'Ja has marcat la sortida avui';
                $text = 'No pots marcar la sortida dues vegades!';
                $type = 'error';

                return redirect()->route('inici')->with('sweet-alert', compact('title', 'text', 'type'));
            }
        } else {
            $title = 'Encara no has marcat l\'entrada avui';
            $text = 'Has d\'iniciar la teva jornada laboral abans de marcar la sortida!';
            $type = 'error';

            return redirect()->route('inici')->with('sweet-alert', compact('title', 'text', 'type'));
        }
    }


    public function devolverfitxarge($fecha)
    {

        $fitxatges = Fitxatge::where('id_treballador', 1)->where("entrada", "LIKE", "$fecha%")->whereNotNull("sortida")->get();
        if ($fitxatges->isEmpty()) {
            return response()->json([
                "fecha" => $fecha,
                "total" => 0,
                "entrada" => "No has acabat la jornada",
                "sortida" => "No has acabat la jornada",
            ]);
        }

        $total = 0;

        foreach ($fitxatges as $fitxatge) {
            $timestamp1 = strtotime($fitxatge->sortida);
            $timestamp2 = strtotime($fitxatge->entrada);

            $diferencia = ($timestamp1 - $timestamp2) / (60 * 60);

            if ($fitxatge->pausa && $fitxatge->continuitat) {
                $timestamp3 = strtotime($fitxatge->continuitat);
                $timestamp4 = strtotime($fitxatge->pausa);

                $difpausa = ($timestamp3 - $timestamp4) / (60 * 60);
                $diferencia -= $difpausa;
            }

            $total += floor($diferencia);
        }

        return response()->json([
            "fecha" => $fecha,
            "total" => $total,
            "entrada" => Carbon::createFromFormat('Y-m-d H:i:s', $fitxatges[0]->entrada)->format('d/m/Y H:i:s'),
            "sortida" => Carbon::createFromFormat('Y-m-d H:i:s', $fitxatges[count($fitxatges) - 1]->sortida)->format('d/m/Y H:i:s'),
        ]);
    }
}
