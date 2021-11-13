<?php
require_once("../../utils/db_helper.php");
    if(isset($_GET['major'])){
        $major = $_GET['major'];
        if(empty($major)){
            echo JSON_encode(array("status"=>"error","message"=>"Từ khóa không hợp lệ", "data" => 0));
            exit();
        }
        if($major =='other'){
            $sql = "SELECT COUNT(*) AS `count` FROM user_tbl WHERE id NOT LIKE '%DCCN%' AND id NOT LIKE '%DCPT%' AND id NOT LIKE '%DCDT%' AND id NOT LIKE '%DCVT%' AND id NOT LIKE '%DCMR%' AND id NOT LIKE '%DCKT%' AND id NOT LIKE '%DCAT%'";
            $result = executeResult($sql);
            if(count($result) > 0){
                echo JSON_encode(array("status"=>"success","message"=>"Lấy dữ liệu thành công", "data" => $result[0]['count']));
            }else{
                echo JSON_encode(array("status"=>"error","message"=>"Không có dữ liệu", "data" => 0));
            }
        }else{
            $sql = "SELECT COUNT(*) AS `count` FROM user_tbl WHERE id LIKE '%DC".$major."%'";
            $result = executeResult($sql);
            if(count($result) > 0){
                echo JSON_encode(array("status"=>"success","message"=>"Lấy dữ liệu thành công", "data" => $result[0]['count']));
            }else{
                echo JSON_encode(array("status"=>"error","message"=>"Không có dữ liệu", "data" => 0));
            }
        }
    }
