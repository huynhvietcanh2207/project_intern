<?php
namespace App\Http\Controllers\ThietLap;
use App\Http\Controllers\Controller;
use App\Models\Warehouse;

use Illuminate\Http\Request;

class KhoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $message = null;  

        $search = $request->query('search'); 
    
        if ($search) {
            $warehouses = Warehouse::where('name', 'LIKE', "%{$search}%")
                ->orWhere('warehouse_code', 'LIKE', "%{$search}%")
                ->get();
                if ($warehouses->isEmpty()) {
                    $message = 'Không thấy kết quả tìm kiếm';
                }
        } else {
            $warehouses = Warehouse::all();
        }
    
        return view('kho.index', compact('warehouses', 'search','message'));
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kho.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'warehouse_code' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
            ]);

            Warehouse::create([
                'warehouse_code' => $request->input('warehouse_code'),
                'name' => $request->input('name'),
                'address' => $request->input('address'),
            ]);

            return redirect()->route('kho.index')->with('success', 'Kho đã được thêm thành công');
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
        $warehouse = Warehouse::findOrFail($id);
        return view('kho.edit', compact('warehouse'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'warehouse_code' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
            ]);

            $warehouse = Warehouse::findOrFail($id);
            $warehouse->update([
                'warehouse_code' => $request->input('warehouse_code'),
                'name' => $request->input('name'),
                'address' => $request->input('address'),
            ]);

            return redirect()->route('kho.index')->with('success', 'Kho đã được cập nhật thành công');
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
