@extends('baocao')


@section('main-baocao')

<section>
    <style>
        .header-index {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .search-wrapper {
            display: flex;
            flex: 1;
        }

        .search {
            display: flex;
            align-items: center;
            position: relative;
            width: 100%;
            color: rgb(0, 0, 0);

            max-width: 215px;
        }

        .search-bar {
            width: 200px;
            height: 30px;
            padding: 0 40px;
            font-size: 14px;
            border: 1px solid #C6CFFC;
            border-radius: 4px;
            background: #FFFFFF;
        }

        .search-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 18px;
            pointer-events: none;
        }

        /* 
        .search-actions {
            display: flex;
            align-items: center;
            gap: 5px;
        } */

        .search-actions i {
            font-size: 16px;
            color: black;
            cursor: pointer;
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
            padding: 10px;
            text-align: left;
        }

        .group-client:hover td {
            background-color: #EAF0FE;
            color: rgb(0, 0, 0);
        }



        th {
            background: #FFFFFF;
        }

        .group-header {
            background: #FFFFFF;
            font-weight: bold;
        }

        .group-footer {
        position: sticky;
        bottom: 0;
        background: #FFFFFF;
        border-top: 2px solid #C6CFFC;
        text-align: center;
    }
        .filter-btn {
            border: 0;
            background: #FFFFFF;
        }

        .edit-icon {
            display: none !important;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
            color: #25406E;
            cursor: pointer;
        }

        .group-client {
            position: relative;
        }

        .group-client:hover .edit-icon {
            display: inline-block !important;
        }



        .edit-icon:hover {
            color: #007BFF;
        }

        .search-actions {
            padding: 5px 10px;
            border: none;
            width: 99px;
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

        .bo-loc1 {
            width: 190px !important;
            margin-right: 15px;
        }

        .form-title {
            border: 1px solid #C6CFFC;
            padding: 20px 0;
            text-align: center;
            font-size: 24px;
            background-color: rgb(234, 235, 243);
        }

        .group-footer td {
            font-weight: bold;
            text-align: center;
            background-color: #f9f9f9;
            color: red;
            margin-top: 100px;
            
        }
    </style>
    <div class="header-index">
        @section('header-actions')
        @yield('header-search')

        <div class="search-wrapper">

            <div class="search">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <input type="text" placeholder="Tìm kiếm" class="search-bar">
            </div>
            <div class="search-actions bo-loc1">
                <button class="filter-btn ">Bộ lọc thời gian: Tất cả</button>
                <i class="fas fa-chevron-down"></i>

                <div class="dropdown-content">
                    <ul>
                        <div class="filter-search">
                            <input type="text" placeholder="Tìm kiếm..." id="filter-search-input">
                            <i class="fa-solid fa-magnifying-glass filter-search-icon"></i>
                        </div>
                        <li>Item 1</li>
                        <li>Item 2</li>
                        <li>Item 3</li>
                        <li>Item 4</li>
                    </ul>
                </div>
            </div>
            <div class="search-actions bo-loc2">

                <i class="fas fa-border-all"></i>
                <button class="filter-btn">Bộ lọc</button>
                <i class="fas fa-chevron-down"></i>

                <div class="dropdown-content">
                    <ul>
                        <div class="filter-search">
                            <input type="text" placeholder="Tìm kiếm..." id="filter-search-input">
                            <i class="fa-solid fa-magnifying-glass filter-search-icon"></i>
                        </div>
                        <li>Mã hàng</li>
                        <li>Tên hàng</li>

                    </ul>
                </div>
            </div>
        </div>

    </div>

    <h1 class="form-title">BÁO CÁO HÀNG XUẤT NHẬP</h1>

    <table>
        <thead>
            <tr>
                <th>Mã hàng</th>
                <th>Tên hàng</th>
                <th>Số lượng hàng nhập</th>
                <th>Số lượng hàng xuất</th>


            </tr>
        </thead>
        <tbody>

            <tr class="group-client">
                <td>BX0001</td>
                <td>
                    Bộ lưu điện abc12332131
                    <i class="fa-solid fa-pen-to-square edit-icon"></i>
                </td>
                <td>20</td>
                <td>10</td>
            </tr>
            <tr class="group-client">
                <td>BX0001</td>
                <td>
                    Bộ lưu điện abc12332131
                    <i class="fa-solid fa-pen-to-square edit-icon"></i>
                </td>
                <td>20</td>
                <td>10</td>
            </tr>
            <tr class="group-client">
                <td>BX0001</td>
                <td>
                    Bộ lưu điện abc12332131
                    <i class="fa-solid fa-pen-to-square edit-icon"></i>
                </td>
                <td>20</td>
                <td>10</td>
            </tr>
            <tr class="group-client">
                <td>BX0001</td>
                <td>
                    Bộ lưu điện abc12332131
                    <i class="fa-solid fa-pen-to-square edit-icon"></i>
                </td>
                <td>20</td>
                <td>10</td>
            </tr>
            <tr class="group-footer">
                <td></td>
                <td></td>
                <td>Tổng số lượng hàng nhập: 80</td>
                <td>Tổng số lượng hàng xất: 40</td>
            </tr>
    </table>
    <script>
        document.querySelectorAll('.search-actions').forEach(function (action) {
            action.addEventListener('click', function (event) {
                event.stopPropagation();
                this.classList.toggle('active');
            });
        });

        // Ngăn chặn việc tắt dropdown khi nhấn vào ô tìm kiếm
        document.querySelectorAll('.filter-search input').forEach(function (input) {
            input.addEventListener('click', function (event) {
                event.stopPropagation();
            });
        });

    </script>
</section>

@endsection