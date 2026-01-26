<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Award extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Award',
        ];

        return view('admin.award.index', $data);
    }
}
