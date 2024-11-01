<?php
function authorize_user()
{
    if (!isset($_SESSION["us_info"])) {
        set_toast_message("Bạn chưa đăng nhập!");
        header("location:?direct=login");
        exit();
    }
}

function authorize_admin()
{
    if (!isset($_SESSION["ad_info"])) {
        set_toast_message("Bạn chưa đăng nhập!");
        header("location:?direct=login");
        exit();
    }
}

function block_login_user()
{
    if (isset($_SESSION["us_info"])) {
        set_toast_message("Bạn đã đăng nhập!");
        header("location:?direct=home");
        exit();
    }
}

function block_login_admin()
{
    if (isset($_SESSION["ad_info"])) {
        set_toast_message("Bạn đã đăng nhập!");
        header("location:?direct=home");
        exit();
    }
}