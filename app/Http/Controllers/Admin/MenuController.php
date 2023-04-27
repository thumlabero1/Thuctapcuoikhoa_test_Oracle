<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\ProductType\ProductTypeService;
use App\Models\Menu;
use App\Models\producttype;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuService;
    protected $ProductTypeService;

    public function __construct(MenuService $menuService,
    ProductTypeService $ProductTypeService)
    {
        $this->menuService = $menuService;
        $this->ProductTypeService = $ProductTypeService;
    }

    public function create()
    {
        return view('admin.menu.add', [
            'title' => 'Thêm Danh Mục Mới',
            'menus' => $this->menuService->getParent(),
            'ProductTypes' => $this->ProductTypeService->get()
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $this->menuService->create($request);

        return redirect()->back();
    }

    public function index()
    {
        return view('admin.menu.list', [
            'title' => 'Danh Sách Danh Mục Mới Nhất',
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function show(Menu $menu)
    {
        return view('admin.menu.edit', [
            'title' => 'Chỉnh Sửa Danh Mục: ' . $menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getParent(),
            'ProductTypes' => $this->ProductTypeService->get()
        ]);
    }

    public function update(Menu $menu, CreateFormRequest $request)
    {
        $this->menuService->update($request, $menu);

        return redirect('/admin/menus/list');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->menuService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
    public function addtype(Request $request)
    {
        return view('admin.producttypes.add', [
            'title' => 'Thêm loại Danh Mục Mới'
        ]);
    }
    public function storetype(Request $request)
    {
        $this->ProductTypeService->create($request);

        return redirect()->back();
    }
}
