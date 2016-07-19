<?php


include "../../Database/MySqlConnect.php";
  
 $book_id =$Title = $ISBN = $Writer = $Publisher = $Pages = $Persentage_of_images =  $Min_age_no_read = $Min_age_read = $For_parents = $Price = $Hard_copy = $E_book = $Audio_book = $Link = $Curriculum = $Cover = $Back_cover = $Show_to_user ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 	$book_id = $_POST["id"];

  if (empty($_POST["Title"])) {
    $error ="Error in title";
    header("Location: ../messages/fail.php?error=".$error);
    exit();
  } else {
    $Title = test_input($_POST["Title"]);
    
  }

  if (empty($_POST["ISBN"])) {
    $error ="Error in ISBN";
    header("Location: ../messages/fail.php?error=".$error);
    exit();
  } else {
    $ISBN = test_input($_POST["ISBN"]);
  }
  
  if (empty($_POST["Writer"])) {
    $error ="Error in Writer";
    header("Location: ../messages/fail.php?error=".$error);
    exit();
  } else {
    $Writer = test_input($_POST["Writer"]);
  }


  $Illustrator = test_input($_POST["Illustrator"]);
  
  if (empty($_POST["Publisher"])) {
    $error ="Error in Publisher";
    header("Location: ../messages/fail.php?error=".$error);
    exit();
  } else {
    $Publisher = test_input($_POST["Publisher"]);
  }

  if (empty($_POST["Pages"])) {
    $error ="Error in Pages";
    header("Location: ../messages/fail.php?error=".$error);
    exit();
  } else {
    $Pages = (int)test_input($_POST["Pages"]);
    if($Pages <= 0){
      $error ="Error in Pages <= 0";
      header("Location: ../messages/fail.php?error=".$error);
      exit();
    }
  }

  if (empty($_POST["Persentage_of_images"])) {
    $error ="Error in Persentage_of_images";
    header("Location: ../messages/fail.php?error=".$error);
    exit();
  } else {
    $Persentage_of_images = (int)test_input($_POST["Persentage_of_images"]);
    if($Persentage_of_images<0 or $Persentage_of_images>100){
      $error ="Error in Persentage_of_images";
      header("Location: ../messages/fail.php?error=".$error);
      exit();
    }
  }

  if (empty($_POST["Min_age_no_read"])) {
    $error ="Error in Min age for childen who cannot read";
    header("Location: ../messages/fail.php?error=".$error);
    exit();
  } else {
    $Min_age_no_read = (int)test_input($_POST["Min_age_no_read"]);
  }
  
   if (empty($_POST["Min_age_read"])) {
    $error ="Error in Min age for childen who can read";
    header("Location: ../messages/fail.php?error=".$error);
    exit();
  } else {
    $Min_age_read = (int)test_input($_POST["Min_age_read"]);
  }

    if($Min_age_read < $Min_age_no_read){
    $error ="Error in Min age for childen who cannot read > Min age for childen who can read";
    header("Location: ../messages/fail.php?error=".$error);
    exit();
  }

  if(! empty($_POST["For_parents"])){
    $For_parents = "1";
  }

  if (empty($_POST["Price"])) {
    $error ="Error in Price";
    header("Location: ../messages/fail.php?error=".$error);
    exit();
  } else {
    $Price = (double)test_input($_POST["Price"]);
    if($Price<0){
      $error ="Error in Price < 0";
      header("Location: ../messages/fail.php?error=".$error);
      exit();
    }
  }

  if(! empty($_POST["Hard_copy"])){
    $Hard_copy = "1";
  }
  
  if(! empty($_POST["E_book"])){
    $E_book = "1";
  }
  
  if(! empty($_POST["Audio_book"])){
    $Audio_book = "1";
  }

  $Link = test_input($_POST["Link"]);

  $Curriculum = test_input($_POST["Curriculum"]);


  if (empty($_FILES["Cover"]["name"])){
    $Cover = $_POST['same_cover'];  
  } else {
    $target_dir = '../../Database/Covers/'; // upload directory
    $target_file = $target_dir . basename($_FILES["Cover"]["name"]);
    $Cover = basename($_FILES["Cover"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["Cover"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $error ="Error in Cover img. File is not an image.";
        header("Location: ../messages/fail.php?error=".$error);
        $uploadOk = 0;
        exit();
    }

    if ($_FILES["Cover"]["size"] > 500000) {
      $error ="Error in Cover img. Sorry, your file is too large.";
      header("Location: ../messages/fail.php?error=".$error);
      $uploadOk = 0;
      exit();
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      $error ="Error in Cover img. Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      header("Location: ../messages/fail.php?error=".$error);
      $uploadOk = 0;
      exit();
    }

    if (move_uploaded_file($_FILES["Cover"]["tmp_name"], $target_file)) {
        // echo "The file ". basename( $_FILES["Cover"]["name"]). " has been uploaded.";
    } else {
        $error ="Error in Cover img. Sorry, there was an error uploading your file.";
        header("Location: ../messages/fail.php?error=".$error);
        $uploadOk = 0;
        exit();
    }

    if (!unlink($target_dir.$_POST["same_cover"])){
        $error ="Error in Cover img. Sorry, there was an error uploading your file.";
        header("Location: ../messages/fail.php?error=".$error);
        $uploadOk = 0;
        exit();
    }
  }

  if (empty($_FILES["Back_cover"]["name"])){
    $Back_cover = $_POST['same_back_cover'];
  } else {
  	$target_dir = '../../Database/Back_Covers/'; // upload directory
    $target_file = $target_dir . basename($_FILES["Back_cover"]["name"]);
    $Back_cover = basename($_FILES["Back_cover"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["Back_cover"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $error ="Error in Back Cover img.File is not an image.";
        header("Location: ../messages/fail.php?error=".$error);
        $uploadOk = 0;
        exit();
    }

    if ($_FILES["Back_cover"]["size"] > 500000) {
      $error ="Error in Back Cover img.Sorry, your file is too large.";
      header("Location: ../messages/fail.php?error=".$error);
      $uploadOk = 0;
      exit();
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      $error ="Error in Back Cover img.Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      header("Location: ../messages/fail.php?error=".$error);
      $uploadOk = 0;
      exit();
    }

    if (move_uploaded_file($_FILES["Back_cover"]["tmp_name"], $target_file)) {
        // echo "The file ". basename( $_FILES["Back_cover"]["name"]). " has been uploaded.";
    } else {
      $error ="Error in Back Cover img.Sorry, there was an error uploading your file.";
      header("Location: ../messages/fail.php?error=".$error);
      exit();
    }

    if (!unlink(unlink($target_dir.$_POST["same_back_cover"]))){
      $error = "Error in Back Cover img.Sorry, there was an error uploading your file.";
      header("Location: ../messages/fail.php?error=".$error);
      exit();
    }
  }

  if(! empty($_POST["Show_to_user"])){
    $Show_to_user = "1";
  }


  try{ 
    $new_book_query = $conn->prepare("UPDATE books SET ISBN='{$ISBN}', Title='{$Title}', Writer='{$Writer}', Illustrator='{$Illustrator}', Publisher = '{$Publisher}', Pages='{$Pages}', Persentage_of_images='{$Persentage_of_images}', Min_age_no_read='{$Min_age_no_read}', Min_age_read = '{$Min_age_read}',For_parents = '{$For_parents}', Cover = '{$Cover}', Back_cover = '{$Back_cover}', Link = '{$Link}', Price = '{$Price}', Hard_copy = '{$Hard_copy}', E_book = '{$E_book}', Audio_book = '{$Audio_book}', Curriculum = '{$Curriculum}', Show_to_user = '{$Show_to_user}' WHERE Book_id = '{$book_id}' ");
    $new_book_query->execute();

    $delete_book_keywords_meaning_query = $conn->prepare("DELETE FROM books_keywords_meaning WHERE Book_id='{$book_id}'");
    $delete_book_keywords_meaning_query -> execute();

    $delete_book_keywords_query = $conn->prepare("DELETE FROM books_keywords WHERE Book_id='{$book_id}'");
    $delete_book_keywords_query -> execute();

   
    // GET KEYWORDS
    $max_keyword_id_query = $conn->prepare("SELECT * FROM keywords ORDER BY Keyword_id DESC LIMIT 0, 1");
    $max_keyword_id_query->execute();
    $max_keyword_id= $max_keyword_id_query->fetchAll(PDO::FETCH_ASSOC);

    $max_keyword_id = (integer) $max_keyword_id[0]['Keyword_id'];

   
    for ($i = 1 ; $i <= $max_keyword_id ; $i++){
      if (!empty($_POST['K'.$i])){
        $books_keywords_query = $conn->prepare("INSERT INTO books_keywords (Book_id, Keyword_id) VALUES ('{$book_id}','{$i}')");
        $books_keywords_query->execute();
        if(!empty($_POST['MK'.$i])){
          $meaning = $_POST['MK'.$i];
          $meaning_books_keywords_query = $conn->prepare("INSERT INTO books_keywords_meaning (Book_id, Keyword_id, Meaning_content) VALUES ('{$book_id}','{$i}','{$meaning}')");
          $meaning_books_keywords_query->execute();
        }
      }
    }

    header("Location: ../messages/succes.php");
    exit();
  }catch(PDOException $e){
      $error ="Error with the Database.".$e->getMessage();
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
