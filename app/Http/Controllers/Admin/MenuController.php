<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MenuController extends Controller
{
    //
 public function create(){

    return view('admin.menus.add',[
      'title' => 'Thêm danh mục mới',
    ]);
 }
}
