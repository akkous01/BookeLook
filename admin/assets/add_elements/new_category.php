<?php
include "../../Database/MySqlConnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["New_category"])) {
    	header("Location: ../index.php");
    	exit();
  	} else {
    	$New_category = test_input($_POST["New_category"]);
  	}

	// NEW CATEGORY ENTRY
	try{ 
		$New_category_query = $conn->prepare("INSERT INTO categories (Name_of_category) VALUES ('{$New_category}')");
		$New_category_query->execute();
		$_SESSION["new_book_insert_succ"]= 1;
		header("Location: ../index.php");
	}catch(PDOException $e){
    	handle_sql_errors($selectQuery, $e->getMessage());
	}
}

function test_input($data) {
	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;
}

function handle_sql_errors($query, $error_message){
    echo '<pre>';
    echo $query;
    echo '</pre>';
    echo $error_message;
    die;
}

?>