<?php

include "../Database/MySqlConnect.php";

// CATEGORIES
$categories_query = $conn->prepare("SELECT * FROM categories ORDER BY Category_id");
$categories_query->execute();

$categories= $categories_query->fetchAll(PDO::FETCH_ASSOC);
$categories_check_box = "";

for($i = 0; $i <count($categories); $i++){
	$category_id = (integer) $categories[$i]['Category_id'];
	$category_name = (string)$categories[$i]['Name_of_category'];

	echo "<option value='{$category_id}'>{$category_name}</option>";
}

?>