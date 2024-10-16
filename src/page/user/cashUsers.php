<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="../../css/user/cashUser.css">
</head>
<body>
<header>
        <a href="#" class="logo">sucré bakery</a>
        <nav class="navi">
            <ul id="menu-items">
                <li><a href="#">Trang Chủ</a></li>
                <li><a href="#">Sản Phẩm</a></li>
                <li><a href="#">Đăng Nhập</a></li>
                <li><a href="#">Giỏ Hàng</a></li>
            </ul>
        </nav>
        <button id="menu-dropdown" class="menu-dropdown">&#8801</button>
    </header>
    <div class="cart-container">
        <h1>Giỏ hàng</h1>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng cộng</th>
                    <th>Xoá</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Bánh kem dâu và vani</td>
                    <td>595.000 VND</td>
                    <td><input type="number" value="1"></td>
                    <td>595.000 VND</td>
                    <td><button class="delete-btn">Xoá</button></td>
                </tr>
              
                </tr>
            </tbody>
        </table>
        
        <div class="cart note">
            <label for="note">Ghi chú:</label>
            <textarea id="note" rows="2" placeholer="nhập ghi chú của bạn..."></textarea>
        </div>
        
        <div class="cart-total">
            </h2>Thành tiền:<span>Tổng cộng VND</span></h2>
        </div>
    </div>
    <button class="checkout-btn">thanh toán</button>

</body>