<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public  function index()
    {
        return view('admin.users.login',
        ['title' => 'Đăng nhập hệ thống']
    );
    }
    public function store( Request $request)
    {
        

        $this->validate($request, [
            'email'=> 'required|email:filter',
            'password'=> 'required'
        ]);

        if(Auth::attempt([
            'email' => $request->input(key: 'email'),
            'password' => $request->input(key: 'password'),
            
    ], $request->input(key: 'remember')))
        {

                return redirect()->route(route: 'admin'); 
        }
        // tạo session
        Session::flash('error','email hoặc mật khẩu không đúng');

        return redirect()->back();
        
    }
}
