@extends('admin')

@section('content')

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebSite</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('thietlap.css') }}">
</head>

<body>
    <div class="container">
        <div class="tabs">
            <button class="tab"><a href="{{ route('phieunhaphang.index') }}">Phiếu nhập hàng</a></button>
            <button class="tab"><a href="{{ route('phieuxuathang.index') }}">Phiếu xuất hàng</a></button>
            <button class="tab"><a href="{{ route('tracuutonkho.index') }}">Tra cứu tồn kho</a></button>
            <button class="tab"><a href="{{ route('tracuubaohanh.index') }}">Tra cứu bảo hành</a></button>
            <button class="tab"><a href="{{ route('phieutiepnhan.index') }}">Phiếu tiếp nhận</a></button>
            <button class="tab"><a href="{{ route('phieutrahang.index') }}">Phiếu trả hàng</a></button>
            <button class="tab"><a href="{{ route('phieubaogia.index') }}">Phiếu báo giá</a></button>
        </div>

        <div class="items-header">
            @yield('header-actions')
        </div>

        <div class="main-content">
            <!-- <h1>danh sách nghiệp vụ</h1> -->

            @yield('main-nghiepvu')
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.tab');

            const activeTab = localStorage.getItem('activeTab');

            if (activeTab) {
                tabs.forEach(tab => tab.classList.remove('active'));

                const activeTabElement = document.querySelector(`.tab a[href*="${activeTab}"]`);
                if (activeTabElement) {
                    activeTabElement.parentElement.classList.add('active');
                }
            }

            tabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    const href = this.querySelector('a').getAttribute('href');
                    const tabName = href.split('/').pop(); // Lấy tên của tab từ URL

                    localStorage.setItem('activeTab', tabName);

                    tabs.forEach(t => t.classList.remove('active'));

                    this.classList.add('active');
                });
            });
        });
    </script>

</body>

</html>

@endsection