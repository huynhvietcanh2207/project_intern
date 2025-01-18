@extends('thietlap')

@section('title', 'Thêm Đối Tượng')

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

    .group-client td span i {
        position: absolute;
        right: 10px;
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
        box-sizing: border-box;
        position: absolute;
        width: 1520px;
        height: 40px;
        top: 0px;
        border: none;
        outline: none;
        background: #FFFFFF;
        border-width: 1px 0px;
        border-style: solid;
        border-color: #C6CFFC;
    }
    .dropdown-container select {
        border: none;
        outline: none;
        box-shadow: none;
        background-color: white;
        padding: 10px 0;
        font-size: 14px;
        color: #000;
        cursor: pointer;
    }

    .dropdown-container {
        position: relative;
      
    }

    select {
        width: 100%;
        padding: 10px 0;
        appearance: none;
        background-color: white;
        border: 1px solid #C6CFFC;
        text-align: left;
        padding-right: 30px;
    }
</style>
@section('main')
<form id="edit-form" action="{{ route('khachhang.update', $customer->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="add-header items-header">
        <a href="{{ route('khachhang.index') }}">
            <button type="button" class="cancel-btn">
                <i class="fa-solid fa-circle-xmark"></i> Hủy
            </button>
        </a>
        <button type="submit" class="confirm-btn">
            <i class="fa-solid fa-save"></i> Cập nhật khách hàng
        </button>
    </div>

    <table class="col-3-7">
        <tbody>
            <tr class="group-client">
                <td class="top">Chọn Nhóm <span class="required">*</span></td>
                <td class="bottom">
                <div class="dropdown-container">

                    <select name="group" class="form-control" required>
                        <option value="">Chọn Nhóm</option>
                        <option value="Công Ty" {{ $customer->group == 'cty' ? 'selected' : '' }}>Công Ty</option>
                        <option value="KV-Tĩnh_Miền_Bắc" {{ $customer->group == 'KV-Tĩnh_Miền_Bắc' ? 'selected' : '' }}>KV-Tĩnh miền Bắc</option>
                        <option value="KV-Tĩnh_Miền_Nam" {{ $customer->group == 'KV-Tĩnh_Miền_Nam' ? 'selected' : '' }}>KV-Tĩnh miền Nam</option>
                        <option value="KV-Tĩnh_Miền_Trung" {{ $customer->group == 'KV-Tĩnh_Miền_Trung' ? 'selected' : '' }}>KV-Tĩnh miền Trung</option>
                    </select>
                    <span> <i class="fas fa-chevron-down"></i></span>

                   </div>
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Mã Khách Hàng <span class="required">*</span></td>
                <td class="bottom">
                    <input type="text" name="customer_code" value="{{ $customer->customer_code }}" required>
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Tên Khách Hàng <span class="required">*</span></td>
                <td class="bottom">
                    <input type="text" name="name" value="{{ $customer->name }}" required>
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Địa Chỉ</td>
                <td class="bottom">
                    <input type="text" name="address" value="{{ $customer->address }}">
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Điện Thoại</td>
                <td class="bottom">
                    <input type="text" name="phone" value="{{ $customer->phone }}">
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Email</td>
                <td class="bottom">
                    <input type="text" name="email" value="{{ $customer->email }}">
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Mã Số Thuế</td>
                <td class="bottom">
                    <input type="text" name="tax_code" value="{{ $customer->tax_code }}">
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Ghi Chú</td>
                <td class="bottom">
                    <input type="text" name="note" value="{{ $customer->note }}">
                </td>
            </tr>
        </tbody>
    </table>
</form>
@endsection