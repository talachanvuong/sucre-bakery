<div class="modify-container">
    <h2>Sửa thông tin</h2>
    <form action="modify.php" method="post">

        <div class="input-group">
            <label for="name">Họ và tên:</label>
            <input type="text" id="name" name="name" placeholder="Nhập tên" >
        </div>
        <div class="input-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" id="address" name="address" placeholder="Nhập địa chỉ" >
        </div>
        <div class="input-group">
            <label for="phone">Số điện thoại:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" maxlength="10" placeholder="Nhập số điện thoại" >
        </div>
        <input type="submit" class="btn" value="Cập nhật">
    </form>
</div>
