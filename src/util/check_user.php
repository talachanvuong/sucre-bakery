<?php
function authorize()
{
    if (!isset($_SESSION["us_info"])) {
        header("location:?direct=login");
        exit();
    }
}

function block_login()
{
    if (isset($_SESSION["us_info"])) {
        header("location:?direct=home");
        exit();
    }
}