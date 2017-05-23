<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 23.05.2017
 * Time: 14:29
 */
require_once '../service/service.php';

$a = null;
if (isset($_GET) && isset($_GET['category'])) {
    if ($_GET['category'] == '') {
        $a = multimedia_file_read_all();
    } else {
        $a = multimedia_file_filter_by_category($_GET['category']);
    }
} else {
    $a = multimedia_file_read_all();
}

$a = json_encode($a);

exit($a)

?>
