@extends('nghiepvu')

@section('title', 'Nhóm Đối Tượng')


@section('custom-css')
<link rel="stylesheet" href="{{ asset('thietlap.css') }}">
@endsection
<style>
    .containerr {
        border-radius: 8px;
    }

    .form-title {
        border: 1px solid #C6CFFC;
        padding: 20px 0;
        text-align: center;
        font-size: 24px;
        background-color:rgb(234, 235, 243);
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin: 20px 0;
        justify-content: space-between;
    }

    .form-group {
        flex: 1 1 calc(33.333% - 20px);
        min-width: 200px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input, select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input:disabled {
        background: #e9ecef;
    }

    .required {
        color: red;
    }

    .item-table {
        width: 100%;
        border-collapse: collapse;
    }

    .item-table th, .item-table td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

   

    .item-table .add-product button {
        background: #007bff;
        color: white;
        padding: 8px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .item-table .add-product button:hover {
        background: #0056b3;
    }
</style>
@section('main-nghiepvu')
<div class="add-header">
    @section('header-actions')
    <button class="cancel-btn">
        <i class="fa-solid fa-circle-xmark"></i> Hủy
    </button>
    <button class="confirm-btn">
        <i class="fa-solid fa-save"></i> Xác nhận
    </button>
    @endsection
</div>
<div class="containerr">
    <h1 class="form-title">THÔNG TIN PHIẾU NHẬP HÀNG</h1>
    <form>
        <div class="form-row">
            <div class="form-group">
                <label for="ma-phieu">Mã phiếu <span class="required">*</span></label>
                <input type="text" id="ma-phieu" placeholder="PNH00001" disabled>
            </div>
            <div class="form-group">
                <label for="nguoi-lap">Người lập phiếu</label>
                <input type="text" id="nguoi-lap" placeholder="Admin" disabled>
            </div>
            <div class="form-group">
                <label for="ngay-lap">Ngày lập phiếu <span class="required">*</span></label>
                <input type="date" id="ngay-lap" value="2024-10-12">
            </div>
            <div class="form-group">
                <label for="nha-cung-cap">Nhà cung cấp <span class="required">*</span></label>
                <select id="nha-cung-cap">
                    <option value="">-- Chọn thông tin --</option>
                    <option value="1">Công ty trách nhiệm hữu hạn một thành viên A</option>
                    <option value="2">Công ty trách nhiệm hữu hạn một thành viên B</option>
                    <option value="3">Công ty trách nhiệm hữu hạn một thành viên C</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sdt">SDT Liên hệ</label>
                <input type="text" id="sdt" placeholder="Nhập thông tin">
            </div>
            <div class="form-group">
                <label for="dia-chi">Địa chỉ</label>
                <input type="text" id="dia-chi" placeholder="Nhập thông tin">
            </div>
            <div class="form-group">
                <label for="ghi-chu">Ghi chú</label>
                <input type="text" id="ghi-chu" placeholder="Nhập thông tin">
            </div>
        </div>
        <table class="item-table">
            <thead>
                <tr>
                    <th>Mã hàng</th>
                    <th>Tên hàng</th>
                    <th>Hãng</th>
                    <th>Số lượng</th>
                    <th>Ghi chú</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5" class="add-product">
                        <button type="button">+ Thêm sản phẩm mới</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
@endsection