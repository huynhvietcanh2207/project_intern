<?php

namespace App\Http\Controllers\ThietLap;
use App\Http\Controllers\Controller;

use App\Models\Product;

use Illuminate\Http\Request;

class HangHoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $message = null;  

        $search = $request->query('search'); 
    
        if ($search) {
            $products = Product::where('name', 'LIKE', "%{$search}%")
                ->orWhere('product_code', 'LIKE', "%{$search}%")
                ->orWhere('brand', 'LIKE', "%{$search}%")
                ->get()
                ->groupBy('group');
                if ($products->isEmpty()) {
                    $message = 'Không thấy kết quả tìm kiếm';
                }
        } else {
            $products = Product::orderBy('group')->orderBy('product_code')->get()->groupBy('group');
        }
    
        return view('hanghoa.index', compact('products', 'search','message'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hanghoa.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'group' => 'nullable|string|max:255',
                'product_code' => 'required|string|max:255|unique:products',
                'name' => 'required|string|max:255',
                'brand' => 'nullable|string|max:255',
                'warranty_period' => 'required|string|max:255',
            ]);

            Product::create($validatedData);

            return redirect()->route('hanghoa.index')->with('success', 'Sản phẩm đã được lưu thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('hanghoa.edit', compact('product'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'product_code' => 'required|max:255',
                'name' => 'required|max:255',
                'brand' => 'nullable|max:255',
                'warranty_period' => 'required|max:255',
            ]);

            $product = Product::findOrFail($id);
            $product->update($request->all());

            return redirect()->route('hanghoa.index')->with('success', 'Cập nhật hàng hóa thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
