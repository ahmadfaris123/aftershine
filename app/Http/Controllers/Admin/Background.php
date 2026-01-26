<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Background extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Background',
        ];
        
        return view('admin.background.index', $data);
    }
}