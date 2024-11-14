<?php
function get_current_page($totalPages)
{
    $currentPage = $_GET["page"] ?? 1;

    if ($currentPage < 1 || $currentPage > $totalPages) {
        $currentPage = 1;
    }

    return $currentPage;
}