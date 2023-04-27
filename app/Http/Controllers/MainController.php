<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;

    public function __construct(SliderService $slider, MenuService $menu,
        ProductService $product)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
    }

    public function index()
    {
        return view('home', [
            'title' => 'Shop',
            'sliders' => $this->slider->show(),
            'menus' => $this->menu->show(),
            'products' => $this->product->get()
        ]);
    }

    public function loadProduct(Request $request)
    {
        $page = $request->input('page', 0);
        $result = $this->product->get($page);
        if (count($result) != 0) {
            $html = view('products.list', ['products' => $result ])->render();

            return response()->json([ 'html' => $html ]);
        }

        return response()->json(['html' => '' ]);
    }
    public function subscribe(Request $request)
{
    $Account = Account::create([
        'email' => $request->input('email'),
        'password' => $request->input('password'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // thực hiện các hành động khác nếu cần

    return response()->json($taiKhoan, 201);
}

public function login()
{
    return view('login');
}
public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}

public function handleGoogleCallback()
{
    $user = Socialite::driver('google')->user();

    // Lưu thông tin người dùng vào CSDL
}

public function logout(Request $request)
{
    Auth::logout();
    return redirect()->intended('shop');
}
}
