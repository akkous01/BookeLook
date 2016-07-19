<?php 

include "../../Database/MySqlConnect.php";
$sub_id= $_GET["sub_id"];

$keywords_sub_query =  $conn->prepare("SELECT DISTINCT books.Book_id FROM books, books_keywords , keywords WHERE keywords.Subcategory_id = ".$sub_id." AND keywords.Keyword_id= books_keywords.Keyword_id AND books_keywords.Book_id = books.Book_id");
$keywords_sub_query->execute();

$keywords_sub = $keywords_sub_query->fetchAll(PDO::FETCH_ASSOC);

$list_of_books = [];
for($i=0 ;$i<count($keywords_sub); $i++){
	$list_of_books[$i] = $keywords_sub[$i]['Book_id'];

}

session_start();
$_SESSION['list_of_books']=$list_of_books;

header('Location: ../../search/');
// print_r($list_of_books);
?>

