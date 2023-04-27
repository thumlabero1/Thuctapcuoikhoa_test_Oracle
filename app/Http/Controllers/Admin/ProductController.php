<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Product\ProductAdminService;
use App\Http\Services\ProductType\ProductTypeService;
use App\Models\Product;
use App\Models\producttype;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $ProductTypeService;

    public function __construct(ProductAdminService $productService,
    ProductTypeService $ProductTypeService)
    {
        $this->productService = $productService;
        $this->ProductTypeService = $ProductTypeService;
    }

    public function index()
    {
        return view('admin.product.list', [
            'title' => 'Danh Sách Sản Phẩm',
            'products' => $this->productService->get(),
            'producttypes'=>$this->ProductTypeService->get()
        ]);
    }

    public function create()
    {
        return view('admin.product.add', [
            'title' => 'Thêm Sản Phẩm Mới',
            'menus' => $this->productService->getMenu(),
            'producttypes'=>$this->ProductTypeService->get()
        ]);
    }


    public function store(ProductRequest $request)
    {
        $this->productService->insert($request);

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
