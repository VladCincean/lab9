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
    <h4>Filter by category</h4>
    <label>Category: </label>
    <input id="filterByCategoryInput" type="text" placeholder="category" />
    <input id="filterByCategorySubmit" type="submit" value="Filter" />
    <br />

    <h4>Save/Update</h4>
    <label>Id: </label><br />
    <input id="sId" type="text" placeholder="id" readonly /><br />
    <label>Title: </label><br />
    <input id="sTitle" type="text" placeholder="title" /><br />
    <label>Category: </label><br />
    <input id="sCategory" type="text" placeholder="category" /><br />
    <label>Format type: </label><br />
    <input id="sFormatType" type="text" placeholder="format type" /><br />
    <label>Genre: </label><br />
    <input id="sGenre" type="text" placeholder="genre" /><br />
    <label>Path: </label><br />
    <input id="sPath" type="text" placeholder="path" /><br />
    <br />
    <input id="saveButton" type="submit" value="Save" />
    <span> </span>
    <input id="updateButton" type="submit" value="Update" />

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
