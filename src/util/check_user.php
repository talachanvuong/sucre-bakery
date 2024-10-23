<?php
if (!isset($_SESSION["us_info"])) { ?>
    <form method="get" onload="this.form.submit()">
        <input type="hidden" name="direct" value="login">
    </form>
<?php } ?>