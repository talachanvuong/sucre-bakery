<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="cake.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../../css/user/payout.css">
</head>

<body>
    <header>
        <a href="#" class="logo">sucré bakery</a>
        <nav class="hover">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Bakery</a></li>
                <li><a href="#">Register</a></li>
                <li><a href="#">Log in</a></li>
                <li><a href="#">Shopping Cart</a></li>
            </ul>
        </nav>
        <button id="menu-dropdown" class="menu-dropdown">&#8801</button>
    </header>



    <div class="container">
        <h2>Thông Tin Thanh Toán</h2>
        <form action="submit_payment.php" method="POST">
            <!-- Thông tin giao hàng -->
            <label class="radio-group">
                <input type="radio" name="shipping_info" value="default" checked> Sử dụng thông tin mặc định
            </label>
            <label class="radio-group">
                <input type="radio" name="shipping_info" value="new"> Điền thông tin mới
            </label>

            <label for="full-name">Họ và tên:</label>
            <input type="text" id="full-name" name="full_name" required placeholder="Bắt buộc">

            <label for="address">Địa chỉ:</label>
            <input type="text" id="address" name="address" required placeholder="Bắt buộc">

            <label for="phone">Số điện thoại:</label>
            <input type="tel" id="phone" name="phone" required placeholder="Bắt buộc">

            <label for="delivery-date">Chọn ngày giao:</label>
            <input type="date" id="delivery-date" name="delivery_date" required>

            <!-- tip fỏ produce -->
            <div class="tip-section">
                <label for="tip">Tip (VNĐ):</label>
                <input type="text" id="tip" name="tip" placeholder="Không bắt buộc">
            </div>

            <!-- Discount -->
            <div class="discount-section">
                <label for="discount">Chọn mức giảm giá:</label>
                <select id="discount" name="discount">
                    <option value="0">Không áp dụng giảm giá</option>
                    <option value="10">10%</option>
                    <option value="20">20%</option>
                </select>
            </div>

            <!-- List of produce -->
            <h3>Danh sách sản phẩm</h3>
            <div class="product-list">
                <table>
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- Thành tiền -->
            <div class="total-section">
                <strong>Tổng cộng:</strong>
                <strong>Tiền ship:</strong>
                <strong>Giảm giá: </strong>
                <strong>Tổng thanh toán: </strong>
            </div>

            <!-- Xác nhận thanh toán -->
            <button type="submit" class="submit-btn">Xác nhận thanh toán</button>
        </form>
    </div>
    <script src="../../js/user/form.js"></script>
</body>

</html>