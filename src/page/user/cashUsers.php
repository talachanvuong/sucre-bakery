<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="../../css/user/cashUser.css">
</head>
<body>
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
             <textarea id="note" rows="4" placeholer="nhập ghi chú của bạn..."></textarea>
            </div>

        </div class="cart-total">
              </h3>Thành tiền:<span>Tổng cộng VND</span></h3>
        </div>

        <button class="checkout-btn">thanh toán</button>
    </div>
</body>