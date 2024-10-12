<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../../css/user/modify_account.css">
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
    <div class="modify-container">
        <h2>Sửa thông tin</h2>
        <form action="modify.php" method="post">

            <div class="input-group">
                <label for="name">Họ và tên:</label>
                <input type="name" id="name" name="name" placeholder="Nhập họ và tên cảu bạn" required>
            </div>
            <div class="input-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" id="address" name="address" placeholder="Nhập địa chỉ của bạn" required>
            </div>
            <div class="input-group">
                <label for="phone">Số điện thoại:</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" maxlength="10" placeholder="Nhập số điện thoại của bạn" required>
            </div>
            <button type="submit" class="btn">Cập nhật</button>
        </form>
    </div>
    <script src="../../js/user/form.js"></script>
</body>
</html>