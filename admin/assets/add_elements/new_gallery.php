<?php
include "../../../Database/MySqlConnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $gallery_photo = "";
  if (!empty($_FILES["gallery_photo"]["name"])){
    $target_dir = '../../../Database/Gallery_photos/'; // upload directory
    $target_file = $target_dir . basename($_FILES["gallery_photo"]["name"]);
    $gallery_photo = basename($_FILES["gallery_photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["gallery_photo"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $error ="Error in gallery_photo img. File is not an image.";
        header("Location: ../../messages/fail/index.php?error=".$error);
        $uploadOk = 0;
        exit();
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      $error ="Error in gallery_photo img. Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      header("Location: ../../messages/fail/index.php?error=".$error);
      $uploadOk = 0;
      exit();
    }

    if (move_uploaded_file($_FILES["gallery_photo"]["tmp_name"], $target_file)) {
        // echo "The file ". basename( $_FILES["Cover"]["name"]). " has been uploaded.";
    } else {
        $error ="Error in gallery_photo img. Sorry, there was an error uploading your file.";
        header("Location: ../../messages/fail/index.php?error=".$error);
        $uploadOk = 0;
        exit();
    }

  }

	try{ 
		$gallery_query = $conn->prepare("INSERT INTO gallery (gallery_photo) VALUES ('{$gallery_photo}')");
		$gallery_query->execute();
		
    $succ = "New gallery photo added!";
    header("Location: ../../messages/success_msg/index.php?succ=".$succ);
    exit();

	}catch(PDOException $e){
      $error ="Error in databese.".$e->getMessage();
      header("Location: ../../messages/fail/index.php?error=".$error);
      exit();
	}
}