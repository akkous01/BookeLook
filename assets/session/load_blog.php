<?php
	include "../Database/MySqlConnect.php";

	// Teleftea 5 biblia
	$blog_query = $conn->prepare("SELECT * FROM blog ORDER BY blog_date ");

	$blog_query->execute();

	$blog_data = $blog_query->fetchAll(PDO::FETCH_ASSOC);

	// $blog_script = "";
	// $blog_javascript =" <script>$(document).ready(function(){";
	// for($i=0 ; $i<count($blog_data); $i++){
	// 	$blog_script .= "<h4 class='blog_title' id='blog_title_".$i."'><img src='../assets/images/image56.png'>".$blog_data[$i]['blog_title']."</h4>";
	// 	$blog_script .="<div class='blog_content' id='blog_content_".$i."' style='display:none'>";
	// 	$blog_script .= "<p>".$blog_data[$i]['blog_content']. "</p><p>".$blog_data[$i]['blog_date']."</p>";
	// 	if($blog_data[$i]['blog_photo'] != ""){
	// 		$blog_script .= "<img class='blog_img' src='../Database/Blog_photos/".$blog_data[$i]['blog_photo']."' />";
	// 	}
	// 	$blog_script .= "<hr></div>";

	// 	$blog_javascript .= '$("#blog_title_'.$i.'").click(function(){$("#blog_content_'.$i.'").toggle();});';


	// }
	// $blog_javascript .="});</script>";

	$blog_h4 = "";
	$blog_modals = "";
	$blog_scripts = "";
	for($i=0 ; $i<count($blog_data); $i++){
		$blog_h4 .= "<h4 class='blog_title' id='blog_title_".$i."'><img src='../assets/images/image56.png'>".$blog_data[$i]['blog_title']."</h4>";
		$blog_modals .= "<div class='my-modal' id='blog_modal_".$i."'><span class='modal-close'>x</span><div class='my-modal-content'> <h4 align='center'><img src='../assets/images/image56.png'>".$blog_data[$i]['blog_title']."</h4><hr>"."<p>".$blog_data[$i]['blog_content']. "</p><p>".$blog_data[$i]['blog_date']."</p>";
		
		if($blog_data[$i]['blog_photo'] != ""){
			$blog_modals .= "<img class='blog_img' src='../Database/Blog_photos/".$blog_data[$i]['blog_photo']."' />";
		}
		$blog_modals .= "</div></div>";


		$blog_scripts .= "<script>var modal".$i." = document.getElementById('blog_modal_".$i."');
      var img".$i." = document.getElementById('blog_title_".$i."');
      img".$i.".onclick = function(){
          modal".$i.".style.display = 'block';
   		}

      var span".$i." = document.getElementsByClassName('modal-close')[".$i."];

      // When the user clicks on <span> (x), close the modal
      span".$i.".onclick = function() {
          modal".$i.".style.display = 'none';
      }</script>";

	}



?>