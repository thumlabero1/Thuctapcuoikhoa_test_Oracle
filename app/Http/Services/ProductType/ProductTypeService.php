<?php


namespace App\Http\Services\ProductType;
use Illuminate\Support\Facades\Session;

use App\Models\producttype;

class ProductTypeService
{

    public function get()
    {
        return ProductType::all();
    }
    
    public function create($request)
    {
        try {
            ProductType::create([
                'ProductTypeName' => (string)$request->input('ProductTypeName'),
                
            ]);

            Session::flash('success', 'Tạo Danh Mục Thành Công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }
}
