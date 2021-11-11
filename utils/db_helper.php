<?php
require_once("config.php");

date_default_timezone_set('Asia/Ho_Chi_Minh');

/**
 * @param $query
 * use for insert, update, delete
 * @return result
 */
function executeQuery($query)
{
    //create connection to database
    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    // query execution
    mysqli_query($conn, $query);

    // close connection
    mysqli_close($conn);
}

/**
 * @param $query
 * use for select
 * @return array of result
 */
function executeResult($query)
{
    //create connection to database
    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    //query execution
    $resultset = mysqli_query($conn, $query);
    $list = [];
    while ($row = mysqli_fetch_array($resultset, MYSQLI_ASSOC)) {
        $list[] = $row;
    }

    // close connection
    mysqli_close($conn);

    return $list;
}
