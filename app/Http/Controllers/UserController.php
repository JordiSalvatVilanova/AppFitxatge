<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserImport;
use App\Models\UserExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function importUsers(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            Excel::import(new UserImport, $file);

            return redirect()->back()->with('success', 'Els nous empleats han estat importats correctament.');
        } else {
            return redirect()->back()->with('success', 'No ha seleccionat cap fitxer per pujar.');
        }
    }

    public function exportUsers()
    {
        $date = now()->format('Ymd');
        $fileName = 'empleats_' . $date . '.csv';
        return Excel::download(new UserExport, $fileName);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Empleats ha estat eliminat correctament.');
    }
}
