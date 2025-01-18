@extends('thietlap')
@section('title', 'Chỉnh Sửa Đối Tượng')

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
<form method="POST" action="{{ route('nhacungcap.update', $nhacungcap->id) }}">
    @csrf
    @method('PUT')
    <div class="add-header items-header">
        <a href="{{ route('nhacungcap.index') }}">
            <button type="button" class="cancel-btn">
                <i class="fa-solid fa-circle-xmark"></i> Hủy
            </button>
        </a>
        <button type="submit" class="confirm-btn">
            <i class="fa-solid fa-save"></i> Lưu thay đổi
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

                    <select name="group" id="group" class="form-control" required>
                        <option value="" disabled>Chọn Thông Tin</option>
                        <option value="Nhà Cung Cấp" {{ $nhacungcap->group == 'Nhà Cung Cấp' ? 'selected' : '' }}>Nhà Cung Cấp</option>
                        <option value="Nhà Phân Phối" {{ $nhacungcap->group == 'Nhà Phân Phối' ? 'selected' : '' }}>Nhà Phân Phối</option>
                    </select>
                    <span> <i class="fas fa-chevron-down"></i></span>
                    </div>
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Mã Nhà Cung Cấp<span class="required">*</span></td>
                <td class="bottom">
                    <input type="text" name="supplier_code" value="{{ $nhacungcap->supplier_code }}" placeholder="Nhập thông tin">
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Tên Nhà Cung Cấp <span class="required">*</span></td>
                <td class="bottom">
                    <input type="text" name="name" value="{{ $nhacungcap->name }}" placeholder="Nhập thông tin">
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Địa Chỉ</td>
                <td class="bottom">
                    <input type="text" name="address" value="{{ $nhacungcap->address }}" placeholder="Nhập thông tin">
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Điện Thoại</td>
                <td class="bottom">
                    <input type="text" name="phone" value="{{ $nhacungcap->phone }}" placeholder="Nhập thông tin">
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Email</td>
                <td class="bottom">
                    <input type="text" name="email" value="{{ $nhacungcap->email }}" placeholder="Nhập thông tin">
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Mã Số Thuế</td>
                <td class="bottom">
                    <input type="text" name="tax_code" value="{{ $nhacungcap->tax_code }}" placeholder="Nhập thông tin">
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Ghi Chú</td>
                <td class="bottom">
                    <input type="text" name="notes" value="{{ $nhacungcap->notes }}" placeholder="Nhập thông tin">
                </td>
            </tr>
        </tbody>
    </table>
</form>
@endsection
