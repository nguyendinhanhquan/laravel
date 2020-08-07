<?php
include '../../functions/functions.php';

// this is logout page when user click button logout in system page
session_start();
$con = mysqli_connect("localhost", "root", "", "company");

function getDatetimeNow() {
    $tz_object = new DateTimeZone('Asia/Ho_Chi_Minh');
    //date_default_timezone_set('Brazil/East');

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('Y\-m\-d\ h:i:s');
}


$user_id = $_SESSION['user_id'];
$login_time =  $_SESSION['login_time'];
$logout_time = getDatetimeNow();
$ip = $_SESSION['ip'];



//Thêm thông tin vào bảng user_login_tbl
$sql="insert into user_login_tbl(User_ID, Login_Time, Logout_Time, IP_Login) values('$user_id','$login_time', '$logout_time', '$ip');";
mysqli_query($con,$sql);


$_SESSION = NULL;
$_SESSION = [];
session_unset();
session_destroy();
header("location:login.php");
?>