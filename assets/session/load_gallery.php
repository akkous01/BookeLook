<?php 
include "../Database/MySqlConnect.php";


$gallery_query =  $conn->prepare("SELECT * FROM gallery");
$gallery_query->execute();

$gallery = $gallery_query->fetchAll(PDO::FETCH_ASSOC);


$gallery_script_div = "";
for($i=0 ; $i<count($gallery); $i++){
	if($i == 0){
		$gallery_script_div .= "<div class='item active' style='height:100%; width:100%;'>";
		
	}else{
		$gallery_script_div .= "<div class='item' style='height:100%; width:100%;'>";
		
	}

	$gallery_script_div .= "<img class='carusel_img' style='height:100%; width:100%;' src='../Database/Gallery_photos/".$gallery[$i]['gallery_photo']."'></div>";
	
}

?>