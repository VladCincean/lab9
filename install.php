<?php
/**
 * Created by PhpStorm.
 * User: vcincean
 * Date: 5/15/17
 * Time: 10:17 AM
 */

require_once ('config.php');

if (isset($_POST['submit']) && $_POST['submit'] == 'Install') {
    if (!$connection = mysqli_connect(
        $db_host,
        $db_username,
        $db_password
    )) {
        echo 'Failed to connect to the database. Please check your configuration.' . PHP_EOL;
        die(mysqli_error($connection));
    }

    $sql = file_get_contents('install.sql');
    $queries = explode(';', $sql);

    foreach($queries as $key => $value) {
        mysqli_query($connection, $value . ';');
    }

    mysqli_close($connection);
    header('Location: index.php');
}
?>
<head>
    <title>Installation page</title>
</head>
<body>
<h3>Installation steps:</h3>
<ol>
    <li>Install MySQL</li>
    <li>Edit <i>config.php</i> accordingly</li>
    <li>Click the <i>install</i> button below</li>
</ol>
<form name="install.php" action="install.php" method="POST">
    <input type="submit" name="submit" value="Install" />
</form>
</body>
