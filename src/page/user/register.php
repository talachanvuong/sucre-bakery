<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../../css/user/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
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
    <div class="register-container">
        <h2>Đăng ký tài khoản</h2>
        <form action="register.php" method="post">

            <div class="input-group">
                <label for="username">Tên:</label>
                <input type="text" id="username" name="username" placeholder="Nhập tên" required>
            </div>
            <div class="input-group">
                <label for="phone">Số điện thoại:</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" maxlength="10" placeholder="Nhập số điện thoại của bạn" required>
            </div>
            <div class="input-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>
            <button type="submit" class="btn">Đăng ký</button>
            <div class="login-link">
                <p>Đã có tài khoản? <a href="login.php">Đăng nhập ngay</a></p>
            </div>
        </form>
    </div>
    <script src="../../js/user/form.js"></script>
</body>

</html>