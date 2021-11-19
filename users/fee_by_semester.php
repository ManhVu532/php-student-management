<?php
    require_once("../utils/db_helper.php");
    require_once("../utils/utils.php");
    if(isset($_GET['userId']) && isset($_GET['semesterId'])){
        $userId = validate_data($_GET['userId']);
        $semesterId = validate_data($_GET['semesterId']);
        
        $sql = 'SELECT s.id AS subjectId, s.name AS subjectName, se.fee*s.numberOfCredits AS fee, s.numberOfCredits
                FROM subject_tbl AS s, subject_semester AS ss, register_subject AS rs, semester_tbl AS se
                WHERE s.id = ss.subjectId
                AND rs.subjectSemesterId = ss.id
                AND rs.userId = "' . $userId . '"
                AND ss.semesterId = "' . $semesterId . '"
                AND se.id = "' . $semesterId . '"
                ';

        $result = executeResult($sql);
        $totalFee = 0;
        $totalCredits = 0;
        $amountPaid = 0;
        $remain = 0;

        foreach($result as $row){
            $totalFee += $row['fee'];
            $totalCredits += $row['numberOfCredits'];
        }

        $sql = 'SELECT * FROM user_semester AS us
        WHERE us.userId = "'.$userId.'"
        AND us.semesterId = "'.$semesterId.'";
        ';
        $res = executeResult($sql);
        if(count($res) > 0){
            $amountPaid = $res[0]['amountPaid'];
        }

        $remain = $totalFee - $amountPaid;

        $data = array("listFee"=>$result, "totalFee" => number_format($totalFee), "totalCredits" => $totalCredits, "remain" => number_format($remain), "amountPaid" => number_format($amountPaid));
        echo json_encode(array("status" => "success", "message" => "Thiếu thông tin", "data" => $data));
    }else{
        echo json_encode(array("status" => "error", "message" => "Thiếu thông tin"));
        exit();
    }
