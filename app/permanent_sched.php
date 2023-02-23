<?php
require '../config/config.php';
require GLOBAL_FUNC;
require CONNECT_PATH;
require CL_SESSION_PATH;


// validations
$result_msg = [];

$set_sched = isset($_POST['data_a']) ? $_POST['data_a'] : '0';
$result_msg['msg'] = '';

if ($set_sched == 0) {
    $result_msg['msg'] = 'No data found';
    $result_msg['result'] = "error";
    echo json_encode($result_msg);
    exit();
}


if (isset($set_sched)) {

    $sql = mysqli_query($db_connect, "SELECT * FROM permanent_sched_summary WHERE id = '" . $set_sched . "'");
    while ($row = mysqli_fetch_assoc($sql)) {

        $session_class->setValue('session_sched', $row['id']);
        $session_class->setValue('session_title', $row['title']);

        $result_msg['msg'] = 'Schedule has been change';
        $result_msg['result'] = "success";
        echo json_encode($result_msg);
        exit();
    }
}
