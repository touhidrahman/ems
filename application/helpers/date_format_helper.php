<?php
function _nice_dt($d) {
    $temp = date_create_from_format('Y-m-j', $d);
    return date_format($temp, 'd M Y');
}

function _nice_dt_full($d) {
    $temp = date_create_from_format('Y-m-j H:i:s', $d);
    return date_format($temp, 'd M Y, H:i');
}
?>