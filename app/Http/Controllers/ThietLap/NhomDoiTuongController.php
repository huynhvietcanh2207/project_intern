<?php

namespace App\Http\Controllers\ThietLap;
use App\Http\Controllers\Controller;
use App\Models\NhomDoiTuong;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;

class NhomDoiTuongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $message = null;  

        $searchTerm = $request->input('search');

        if ($searchTerm) {
            $nhomDoiTuongs = NhomDoiTuong::where('ten_nhom_doi_tuong', 'LIKE', "%{$searchTerm}%")
                ->orWhere('ma_doi_tuong', 'LIKE', "%{$searchTerm}%")
                ->get();
            if ($nhomDoiTuongs->isEmpty()) {
                $message = 'Không thấy kết quả tìm kiếm';
            }
        } else {
            $nhomDoiTuongs = NhomDoiTuong::all();
        }

        $grouped = $nhomDoiTuongs->groupBy('loai_nhom_doi_tuong');

        return view('nhomdoituong.index', compact('grouped', 'searchTerm','message'));
    }


    public function create()
    {
        $employees = Employee::all();
        $customers = Customer::all();

        return view('nhomdoituong.create', compact('employees', 'customers'));
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'loai_nhom_doi_tuong' => 'required',
                'ma_doi_tuong' => 'required',
                'ten_nhom_doi_tuong' => 'required',
            ]);

            $loaiNhomDoiTuong = $request->loai_nhom_doi_tuong === 'customer' ? 'Khách hàng' : 'Nhân viên';

            $nhomDoiTuong = new NhomDoiTuong();
            $nhomDoiTuong->loai_nhom_doi_tuong = $loaiNhomDoiTuong;
            $nhomDoiTuong->ma_doi_tuong = $request->ma_doi_tuong;
            $nhomDoiTuong->ten_nhom_doi_tuong = $request->ten_nhom_doi_tuong;
            $nhomDoiTuong->save();

            return redirect()->route('nhomdoituong.index')->with('success', 'Nhóm đối tượng đã được lưu thành công.');
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
        $nhomDoiTuong = NhomDoiTuong::findOrFail($id);
        return view('nhomdoituong.edit', compact('nhomDoiTuong'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'loai_nhom_doi_tuong' => 'required',
                'ma_doi_tuong' => 'required',
                'ten_nhom_doi_tuong' => 'required',
            ]);

            $nhomDoiTuong = NhomDoiTuong::findOrFail($id);
            $nhomDoiTuong->update($request->all());

            return redirect()->route('nhomdoituong.index')->with('success', 'Nhóm đối tượng đã được cập nhật thành công.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nhomDoiTuong = NhomDoiTuong::findOrFail($id);
        $nhomDoiTuong->delete();

        return redirect()->route('nhomdoituong.index')->with('success', 'Xoá nhóm đối tượng thành công');
    }
}
