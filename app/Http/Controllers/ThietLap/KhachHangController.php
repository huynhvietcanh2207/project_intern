<?php

namespace App\Http\Controllers\ThietLap;
use App\Http\Controllers\Controller;
use App\Models\Customer;

use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $message = null;  

        $search = $request->query('search'); 
    
        if ($search) {
            $customers = Customer::where('name', 'LIKE', "%{$search}%")
                ->orWhere('customer_code', 'LIKE', "%{$search}%")
                ->orWhere('group', 'LIKE', "%{$search}%")
                ->get()
                ->groupBy('group');
                if ($customers->isEmpty()) {
                    $message = 'Không thấy kết quả tìm kiếm';
                }
        } else {
            $customers = Customer::all()->groupBy('group');
        }
    
        // Truyền dữ liệu vào view
        return view('khachhang.index', compact('customers', 'search','message'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('khachhang.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        try {
            // dd($request->all());
            $request->validate([
                'group' => 'required|string|max:255',
                'customer_code' => 'required|max:255',
                'name' => 'required|max:255',
                'address' => 'nullable|max:255',
                'phone' => 'nullable|max:255',
                'email' => 'nullable|email|max:255',
                'tax_code' => 'nullable|max:255',
                'note' => 'nullable|max:500',
            ]);

            \Log::info('Validation passed'); // Log sau validation

            // Lưu vào biến để kiểm tra
            $customer = Customer::create([
                'group' => $request->group,
                'customer_code' => $request->customer_code,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'tax_code' => $request->tax_code,
                'note' => $request->note,
            ]);

            \Log::info('Customer created', ['customer' => $customer]); 

            if (!$customer) {
                throw new \Exception('Không thể tạo khách hàng');
            }

            \Log::info('Redirecting to index'); 

            return redirect()->route('khachhang.index')
                ->with('success', 'Khách hàng đã được thêm thành công');

        } catch (\Exception $e) {
            \Log::error('Error in store process: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
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
        $customer = Customer::findOrFail($id);
        return view('khachhang.edit', compact('customer'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'group' => 'required|string|max:255',
                'customer_code' => 'required|max:255',
                'name' => 'required|max:255',
                'address' => 'nullable|max:255',
                'phone' => 'nullable|max:255',
                'email' => 'nullable|email|max:255',
                'tax_code' => 'nullable|max:255',
                'note' => 'nullable|max:500',
            ]);
    
            $customer = Customer::findOrFail($id);
            $customer->update([
                'group' => $request->group,
                'customer_code' => $request->customer_code,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'tax_code' => $request->tax_code,
                'note' => $request->note,
            ]);
    
            return redirect()->route('khachhang.index')
                ->with('success', 'Cập nhật khách hàng thành công');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
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
