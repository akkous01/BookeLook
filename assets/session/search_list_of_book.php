<?php
/**
 * Created by PhpStorm.
 * User: HpPC
 * Date: 06-Jul-16
 * Time: 6:11 PM
 */
include "../Database/MySqlConnect.php";
$title = $writer =  $age = $percentage_of_images = "none";
$percentage_of_images_min="none";
$percentage_of_images_max="none";
$theme_id = 6;
$price=array(2);
$price[0]=0;
$price[1]=0;
$list_for_input = "|...";
$list_of_keywords =  "keywords.Name_of_keyword='none";
$not_found_search="none";
$not_fount = true;



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // set variables ////////////////////////////////////////////////////////////////////

        unset($_SESSION['list_of_books']);
        $title = $_POST['title'];
        $writer = $_POST['writer'];
        $age = $_POST['age'];
        $percentage_of_images = explode(":",$_POST['percentage_of_images'])[0];
        $percentage_of_images_min=$percentage_of_images-10;
        $percentage_of_images_max=$percentage_of_images+10;
        $theme_id = $_POST['theme'];


        $price = array(2);
        $price = explode("  ", preg_replace("/[^A-Za-z0-9 ]/", '', $_POST['price']));
        $list_of_books = array();

        $keywords = array();
        $list_of_keywords = "";
        $list_for_input = "";
        foreach ($_POST as $key => $value):
            $keyword = substr($key, 0, -1);
            if ((strcmp($keyword, 'k') == 0 and strcmp($value, '') != 0) or (strcmp($key, 'keywords_Autofill') == 0 and strcmp($value, '') != 0)) {
                array_push($keywords, $value);
                $list_of_keywords = $list_of_keywords . " keywords.Name_of_keyword LIKE '%" . $value . "%' or ";
                $list_for_input = $list_for_input . $value . "|";

                $count = 0;
                $search_keyword_query = $conn->prepare("SELECT * FROM count_search_keywords WHERE   search_keyword='".$value."'");

                $search_keyword_query->execute();
                $search_keyword = $search_keyword_query->fetchAll(PDO::FETCH_ASSOC);
                if(count($search_keyword) == 0){
                    $insert_new_serch_keyword_query = $conn->prepare("INSERT INTO count_search_keywords (search_keyword, count) VALUES ('{$value}', 1)" );
                    $insert_new_serch_keyword_query->execute();
                }else{
                    $count = (int)$search_keyword[0]['count']+1;
                    $search_keyword_id = $search_keyword[0]['search_keyword_id'];
                    $update_query = $conn->prepare("UPDATE count_search_keywords SET count='{$count}' WHERE search_keyword_id='{$search_keyword_id}'");
                    $update_query->execute(); 
                }
            }
        endforeach;

        if (isset($_POST['searched_keywords'])) {
            $searched_keywords = explode("|", $_POST['searched_keywords']);
            for ($i = 0; $i < count($searched_keywords) - 1; $i++) {
                if (strcmp($searched_keywords[$i], "") != 0) {
                    $list_for_input = $list_for_input . $searched_keywords[$i] . "|";
                    $list_of_keywords = $list_of_keywords . " keywords.Name_of_keyword LIKE'%" . $searched_keywords[$i] . "%' or ";
                    $count = 0;
                    $value = $searched_keywords[$i];
                    $search_keyword_query = $conn->prepare("SELECT * FROM count_search_keywords WHERE   search_keyword='".$value."'");

                    $search_keyword_query->execute();
                    $search_keyword = $search_keyword_query->fetchAll(PDO::FETCH_ASSOC);
                    if(count($search_keyword) == 0){
                        $insert_new_serch_keyword_query = $conn->prepare("INSERT INTO count_search_keywords (search_keyword, count) VALUES ('{$value}', 1)" );
                        $insert_new_serch_keyword_query->execute();
                    }else{
                        $count = (int)$search_keyword[0]['count']+1;
                        $search_keyword_id = $search_keyword[0]['search_keyword_id'];
                        $update_query = $conn->prepare("UPDATE count_search_keywords SET count='{$count}' WHERE search_keyword_id='{$search_keyword_id}'");
                        $update_query->execute(); 
                    }
                }
            }
        }
        $list_for_input = $list_for_input . "...";
        $list_of_keywords = substr($list_of_keywords, 0, -5);

    } else {
        if(empty($list_of_books)){
            header('Location: ../');
        }
    }

    $theme = array(6);
    for ($j = 0; $j < 6; $j++) {
        $theme[$j] = "";
    }
    $theme[$theme_id - 1] = "selected";

/// check if empty ////////////////////////////////////////////////////////////////////
    $emptyInputs=true;
    if(strcmp($title," ")==0 or strcmp($title,"")==0){
        $title='none';
    }else{$emptyInputs=false;}

    if(strcmp($writer," ")==0 or strcmp($writer,"")==0){
        $writer='none';
    }else{$emptyInputs=false;}

    if($price[0]==5 and $price[1]==45){
        $price[0]=0;
        $price[1]=0;

    }else{$emptyInputs=false;}

    if(strcmp($list_of_keywords,"")==0){
        $not_fount=false;
        $list_of_keywords="keywords.Name_of_keyword LIKE '%none%";

    }else{$emptyInputs=false;}

    if($percentage_of_images==15){
        $percentage_of_images='none';
        $percentage_of_images_min='none';
        $percentage_of_images_max='none';
    }else{$emptyInputs=false;}

    if(strcmp($age," ")==0 or strcmp($age,"")==0){
        $age='none';
    }else{$emptyInputs=false;}


//queries //////////////////////////////////////////////

    $book_query=$conn->prepare("SELECT DISTINCT books.Book_id FROM books WHERE books.Title LIKE '%".$title."%' OR books.Writer LIKE '%".$writer."%'and books.Show_to_User=1");
    $book_query->execute();
    $books_step_1 = $book_query->fetchAll(PDO::FETCH_ASSOC);
//    print_r($books_step_1 ) ;




    $book_query=$conn->prepare("SELECT DISTINCT books.Book_id FROM books WHERE  books.Min_age_no_read='".$age."'
OR books.Min_age_read='".$age."'OR (books.Persentage_of_images > '".$percentage_of_images_min."'AND books.Persentage_of_images < '".$percentage_of_images_max."' )OR (books.Price>'".$price[0]."' AND books.Price < '".$price[1]."')and books.Show_to_User=1");
    $book_query->execute();
    $books_step_2 = $book_query->fetchAll(PDO::FETCH_ASSOC);
//    print_r($books_step_2 ) ;


    $book_query=$conn->prepare("SELECT DISTINCT books_keywords.Book_id FROM books_keywords INNER JOIN books ON books.Book_id=books_keywords.Book_id INNER JOIN keywords ON books_keywords.Keyword_id=keywords.Keyword_id
WHERE  ".$list_of_keywords."' and books.Show_to_User=1 ") ;
    $book_query->execute();
    $books_step_3 = $book_query->fetchAll(PDO::FETCH_ASSOC);
//     print_r($books_step_3 ) ;

    if ($theme_id!=6 ){
        $book_query = $conn->prepare("SELECT  DISTINCT   books.Book_id
                                FROM       books
                                INNER JOIN books_keywords ON books.Book_id = books_keywords.Book_id
                                INNER JOIN keywords ON keywords.Keyword_id = books_keywords.Keyword_id
                                INNER JOIN subcategories ON subcategories.Subcategory_id = keywords.Subcategory_id
                                INNER JOIN categories ON categories.Category_id = subcategories.Category_id
                                WHERE     categories.Category_id='" . $theme_id . "'and books.Show_to_User=1");
        $book_query->execute();
        $books_step_4 = $book_query->fetchAll(PDO::FETCH_ASSOC);
        // print_r($books_step_4 ) ;
    }else{
        $books_step_4 = array();
    }
//     print_r($books_step_4 ) ;

    $book_query = $conn->prepare("SELECT  DISTINCT   books.Book_id FROM books WHERE books.Show_to_User=1");
    $book_query->execute();
    $books_step_5 = $book_query->fetchAll(PDO::FETCH_ASSOC);

// create variable /////////////////////////////////////////////////////////////////
    $list_of_books_Id=array_merge ($books_step_1 ,$books_step_2, $books_step_3,$books_step_4 );
    if(empty($list_of_books_Id) and empty($list_of_books)  ){
        if(!$emptyInputs) {
            $not_found_search = "block";
        }
        $list_of_books_Id=array_merge ($books_step_5 );
    }

    for($i=0;$i<count($list_of_books_Id);$i++) {
        array_push($list_of_books, $list_of_books_Id[$i]['Book_id']);
    }
    $list_of_books=array_unique($list_of_books);
    $books="";
    $mark=array();
    $index=0;
//print_r($list_of_books);
$is_column=false;
   foreach ($list_of_books as $index_of_table=>$book_id):;
       for($j=0;$j<5;$j++) {
           $mark[$j]="none' name='0'";
       }
       $book_query=$conn->prepare("SELECT  DISTINCT   books.Book_id,books.Title,books.Cover,categories.Category_id
                            FROM       books
                            INNER JOIN books_keywords ON books.Book_id = books_keywords.Book_id
                            INNER JOIN keywords ON keywords.Keyword_id = books_keywords.Keyword_id
                            INNER JOIN subcategories ON subcategories.Subcategory_id = keywords.Subcategory_id
                            INNER JOIN categories ON categories.Category_id = subcategories.Category_id
                            WHERE     books.Book_id='".$book_id."' and books.Show_to_User=1");

       $book_query->execute();
       $books_results = $book_query->fetchAll(PDO::FETCH_ASSOC);
//       print_r($books_results);
       if(empty($books_results)){
           continue;
       }
       $value=$books_results[0];

       $categories=array();
       for($i=0;$i< count($books_results);$i++){
           array_push($categories,$books_results[$i]['Category_id']);
       }
       for($j=0;$j<count($categories);$j++){
           $mark[$categories[$j]-1]="block' name='1'";
       }

       if($index%3==0){$is_column=true;$books=$books. "<div class='row'>"."\n";}

       $books=$books. "<div class='column'>
                                    <div id='show_image'>
                                        <div id='book_title'>
                                            <label>".$value['Title']."</label>
                                        </div>
                                        <div id='mark_image'>
                                            <div id='image_area'>
                                                <img class='small_img' id='big_cover_img' src='../Database/Covers/". $value['Cover']."'/>
                                            </div>
                                            <div id='mark_area'>
                                                  <img class='mark_img' id='m_".$value['Book_id']."_1' src='../assets/images/mark-1-1.png' style='display:".$mark[0]."/>
                                                  <img class='mark_img' id='m_".$value['Book_id']."_2' src='../assets/images/mark-1-2.png' style='display:".$mark[1]."/>
                                                  <img class='mark_img' id='m_".$value['Book_id']."_3' src='../assets/images/mark-1-3.png' style='display:".$mark[2]."/>
                                                  <img class='mark_img' id='m_".$value['Book_id']."_4' src='../assets/images/mark-1-4.png' style='display:".$mark[3]."/>
                                                  <img class='mark_img' id='m_".$value['Book_id']."_5' src='../assets/images/mark-1-5.png' style='display:".$mark[4]."/>
                                            </div>
                                         </div>
                                        <div id='more_button'>
                                            <button id='button_".$value['Book_id']."' type='submit' class='btn btn-info btn-xs btn-xxs search_book'>Δείτε περισσότερα...</button>
                                        </div>

                                    </div>

                                </div>"."\n";
       if(($index+1)%3==0){$is_column=false;$books=$books. "</div>"."\n";}

       $index++;
   endforeach;
if($is_column){
    $books=$books. "</div>"."\n";
}
if(strcmp($title,"none")==0){
    $title='';
}
if(strcmp($writer,"none")==0 or strcmp($writer,"")==0){
    $writer='';
}
// not fount words ///////////////////////////////////

    if($not_fount and empty($books_step_3)){
        $not_fount_keywords=explode("|",$list_for_input);
        for($i=0;$i<count($not_fount_keywords)-1;$i++){
            $not_found_keywords_query=$conn->prepare("INSERT IGNORE INTO `not_found_keywords` (`Not_found_keyword_id`, `Not_found_keyword`) VALUES (NULL, '".$not_fount_keywords[$i]."');");
            $not_found_keywords_query->execute();
        }
    }



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
$list_of_keywords = $list_of_keywords_query->fetchAll(PDO::FETCH_ASSOC);

$keywords="[";
for($i=0; $i<count($list_of_keywords) ; $i++){
    $keywords=$keywords."'".$list_of_keywords[$i]['Name_of_keyword']."',";
}
$keywords=$keywords."]";


?>

