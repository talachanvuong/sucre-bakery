<div class="layout-container">
    <div class="register-container">
        <h2>Đăng ký</h2>
        <form method="post">
            <div class="input-group">
                <label for="username">Tên:</label>
                <input type="text" id="username" name="username" placeholder="Nhập tên" required>
            </div>
            <div class="input-group">
                <label for="phone">Số điện thoại:</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" maxlength="10"
                    placeholder="Nhập số điện thoại của bạn" required>
            </div>
            <div class="input-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>
            <input type="submit" class="btn" value="Đăng ký">
            <div class="login">
                <p>Đã có tài khoản? <a href="?direct=login">Đăng nhập ngay</a></p>
            </div>
        </form>
    </div>
</div>