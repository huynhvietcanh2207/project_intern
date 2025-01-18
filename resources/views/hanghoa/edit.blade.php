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

    .group-client {
        position: relative;
        height: 40px !important;
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
        padding: 10px 0;
        appearance: none;
        background-color: white;
        border: 1px solid #C6CFFC;
        text-align: left;
        padding-right: 30px;
    }
</style>
@section('main')
<form id="edit-product-form" action="{{ route('hanghoa.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="add-header items-header">
        <a href="{{ route('hanghoa.index') }}">
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

                        <select name="group" class="form-control">
                            <option value="">Chọn nhóm</option>
                            <option value="Hàng Hóa" {{ $product->group == 'Hàng Hóa' ? 'selected' : '' }}>Hàng Hoá
                            </option>
                            <option value="UPS" {{ $product->group == 'UPS' ? 'selected' : '' }}>UPS</option>
                            <option value="Module" {{ $product->group == 'Module' ? 'selected' : '' }}>Module</option>
                            
                        </select>
                        <span> <i class="fas fa-chevron-down"></i></span>

                    </div>
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Mã Hàng <span class="required">*</span></td>
                <td class="bottom">
                    <input type="text" name="product_code" value="{{ $product->product_code }}"
                        placeholder="Nhập mã hàng">
                    @error('product_code')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Tên Hàng <span class="required">*</span></td>
                <td class="bottom">
                    <input type="text" name="name" value="{{ $product->name }}" placeholder="Nhập tên hàng">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Hãng</td>
                <td class="bottom">
                    <input type="text" name="brand" value="{{ $product->brand }}" placeholder="Nhập hãng">
                    @error('brand')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Bảo Hành</td>
                <td class="bottom">
                    <input type="text" name="warranty_period" value="{{ $product->warranty_period }}"
                        placeholder="Nhập thời gian bảo hành (tháng)">
                    @error('warranty_period')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </td>
            </tr>
        </tbody>
    </table>
</form>
@endsection