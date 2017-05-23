<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 23.05.2017
 * Time: 18:08
 */

require_once '../service/service.php';

$a = null;
if (isset($_GET) && isset($_GET['id'])) {
    $a = multimedia_file_find($_GET['id']);
}

$a = json_encode($a);

exit($a);

?>
