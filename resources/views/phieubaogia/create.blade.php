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
        background-color: rgb(234, 235, 243);
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

    input,
    select {
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

    .item-table th,
    .item-table td {
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

    /**/
    .search-wrapper {
        display: flex;
        flex: 1;
    }




    .cancel-btn {
        margin: 0 8px;
    }

    .confirm-btn {
        margin: 0 0 0 8px;

    }




    .create-btn-wrapper {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }




    .create-btn {

        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 7px 8px;
        gap: 6px;

        width: 87px;
        height: 30px;
        color: #FFFFFF;
        background: #25406E;
        box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.09);
        border-radius: 4px;

        flex: none;
        order: 10;
        flex-grow: 0;

    }

    .create-btn a {
        color: #FFFFFF;
        text-decoration: none;
    }

    .create-btn i {
        font-size: 16px;
    }

    .group-header {
        background: #FFFFFF;
        font-weight: bold;
    }

    .group-footer {
        font-style: italic;
        color: red;
        text-decoration: none;
    }

    .filter-btn {
        border: 0;
        background: #FFFFFF;
    }


    .group-client {
        position: relative;
    }


    .search-actions {
        padding: 5px 10px;
        border: none;
        width: 190px;
        margin: 0 10px;
        height: 30px;
        background: #FFFFFF;
        color: rgb(0, 0, 0);
        cursor: pointer;
        border-radius: 5px;
        border: 1px solid #C6CFFC;
        position: relative;
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
        z-index: 1000;
        border-radius: 4px;
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

    .search-actions.active .dropdown-content {
        display: block;
    }

    .filter-search {
        display: flex;
        align-items: center;
        position: relative;
        padding: 10px;
    }

    .filter-search input {
        width: 100%;
        padding: 5px 10px 5px 30px;
        border: 1px solid #C6CFFC;
        border-radius: 4px;
    }

    .filter-search-icon {
        position: absolute;
        left: 15px;
        color: #999;
    }

    .icon-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        /* Điều chỉnh chiều cao theo bố cục của bạn */
        text-align: center;
    }

    .fa-delete {
        font-size: 24px;
        /* Kích thước icon */
        color: #ff0000;
        /* Màu sắc icon, có thể thay đổi */
    }
</style>
@section('main-nghiepvu')
<div class="add-header">
    @section('header-actions')

    <div class="search-wrapper">

        <div class="search-actions">

            <button class="filter-btn">Chọn phiếu tiếp nhận</button>
            <i class="fas fa-chevron-down"></i>

            <div class="dropdown-content">
                <ul>
                    <div class="filter-search">
                        <input type="text" placeholder="Tìm kiếm..." id="filter-search-input">
                        <i class="fa-solid fa-magnifying-glass filter-search-icon"></i>
                    </div>
                    <li>PTN0001</li>
                    <li>PTN0002</li>
                    <li>PTN0003</li>
                </ul>
            </div>
        </div>
        <div class="search-actions">

            <button class="filter-btn">Tình trạng : hoàn thành</button>
            <i class="fas fa-chevron-down"></i>

            <div class="dropdown-content">
                <ul>

                    <li>Item 1</li>
                    <li>Item 2</li>
                    <li>Item 3</li>
                    <li>Item 4</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="create-btn-wrapper">
        <button class="cancel-btn">
            <i class="fa-solid fa-circle-xmark"></i> Hủy
        </button>
        <button class="cancel-btn">
            <i class="fa-solid fa-save"></i> Lưu và in phiếu
        </button>
        <button class="confirm-btn">
            <i class="fa-solid fa-save"></i> Xác nhận
        </button>
    </div>
    @endsection
</div>
<div class="containerr">
    <h1 class="form-title">THÔNG TIN PHIẾU TRẢ HÀNG</h1>
    <form>
        <div class="form-row">
            <div class="form-group">
                <label for="ma-phieu">Mã phiếu <span class="required">*</span></label>
                <input type="text" id="ma-phieu" value="PTN00001" disabled>
            </div>
            <div class="form-group">
                <label for="khach-hang">Khách hàng <span class="required">*</span></label>
                <select id="khach-hang">
                    <option value="">-- Chọn thông tin --</option>
                    <option value="1">Khách hàng A</option>
                    <option value="2">Khách hàng B</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ngay-lap">Ngày lập phiếu <span class="required">*</span></label>
                <input type="date" id="ngay-lap" value="2024-10-12">
            </div>
            <div class="form-group">
                <label for="sdt">SĐT liên hệ</label>
                <input type="text" id="sdt" placeholder="Nhập thông tin">
            </div>
            <div class="form-group">
                <label for="nguoi-lien-he">Người liên hệ</label>
                <input type="text" id="nguoi-lien-he" placeholder="Nhập thông tin">
            </div>
            <div class="form-group">
                <label for="nguoi-lap">Người lập phiếu</label>
                <input type="text" id="nguoi-lap" value="Admin" disabled>
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
                    <th>STT</th>
                    <th>Thông tin hàng hoá/dịch vụ</th>
                    <th>ĐVT</th>
                    <th>Hãng</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thuế</th>
                    <th>Thành tiền</th>
                    <th>Ghi chú</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               
                <tr class="group-client">
                    <td>1</td>
                    <td>
                        <input type="text" id="nguoi-lien-he" placeholder="Nhập thông tin">
                    </td>
                    <td> <input type="text" id="nguoi-lien-he" placeholder="Nhập thông tin"></td>
                    <td> <input type="text" id="nguoi-lien-he" placeholder="Nhập thông tin"></td>
                    <td> <input type="text" id="nguoi-lien-he" placeholder="Nhập thông tin"></td>
                    <td> <input type="text" id="nguoi-lien-he" placeholder="Nhập thông tin"></td>
                    <td>
                        <select id="khach-hang">
                            <option value="">-- Chọn thông tin --</option>
                            <option value="1">8%</option>
                            <option value="2">10%</option>
                            <option value="2">KCT</option>

                        </select>
                    </td>
                    <td></td>
                    <td> <input type="text" id="nguoi-lien-he" placeholder="Nhập thông tin"></td>
                    <td>
                        <div class="icon-container">
                            <i class="fa-solid fa-trash"></i>

                        </div>
                    </td>

                </tr>
                <tr class="group-client">
                    <td>1</td>
                    <td>
                        <input type="text" id="nguoi-lien-he" placeholder="Nhập thông tin">
                    </td>
                    <td> <input type="text" id="nguoi-lien-he" placeholder="Nhập thông tin"></td>
                    <td> <input type="text" id="nguoi-lien-he" placeholder="Nhập thông tin"></td>
                    <td> <input type="text" id="nguoi-lien-he" placeholder="Nhập thông tin"></td>
                    <td> <input type="text" id="nguoi-lien-he" placeholder="Nhập thông tin"></td>
                    <td>
                        <select id="khach-hang">
                            <option value="">-- Chọn thông tin --</option>
                            <option value="1">8%</option>
                            <option value="2">10%</option>
                            <option value="2">KCT</option>

                        </select>
                    </td>
                    <td></td>
                    <td> <input type="text" id="nguoi-lien-he" placeholder="Nhập thông tin"></td>
                    <td>
                        <div class="icon-container">
                            <i class="fa-solid fa-trash"></i>

                        </div>
                    </td>

                </tr>
                <tr class="group-client">
                    <td>1</td>
                    <td>
                        <input type="text" id="nguoi-lien-he" placeholder="Nhập thông tin">
                    </td>
                    <td> <input type="text" id="nguoi-lien-he" placeholder="Nhập thông tin"></td>
                    <td> <input type="text" id="nguoi-lien-he" placeholder="Nhập thông tin"></td>
                    <td> <input type="text" id="nguoi-lien-he" placeholder="Nhập thông tin"></td>
                    <td> <input type="text" id="nguoi-lien-he" placeholder="Nhập thông tin"></td>
                    <td>
                        <select id="khach-hang">
                            <option value="">-- Chọn thông tin --</option>
                            <option value="1">8%</option>
                            <option value="2">10%</option>
                            <option value="2">KCT</option>

                        </select>
                    </td>
                    <td></td>
                    <td> <input type="text" id="nguoi-lien-he" placeholder="Nhập thông tin"></td>
                    <td>
                        <div class="icon-container">
                            <i class="fa-solid fa-trash"></i>

                        </div>
                    </td>

                </tr>
                
                <td colspan="10" class="add-product">
                    <button type="button">+ Thêm sản phẩm mới</button>
                </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<script>
    document.querySelector('.search-actions').addEventListener('click', function (event) {
        this.classList.toggle('active');
    });

    document.querySelector('.filter-search input').addEventListener('click', function (event) {
        event.stopPropagation();
    });
</script>
@endsection