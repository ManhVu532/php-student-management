<?php
require_once("../utils/db_helper.php");
if (!empty($_GET)) {
    if ($_GET['q']) {
        $q = $_GET['q'];
        if ($q != '') {
            $sql = "SELECT * FROM user_tbl WHERE username LIKE '%$q%' OR email LIKE '%$q%' OR age LIKE '%$q%'";
            $result = executeResult($sql);
            if (count($result) > 0) {
                $data = array('status' => 'success', 'data' => $result, 'message' => 'Found');
                echo json_encode($data);
            } else {
                $data = array('status' => 'success', 'data' => $result, 'message' => 'No result found');
                echo json_encode($data);
            }
        } else {
            $sql = "SELECT * FROM user_tbl";
            $result = executeResult($sql);
            $data = array('status' => 'success', 'data' => $result, 'message' => 'Found');
            echo json_encode($data);
        }
    }
} else {
    $data = array('status' => 'error', 'data' => '', 'message' => 'No key search found');
    echo json_encode($data);
}
