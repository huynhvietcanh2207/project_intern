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
            <button class="tab"><a href="{{ route('nhomdoituong.index') }}">Nhóm đối tượng</a></button>
            <button class="tab"><a href="{{ route('khachhang.index') }}">Khách hàng</a></button>
            <button class="tab"><a href="{{ route('nhacungcap.index') }}">Nhà cung cấp</a></button>
            <button class="tab"><a href="{{ route('hanghoa.index') }}">Hàng hóa</a></button>
            <button class="tab"><a href="{{ route('nhanvien.index') }}">Nhân viên</a></button>
            <button class="tab"><a href="{{ route('kho.index') }}">Kho</a></button>
        </div>

        <!-- <div class="items-header">
            @yield('header-actions')
        </div> -->

        <div class="main-content">
            <!-- <h1>danh sách thiết lập</h1> -->
            @yield('main')
        </div>

    </div>
</body>

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

</html>

@endsection