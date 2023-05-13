<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExport implements FromCollection
{
    public function collection()
    {
        return User::all();
    }
}
