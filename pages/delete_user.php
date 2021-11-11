<?php
    require_once("../utils/db_helper.php");

    if(isset($_POST['id'])) {
        $user_id = $_POST['id'];
        $query = "DELETE FROM user_tbl WHERE id=".$user_id.";";

        executeQuery($query);

        echo json_encode(array("status" => "success", "message" => "User deleted successfully"));
    }else{
        echo json_encode(array("status" => "error", "message" => "User not found"));
    }
