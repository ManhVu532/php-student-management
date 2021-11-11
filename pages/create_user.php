<?php
    require_once("../utils/db_helper.php");

        if (!empty($_GET)) {
            $username = $age = $email = '';
            if (isset($_GET["username"])) {
                $username = $_GET["username"];
            }
            if (isset($_GET["age"])) {
                $age = $_GET["age"];
            }
            if (isset($_GET["email"])) {
                $email = $_GET["email"];
            }

            if (isset($_GET["password"])) {
                $password = $_GET["password"];
            }

            // Check user already exists
            $query = "SELECT * FROM user_tbl WHERE username = '" . $username . "' OR email='" . $email . "'";
            $resultset = executeResult($query);
            if (count($resultset) > 0) {
                echo json_encode(array("status" => "error", "message" => "User or Email already exists"));
                die();
            }
            $query = "INSERT INTO user_tbl(username, age, email, password) VALUES('$username', '$age', '$email', '$password')";
            executeQuery($query);
            echo json_encode(array("status" => "success", "message" => "User created successfully"));
        }
