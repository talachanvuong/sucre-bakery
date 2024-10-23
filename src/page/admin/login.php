<?php
global $api;

if (isset($_POST["ad_name"]) && isset($_POST["ad_password"])) {
    $ad_name = $_POST["ad_name"];
    $ad_password = $_POST["ad_password"];

    $result = $api->login_admin($ad_name, $ad_password);
    toast($result['message']);
    if ($result["success"]) {
        header("location:?direct=home");
        exit();
    }
}
?>

<div class="container">
    <div>
        <h2>Admin Login</h2>
        <form method="post">
            <label for="login-email">Name</label>
            <input type="text" id="login-name" name="ad_name" placeholder="Enter your name" required>

            <label for="login-password">Password</label>
            <input type="password" id="login-password" name="ad_password" placeholder="Enter your password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</div>