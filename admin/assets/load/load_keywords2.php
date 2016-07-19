<?php 
	//Database initialization
//	include "../Database/MySqlConnect.php";

	// CATEGORIES
	$categories_query = $conn->prepare("SELECT * FROM categories ORDER BY Category_id");
	$categories_query->execute();

	$categories= $categories_query->fetchAll(PDO::FETCH_ASSOC);
	$categories_check_box = "";
	
	for($i = 0; $i <count($categories); $i++){
		$category_id = (integer) $categories[$i]['Category_id'];
		$category_name = (string)$categories[$i]['Name_of_category'];

		$categories_check_box .= "\r\n<div class='12u$' ><h4 style='float:left;width:50%'>$category_name</h4>
			<span class='collapse_sub_categories'  id='cat$category_id' style='float:left'>
						<img  id='show_cat$category_id' src='../images/show.png'>
						<img  id='hide_cat$category_id' src='../images/hide.png' style='display:none'>
			</span>
		</div>";
		$categories_check_box .= "\r\n<div style='display:none;width:100%;' id='collapse_cat$category_id'>";
		
		// SUBCATEGORIES
		$subcategories_query = $conn->prepare("SELECT * FROM subcategories WHERE Category_id = {$category_id}");
		$subcategories_query->execute();

		$subcategories= $subcategories_query->fetchAll(PDO::FETCH_ASSOC);
		// $categories_check_box .= "<br><br><hr>";
		for($j = 0; $j < count($subcategories) ; $j++){
			$subcategory_id = (integer) $subcategories[$j]['Subcategory_id'];
			$subcategory_name = (string)$subcategories[$j]['Name_of_subcategory']."  ";
			$categories_check_box .= "\r\n<div class='12u$'>
				<h5 style='color:grey;width:50%;float:left'>$subcategory_name</h5>
				<span class='collapse_sub_categories' style='float:left' id='sub$subcategory_id'>
						<img  id='show_sub$subcategory_id' src='../images/show.png'>
						<img style='display:none'id='hide_sub$subcategory_id' src='../images/hide.png' >
				</span>
			";



			$keywords_query = $conn->prepare("SELECT * FROM keywords WHERE Subcategory_id = {$subcategory_id}");
			$keywords_query->execute();

			$keywords= $keywords_query->fetchAll(PDO::FETCH_ASSOC);
			$categories_check_box .= "\r\n<section id='collapse_sub$subcategory_id' style='display:none'><table class='keywords_table'>";
			for($k = 0; $k < count($keywords) ; $k+=4){
				$keyword_id = (integer) $keywords[$k]['Keyword_id'];
				$keyword_name = (string)$keywords[$k]['Name_of_keyword'];
				$categories_check_box .= "\r\n<td><input type='checkbox'  class='keywords_checkbox' id='K{$keyword_id}' name='K{$keyword_id}'><label for='K{$keyword_id}'>{$keyword_name}</label><input style='display:none' type='text' id='MK{$keyword_id}' name='MK{$keyword_id}'></td>";
				if($k+1 < count($keywords)){
					$keyword_id = (integer) $keywords[$k+1]['Keyword_id'];
					$keyword_name = (string)$keywords[$k+1]['Name_of_keyword'];
					$categories_check_box .= "\r\n<td><input type='checkbox'  class='keywords_checkbox' id='K{$keyword_id}' name='K{$keyword_id}'><label for='K{$keyword_id}'>{$keyword_name}</label><input style='display:none' type='text' id='MK{$keyword_id}' name='MK{$keyword_id}'></td>";
				}

				if($k+2 < count($keywords)){
					$keyword_id = (integer) $keywords[$k+2]['Keyword_id'];
					$keyword_name = (string)$keywords[$k+2]['Name_of_keyword'];
					$categories_check_box .= "\r\n<td><input type='checkbox'  class='keywords_checkbox' id='K{$keyword_id}' name='K{$keyword_id}'><label for='K{$keyword_id}'>{$keyword_name}</label><input style='display:none' type='text' id='MK{$keyword_id}' name='MK{$keyword_id}'></td>";
				}
				if($k+3 < count($keywords)){
					$keyword_id = (integer) $keywords[$k+3]['Keyword_id'];
					$keyword_name = (string)$keywords[$k+3]['Name_of_keyword'];
					$categories_check_box .= "\r\n<td><input type='checkbox'  class='keywords_checkbox' id='K{$keyword_id}' name='K{$keyword_id}'><label for='K{$keyword_id}'>{$keyword_name}</label><input style='display:none' type='text' id='MK{$keyword_id}' name='MK{$keyword_id}'></td>";
				}
				$categories_check_box .= "</tr>";
			}

			$categories_check_box .= "</table>\r\n</section></div>";

		}
		$categories_check_box .="</div>";
	}

	echo $categories_check_box;
                    
?>

 <!-- "\r\n<div class='6u$ 12u$(small)'><input type='checkbox' id='C{$category_id}' name='C{$category_id}'><label for='C{$category_id}'>{$category_name}</label></div>";" -->