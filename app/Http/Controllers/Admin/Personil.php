<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Personil extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Personil',
        ];

        return view('admin.personil.index', $data);
    }
}
