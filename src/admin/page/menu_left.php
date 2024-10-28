<?php
global $api;
?>

<div class="menu-left">
    <div class="tab">
        <p class="title">Nhân viên</p>

        <?php
        $ad_info = $api->get_admin_info();
        if (isset($ad_info)) { ?>
            <a class="children" href="?direct=home"><?php echo $ad_info["ad_name"]; ?></a>
        <?php } ?>

        <a class="children" href="?direct=logout">Đăng xuất</a>
    </div>

    <div class="tab">
        <p class="title">Tổng quan</p>
        <a class="children">Tất cả</a>
        <a class="children">Đơn chờ tiếp nhận</a>
        <a class="children">Đơn đang làm</a>
        <a class="children">Đơn đã giao</a>
        <a class="children">Đơn đã huỷ</a>
    </div>

    <div class="tab">
        <p class="title">Sản phẩm</p>
        <a class="children" href="?direct=product">Danh sách sản phẩm</a>
        <a class="children" href="?direct=add_product">Thêm sản phẩm</a>
    </div>
</div>