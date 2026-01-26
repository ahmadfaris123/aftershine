<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Songs extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Songs',
        ];

        return view('admin.songs.index', $data);
    }
}
