<?php
global $api;
?>

<header>
    <a class="header-logo" href="?direct=home">SUCRÉ BAKERY</a>
    <div class="header-navigation">
        <a class="header-option" href="?direct=search">Tìm kiếm</a>
        <a class="header-option" href="?direct=product">Sản phẩm</a>
        <a class="header-option" href="?direct=login">Đăng nhập</a>
        <a class="header-cart" href="?direct=cart">
            <p>Giỏ hàng</p>
            <?php
            $total_quantity = $api->get_cart_total_quantity(1);
            if ($total_quantity > 0) { ?>
                <div class="header-cart-total"><?php echo $total_quantity; ?></div>
            <?php } ?>
        </a>
    </div>
</header>