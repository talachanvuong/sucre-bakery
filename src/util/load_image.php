<?php
function load_image($blob)
{
    echo "data:image;base64," . base64_encode($blob);
}