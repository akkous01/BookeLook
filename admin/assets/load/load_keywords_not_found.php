<?php 

//include "../Database/MySqlConnect.php";

// CATEGORIES
$keywords_not_found_query = $conn->prepare("SELECT * FROM not_found_keywords");
$keywords_not_found_query->execute();

$keywords_not_found= $keywords_not_found_query->fetchAll(PDO::FETCH_ASSOC);

$not_found = "";
for($i = 0; $i <count($keywords_not_found); $i++){
	$keywords_not_found_name = (string)$keywords_not_found[$i]['Not_found_keyword'];

	$not_found .="<p>{$keywords_not_found_name}</p>";
}


?>