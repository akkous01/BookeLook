<?php
session_start();
if(isset($_GET['submit'])) {
    $_SESSION["book_id"] = $_GET['book_id'];
    $_SESSION["title"] = $_GET['title'];
    $_SESSION["isbn"] = $_GET['isbn'];
    $_SESSION["writer"] = $_GET['writer'];
    $_SESSION["illustrator"] = $_GET['illustrator'];
    $_SESSION["publisher"] = $_GET['publisher'];
    $_SESSION["pages"] = $_GET['pages'];

    echo $_SESSION['book_id'] . " " . $_SESSION['title'] . " " . $_SESSION['isbn'] . " " . $_SESSION['writer'] . " " . $_SESSION['illustrator'] . " " . $_SESSION['publisher'] . " " . $_SESSION['pages'];
}else{
    echo $_GET['submit'];

}
?>

