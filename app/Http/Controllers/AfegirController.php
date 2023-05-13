<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AfegirController extends Controller
{
    public function afegir()
    {
        $users = User::all();

        return view('admin.afegir', ['users' => $users]);
    }
}
