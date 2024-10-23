<?php
function require_css($path)
{ ?>
    <style>
        <?php
        require $path;
        ?>
    </style>
    <?php
} ?>