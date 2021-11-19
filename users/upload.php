<?php
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);

    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 500000) { // 500000kb
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../uploads/' . $fileNameNew;
                $fileHostDes = 'uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                echo json_encode(array('status' => 'success', 'message' => 'Upload thành công', 'data' => $fileHostDes));
                exit();
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'File của bạn quá lớn'));
                exit();
            }
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Có lỗi xảy ra'));
            exit();
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Loại file này không được hỗ trợ'));
        exit();
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Bạn phải chọn file trước'));
    exit();
}
