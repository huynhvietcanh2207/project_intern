@extends('thietlap')

@section('main')

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

        /*thông báo  */
        .alert {
            position: fixed;
            top: 60px;
            left: 50%;
            transform: translateX(-50%);
            padding: 15px 20px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-width: 300px;
            z-index: 9999;
            font-size: 16px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .alert-success {
            background-color: rgb(16, 144, 46);
            color: rgb(255, 255, 255);
            border: 1px solidrgb(31, 238, 79);
        }

        .alert-error {
            background-color: #f8d7da;
            color: rgb(235, 12, 34);
            border: 1px solid #f5c6cb;
        }

        .close-alert {
            background: none;
            border: none;
            font-size: 20px;
            font-weight: bold;
            margin-left: 5px;
            color: inherit;
            cursor: pointer;
        }
    </style>
    <div class="items-header">
        @if (session('success'))
            <div class="alert alert-success" id="success-alert">
                <span>{{ session('success') }}</span>
                <button type="button" class="close-alert"
                    onclick="document.getElementById('success-alert').style.display='none';">&times;</button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error" id="error-alert">
                <span>{{ session('error') }}</span>
                <button type="button" class="close-alert"
                    onclick="document.getElementById('error-alert').style.display='none';">&times;</button>
            </div>
        @endif
         <!-- thông báo tìm kiếm -->
         @if (isset($message))
            <div class="alert alert-error" id="error-alert">
                <span>{{ $message }}</span>
                <button type="button" class="close-alert"
                    onclick="document.getElementById('error-alert').style.display='none';">&times;</button>
            </div>
        @endif
        <div class="search-wrapper">

        <div class="search">
    <form action="{{ route('nhacungcap.index') }}" method="GET">
        <i class="fa-solid fa-magnifying-glass search-icon"></i>
        <input type="text" name="search" placeholder="Tìm kiếm" class="search-bar" value="{{ request()->query('search') }}">
    </form>
</div>
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
                        <li>Item 1</li>
                        <li>Item 2</li>
                        <li>Item 3</li>
                        <li>Item 4</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="create-btn-wrapper">
            <button class="create-btn">
                <a href="{{ route('nhacungcap.create') }}" class="create-link">
                    <i class="fas-solid fa-plus"></i>
                    Tạo mới</a>
            </button>
        </div>
    </div>


    <table>
        <thead>
            <tr>
                <th>Mã nhà cung cấp</th>
                <th>Tên nhà cung cấp</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Ghi chú</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suppliers as $group => $groupSuppliers)
                <tr class="group-header">
                    <td colspan="6">Khách hàng: {{ $group }}</td>
                </tr>
                @foreach ($groupSuppliers as $supplier)
                    <tr class="group-client">
                        <td>{{ $supplier->supplier_code }}</td>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->address }}</td>
                        <td>{{ $supplier->phone }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->notes }}
                            <a href="{{ route('nhacungcap.edit', $supplier->id) }}">
                                <i class="fa-solid fa-pen-to-square edit-icon"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                <tr class="group-footer">
                    <td colspan="6">Có {{ $groupSuppliers->count() }} khách hàng</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        document.querySelector('.search-actions').addEventListener('click', function (event) {
            this.classList.toggle('active');
        });

        document.querySelector('.filter-search input').addEventListener('click', function (event) {
            event.stopPropagation();
        });
        document.addEventListener('click', function (event) {
            const searchActions = document.querySelector('.search-actions');
            const dropdownContent = searchActions.querySelector('.dropdown-content');

            if (!searchActions.contains(event.target)) {
                searchActions.classList.remove('active');
            }
        });

    </script>
</section>

@endsection