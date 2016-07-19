<?php
include "../../Database/MySqlConnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["announcement_content"])) {
    $error = "Error in announcement content";
    header("Location: ../messages/fail.php?error=".$error);
    exit();
  } else {
    $announcement_content = test_input($_POST["announcement_content"]);
  }

  $announcement_photo="";
  if(empty($_FILES["announcement_photo"]["name"])){

  }else{
    $target_dir = '../../Database/Announcements_photos/'; // upload directory
    $target_file = $target_dir . basename($_FILES["announcement_photo"]["name"]);
    $announcement_photo = basename($_FILES["announcement_photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["announcement_photo"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $error ="Error in announcement_photo img.File is not an image.";
        header("Location: ../messages/fail.php?error=".$error);
        $uploadOk = 0;
        exit();
    }

    if ($_FILES["announcement_photo"]["size"] > 500000) {
      $error ="Error in announcement_photo img.Sorry, your file is too large.";
      header("Location: ../messages/fail.php?error=".$error);
      $uploadOk = 0;
      exit();
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      $error ="Error in announcement_photo img.Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      header("Location: ../messages/fail.php?error=".$error);
      $uploadOk = 0;
      exit();
    }

    if (move_uploaded_file($_FILES["announcement_photo"]["tmp_name"], $target_file)) {
        // echo "The file ". basename( $_FILES["Back_cover"]["name"]). " has been uploaded.";
    } else {
      $error ="Error in announcement_photo img.Sorry, there was an error uploading your file.";
      header("Location: ../messages/fail.php?error=".$error);
      exit();

    }
  }

	try{ 
		$announcement_content_query = $conn->prepare("INSERT INTO announcements (announcement_content, announcement_date, announcement_photo) VALUES ('{$announcement_content}', now(), '{$announcement_photo}')");
		$announcement_content_query->execute();
    $succ = "New announcement added!";
    header("Location: ../messages/success2.php?succ=".$succ);
    exit();
	}catch(PDOException $e){
      $error ="Error in databese.".$e->getMessage();
      header("Location: ../messages/fail.php?error=".$error);
      exit();

	}
}

function test_input($data) {
	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;
}


?>
 
