<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Settings extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Settings',
        ];

        return view('admin.settings.index', $data);
    }
}
