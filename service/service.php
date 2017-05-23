<?php
/**
 * Created by PhpStorm.
 * User: vcincean
 * Date: 5/15/17
 * Time: 10:24 AM
 */

require_once('../db_connect.php');

/**
 * Saves a new multimedia_file into the database
 * @param $title (string)
 * @param $category (string)
 * @param $format_type (string)
 * @param $genre (string)
 * @param $path (string)
 * @return TRUE,    if operation succeeds
 * @return FALSE,   if operation fails
 * @return null,    if connection error
 */
function multimedia_file_create($title, $category, $format_type, $genre, $path) {
    $connection = db_connect();
    if (!$connection) {
        return null;
    }

    $title = mysqli_real_escape_string($connection, $title);
    $category = mysqli_real_escape_string($connection, $category);
    $format_type = mysqli_real_escape_string($connection, $format_type);
    $genre = mysqli_real_escape_string($connection, $genre);
    $path = mysqli_real_escape_string($connection, $path);

    $query = "INSERT INTO multimedia_files (title, category, format_type, genre, path)" .
        "VALUES ('$title', '$category', '$format_type', '$genre', '$path');";
    $result = mysqli_query($connection, $query);
    mysqli_close($connection);
    return $result;
}

/**
 * Finds the multimedia_file with the given id from the database
 * @param $id (string)
 * @return array (keys: id, title, category, format_type, genre, path): the result row
 * @return array (empty), if not found
 * @return null, if connection error
 */
function multimedia_file_find($id) {
    $connection = db_connect();
    if (!$connection) {
        return null;
    }

    $id = mysqli_real_escape_string($connection, $id);
    $query = "SELECT * FROM multimedia_files WHERE id = '$id';";
    $result = mysqli_query($connection, $query);
    mysqli_close($connection);
    if (mysqli_num_rows($result) == 0) {
        return array();
    }
    return mysqli_fetch_assoc($result);
}

/**
 * Reads all multimedia_files from the database
 * @return array of arrays (keys: id, title, category, format_type, genre, path): each subarray = a result row
 * @return array (empty), if no multimedia file found
 * @return null, if connection error
 */
function multimedia_file_read_all() {
    $connection = db_connect();
    if (!$connection) {
        return null;
    }

    $query = "SELECT * FROM multimedia_files;";
    $result = mysqli_query($connection, $query);
    mysqli_close($connection);
    if (mysqli_num_rows($result) == 0) {
        return array();
    } else {
        $array = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
        return $array;
    }
}

/**
 * Filters the multimedia_files from database based on a given category
 * @param $category (string)
 * @return array of arrays (keys: id, title, category, format_type, genre, path): each subarray = a result row
 * @return array (empty), if no multimedia file found
 * @return null, if connection error
 */
function multimedia_file_filter_by_category($category) {
    $connection = db_connect();
    if (!$connection) {
        return null;
    }

    $query = "SELECT * FROM multimedia_files WHERE category = '$category';";
    $result = mysqli_query($connection, $query);
    mysqli_close($connection);
    if (mysqli_num_rows($result) == 0) {
        return array();
    } else {
        $array = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
        return $array;
    }
}

/**
 * Updates a multimedia_file
 * @param $id (string)
 * @param $title (string)
 * @param $category (string)
 * @param $format_type (string)
 * @param $genre (string)
 * @param $path (string)
 * @return TRUE,    if operation succeeds
 * @return FALSE,   if no row is affected
 * @return null,    if connection error
 */
function multimedia_file_update($id, $title, $category, $format_type, $genre, $path) {
    $connection = db_connect();
    if (!$connection) {
        return null;
    }

    $id = mysqli_real_escape_string($connection, $id);
    $title = mysqli_real_escape_string($connection, $title);
    $category = mysqli_real_escape_string($connection, $category);
    $format_type = mysqli_real_escape_string($connection, $format_type);
    $genre = mysqli_real_escape_string($connection, $genre);
    $path = mysqli_real_escape_string($connection, $path);

    $query = "UPDATE multimedia_files SET title = '$title', category = '$category', " .
        "format_type = '$format_type', genre = '$genre', path = '$path' WHERE id = '$id';";
    $result = mysqli_query($connection, $query);
    $affected_rows = mysqli_affected_rows($connection);
    mysqli_close($connection);
    if ($affected_rows == 0) {
        return FALSE;
    }
    return TRUE;
}

/**
 * Deletes a multimedia_file given its title
 * @param $id (string)
 * @return TRUE,    if operation succeeds
 * @return FALSE,   if operation fails (no row deleted)
 * @return null,    if connection error
 */
function multimedia_file_delete($id) {
    $connection = db_connect();
    if (!$connection) {
        return null;
    }

    $id = mysqli_real_escape_string($connection, $id);
    $query = "DELETE FROM multimedia_files WHERE id = '$id';";
    $result = mysqli_query($connection, $query);
    $affected_rows = mysqli_affected_rows($connection);
    mysqli_close($connection);
    if ($affected_rows == 0) {
        return FALSE;
    }
    return TRUE;
}

?>