<?php
/**
 * Created by PhpStorm.
 * User: vcincean
 * Date: 5/15/17
 * Time: 10:26 AM
 */

require_once ('config.php');

function db_connect() {
    global $db_host;
    global $db_username;
    global $db_password;
    global $db_name;

    $connection = mysqli_connect(
        $db_host,
        $db_username,
        $db_password,
        $db_name
    );

    return $connection;
}
?>
