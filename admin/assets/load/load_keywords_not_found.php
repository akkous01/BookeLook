<?php 

//include "../Database/MySqlConnect.php";

// CATEGORIES
$keywords_not_found_query = $conn->prepare("SELECT * FROM not_found_keywords");
$keywords_not_found_query->execute();

$keywords_not_found= $keywords_not_found_query->fetchAll(PDO::FETCH_ASSOC);

$not_found = "<div id='not_found_keyword_box'>";
foreach ($keywords_not_found as $row ){
	if(strcmp($row['Not_found_keyword'],'')!=0 and strcmp($row['Not_found_keyword'],' ')!=0) {
		$not_found .= "<p style='width: 25%;float: left;'>{$row['Not_found_keyword']}</p>";
	}
}
$not_found .="</div>";

?>