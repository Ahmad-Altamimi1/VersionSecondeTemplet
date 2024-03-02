<?php
include "config.php";

if (isset($_POST['userallowIDUB'])) {

    //  echo "OK";
    $userid = $_POST['userallowIDUB'];
    $status = $_POST['userallow'];
    $username = $_POST['user_AFN'];
    $access = $_POST['access'];
    $name = $_POST['name'];

    $SQL = "UPDATE users set " . $access . " = '" . $status . "' WHERE `id` ='" . $userid . "';";
    // echo $SQL;
    mysqli_query($con, $SQL) or die(); {
        if ($status) echo "<p>تم تعين ".$username." ك".$name." بنجاح <br /></p>";
        else  echo "<p>تم الغاء تعين ".$username." ك".$name." بنجاح <br /></p>";
    }
}

if (isset($_POST['userallowIDtaskboy'])) {


    $id = $_POST['userallowIDtaskboy'];
    $task = $_POST['task'];
    $access = $_POST['userallow'];


    $SQL = "UPDATE men_tasks set allow = '" . $access . "' WHERE `id` ='" . $id . "';";
    // echo $SQL;
    mysqli_query($con, $SQL) or die(); {
        if ($access) echo "<p>تم تفعيل ".$task." <br /></p>";
        else  echo "<p>تم الغاء تفعيل ".$task." <br /></p>";
    }
}

if (isset($_POST['userupdatetask'])) {


    $task_ID = $_POST['userupdatetask'];
    $task = $_POST['task'];
    $access = $_POST['userallow'];
    $dateee = $_POST['date'];
    $userid = $_POST['userid'];

    $sql_query = "select * from tasks where DATE='" . $dateee . "' and user_id='" . $userid . "'";
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_array($result);
    $count = $row['id'];
    if ($count > 0) {
        $SQL = "UPDATE tasks set `" . $task_ID . "` = '" . $access . "' where DATE='" . $dateee . " 00:00:00' and user_id='" . $userid . "';";
        // echo $SQL;
        mysqli_query($con, $SQL) or die(); {
            if ($access) echo "<p>تم انجاز ".$task." <br /></p>";
            else  echo "<p>تم الغاء انجاز ".$task." <br /></p>";
        }
    } else {
        $SQL = "INSERT INTO tasks (`DATE`,`user_id`,`" . $task_ID . "`) VALUES ('" . $dateee . " 00:00:00','" . $userid . "','" . $access . "');";
        // echo $SQL;
        mysqli_query($con, $SQL) or die(); {
            if ($access) echo "<p>تم انجاز ".$task." <br /></p>";
            else  echo "<p>تم الغاء انجاز ".$task." <br /></p>";
        }
    }


 

}