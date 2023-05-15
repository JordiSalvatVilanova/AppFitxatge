<?php

namespace App\Http\Controllers;

use App\Models\Fitxatge;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class FitxadminController extends Controller
{

    public function fitxadmin(Request $request)
    {

        if (!(Auth::user()->role && Auth::user()->role->name == "Administrador")) {
            return redirect()->route("inici");
        }

        $user_name = "";

        if ($request->user_filter) {
            $fitxatges = Fitxatge::orderBy('entrada', 'asc')->where("user_id", $request->user_filter)->get();

            foreach ($fitxatges as $fitxatge) {
                $fitxatge->entrada = Carbon::parse($fitxatge->entrada)->format('H:i:s');
                $fitxatge->pausa = $fitxatge->pausa ? Carbon::parse($fitxatge->pausa)->format('H:i:s') : "-";
                $fitxatge->continuitat = $fitxatge->continuitat ? Carbon::parse($fitxatge->continuitat)->format('H:i:s') : "-";
                $fitxatge->sortida = Carbon::parse($fitxatge->sortida)->format('H:i:s');
                $fitxatge->data = Carbon::parse($fitxatge->entrada)->format('d/m/Y');

                // calcular horas totales
                $entrada = Carbon::parse($fitxatge->entrada);
                $sortida = Carbon::parse($fitxatge->sortida);
                $diferencia = $sortida->diff($entrada);
                $fitxatge->hores_totals = $diferencia->format('%H:%I:%S');
            }

            $user_selected = User::where("id", $request->user_filter)->first();

            $user_name = "$user_selected->name - $user_selected->email";
        } else {
            $fitxatges = null;
        }


        $role = Role::where("name", "Treballador")->first();
        $users = User::where("role_id", $role->id)->where("company_id", Auth::user()->company_id)->get();

        User::where("role_id", $role->id)->get();

        return view('admin.fitxadmin', compact('fitxatges', 'users', 'user_name'));
    }
}
