<?php

namespace App\Http\Controllers\Admin\Auth;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginMailGoogleController extends Controller
{
    public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}

public function handleGoogleCallback()
{
    $user = Socialite::driver('google')->user();

    // Kiểm tra xem người dùng đã đăng nhập trước đó chưa
    $existingUser = User::where('email', $user->getEmail())->first();

    if ($existingUser) {
        // Nếu đã đăng nhập trước đó, đăng nhập lại và chuyển hướng người dùng đến trang Dashboard
        auth()->login($existingUser);

        return redirect()->to('/dashboard');
    } else {
        // Nếu chưa đăng nhập trước đó, tạo mới người dùng và lưu vào CSDL
        $newUser = new User();

        $newUser->name = $user->getName();
        $newUser->email = $user->getEmail();
        $newUser->password = bcrypt(str_random(16)); // Tạo mật khẩu ngẫu nhiên cho người dùng
        $newUser->save();

        // Đăng nhập mới tạo và chuyển hướng người dùng đến trang Dashboard
        auth()->login($newUser);

        return redirect()->to('/shop');
    }
}
}