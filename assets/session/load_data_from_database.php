<?php 

include "Database/MySqlConnect.php";

// Teleftea 5 biblia
$new_books_script = "<h4>Τίτλοι Νέων Βιβλίων</h4>";
$new_books_query = $conn->prepare("SELECT books.Title,books.Book_id FROM books WHERE Show_to_user=1 ORDER BY Book_id DESC LIMIT 5 ");
$new_books_query->execute();
$new_books = $new_books_query->fetchAll(PDO::FETCH_ASSOC);
for($i=0;$i<count($new_books);$i++) {

	$categories_query = $conn->prepare("SELECT  DISTINCT   books.Book_id,categories.Category_id
                            FROM       books
                            INNER JOIN books_keywords ON books.Book_id = books_keywords.Book_id
                            INNER JOIN keywords ON keywords.Keyword_id = books_keywords.Keyword_id
                            INNER JOIN subcategories ON subcategories.Subcategory_id = keywords.Subcategory_id
                            INNER JOIN categories ON categories.Category_id = subcategories.Category_id
                            WHERE     books.Book_id='" . $new_books[$i]['Book_id'] . "' and books.Show_to_User=1 ORDER BY Book_id DESC LIMIT 5 ");
	$categories_query->execute();
	$categories_results = $categories_query->fetchAll(PDO::FETCH_ASSOC);
//       print_r($books_results);
	if(empty($categories_results)){
		continue;
	}

	$categories=[0,0,0,0,0];
	for($j=0;$j< count($categories_results);$j++){
		$categories[$categories_results[$j]['Category_id']-1]=1;
	}
	$new_books_script = $new_books_script ."<p><a href='book_profile/index.php?book_id=".$new_books[$i]['Book_id']."&ithiki=".$categories[0]."&analisi=".$categories[1]."&gramatiki=".$categories[2]."&sindesi=".$categories[3]."&epipleon=".$categories[4]."'>".$new_books[$i]['Title']."</a></p><hr class='myhr'>";
}





// ANAKINOSIS
$anakinosis_query =  $conn->prepare("SELECT * FROM announcements  ORDER BY announcement_date DESC;");
$anakinosis_query->execute();

$anakinosis = $anakinosis_query->fetchAll(PDO::FETCH_ASSOC);

$anakinosis_script_ol = "";
$anakinosis_script_div = "";
$anakinosis_script = "";
for($i=0 ; $i<count($anakinosis); $i++){

	$content = $string = html_entity_decode($anakinosis[$i]['announcement_content']);
	$content = strip_tags($content);
	if($i == 0){
		$anakinosis_script_ol .= "<li data-target='#carousel-example-generic' data-slide-to='".$i."' class='active'></li>";
		$anakinosis_script_div .= "<div class='item active'>";
		$anakinosis_script .=  '<div class="item active"><div class="carousel-content"><p>'.$anakinosis[$i]['announcement_date'].'</p><p>'.$content.'</p></div></div>';
	}else{
		$anakinosis_script_ol .= "<li data-target='#carousel-example-generic' data-slide-to='".$i."'></li>";
		$anakinosis_script_div .= "<div class='item'>";
		$anakinosis_script .=  '<div class="item"><div class="carousel-content"><p>'.$anakinosis[$i]['announcement_date'].'</p><p>'.$content.'</p></div></div>';
	}

	if($anakinosis[$i]['announcement_photo'] != ""){
		$anakinosis_script_div .= "<img class='carusel_img' src='../Database/Announcements_photos/".$anakinosis[$i]['announcement_photo']."'>";
	}else{
		$anakinosis_script_div .= "<img class='carusel_img' src='images/no.png'>";
	}
	$anakinosis_script_div .= "<div class='carousel-caption'><h4>".$anakinosis[$i]['announcement_date']."</h4><p>".$content."</p></div></div>";
	
	// $anakinosis_script = $anakinosis_script ."<h4>".$anakinosis[$i]['announcement_date']."</h4><p>".$anakinosis[$i]['announcement_content']."</p><hr class='myhr'>";
}



// YPOKATHGORIES ITHIKON MINIMATON
$ithika_query = $conn->prepare("SELECT DISTINCT subcategories.Subcategory_id, subcategories.Name_of_subcategory FROM subcategories INNER JOIN keywords ON keywords.Subcategory_id= subcategories.Subcategory_id INNER JOIN books_keywords ON keywords.Keyword_id=books_keywords.Keyword_id INNER JOIN books ON books_keywords.Book_id=books.Book_id WHERE subcategories.Category_id = 1 and books.Show_to_user=1;");
$ithika_query->execute();
$ithika_sub = $ithika_query->fetchAll(PDO::FETCH_ASSOC);
$ithika_table = "<table id='ithika_table' class='subcategories_table' style='display: none'>";

for($i=0; $i<count($ithika_sub) ; $i+=2){

	$href = "assets/session/search_subcategory_books.php?sub_id=".$ithika_sub[$i]['Subcategory_id'];

	$ithika_table = $ithika_table."<tr><td><a href='".$href."'>".$ithika_sub[$i]['Name_of_subcategory']."</a><hr class='myhr_2'></td>";
	if($i+1 < count($ithika_sub)){
		$href = "assets/session/search_subcategory_books.php?sub_id=".$ithika_sub[$i+1]['Subcategory_id'];
		$ithika_table = $ithika_table."<td><a href='".$href."'>".$ithika_sub[$i+1]['Name_of_subcategory']."</a><hr class='myhr_2'></td>";
	}
	$ithika_table = $ithika_table."</tr>";
}
$ithika_table = $ithika_table."</table>";


// YPOKATHGORIES SINDESIS
$sindesi_query = $conn->prepare("SELECT DISTINCT subcategories.Subcategory_id, subcategories.Name_of_subcategory FROM subcategories INNER JOIN keywords ON keywords.Subcategory_id= subcategories.Subcategory_id INNER JOIN books_keywords ON keywords.Keyword_id=books_keywords.Keyword_id INNER JOIN books ON books_keywords.Book_id=books.Book_id WHERE subcategories.Category_id = 4 and books.Show_to_user=1;");
$sindesi_query->execute();
$sindesi_sub = $sindesi_query->fetchAll(PDO::FETCH_ASSOC);
$sindesi_table = "<table id='sindesi_table' class='subcategories_table' style='display: none'>";

for($i=0; $i<count($sindesi_sub) ; $i+=2){
	$href = "assets/session/search_subcategory_books.php?sub_id=".$sindesi_sub[$i]['Subcategory_id'];
	$sindesi_table = $sindesi_table."<tr><td><a href='".$href."'>".$sindesi_sub[$i]['Name_of_subcategory']."</a><hr class='myhr_2'></td>";
	if($i+1 < count($sindesi_sub)){
		$href = "assets/session/search_subcategory_books.php?sub_id=".$sindesi_sub[$i+1]['Subcategory_id'];
		$sindesi_table = $sindesi_table."<td><a href='".$href."'>".$sindesi_sub[$i+1]['Name_of_subcategory']."</a><hr class='myhr_2'></td>";
	}
	$sindesi_table = $sindesi_table."</tr>";
}
$sindesi_table = $sindesi_table."</table>";


// YPOKATHGORIES EPIPLEON
$epipleon_query = $conn->prepare("SELECT DISTINCT subcategories.Subcategory_id, subcategories.Name_of_subcategory FROM subcategories INNER JOIN keywords ON keywords.Subcategory_id= subcategories.Subcategory_id INNER JOIN books_keywords ON keywords.Keyword_id=books_keywords.Keyword_id INNER JOIN books ON books_keywords.Book_id=books.Book_id WHERE subcategories.Category_id = 5 and books.Show_to_user=1;");
$epipleon_query->execute();
$epipleon_sub = $epipleon_query->fetchAll(PDO::FETCH_ASSOC);
$epipleon_table = "<table id='epipleon_table' class='subcategories_table' style='display: none'>";

for($i=0; $i<count($epipleon_sub) ; $i+=2){
	$href = "assets/session/search_subcategory_books.php?sub_id=".$epipleon_sub[$i]['Subcategory_id'];
	$epipleon_table = $epipleon_table."<tr><td><a href='".$href."'>".$epipleon_sub[$i]['Name_of_subcategory']."</a><hr class='myhr_2'></td>";
	if($i+1 < count($epipleon_sub)){
		$href = "assets/session/search_subcategory_books.php?sub_id=".$epipleon_sub[$i+1]['Subcategory_id'];

		$epipleon_table = $epipleon_table."<td><a href='".$href."'>".$epipleon_sub[$i+1]['Name_of_subcategory']."</a><hr class='myhr_2'></td>";
	}
	$epipleon_table = $epipleon_table."</tr>";
}
$epipleon_table = $epipleon_table."</table>";



// YPOKATHGORIES ANALISIS
$analisi_query = $conn->prepare("SELECT DISTINCT subcategories.Subcategory_id, subcategories.Name_of_subcategory FROM subcategories INNER JOIN keywords ON keywords.Subcategory_id= subcategories.Subcategory_id INNER JOIN books_keywords ON keywords.Keyword_id=books_keywords.Keyword_id INNER JOIN books ON books_keywords.Book_id=books.Book_id WHERE subcategories.Category_id = 2 and books.Show_to_user=1;");
$analisi_query->execute();
$analisi_sub = $analisi_query->fetchAll(PDO::FETCH_ASSOC);
$analisi_table = "<table id='analisi_table' class='subcategories_table' style='display: none'>";

for($i=0; $i<count($analisi_sub) ; $i+=2){
	$href = "assets/session/search_subcategory_books.php?sub_id=".$analisi_sub[$i]['Subcategory_id'];
	$analisi_table = $analisi_table."<tr><td><a href='".$href."'>".$analisi_sub[$i]['Name_of_subcategory']."</a><hr class='myhr_2'></td>";
	if($i+1 < count($analisi_sub)){
		$href = "assets/session/search_subcategory_books.php?sub_id=".$analisi_sub[$i+1]['Subcategory_id'];
		$analisi_table = $analisi_table."<td><a href='".$href."'>".$analisi_sub[$i+1]['Name_of_subcategory']."</a><hr class='myhr_2'></td>";
	}
	$analisi_table = $analisi_table."</tr>";
}
$analisi_table = $analisi_table."</table>";



// YPOKATHGORIES GRAMMATIKIS

$gramatiki_query = $conn->prepare("SELECT DISTINCT subcategories.Subcategory_id, subcategories.Name_of_subcategory FROM subcategories INNER JOIN keywords ON keywords.Subcategory_id= subcategories.Subcategory_id INNER JOIN books_keywords ON keywords.Keyword_id=books_keywords.Keyword_id INNER JOIN books ON books_keywords.Book_id=books.Book_id WHERE subcategories.Category_id = 3 and books.Show_to_user=1;");
$gramatiki_query->execute();
$gramatiki_sub = $gramatiki_query->fetchAll(PDO::FETCH_ASSOC);
$gramatiki_table = "<table id='gramatiki_table' class='subcategories_table' style='display: none'>";

for($i=0; $i<count($gramatiki_sub) ; $i+=2){
	$href = "assets/session/search_subcategory_books.php?sub_id=".$gramatiki_sub[$i]['Subcategory_id'];

	$gramatiki_table = $gramatiki_table."<tr><td><a href='".$href."'>".$gramatiki_sub[$i]['Name_of_subcategory']."</a><hr class='myhr_2'></td>";
	if($i+1 < count($gramatiki_sub)){
		$href = "assets/session/search_subcategory_books.php?sub_id=".$gramatiki_sub[$i+1]['Subcategory_id'];
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

$list_of_keywords_query=$conn->prepare("SELECT keywords.Name_of_keyword FROM keywords INNER JOIN books_keywords ON books_keywords.Keyword_id=keywords.Keyword_id INNER JOIN books ON books.Book_id=books_keywords.Book_id WHERE books.Show_to_user=1");
$list_of_keywords_query->execute();
$list_of_keywords = $list_of_keywords_query->fetchAll(PDO::FETCH_ASSOC);;
$keywords="[";
for($i=0; $i<count($list_of_keywords) ; $i++){
	$keywords=$keywords."'".$list_of_keywords[$i]['Name_of_keyword']."',";
}
$keywords=$keywords."]";



?>

