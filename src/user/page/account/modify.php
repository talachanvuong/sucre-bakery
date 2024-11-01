<?php
global $api;

toast_session();

if (isset($_POST['name']) || isset($_POST['address']) || isset($_POST['phone'])) {
    if (isset($_SESSION['us_info'])) {
        $us_info = $_SESSION['us_info'];
        $us_id = $us_info['us_id'];

        $user = [
            'us_name' => $_POST['name'] ?? null,
            'us_number_phone' => $_POST['phone'] ?? null,
            'us_address' => $_POST['address'] ?? null,
        ];

        $result = $api->edit_user($us_id, $user);

        if ($result['success']) {
            $_SESSION['us_info'] = array_merge($_SESSION['us_info'], array_filter($user));
            set_toast_message($result["message"]);
        } else {
            toast($result["message"]);
        }
    } 
}
?>

<div class="layout-container">
    <div class="modify-container">
        <h2>Sửa thông tin</h2>
        <form  method="post"> 

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
</div>


