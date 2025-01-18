@extends('thietlap')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('thietlap.css') }}">
@endsection
<style>
    table,
    th,
    td {
        box-sizing: border-box;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        background: #FFFFFF;
        padding: 0px 29px !important;
        border: 1px solid #C6CFFC;
        text-align: left;
    }

    .group-client:hover td {
        background-color: #EAF0FE;
        color: rgb(0, 0, 0);
    }

    .required {
        color: red;
        margin-left: 5px;
    }

    th {
        background: #FFFFFF;

        height: 40px !important;



    }

    .col-3-7 td:first-child {
        width: 20%;
    }

    .col-3-7 td:last-child {
        width: 80%;
    }

    .group-client td span i.dropdown2 {
        position: absolute;
        left: 1440px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 16px;
        color: #25406E;
    }

    .group-client td span i.dropdown1 {
        position: absolute;
        right: 30px !important;
        top: 50%;
        transform: translateY(-50%);
        font-size: 16px;
        color: #25406E;
    }

    .group-client {
        position: relative;
        height: 40px !important;


    }

    .top {
        font-weight: bold;
    }

    .bottom {
        opacity: 0.6;
    }

    input[type="text"] {
        /* list_content_1 */

        box-sizing: border-box;

        position: absolute;
        width: 1520px;
        height: 40px;
        top: 0px;
        border: none;
        outline: none;
        /* Light Mode - Grey/White */
        background: #FFFFFF;
        /* table/border check hover */
        border-width: 1px 0px;
        border-style: solid;
        border-color: #C6CFFC;

    }

    .parent-container {
        overflow: visible !important;
        /* Đảm bảo các phần tử con hiển thị đầy đủ */
    }

    /*search and lọc*/
    .dropdown-chucvu {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        top: 40px;
        left: 0;
        background-color: white;
        border: 1px solid #ddd;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        width: 200px;
        z-index: 10000;
        /* Đảm bảo nằm trên cùng */
        border-radius: 4px;
    }

    .dropdown.active .dropdown-content {
        display: block;
    }



    .dropdown-content ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .dropdown-content ul li {
        padding: 10px;
        cursor: pointer;
    }

    .dropdown-content ul li:hover {
        background-color: #f1f1f1;
    }

   
    .dropdown-container select {
        border: none;
        outline: none;
        box-shadow: none;
        background-color: white;
        padding:  10px 0;
        font-size: 14px;
        color: #000;
        cursor: pointer;
    }

    .dropdown-container {
        position: relative;
      
    }
    .group-client td span i {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 16px;
        color: #25406E;
    }
    select {
        width: 100%;
        padding:  10px 0;
        appearance: none;
        background-color: white;
        border: 1px solid #C6CFFC;
        text-align: left;
        padding-right: 30px;
    }

</style>
@section('main')
<form action="{{ route('nhanvien.update', $employee->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="add-header items-header">
    <a href="{{ route('nhanvien.index') }}">
            <button type="button" class="cancel-btn">
                <i class="fa-solid fa-circle-xmark"></i> Hủy
            </button>
        </a>
        <button type="submit" class="confirm-btn">
            <i class="fa-solid fa-save"></i> Lưu nhân viên
        </button>
    </div>
    <table class="col-3-7">
        <tbody>
            <tr class="group-client">
                <td class="top">
                    Nhóm <span class="required">*</span>
                </td>
                <td class="bottom">
                <div class="dropdown-container">

                    <select name="group" class="form-control">
                        <option value="">Chọn Nhóm</option>
                        <option value="Nhóm 1" {{ old('group', $employee->group) == 'Nhóm 1' ? 'selected' : '' }}>Nhóm 1</option>
                        <option value="Nhóm 2" {{ old('group', $employee->group) == 'Nhóm 2' ? 'selected' : '' }}>Nhóm 2</option>
                        <option value="Nhóm 3" {{ old('group', $employee->group) == 'Nhóm 3' ? 'selected' : '' }}>Nhóm 3</option>
                    </select>
                    <span> <i class="fas fa-chevron-down"></i></span>

                    </div>
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Mã nhân viên<span class="required">*</span></td>
                <td class="bottom">
                    <input type="text" name="employee_code" value="{{ old('employee_code', $employee->employee_code) }}"
                        placeholder="Nhập mã nhân viên">
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Mail(Tài khoản đăng nhập)<span class="required">*</span></td>
                <td class="bottom">
                    <input type="text" name="email" class="form-control" value="{{ old('email', $employee->email) }}"
                        placeholder="Nhập email">
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Mật khẩu<span class="required">*</span></td>
                <td class="bottom">
                    <input type="text" name="password" class="form-control" placeholder="Nhập mật khẩu">
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Chức vụ<span class="required">*</span></td>
                <td class="bottom">
                <div class="dropdown-container">

                    <select name="position" class="form-control">
                        <option value="">Chọn Chức Vụ</option>
                        <option value="Quản Lý Kho" {{ old('position', $employee->position) == 'Quản Lý Kho' ? 'selected' : '' }}>Quản Lý Kho</option>
                        <option value="Dịch Vụ" {{ old('position', $employee->position) == 'Dịch Vụ' ? 'selected' : '' }}>Dịch Vụ</option>
                        <option value="Admin" {{ old('position', $employee->position) == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Quản lý" {{ old('position', $employee->position) == 'Quản lý' ? 'selected' : '' }}>Quản lý</option>
                    </select>
                    <span> <i class="fas fa-chevron-down"></i></span>
                    </div>
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Tên nhân viên</td>
                <td class="bottom">
                    <input type="text" name="name" value="{{ old('name', $employee->name) }}" placeholder="Nhập tên nhân viên">
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Địa chỉ</td>
                <td class="bottom">
                    <input type="text" name="address" value="{{ old('address', $employee->address) }}" placeholder="Nhập địa chỉ">
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Điện thoại</td>
                <td class="bottom">
                    <input type="text" name="phone" value="{{ old('phone', $employee->phone) }}" placeholder="Nhập điện thoại">
                </td>
            </tr>
        </tbody>
    </table>
</form>
@endsection