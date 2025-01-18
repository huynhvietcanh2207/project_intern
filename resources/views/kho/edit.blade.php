@extends('thietlap')
@section('title', 'Chỉnh sửa Kho')

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
        padding: 10px 29px !important;
        border: 1px solid #C6CFFC;
        text-align: left;
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
        left: 400px;
        top: 0px;
        border: none;
        outline: none;
        background: #FFFFFF;
        border-width: 1px 0px;
        border-style: solid;
        border-color: #C6CFFC;
    }
</style>

@section('main')
<form action="{{ route('kho.update', $warehouse->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="add-header items-header">
        <a href="{{ route('kho.index') }}">
            <button type="button" class="cancel-btn">
                <i class="fa-solid fa-circle-xmark"></i> Hủy
            </button>
        </a>
        <button class="confirm-btn" type="submit">
            <i class="fa-solid fa-save"></i> Lưu kho
        </button>
    </div>

    <table class="col-3-7">
        <tbody>
            <tr class="group-client">
                <td class="top">Mã kho<span class="required">*</span></td>
                <td class="bottom">
                    <input type="text" name="warehouse_code" value="{{ old('warehouse_code', $warehouse->warehouse_code) }}" required>
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Tên kho<span class="required">*</span></td>
                <td class="bottom">
                    <input type="text" name="name" value="{{ old('name', $warehouse->name) }}" required>
                </td>
            </tr>
            <tr class="group-client">
                <td class="top">Địa chỉ<span class="required">*</span></td>
                <td class="bottom">
                    <input type="text" name="address" value="{{ old('address', $warehouse->address) }}" required>
                </td>
            </tr>
        </tbody>
    </table>
</form>
@endsection
