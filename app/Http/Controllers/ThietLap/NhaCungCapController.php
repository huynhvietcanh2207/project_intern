<?php

namespace App\Http\Controllers\ThietLap;
use App\Http\Controllers\Controller;
use App\Models\Supplier;

use Illuminate\Http\Request;

class NhaCungCapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $message = null;  

        $search = $request->query('search');
    
        if ($search) {
            $suppliers = Supplier::where('name', 'LIKE', "%{$search}%")
                ->orWhere('supplier_code', 'LIKE', "%{$search}%")
                ->orWhere('group', 'LIKE', "%{$search}%")
                ->get()
                ->groupBy('group');
                if ($suppliers->isEmpty()) {
                    $message = 'Không thấy kết quả tìm kiếm';
                }
        } else {
            $suppliers = Supplier::all()->groupBy('group');
        }
    
        return view('nhacungcap.index', compact('suppliers', 'search','message'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nhacungcap.create');

    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'group' => 'required|string',
                'supplier_code' => 'required|string|unique:suppliers',
                'name' => 'required|string',
                'address' => 'nullable|string',
                'phone' => 'nullable|string',
                'email' => 'nullable|email',
                'tax_code' => 'nullable|string',
                'notes' => 'nullable|string',
            ]);

            Supplier::create($validated);

            return redirect()->route('nhacungcap.index')->with('success', 'Nhà cung cấp đã được thêm thành công!');
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
        // Lấy thông tin nhà cung cấp từ cơ sở dữ liệu theo id
        $nhacungcap = Supplier::findOrFail($id);

        // Trả về view với dữ liệu $nhacungcap
        return view('nhacungcap.edit', compact('nhacungcap'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'group' => 'required|string',
                'supplier_code' => 'required|string|unique:suppliers,supplier_code,' . $id,
                'name' => 'required|string',
                'address' => 'nullable|string',
                'phone' => 'nullable|string',
                'email' => 'nullable|email',
                'tax_code' => 'nullable|string',
                'notes' => 'nullable|string',
            ]);

            $supplier = Supplier::findOrFail($id);
            $supplier->update($validated);

            return redirect()->route('nhacungcap.index')->with('success', 'Nhà cung cấp đã được cập nhật thành công!');
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
