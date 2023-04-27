<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\staff;
use App\Models\infor_staff;
use App\Http\Services\Staff\StaffService;
use App\Http\Services\Staff\infor_staffService;
use App\Http\Requests\Staff\StaffRequest;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    protected $StaffService;
    protected $infor_staffService;
    protected $staff;

    public function __construct(StaffService $StaffService,
    infor_staffService $infor_staffService)
    {
        $this->StaffService = $StaffService;
        $this->infor_staffService = $infor_staffService;
    }

    public function index()
    {
        return view('admin.staff.list', [
            'title' => 'Danh Sách nhân sự',
            'staffs' => $this->StaffService->get(),
        ]);
    }

    public function create()
    {
        return view('admin.staff.add',[
            'title' => 'Thêm nhân sự'
        ]
        );
    }


    public function store(StaffRequest $request)
    {
        
        $this->StaffService->insert($request);

        return redirect()->back();
    }

    public function show(Product $product)
    {
        return view('admin.product.edit', [
            'title' => 'Chỉnh Sửa Sản Phẩm',
            'product' => $product,
            'menus' => $this->productService->getMenu(),
            'producttypes'=>$this->ProductTypeService->get()
        ]);
    }


    public function update(Request $request, Product $product)
    {
        $result = $this->productService->update($request, $product);
        if ($result) {
            return redirect('/admin/products/list');
        }

        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
