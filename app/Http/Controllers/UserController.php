<?php

namespace App\Http\Controllers;

use App\Models\UserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function importUsers(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new UserImport, $file);


        return redirect()->back()->with('success', 'Los usuarios han sido importados correctamente.');
    }
}
