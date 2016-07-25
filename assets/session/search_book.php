<?php 

session_start();


$book_id = $_GET["book_id"];
$mark1 = $mark2 = $mark3 = $mark4 = $mark5 = ""; 
$tab1 = $tab2 = $tab3 = $tab4 = $tab5 = "";

 // $tab4 = "style='display:none'";
 // $tab2 = "style='display:none'";

 // $mark4 = "style='display:none'";
 // $mark2 = "style='display:none'";

 if($_GET["ithiki"] == 0){
 	$mark1 = "style='display:none'";
 	$tab1 = "style='display:none'";
 }
  if($_GET["analisi"] == 0){
 	$mark2 = "style='display:none'";
 	$tab2 = "style='display:none'";
 }
  if($_GET["gramatiki"] == 0){
 	$mark3 = "style='display:none'";
 	$tab3 = "style='display:none'";
 }
 if($_GET["sindesi"] == 0){
 	$mark4 = "style='display:none'";
 	$tab4 = "style='display:none'";
 }
 if($_GET["epipleon"] == 0){
 	$mark5 = "style='display:none'";
 	$tab5 = "style='display:none'";
 }



include "../Database/MySqlConnect.php";

// Teleftea 5 biblia
$book_query = $conn->prepare("SELECT * FROM books WHERE Book_id='{$book_id}' ");

$book_query->execute();

$book = $book_query->fetchAll(PDO::FETCH_ASSOC);

$Title = $book[0]["Title"];
$ISBN = $book[0]["ISBN"];
$Writer = $book[0]["Writer"];
$Illustrator = $book[0]["Illustrator"];
$Publisher = $book[0]["Publisher"];
$Pages = $book[0]["Pages"];
$Persentage_of_images =  $book[0]["Persentage_of_images"];
$Price = $book[0]["Price"];

$Min_age_no_read = (int)$book[0]["Min_age_no_read"];
$Min_age_read = (int)$book[0]["Min_age_read"];

if($Min_age_no_read == $Min_age_read){
	$age = $Min_age_read."+";
}
else{
	$age = $Min_age_no_read."+".$Min_age_read;
}
$For_parents = (int)$book[0]["For_parents"];
$parents = "";
$parents_show = "display:none";
if($For_parents == 1){
	$parents = "Κατάλληλο για γονείς";
	$parents_show = "";
}

$Hard_copy = (int)$book[0]["Hard_copy"];
$E_book = (int)$book[0]["E_book"];
$Audio_book = (int)$book[0]["Audio_book"];

// $Hard_copy=1;
// $E_book=1;
// $Audio_book=1;
$morfi="";
$morfi_show="style='display:none'";
if($Hard_copy == 1){
	$morfi.= "Έντυπη Μορφή";
}
if ($E_book == 1){
	$morfi.= ", E-book";
	$morfi_show = "";
}
if ($Audio_book == 1){
	$morfi.= ", Audio-book";
	$morfi_show = "";
}

$Link = $book[0]["Link"];
$link_show = "";
if($Link == ""){
	$link_show = "style='display:none'";
}
$Curriculum = $book[0]["Curriculum"];
$curriculum_show = "";
if($Curriculum == ""){
	$curriculum_show = "style='display:none'";
}

$Cover = $book[0]["Cover"];
$Back_cover = $book[0]["Back_cover"];
$show_back_cover = "";
if($Back_cover == ""){
	$show_back_cover = "style='display:none'";
}


$meanings_queries = $conn->prepare("SELECT * FROM books_keywords_meaning a WHERE a.Book_id='{$book_id}' ORDER BY a.Keyword_id ");
$meanings_queries->execute();
$meaning = $meanings_queries->fetchAll(PDO::FETCH_ASSOC);

$ithiki_query = $conn->prepare("SELECT b.Keyword_id, b.Name_of_keyword, c.Name_of_subcategory, c.Subcategory_id, d.Name_of_category FROM books_keywords a, keywords b, subcategories c, categories d WHERE a.Book_id='{$book_id}' AND a.Keyword_id = b.Keyword_id AND b.Subcategory_id = c.Subcategory_id AND c.Category_id = d.Category_id AND d.Category_id=1 ORDER BY c.Subcategory_id ");

$ithiki_query->execute();

$ithiki_data = $ithiki_query->fetchAll(PDO::FETCH_ASSOC);

$ithiki = "<div class='keywords_area'>";

$prev_sub = 0;
for($i=0 ; $i < count($ithiki_data) ; $i++){
	if($prev_sub != (int)$ithiki_data[$i]['Subcategory_id']){
		$ithiki .= "<h3 style='color:black'>".$ithiki_data[$i]['Name_of_subcategory']."</h3>";
	}
	$keyword_link = "<a href='../assets/session/search_keywords_books.php?keyword_id=".$ithiki_data[$i]['Keyword_id']."'>";
	$ithiki .= "<h4>".$keyword_link.$ithiki_data[$i]['Name_of_keyword']."</a>";
	$Keyword_id = (int)$ithiki_data[$i]['Keyword_id'];
	for($j=0  ; $j<count($meaning); $j++){
		if((int)$meaning[$j]['Keyword_id'] == $Keyword_id){
			$ithiki .= " (". $meaning[$j]['Meaning_content']. ")";
			break;
		}
	}
	$ithiki .= "</h4>"; 
	$prev_sub = (int)$ithiki_data[$i]['Subcategory_id'];
}

$ithiki .= "</div>";


$sindesi_query = $conn->prepare("SELECT b.Keyword_id, b.Name_of_keyword, c.Name_of_subcategory, c.Subcategory_id, d.Name_of_category FROM books_keywords a, keywords b, subcategories c, categories d WHERE a.Book_id='{$book_id}' AND a.Keyword_id = b.Keyword_id AND b.Subcategory_id = c.Subcategory_id AND c.Category_id = d.Category_id AND d.Category_id=4 ORDER BY c.Subcategory_id ");

$sindesi_query->execute();

$sindesi_data = $sindesi_query->fetchAll(PDO::FETCH_ASSOC);

$sindesi = "<div class='keywords_area'>";

$prev_sub = 0;
for($i=0 ; $i < count($sindesi_data) ; $i++){
	if($prev_sub != (int)$sindesi_data[$i]['Subcategory_id']){
		$sindesi .= "<h3 style='color:black'>".$sindesi_data[$i]['Name_of_subcategory']."</h3>";
	}
	$keyword_link = "<a href='../assets/session/search_keywords_books.php?keyword_id=".$sindesi_data[$i]['Keyword_id']."'>";

	$sindesi .= "<h4>".$keyword_link.$sindesi_data[$i]['Name_of_keyword']."</a>";
	$Keyword_id = (int)$sindesi_data[$i]['Keyword_id'];
	for($j=0  ; $j<count($meaning); $j++){
		if((int)$meaning[$j]['Keyword_id'] == $Keyword_id){
			$sindesi .= " (". $meaning[$j]['Meaning_content']. ")";
			break;
		}
	}
	$sindesi .= "</h4>"; 
	$prev_sub = (int)$sindesi_data[$i]['Subcategory_id'];
}

$sindesi .= "</div>";



$epipleon_query = $conn->prepare("SELECT b.Keyword_id, b.Name_of_keyword, c.Name_of_subcategory, c.Subcategory_id, d.Name_of_category FROM books_keywords a, keywords b, subcategories c, categories d WHERE a.Book_id='{$book_id}' AND a.Keyword_id = b.Keyword_id AND b.Subcategory_id = c.Subcategory_id AND c.Category_id = d.Category_id AND d.Category_id=5 ORDER BY c.Subcategory_id ");

$epipleon_query->execute();

$epipleon_data = $epipleon_query->fetchAll(PDO::FETCH_ASSOC);

$epipleon = "<div class='keywords_area'>";

$prev_sub = 0;
for($i=0 ; $i < count($epipleon_data) ; $i++){
	if($prev_sub != (int)$epipleon_data[$i]['Subcategory_id']){
		$epipleon .= "<h3 style='color:black'>".$epipleon_data[$i]['Name_of_subcategory']."</h3>";
	}
	$keyword_link = "<a href='../assets/session/search_keywords_books.php?keyword_id=".$epipleon_data[$i]['Keyword_id']."'>";

	$epipleon .= "<h4>".$keyword_link.$epipleon_data[$i]['Name_of_keyword']."</a>";
	$Keyword_id = (int)$epipleon_data[$i]['Keyword_id'];
	for($j=0  ; $j<count($meaning); $j++){
		if((int)$meaning[$j]['Keyword_id'] == $Keyword_id){
			$epipleon .= " (". $meaning[$j]['Meaning_content']. ")";
			break;
		}
	}
	$epipleon .= "</h4>"; 
	$prev_sub = (int)$epipleon_data[$i]['Subcategory_id'];
}

$epipleon .= "</div>";


$gramatiki_query = $conn->prepare("SELECT b.Keyword_id, b.Name_of_keyword, c.Name_of_subcategory, c.Subcategory_id, d.Name_of_category FROM books_keywords a, keywords b, subcategories c, categories d WHERE a.Book_id='{$book_id}' AND a.Keyword_id = b.Keyword_id AND b.Subcategory_id = c.Subcategory_id AND c.Category_id = d.Category_id AND d.Category_id=3 ORDER BY c.Subcategory_id ");

$gramatiki_query->execute();

$gramatiki_data = $gramatiki_query->fetchAll(PDO::FETCH_ASSOC);

$gramatiki = "<div class='keywords_area'>";

$prev_sub = 0;
for($i=0 ; $i < count($gramatiki_data) ; $i++){
	if($prev_sub != (int)$gramatiki_data[$i]['Subcategory_id']){
		$gramatiki .= "<h3 style='color:black'>".$gramatiki_data[$i]['Name_of_subcategory']."</h3>";
	}
	$keyword_link = "<a href='../assets/session/search_keywords_books.php?keyword_id=".$gramatiki_data[$i]['Keyword_id']."'>";

	$gramatiki .= "<h4>".$keyword_link.$gramatiki_data[$i]['Name_of_keyword']."</a>";
	$Keyword_id = (int)$gramatiki_data[$i]['Keyword_id'];
	for($j=0  ; $j<count($meaning); $j++){
		if((int)$meaning[$j]['Keyword_id'] == $Keyword_id){
			$gramatiki .= " (". $meaning[$j]['Meaning_content']. ")";
			break;
		}
	}
	$gramatiki .= "</h4>"; 
	$prev_sub = (int)$gramatiki_data[$i]['Subcategory_id'];
}

$gramatiki .= "</div>";

$analisi_query = $conn->prepare("SELECT b.Keyword_id, b.Name_of_keyword, c.Name_of_subcategory, c.Subcategory_id, d.Name_of_category FROM books_keywords a, keywords b, subcategories c, categories d WHERE a.Book_id='{$book_id}' AND a.Keyword_id = b.Keyword_id AND b.Subcategory_id = c.Subcategory_id AND c.Category_id = d.Category_id AND d.Category_id=2 ORDER BY c.Subcategory_id ");

$analisi_query->execute();

$analisi_data = $analisi_query->fetchAll(PDO::FETCH_ASSOC);

$analisi = "<div class='keywords_area'>";

$prev_sub = 0;
for($i=0 ; $i < count($analisi_data) ; $i++){
	if($prev_sub != (int)$analisi_data[$i]['Subcategory_id']){
		$analisi .= "<h3 style='color:black'>".$analisi_data[$i]['Name_of_subcategory']."</h3>";
	}
	$keyword_link = "<a href='../assets/session/search_keywords_books.php?keyword_id=".$analisi_data[$i]['Keyword_id']."'>";

	$analisi .= "<h4>".$keyword_link.$analisi_data[$i]['Name_of_keyword']."</a>";
	$Keyword_id = (int)$analisi_data[$i]['Keyword_id'];
	for($j=0  ; $j<count($meaning); $j++){
		if((int)$meaning[$j]['Keyword_id'] == $Keyword_id){
			$analisi .= " (". $meaning[$j]['Meaning_content']. ")";
			break;
		}
	}
	$analisi .= "</h4>"; 
	$prev_sub = (int)$analisi_data[$i]['Subcategory_id'];
}

$analisi .= "</div>";



?>

<!-- 
SELECT b.Keyword_id, b.Name_of_keyword, c.Name_of_subcategory, c.Subcategory_id, d.Name_of_category FROM books_keywords a, keywords b, subcategories c, categories d WHERE a.Book_id=11 AND a.Keyword_id = b.Keyword_id AND b.Subcategory_id = c.Subcategory_id AND C.Category_id = d.Category_id AND d.Category_id=1 ORDER BY c.Subcategory_id -->