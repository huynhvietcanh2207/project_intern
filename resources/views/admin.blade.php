<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('thietlap.css') }}">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <a href="{{ route('thietlap.index') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" height="20" />
                </a>
            </div>
            <div class="menu">
                <span class="menu-item" data-menu="thietlap"><a href="{{ route('thietlap.index') }}">THIẾT
                        LẬP</a></span>
                <span class="menu-item" data-menu="nghiepvu"><a href="{{ route('nghiepvu.index') }}">NGHIỆP
                        VỤ</a></span>
                <span class="menu-item" data-menu="baocao"><a href="{{ route('baocao.index') }}">BÁO CÁO</a></span>
            </div>

            <div class="user-options">
                <div class="notification-icon">
                    <i class="fas fa-bell light-icon"></i>
                    <span class="badge">3</span>
                </div>
                <div class="user-icon">
                    <i class="fas fa-user-circle light-icon"></i>
                </div>
            </div>
        </div>
        <div class="main-content">
            @yield('content')
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuItems = document.querySelectorAll('.menu-item');

        const activeMenu = localStorage.getItem('activeMenu');

        if (activeMenu) {
            menuItems.forEach(item => {
                item.classList.remove('active');
                if (item.dataset.menu === activeMenu) {
                    item.classList.add('active');
                }
            });
        }

        menuItems.forEach(item => {
            item.addEventListener('click', function () {
                menuItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
                localStorage.setItem('activeMenu', this.dataset.menu);
            });
        });
    });
</script>

</html>