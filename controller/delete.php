<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 23.05.2017
 * Time: 16:50
 */

require_once '../service/service.php';

$a = null;
if (isset($_GET) && isset($_GET['id'])) {
    $a = multimedia_file_delete($_GET['id']);
} else {
    $a = false;
}

$a = json_encode($a);

exit($a);

?>
