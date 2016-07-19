<?php
	include "../Database/MySqlConnect.php";

	// Teleftea 5 biblia
	$blog_query = $conn->prepare("SELECT * FROM blog ORDER BY blog_date ");

	$blog_query->execute();

	$blog_data = $blog_query->fetchAll(PDO::FETCH_ASSOC);

	$blog_script = "";
	$blog_javascript =" <script>$(document).ready(function(){";
	for($i=0 ; $i<count($blog_data); $i++){
		$blog_script .= "<h4 class='blog_title' id='blog_title_".$i."'><img src='images/image56.png'>".$blog_data[$i]['blog_title']."</h4>";
		$blog_script .="<div class='blog_content' id='blog_content_".$i."' style='display:none'>";
		$blog_script .= "<p>".$blog_data[$i]['blog_content']. "</p><p>".$blog_data[$i]['blog_date']."</p>";
		if($blog_data[$i]['blog_photo'] != ""){
			$blog_script .= "<img class='blog_img' src='../Database/Blog_photos/".$blog_data[$i]['blog_photo']."' />";
		}
		$blog_script .= "<hr></div>";

		$blog_javascript .= '$("#blog_title_'.$i.'").click(function(){$("#blog_content_'.$i.'").toggle();});';


	}
	$blog_javascript .="});</script>";


?>