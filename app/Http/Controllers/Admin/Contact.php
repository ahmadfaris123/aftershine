<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Contact extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Contact',
        ];

        return view('admin.contact.index', $data);
    }
}
