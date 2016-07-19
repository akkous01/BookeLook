<?php 

include "../Database/MySqlConnect.php";

// Teleftea 5 biblia
$new_books_query = $conn->prepare("SELECT books.Title FROM books WHERE Show_to_user=1 ORDER BY Book_id DESC LIMIT 5 ");

$new_books_query->execute();

$new_books = $new_books_query->fetchAll(PDO::FETCH_ASSOC);

$new_books_script = "<h4>Τίτλοι Νέων Βιβλίων</h4>";
for($i=0 ; $i<count($new_books); $i++){
	$new_books_script = $new_books_script ."<p>".$new_books[$i]['Title']."</p><hr class='myhr'>";
}


// ANAKINOSIS
$anakinosis_query =  $conn->prepare("SELECT * FROM announcements  ORDER BY announcement_date DESC;");
$anakinosis_query->execute();

$anakinosis = $anakinosis_query->fetchAll(PDO::FETCH_ASSOC);

$anakinosis_script_ol = "";
$anakinosis_script_div = "";
$anakinosis_script = "";
for($i=0 ; $i<count($anakinosis); $i++){
	if($i == 0){
		$anakinosis_script_ol .= "<li data-target='#carousel-example-generic' data-slide-to='".$i."' class='active'></li>";
		$anakinosis_script_div .= "<div class='item active'>";
		$anakinosis_script .=  '<div class="item active"><div class="carousel-content"><p>'.$anakinosis[$i]['announcement_date'].'</p><p>'.$anakinosis[$i]['announcement_content'].'</p></div></div>';
	}else{
		$anakinosis_script_ol .= "<li data-target='#carousel-example-generic' data-slide-to='".$i."'></li>";
		$anakinosis_script_div .= "<div class='item'>";
		$anakinosis_script .=  '<div class="item"><div class="carousel-content"><p>'.$anakinosis[$i]['announcement_date'].'</p><p>'.$anakinosis[$i]['announcement_content'].'</p></div></div>';
	}

	if($anakinosis[$i]['announcement_photo'] != ""){
		$anakinosis_script_div .= "<img class='carusel_img' src='../Database/Announcements_photos/".$anakinosis[$i]['announcement_photo']."'>";
	}else{
		$anakinosis_script_div .= "<img class='carusel_img' src='images/no.png'>";
	}
	$anakinosis_script_div .= "<div class='carousel-caption'><h4>".$anakinosis[$i]['announcement_date']."</h4><p>".$anakinosis[$i]['announcement_content']."</p></div></div>";
	
	// $anakinosis_script = $anakinosis_script ."<h4>".$anakinosis[$i]['announcement_date']."</h4><p>".$anakinosis[$i]['announcement_content']."</p><hr class='myhr'>";
}



// YPOKATHGORIES ITHIKON MINIMATON
$ithika_query = $conn->prepare("SELECT * FROM subcategories WHERE  Category_id = 1;");
$ithika_query->execute();
$ithika_sub = $ithika_query->fetchAll(PDO::FETCH_ASSOC);
$ithika_table = "<table id='ithika_table' class='subcategories_table' style='display: none'>";

for($i=0; $i<count($ithika_sub) ; $i+=2){

	$href = "session/search_subcategory_books.php?sub_id=".$ithika_sub[$i]['Subcategory_id'];

	$ithika_table = $ithika_table."<tr><td><a href='".$href."'>".$ithika_sub[$i]['Name_of_subcategory']."</a><hr class='myhr_2'></td>";
	if($i+1 < count($ithika_sub)){
		$ithika_table = $ithika_table."<td><a href='".$href."'>".$ithika_sub[$i+1]['Name_of_subcategory']."</a><hr class='myhr_2'></td>";
	}
	$ithika_table = $ithika_table."</tr>";
}
$ithika_table = $ithika_table."</table>";


// YPOKATHGORIES SINDESIS
$sindesi_query = $conn->prepare("SELECT * FROM subcategories WHERE  Category_id = 4;");
$sindesi_query->execute();
$sindesi_sub = $sindesi_query->fetchAll(PDO::FETCH_ASSOC);
$sindesi_table = "<table id='sindesi_table' class='subcategories_table' style='display: none'>";

for($i=0; $i<count($sindesi_sub) ; $i+=2){
	$href = "session/search_subcategory_books.php?sub_id=".$sindesi_sub[$i]['Subcategory_id'];
	$sindesi_table = $sindesi_table."<tr><td><a href='".$href."'>".$sindesi_sub[$i]['Name_of_subcategory']."</a><hr class='myhr_2'></td>";
	if($i+1 < count($sindesi_sub)){
		$sindesi_table = $sindesi_table."<td><a href='".$href."'>".$sindesi_sub[$i+1]['Name_of_subcategory']."</a><hr class='myhr_2'></td>";
	}
	$sindesi_table = $sindesi_table."</tr>";
}
$sindesi_table = $sindesi_table."</table>";


// YPOKATHGORIES EPIPLEON
$epipleon_query = $conn->prepare("SELECT * FROM subcategories WHERE  Category_id = 5;");
$epipleon_query->execute();
$epipleon_sub = $epipleon_query->fetchAll(PDO::FETCH_ASSOC);
$epipleon_table = "<table id='epipleon_table' class='subcategories_table' style='display: none'>";

for($i=0; $i<count($epipleon_sub) ; $i+=2){
	$href = "session/search_subcategory_books.php?sub_id=".$epipleon_sub[$i]['Subcategory_id'];
	$epipleon_table = $epipleon_table."<tr><td><a href='".$href."'>".$epipleon_sub[$i]['Name_of_subcategory']."</a><hr class='myhr_2'></td>";
	if($i+1 < count($epipleon_sub)){
		$epipleon_table = $epipleon_table."<td><a href='".$href."'>".$epipleon_sub[$i+1]['Name_of_subcategory']."</a><hr class='myhr_2'></td>";
	}
	$epipleon_table = $epipleon_table."</tr>";
}
$epipleon_table = $epipleon_table."</table>";



// YPOKATHGORIES ANALISIS
$analisi_query = $conn->prepare("SELECT * FROM subcategories WHERE  Category_id = 2;");
$analisi_query->execute();
$analisi_sub = $analisi_query->fetchAll(PDO::FETCH_ASSOC);
$analisi_table = "<table id='analisi_table' class='subcategories_table' style='display: none'>";

for($i=0; $i<count($analisi_sub) ; $i+=2){
	$href = "session/search_subcategory_books.php?sub_id=".$analisi_sub[$i]['Subcategory_id'];
	$analisi_table = $analisi_table."<tr><td><a href='".$href."'>".$analisi_sub[$i]['Name_of_subcategory']."</a><hr class='myhr_2'></td>";
	if($i+1 < count($analisi_sub)){
		$analisi_table = $analisi_table."<td><a href='".$href."'>".$analisi_sub[$i+1]['Name_of_subcategory']."</a><hr class='myhr_2'></td>";
	}
	$analisi_table = $analisi_table."</tr>";
}
$analisi_table = $analisi_table."</table>";



// YPOKATHGORIES GRAMMATIKIS

$gramatiki_query = $conn->prepare("SELECT * FROM subcategories WHERE  Category_id = 3;");
$gramatiki_query->execute();
$gramatiki_sub = $gramatiki_query->fetchAll(PDO::FETCH_ASSOC);
$gramatiki_table = "<table id='gramatiki_table' class='subcategories_table' style='display: none'>";

for($i=0; $i<count($gramatiki_sub) ; $i+=2){
	$href = "session/search_subcategory_books.php?sub_id=".$gramatiki_sub[$i]['Subcategory_id'];

	$gramatiki_table = $gramatiki_table."<tr><td><a href='".$href."'>".$gramatiki_sub[$i]['Name_of_subcategory']."</a><hr class='myhr_2'></td>";
	if($i+1 < count($gramatiki_sub)){
		$gramatiki_table = $gramatiki_table."<td><a href='".$href."'>".$gramatiki_sub[$i+1]['Name_of_subcategory']."</a><hr class='myhr_2'></td>";
	}
	$gramatiki_table = $gramatiki_table."</tr>";
}
$gramatiki_table = $gramatiki_table."</table>";






$book_query=$conn->prepare("SELECT books.Title,books.Writer FROM books");
$book_query->execute();
$book = $book_query->fetchAll(PDO::FETCH_ASSOC);;
$titles="[";
$writers="[";
for($i=0; $i<count($book) ; $i++){
	$titles=$titles."'".$book[$i]['Title']."',";
	$writers=$writers."'".$book[$i]['Writer']."',";
}
$titles=$titles."]";
$writers=$writers."]";

$list_of_keywords_query=$conn->prepare("SELECT keywords.Name_of_keyword FROM keywords");
$list_of_keywords_query->execute();
$list_of_keywords = $list_of_keywords_query->fetchAll(PDO::FETCH_ASSOC);;
$keywords="[";
for($i=0; $i<count($list_of_keywords) ; $i++){
	$keywords=$keywords."'".$list_of_keywords[$i]['Name_of_keyword']."',";
}
$keywords=$keywords."]";



?>

