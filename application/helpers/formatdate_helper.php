<?php 
if (!function_exists('formatDate')) {
    function formatDate($date) {
        return (new DateTime($date))->format('d-m-Y');
    }
}

?>
