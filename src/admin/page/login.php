<?php
global $api;

toast_session();

if (isset($_POST["ad_name"]) && isset($_POST["ad_password"])) {
    $ad_name = $_POST["ad_name"];
    $ad_password = $_POST["ad_password"];

    $result = $api->login_admin($ad_name, $ad_password);

    if ($result["success"]) {
        set_toast_message($result["message"]);
        header("location:?direct=home");
        exit();
    } else {
        toast($result["message"]);
    }
}
?>

<div class="layout-container">
    <div class="panel">
        <p class="title">Admin Login</p>

        <form class="form" method="post">
            <label class="label">Name</label>
            <input class="input" type="text" name="ad_name" placeholder="Enter your name" required>

            <label class="label">Password</label>
            <input class="input" type="password" name="ad_password" placeholder="Enter your password" required>

            <input class="button" type="submit" value="Login">
        </form>
    </div>
</div>