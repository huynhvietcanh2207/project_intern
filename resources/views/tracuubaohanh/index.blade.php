@extends('nghiepvu')

@section('title', 'Nhóm Đối Tượng')

@section('main-nghiepvu')

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
            font-style: italic;
            color: red;
            text-decoration: none;
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
            position: relative;
            border: 1px solid #C6CFFC;

        }

        .dropdown-content ul li:hover {
            background-color: #f1f1f1;
        }

        /* Hide nested dropdown by default */
        .nested-dropdown {
            display: none;
            position: absolute;
            left: 100%;
            top: 0;
            background-color: white;
            border: 1px solid #C6CFFC;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 200px;
            border-radius: 4px;
        }

        .nested-dropdown li {
            border: 1px solid #C6CFFC;
        }

        /* Show nested dropdown on hover */
        .dropdown-item:hover .nested-dropdown {
            display: block;
        }

        .search-actions.active .dropdown-content {
            display: block;
        }

        .icon-dropdown {
            margin-left: 40px;
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

        .search-button {
            /* Buttons */

            /* Auto layout */
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            margin-right: 15px;

            width: 64px;
            height: 30px;
            color: #ffff;
            /* TPT/bg header */
            background: #25406E;
            /* Button */
            box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.09);
            border-radius: 4px;



        }

        .baotri {
            color: red;
        }
    </style>
    <div class="header-index">
        @section('header-actions')

        <div class="search-wrapper">

            <div class="search">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <input type="text" placeholder="Tìm kiếm" class="search-bar">
            </div>
            <button class="search-button">Tra cứu</button>

            <div class="search-actions">

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
                        <li>Hãng</li>
                        <li>Khách hàng</li>
                        <li>Ngày xuất/trả hàng</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>


    <table>
        <thead>
            <tr>
                <th>Mã hàng</th>
                <th>Tên hàng</th>
                <th>Hãng</th>
                <th>Serial Number</th>
                <th>Khách hàng</th>
                <th>Ngày xuất/Trả hàng</th>
                <th>Bảo hành</th>
                <th>Tình trạng</th>
                <th>Hạn bảo hành</th>

            </tr>
        </thead>
        <tbody>

            <tr class="group-client">
                <td>PVX12000LI-MS</td>
                <td>USB PVX12000LI-MS</td>
                <td>
                    ACB
                    <i class="fa-solid fa-pen-to-square edit-icon"></i>
                </td>
                <td>CBA09123131</td>
                <td>Công ty ABC</td>
                <td>22/07/2004</td>
                <td>12 Tháng</td>
                <td>Còn bảo hành</td>
                <td>22/07/2005</td>

            </tr>
            <tr class="group-client">
                <td>HD-500VA</td>
                <td>USB HD-500VA</td>
                <td>
                    HUYNHDAI
                    <i class="fa-solid fa-pen-to-square edit-icon"></i>
                </td>
                <td>CBA09123131</td>
                <td>Công ty ABC</td>
                <td>22/07/2004</td>
                <td>12 Tháng</td>
                <td>Còn bảo hành</td>
                <td>22/07/2005</td>

            </tr>
            <tr class="group-client">
                <td>HD-500VA</td>
                <td>USB HD-500VA</td>
                <td>
                    HUYNHDAI
                    <i class="fa-solid fa-pen-to-square edit-icon"></i>
                </td>
                <td>CBA09123131</td>
                <td>Công ty ABC</td>
                <td>22/07/2004</td>
                <td>12 Tháng</td>
                <td>Còn bảo hành</td>
                <td>22/07/2005</td>

            </tr>
            <tr class="group-client">
                <td>HD-500VA</td>
                <td>USB HD-500VA</td>
                <td>
                    HUYNHDAI
                    <i class="fa-solid fa-pen-to-square edit-icon"></i>
                </td>
                <td>CBA09123131</td>
                <td>Công ty ABC</td>
                <td>22/07/2004</td>
                <td>12 Tháng</td>
                <td>Còn bảo hành</td>
                <td>22/07/2005</td>

            </tr>
            <tr class="group-client">
                <td>HD-500VA</td>
                <td>USB HD-500VA</td>
                <td>
                    HUYNHDAI
                    <i class="fa-solid fa-pen-to-square edit-icon"></i>
                </td>
                <td>CBA09123131</td>
                <td>Công ty ABC</td>
                <td>22/07/2004</td>
                <td>12 Tháng</td>
                <td>Còn bảo hành</td>
                <td>22/07/2005</td>

            </tr>
            <tr class="group-client">
                <td>PVX12000LI-MS</td>
                <td>Nhà cung cấp ABC</td>
                <td>
                    ACB
                    <i class="fa-solid fa-pen-to-square edit-icon"></i>
                </td>
                <td>CBA09123131</td>
                <td>Công ty ABC</td>
                <td>22/07/2004</td>
                <td>12 Tháng</td>
                <td>Còn bảo hành</td>
                <td>22/07/2005</td>

            </tr>

        </tbody>
    </table>
    <script>
        document.querySelector('.search-actions').addEventListener('click', function (event) {
            this.classList.toggle('active');
        });

        document.querySelector('.filter-search input').addEventListener('click', function (event) {
            event.stopPropagation();
        });
    </script>
</section>

@endsection