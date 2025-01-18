@extends('baocao')

@section('title', 'Nhóm Đối Tượng')

@section('main-baocao')
<html>
<head>
    <title>Report Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
      
        .containerer {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px 100px ;
        }
        .report-card {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: 48%;
            padding: 20px;
        }
        .report-card h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .report-card .date-range {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 10px;
        }
        .report-card .date-range select {
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            padding: 5px;
        }
        .report-card .item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        .report-card .item:last-child {
            margin-bottom: 0;
        }
        .report-card .item i {
            margin-right: 10px;
        }
        .report-card .item .count {
            font-size: 18px;
            font-weight: bold;
        }
        .report-card .item.yellow {
            background-color: #fff3cd;
        }
        .report-card .item.lightblue {
            background-color: #d1ecf1;
        }
        .report-card .item.lightgreen {
            background-color: #d4edda;
        }
        .report-card .item.lightred {
            background-color: #f8d7da;
        }
        .report-card .item.lightcyan {
            background-color: #e2f0f9;
        }
        .report-card .item.lightpink {
            background-color: #f8d7da;
        }
        .report-card .details {
            text-align: right;
            font-size: 14px;
            color: #007bff;
            cursor: pointer;
        }
        @media (max-width: 768px) {
            .report-card {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="containerer">
        <div class="report-card">
            <h3>Báo cáo phiếu xuất nhập</h3>
            <div class="date-range">
                <span>12-01-2024 → 12-12-2024</span>
                <select>
                    <option>Tất cả</option>
                </select>
            </div>
            <div class="item yellow">
                <div>
                    <i class="fas fa-box"></i> Phiếu nhập
                </div>
                <div class="count">100</div>
            </div>
            <div class="item yellow">
                <div>
                    <i class="fas fa-box"></i> Phiếu xuất
                </div>
                <div class="count">100</div>
            </div>
        </div>
        <div class="report-card">
            <h3>Báo cáo hàng xuất nhập</h3>
            <div class="date-range">
                <span>12-01-2024 → 12-12-2024</span>
                <select>
                    <option>Tất cả</option>
                </select>
            </div>
            <div class="item lightblue">
                <div>
                    <i class="fas fa-box"></i> Hàng nhập
                </div>
                <div class="count">100</div>
            </div>
            <div class="item lightred">
                <div>
                    <i class="fas fa-box"></i> Hàng xuất
                </div>
                <div class="count">100</div>
            </div>
            <div class="details">Chi tiết <i class="fas fa-arrow-right"></i></div>
        </div>
        <div class="report-card">
            <h3>Báo cáo phiếu tiếp nhận - trả hàng</h3>
            <div class="date-range">
                <span>12-01-2024 → 12-12-2024</span>
                <select>
                    <option>Tất cả</option>
                </select>
            </div>
            <div class="item lightgreen">
                <div>
                    <i class="fas fa-box"></i> Phiếu tiếp nhận
                </div>
                <div class="count">100</div>
            </div>
            <div class="item lightgreen">
                <div>
                    <i class="fas fa-box"></i> Phiếu chưa xử lý
                </div>
                <div class="count">100</div>
            </div>
            <div class="item lightgreen">
                <div>
                    <i class="fas fa-box"></i> Phiếu quá hạn
                </div>
                <div class="count">100</div>
            </div>
            <div class="item lightgreen">
                <div>
                    <i class="fas fa-box"></i> Phiếu trả hàng
                </div>
                <div class="count">100</div>
            </div>
        </div>
        <div class="report-card">
            <h3>Báo cáo hàng tiếp nhận - trả hàng</h3>
            <div class="date-range">
                <span>12-01-2024 → 12-12-2024</span>
                <select>
                    <option>Tất cả</option>
                </select>
            </div>
            <div class="item lightcyan">
                <div>
                    <i class="fas fa-box"></i> Hàng tiếp nhận
                </div>
                <div class="count">100</div>
            </div>
            <div class="item lightpink">
                <div>
                    <i class="fas fa-box"></i> Hàng trả hàng
                </div>
                <div class="count">100</div>
            </div>
            <div class="details">Chi tiết <i class="fas fa-arrow-right"></i></div>
        </div>
        <div class="report-card">
            <h3>Báo cáo tồn kho</h3>
            <div class="date-range">
                <span>12-01-2024 → 12-12-2024</span>
                <select>
                    <option>Tất cả</option>
                </select>
            </div>
            <div class="item lightcyan">
                <div>
                    <i class="fas fa-box"></i> Hàng tồn kho
                </div>
                <div class="count">100</div>
            </div>
            <div class="item lightcyan">
                <div>
                    <i class="fas fa-box"></i> Hàng tới hạn bảo trì
                </div>
                <div class="count">100</div>
            </div>
        </div>
        <div class="report-card">
            <h3>Báo cáo phiếu báo giá</h3>
            <div class="date-range">
                <span>12-01-2024 → 12-12-2024</span>
                <select>
                    <option>Tất cả</option>
                </select>
            </div>
            <div class="item lightblue">
                <div>
                    <i class="fas fa-box"></i> Phiếu hoàn thành
                    <br> Tổng tiền
                </div>
                <div class="count">100<br>100.000.000</div>
            </div>
            <div class="item lightred">
                <div>
                    <i class="fas fa-box"></i> Phiếu khách không đồng ý
                    <br> Tổng tiền
                </div>
                <div class="count">10<br>10.000.000</div>
            </div>
            <div class="details">Chi tiết <i class="fas fa-arrow-right"></i></div>
        </div>
    </div>
</body>
</html>
@endsection