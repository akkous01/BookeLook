<?php
include "../../../Database/MySqlConnect.php";


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo $_GET['blog_id'];
    $file = "../../../Database/Blog_photos/".$_GET['photo'];
    if (!unlink($file))
    {
        echo ("Error deleting $file");
    }
    else
    {
        echo ("Deleted $file");
    }
    $blogts_query = $conn->prepare("DELETE FROM `blog` WHERE `blog`.`blog_id` ='" . $_GET['blog_id'] . "'");
    $blogts_query->execute();
    $succ = "blog deleted!";
    header("Location: ../../messages/success_msg/index.php?succ=".$succ);
    exit();
}else{
    $error ="Error in databese.".$e->getMessage();
    header("Location: ../../messages/fail/index.php?error=".$error);
    exit();
}
?>