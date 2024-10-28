<?php
toast_session();
?>

<div class="container">
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