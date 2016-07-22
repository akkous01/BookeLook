<?php 

include "../../Database/MySqlConnect.php";
$keyword_id= $_GET["keyword_id"];

$keywords_sub_query =  $conn->prepare("SELECT DISTINCT books_keywords.Book_id FROM books_keywords WHERE books_keywords.Keyword_id = ".$keyword_id);
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

