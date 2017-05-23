<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 23.05.2017
 * Time: 17:38
 */

require_once '../service/service.php';

$a = null;

if (isset($_GET) &&
    isset($_GET['title']) &&
    isset($_GET['category']) &&
    isset($_GET['format_type']) &&
    isset($_GET['genre']) &&
    isset($_GET['path']))
{
    $a = multimedia_file_create(
        $_GET['title'],
        $_GET['category'],
        $_GET['format_type'],
        $_GET['genre'],
        $_GET['path']
    );
}

$a = json_encode($a);

exit($a);

?>
