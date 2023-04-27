<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function index()
    {
        $user_name = Session::get('users.name');

        return view('admin.home', [
            'title' => 'Trang Quản Trị Admin',
            'user_name' => $user_name
        ]);
    }
}
