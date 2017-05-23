<?php
/**
 * Created by PhpStorm.
 * User: vcincean
 * Date: 5/15/17
 * Time: 11:16 AM
 */
include_once 'head.php';
?>

<body>
<div id="content">
    <label>Category: </label>
    <input id="filterByCategoryInput" type="text" />
    <input id="filterByCategorySubmit" type="submit" />

    <br /><br />
    <table id="resultTable" border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>category</th>
                <th>format_type</th>
                <th>genre</th>
                <th>path</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
</body>
