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
<form id="create-product-form" action="{{ route('hanghoa.store') }}" method="POST">
    @csrf
    <div class="add-header items-header">
        <a href="{{ route('hanghoa.index') }}">
            <button type="button" class="cancel-btn">
                <i class="fa-solid fa-circle-xmark"></i> Hủy
            </button>
        </a>
        <button type="submit" class="confirm-btn">
            <i class="fa-solid fa-save"></i> Lưu khách hàng
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

                    <select name="group" class="form-control" required>
                        <option value="">Chọn nhóm</option>
                        <option value="Hàng Hóa">Hàng Hoá</option>
                        <option value="UPS">UPS</option>
                        <option value="Module">Module</option>
                    </select>
                    <span> <i class="fas fa-chevron-down"></i></span>
                    </div>
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Mã Hàng<span class="required">*</span></td>
                <td class="bottom">
                    <input type="text" name="product_code" value="{{ old('product_code') }}" placeholder="Nhập mã hàng"
                        required>
                    @error('product_code')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Tên Hàng <span class="required">*</span></td>
                <td class="bottom">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nhập tên hàng" required>
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Hãng</td>
                <td class="bottom">
                    <input type="text" name="brand" value="{{ old('brand') }}" placeholder="Nhập hãng" required>
                    @error('brand')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Bảo Hành</td>
                <td class="bottom">
                    <input type="text" name="warranty_period" value="{{ old('warranty_period') }}"
                        placeholder="Nhập thời gian bảo hành (tháng)" required>
                    @error('warranty_period')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </td>
            </tr>
        </tbody>
    </table>
</form>
@endsection