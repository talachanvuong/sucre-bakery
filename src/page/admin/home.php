<?php
toast_session();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucre Bakery</title>
    <link rel="stylesheet" href="../../css/admin/overview/content.css">
    <link rel="stylesheet" href="../../css/admin/overview/me">
</head>
<style>
    body {
        background-color: rgb(223, 223, 223);
    }

    .container {
        display: flex;
    }

    .menu-left {
        display: flex;
        flex-direction: column;
        background-color: white;
        height: 700px;
        width: 250px;
    }

    #label {
        background-color: aqua;
        margin: 0px;
        padding: 5px 0px 5px 0px;
    }

    #input {
        margin: 5px 20px 5px 20px;
        padding: 5px 0px 5px 0px;
        height: 20px;
        width: 200px;

    }

    .over-view p {
        background-color: aqua;
        margin: 0px;
        padding: 5px 0px 5px 0px;
    }

    .over-view ul {
        display: block;
        padding: 0px;
        margin: 0px;
        text-align: center;
    }

    #list-items li {
        padding: 5px;
    }

    #list-items li:hover {
        background-color: rgb(220, 229, 237);
    }

    .product {
        padding: 8px 0 8px 0;
    }

    .product p {
        background-color: aqua;
        margin: 0px;
        padding: 5px 0px 5px 0px;
    }

    .product ul {
        display: block;
        padding: 0px;
        margin: 0px;
        text-align: center;
    }

    #product-items li {
        padding: 5px;
    }

    #product-items li:hover {
        background-color: rgb(220, 229, 237);
    }

    a {
        text-decoration: none;
        color: black;
    }
</style>

<body>
    <div class="container">
        <div class="menu-left">
            <div class="search-input">
                <p id="label">Tìm kiếm</p>
                <input id="input" type="text" placeholder="Theo tên sản phẩm...">
            </div>
            <div class="over-view">
                <p id="view-list">Thống kê tổng quan</p>
                <ul style="list-style: none;" id="list-items">
                    <li><a href="#continue">Số đơn tiếp nhận</a></li>
                    <li><a href="#done">Số đơn đã giao</a></li>
                    <li><a href="#exit">Số đơn đã hủy</a></li>
                </ul>
            </div>
            <div class="product">
                <p id="product-list"><a href="?direct=product">Sản phẩm</a></p>
            </div>
        </div>
        <div class="content">
            <h1>Thống kê tổng quan</h1>
            <table>
                <thead>
                    <tr>
                        <th>Ngày đặt</th>
                        <th>Ngày giao</th>
                        <th>Họ và tên</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Danh sách các sản phẩm</th>
                        <th>Thành tiền (trước / sau giảm giá)</th>
                        <th>Tình trạng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01/10/2024</td>
                        <td>05/10/2024</td>
                        <td>Nguyễn Văn A</td>
                        <td>123 Đường ABC, TP. HCM</td>
                        <td>0901234567</td>
                        <td>Bánh kem, Bánh su</td>
                        <td>500,000 VND / 450,000 VND</td>
                        <td><span class="status waiting">Chờ tiếp nhận</span></td>
                    </tr>
                    <tr>
                        <td>02/10/2024</td>
                        <td>06/10/2024</td>
                        <td>Trần Thị B</td>
                        <td>456 Đường XYZ, Hà Nội</td>
                        <td>0907654321</td>
                        <td>Bánh mì, Bánh pizza</td>
                        <td>700,000 VND / 650,000 VND</td>
                        <td><span class="status accepted">Đã tiếp nhận</span></td>
                    </tr>
                    <tr>
                        <td>03/10/2024</td>
                        <td>07/10/2024</td>
                        <td>Phạm Văn C</td>
                        <td>789 Đường KLM, Đà Nẵng</td>
                        <td>0912345678</td>
                        <td>Bánh ngọt, Bánh mặn</td>
                        <td>600,000 VND / 550,000 VND</td>
                        <td><span class="status in-progress">Đang làm</span></td>
                    </tr>
                    <tr>
                        <td>04/10/2024</td>
                        <td>08/10/2024</td>
                        <td>Đỗ Thị D</td>
                        <td>321 Đường DEF, Hải Phòng</td>
                        <td>0923456789</td>
                        <td>Bánh quy, Bánh xèo</td>
                        <td>400,000 VND / 370,000 VND</td>
                        <td><span class="status shipping">Đang giao</span></td>
                    </tr>
                    <tr>
                        <td>05/10/2024</td>
                        <td>09/10/2024</td>
                        <td>Võ Văn E</td>
                        <td>654 Đường OPQ, TP. HCM</td>
                        <td>0934567890</td>
                        <td>Bánh kem, Bánh bao</td>
                        <td>800,000 VND / 750,000 VND</td>
                        <td><span class="status delivered">Đã giao</span></td>
                    </tr>
                    <tr>
                        <td>06/10/2024</td>
                        <td>10/10/2024</td>
                        <td>Lê Thị F</td>
                        <td>987 Đường GHI, Nha Trang</td>
                        <td>0945678901</td>
                        <td>Bánh ngọt, Bánh socola</td>
                        <td>900,000 VND / 850,000 VND</td>
                        <td><span class="status cancelled">Đã hủy</span></td>
                    </tr>
                </tbody>
            </table>

            <h2 id="continue">Số đơn tiếp nhận</h2>
            <table>
                <thead>
                    <tr>
                        <th>Ngày đặt</th>
                        <th>Ngày giao</th>
                        <th>Họ và tên</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Danh sách các sản phẩm</th>
                        <th>Thành tiền (trước / sau giảm giá)</th>
                        <th>Tình trạng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>02/10/2024</td>
                        <td>06/10/2024</td>
                        <td>Trần Thị B</td>
                        <td>456 Đường XYZ, Hà Nội</td>
                        <td>0907654321</td>
                        <td>Bánh mì, Bánh pizza</td>
                        <td>700,000 VND / 650,000 VND</td>
                        <td><span class="status accepted">Đã tiếp nhận</span></td>
                    </tr>
                </tbody>
            </table>

            <h2 id="done">Số đơn đã giao</h2>
            <table>
                <thead>
                    <tr>
                        <th>Ngày đặt</th>
                        <th>Ngày giao</th>
                        <th>Họ và tên</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Danh sách các sản phẩm</th>
                        <th>Thành tiền (trước / sau giảm giá)</th>
                        <th>Tình trạng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>05/10/2024</td>
                        <td>09/10/2024</td>
                        <td>Võ Văn E</td>
                        <td>654 Đường OPQ, TP. HCM</td>
                        <td>0934567890</td>
                        <td>Bánh kem, Bánh bao</td>
                        <td>800,000 VND / 750,000 VND</td>
                        <td><span class="status delivered">Đã giao</span></td>
                    </tr>
                </tbody>
            </table>

            <h2 id="exit">Số đơn đã hủy</h2>
            <table>
                <thead>
                    <tr>
                        <th>Ngày đặt</th>
                        <th>Ngày giao</th>
                        <th>Họ và tên</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Danh sách các sản phẩm</th>
                        <th>Thành tiền (trước / sau giảm giá)</th>
                        <th>Tình trạng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>06/10/2024</td>
                        <td>10/10/2024</td>
                        <td>Lê Thị F</td>
                        <td>987 Đường GHI, Nha Trang</td>
                        <td>0945678901</td>
                        <td>Bánh ngọt, Bánh socola</td>
                        <td>900,000 VND / 850,000 VND</td>
                        <td><span class="status cancelled">Đã hủy</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>
<script src="../../js/admin/overview.js"></script>

</html>