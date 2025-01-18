<?php
namespace App\Http\Controllers\ThietLap;
use App\Http\Controllers\Controller;
use App\Models\Employee;

use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $message = null;  

    $search = $request->query('search');

    if ($search) {
        $employees = Employee::where('name', 'LIKE', "%{$search}%")
            ->orWhere('employee_code', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orWhere('phone', 'LIKE', "%{$search}%")
            ->get();
            if ($employees->isEmpty()) {
                $message = 'Không thấy kết quả tìm kiếm';
            }
    } else {
        $employees = Employee::all();
    }

    return view('nhanvien.index', compact('employees', 'search','message'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nhanvien.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Xác thực đầu vào
            $request->validate([
                'group' => 'required',
                'employee_code' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'position' => 'required',
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
            ]);

            // Lưu thông tin vào cơ sở dữ liệu
            Employee::create([
                'group' => $request->input('group'),
                'employee_code' => $request->input('employee_code'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'position' => $request->input('position'),
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
            ]);

            // Redirect hoặc trả về một phản hồi
            return redirect()->route('nhanvien.index')->with('success', 'Nhân viên đã được thêm thành công!');
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
        $employee = Employee::findOrFail($id);
        return view('nhanvien.edit', compact('employee'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Xác thực đầu vào
            $request->validate([
                'group' => 'required',
                'employee_code' => 'required',
                'email' => 'required|email',
                'position' => 'required',
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
            ]);

            $employee = Employee::findOrFail($id); // Lấy nhân viên theo ID

            $employee->update([
                'group' => $request->input('group'),
                'employee_code' => $request->input('employee_code'),
                'email' => $request->input('email'),
                'password' => $request->input('password') ? bcrypt($request->input('password')) : $employee->password, // Giữ nguyên mật khẩu nếu không thay đổi
                'position' => $request->input('position'),
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
            ]);

            return redirect()->route('nhanvien.index')->with('success', 'Nhân viên đã được cập nhật thành công!');
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
