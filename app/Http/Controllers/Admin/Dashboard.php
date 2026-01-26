<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboards',
        ];
        
        return view('admin.dashboard.index', $data);
    }
}