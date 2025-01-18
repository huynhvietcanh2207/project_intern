@extends('thietlap')
@section('title', 'Sửa Đối Tượng')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('thietlap.css') }}">
@endsection

<style>
    /* Giữ nguyên các style đã có */
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
        display: inline-block;
        width: 100%;
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

    .dropdown1 {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 16px;
        color: #25406E;
        pointer-events: none;
    }

    .items-header {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        padding: 15px 30px;
        flex: 0 !important;
        background: #FFFFFF;
        border: 2px solid #C6CFFC;
        height: 60px;
    }
</style>

@section('main')
<form id="edit-form" action="{{ route('nhomdoituong.update', $nhomDoiTuong->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Chỉ định phương thức PUT cho việc chỉnh sửa -->

    <div class="add-header items-header">
        <a href="{{ route('nhomdoituong.index') }}">
            <button type="button" class="cancel-btn">
                <i class="fa-solid fa-circle-xmark"></i> Hủy
            </button>
        </a>

        <button type="submit" class="confirm-btn">
            <i class="fa-solid fa-save"></i> Lưu nhóm đối tượng
        </button>
    </div>

    <table class="col-3-7">
        <tbody>
            <tr class="group-client">
                <td class="top">Loại Nhóm <span class="required">*</span></td>
                <td class="bottom">
                    <div class="dropdown-container">
                    <select name="loai_nhom_doi_tuong" required>
                            <option value="Khách hàng" {{ $nhomDoiTuong->loai_nhom_doi_tuong == 'customer' ? 'selected' : '' }}>Khách Hàng</option>
                            <option value="Nhân viên" {{ $nhomDoiTuong->loai_nhom_doi_tuong == 'employee' ? 'selected' : '' }}>Nhân Viên</option>
                      
                        </select>
                        <span> <i class="fas fa-chevron-down"></i></span>

                    </div>
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Mã Đối Tượng <span class="required">*</span></td>
                <td class="bottom">
                    <input type="text" name="ma_doi_tuong" value="{{ $nhomDoiTuong->ma_doi_tuong }}" placeholder="Nhập mã đối tượng" required>
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Tên Nhóm Đối Tượng <span class="required">*</span></td>
                <td class="bottom">
                    <input type="text" name="ten_nhom_doi_tuong" value="{{ $nhomDoiTuong->ten_nhom_doi_tuong }}" placeholder="Nhập tên nhóm đối tượng" required>
                </td>
            </tr>
        </tbody>
    </table>
</form>
@endsection
