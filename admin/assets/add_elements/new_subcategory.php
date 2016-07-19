<?php
include "../../../Database/MySqlConnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["New_subcategory"])) {
      $error = "Error in New_subcategory";
      header("Location: ../../messages/fail/index.php?error=".$error);
      exit();
  } else {
   	$New_subcategory = test_input($_POST["New_subcategory"]);
  }

  if (empty($_POST["select_category"])){
      $error = "Error in select_category";
      header("Location: ../../messages/fail/index.php?error=".$error);
      exit();
  }else{
    $Category_id = $_POST["select_category"];
  }

	// NEW CATEGORY ENTRY
	try{ 
		$New_subcategory_query = $conn->prepare("INSERT INTO subcategories (Name_of_subcategory, Category_id) VALUES ('{$New_subcategory}', '{$Category_id}')");
		$New_subcategory_query->execute();
    $succ = "New subcategory added!";
    header("Location: ../../messages/success_msg/index.php?succ=".$succ);
    exit();
	}catch(PDOException $e){
      $error ="Error in databese.".$e->getMessage();
      header("Location: ../../messages/fail/index.php?error=".$error);
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