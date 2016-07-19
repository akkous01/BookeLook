<?php
include "../../Database/MySqlConnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["blog_content"])) {
      $error = "Error in blog content";
      header("Location: ../messages/fail.php?error=".$error);
      exit();
  	} else {
    	$blog_content = test_input($_POST["blog_content"]);
  }

  if (empty($_POST["blog_title"])) {
      $error = "Error in blog title";
      header("Location: ../messages/fail.php?error=".$error);
      exit();
  } else {
    $blog_title = test_input($_POST["blog_title"]);
  }

  $blog_photo = "";
  if (!empty($_FILES["blog_photo"]["name"])){
    $target_dir = '../../Database/Blog_photos/'; // upload directory
    $target_file = $target_dir . basename($_FILES["blog_photo"]["name"]);
    $blog_photo = basename($_FILES["blog_photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["blog_photo"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $error ="Error in blog_photo img. File is not an image.";
        header("Location: ../messages/fail.php?error=".$error);
        $uploadOk = 0;
        exit();
    }

    if ($_FILES["blog_photo"]["size"] > 500000) {
      $error ="Error in blog_photo img. Sorry, your file is too large.";
      header("Location: ../messages/fail.php?error=".$error);
      $uploadOk = 0;
      exit();
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      $error ="Error in blog_photo img. Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      header("Location: ../messages/fail.php?error=".$error);
      $uploadOk = 0;
      exit();
    }

    if (move_uploaded_file($_FILES["blog_photo"]["tmp_name"], $target_file)) {
        // echo "The file ". basename( $_FILES["Cover"]["name"]). " has been uploaded.";
    } else {
        $error ="Error in blog_photo img. Sorry, there was an error uploading your file.";
        header("Location: ../messages/fail.php?error=".$error);
        $uploadOk = 0;
        exit();
    }

  }

	try{ 
		$blog_content_query = $conn->prepare("INSERT INTO blog (blog_title, blog_content, blog_date, blog_photo) VALUES ('{$blog_title}','{$blog_content}', now(), '{$blog_photo}')");
		$blog_content_query->execute();
		
    $succ = "New blog article added!";
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
