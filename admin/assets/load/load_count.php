<?php 

//include "../Database/MySqlConnect.php";

// CATEGORIES
$keywords_count_query = $conn->prepare("SELECT * FROM count_search_keywords ORDER BY count DESC");
$keywords_count_query->execute();

$keywords_count= $keywords_count_query->fetchAll(PDO::FETCH_ASSOC);

$count_table = "";
for($i = 0; $i <count($keywords_count); $i++){

	$keywords_count_name = (string)$keywords_count[$i]['search_keyword'];
	$count = (int)$keywords_count[$i]['count'];


	$count_table .="<tr><td>{$keywords_count_name}</td><td>{$count}</td></tr>";
}

?>