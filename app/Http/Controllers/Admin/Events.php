<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Events extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Events',
        ];

        return view('admin.events.index', $data);
    }
}
