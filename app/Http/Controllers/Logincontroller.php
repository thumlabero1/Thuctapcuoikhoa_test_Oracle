<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Auth\SessionGuard;
use App\Http\Services\UploadService;

class LoginController extends Controller
{
    
    protected $User;
    protected $uploadService;
    
    public function __construct(User $User,
    uploadService $uploadService
    )
    {
        $this->User = $User;
        $this->uploadService = $uploadService;
    }

    public function index()
    {
        return view('login', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }

    public function storeuser(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ], $request->input('remember'))) {
                
                return redirect()->intended('shop');
        }

        Session::flash('error', 'Email hoặc Password không đúng');
        return redirect()->back();
    }

    public function redirectTogoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handlegoogleCallback()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('email', $google_user->email)->first();

            if (!$user) {
                //$uuid = Str::uuid()->toString();
                $user = new User();
                $user->name = $google_user->name;
                $user->email = $google_user->email;
                $user->password = bcrypt($user->email);
                $user->avatar = $google_user->avatar;
                $user->auth_type = 'google';
                $user->save();
                    }

            Auth::login($user);
            // Lưu thông tin người dùng vào session
        session(['user_name' => $user->name, 'user_email' => $user->email]);
            return redirect()->intended('shop');
        } catch (\Throwable $th) {
            dd('something went wrong' . $th->getMessage());
        }
    }

    // ...
}
