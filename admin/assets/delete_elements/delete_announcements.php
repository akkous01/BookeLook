<?php
include "../../../Database/MySqlConnect.php";


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo $_GET['announcement_id'];

    $announcements_query = $conn->prepare("DELETE FROM `announcements` WHERE `announcements`.`announcement_id` ='" . $_GET['announcement_id'] . "'");
    $announcements_query->execute();
    $succ = "Announcement deleted!";
    header("Location: ../../messages/success_msg/index.php?succ=".$succ);
    exit();
}else{
    $error ="Error in databese.".$e->getMessage();
    header("Location: ../../messages/fail/index.php?error=".$error);
    exit();
}
?>