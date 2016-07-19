<?php
include "../../Database/MySqlConnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["New_keyword"])) {
      $error = "Error in New_keyword";
      header("Location: ../messages/fail.php?error=".$error);
      exit();
  } else {
   	$New_keyword = test_input($_POST["New_keyword"]);
  }

  if (empty($_POST["select_subcategory"])){
      $error = "Error in select_subcategory";
      header("Location: ../messages/fail.php?error=".$error);
      exit();
  }else{
    $Sucategory_id = $_POST["select_subcategory"];
  }

	// NEW CATEGORY ENTRY
	try{ 
		$New_keyword_query = $conn->prepare("INSERT INTO keywords (Name_of_keyword, Subcategory_id) VALUES ('{$New_keyword}', '{$Sucategory_id}')");
		$New_keyword_query->execute();
		
    $succ = "New keyword added!";
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