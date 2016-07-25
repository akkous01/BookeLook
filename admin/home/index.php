<?php
/**
 * Created by PhpStorm.
 * User: HpPC
 * Date: 15-Jun-16
 * Time: 8:41 PM
 */

if (session_status() == PHP_SESSION_NONE) {
      session_start();

      // if (!isset($_SESSION["error_found"])){
      // $_SESSION["Title_err"] = $_SESSION["ISBN_err"] = $_SESSION["Writer_err"] = $_SESSION["Publisher_err"] = $_SESSION["Pages_err"] = $_SESSION["Persentage_of_images_err"] = $_SESSION["Min_age_err"] = $_SESSION["Max_age_err"] = $_SESSION["Price_err"] = $_SESSION["Cover_err"] = $_SESSION["Back_cover_err"] = "";
      // }

  }

  if (!isset($_SESSION["new_book_insert_succ"])){
    $_SESSION["new_book_insert_succ"]= 0;
  }

  
    include "../../Database/MySqlConnect.php";

    include "../assets/load/load_books_dataTable.php";
    include "../assets/load/load_keywords_not_found.php";
?>

<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>BOOKeLOOK Admin</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="../assets/js/ie/html5shiv.js"></script><![endif]-->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="../assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="../assets/css/ie8.css" /><![endif]-->
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="../assets/js/dataTables.js"></script>


    
<body onload="loadSubCategories()">




			<header id="header">
                <a href="../../../" class="title">Zoom in Books</a>
                <nav>
                    <ul>
                        <li><a href="../../../">Admin</a></li>
                        <li><a href="../../../">Web Page</a></li>
                    </ul>
                </nav>
			</header>
<!-- Sidebar -->
<section id="sidebar">
    <div class="inner">
        <nav>
            <ul>
                <li><a href="#list_of_books">Λίστα Βιβλίων</a></li>
                <li><a href="#new_book">Προσθήκη Νέου Βιβλίου</a></li>
                <li><a href="#two">Λίστα Λέξεων Κλειδιών που δεν βρέθηκαν</a></li>
                <!-- <li><a href="#new_category">Προσθήκη Κατηγορίας</a></li> -->
                <li><a href="#new_subcategory">Προσθήκη Υποατηγορίας</a></li>
                <li><a href="#new_keyword">Προσθήκη Λέξης Κλειδί</a></li>
                <li><a href="#announcements">Προσθήκη Ανακοίνωσης</a></li>
                <li><a href="#blog">Προσθήκη στο Blog</a></li>
                <li><a href="#gallery">Προσθήκη στη Gallery</a></li>


            </ul>
        </nav>
    </div>
</section>


<!-- Wrapper -->
<div id="wrapper">


    <section id="list_of_books" class="list_of_books">
        <!-- <header> -->
            <h1 class="major">Αποθηκευμένα Βιβλία</h1>
        <!-- </header> -->
        <div class="table-wrapper">
            <div class="8u$ 12u$(xsmall)">
            <input type="text" name="sarch_table" id="search_table" placeholder="Search Book">
            </div>
            <!-- <span id="sarch_table"></span> -->
            <table class="paginated">
                <thead>
                <tr>
                    <th>BookId</th>
                    <th>ISBN</th>
                    <th>Title</th>
                    <th>Writer</th>
                    <th>Illustrator</th>
                    <th>Publisher</th>
                    <th>Pages</th>
                </tr>
                </thead>
                <tbody>
                <?php for($i=0;$i<count($load_books_to_list);$i++){ ?>
                    <tr>
                        <td><?php echo $load_books_to_list[$i]['Book_id'];?></td>
                        <td><?php echo $load_books_to_list[$i]['ISBN'];?></td>
                        <td><?php echo $load_books_to_list[$i]['Title'];?></td>
                        <td><?php echo $load_books_to_list[$i]['Writer'];?></td>
                        <td><?php echo $load_books_to_list[$i]['Illustrator'];?></td>
                        <td><?php echo $load_books_to_list[$i]['Publisher'];?></td>
                        <td><?php echo $load_books_to_list[$i]['Pages'];?></td>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </section>

    <!-- One -->
    <section id="new_book" class="wrapper style2 spotlights">
        <h1 class="major">Νέο Βιβλίο</h1>
        <section class="new_book_body">
            <form method="post" action="../assets/new_edit_book/submit_new_book.php" enctype="multipart/form-data">
                <div class="row uniform">

                    <div class="8u$ 12u$(xsmall)">
                        <h4>Τίτλος Βιβλίου * </h4> <input type="text" name="Title" id="Title" value="" placeholder="Τίτλος Βιβλίου" required/>
                    </div>

                    <div class="18u$ 12u$(xsmall)">
                        <h4>Συγγραφέας * </h4><input type="text" name="Writer" id="Writer" value="" placeholder="Συγγραφέας" required/>
                    </div>

                    <div class="18u$ 12u$(xsmall)">
                        <h4>Εικονογράφος</h4><input type="text" name="Illustrator" id="Illustrator" value="" placeholder="Εικονογράφος" />
                    </div>

                    <div class="18u$ 12u$(xsmall)">
                        <h4>Εκδόσεις * </h4><input type="text" name="Publisher" id="Publisher" value="" placeholder="Εκδόσεις" required/>
                    </div>

                    <div class="18u$ 12u$(xsmall)">
                        <h4>ISBN * </h4><input type="text" name="ISBN" id="ISBN" value="" placeholder="ISBN" required/>
                    </div>

                    <div class="18u$ 12u$(xsmall)">
                        <h4>Σελίδες * </h4><input type="number" name="Pages" id="Pages" value="" required/>
                    </div>

                    <div class="18u$ 12u$(xsmall)">
                        <h4>Ποσοστό Εικόνων * </h4><input type="double" name="Persentage_of_images" id="Persentage_of_images" value="" required/>
                    </div>

                    <div class="24u$ 12u$(xsmall)">
                        <h4>Ελάχιστη Ηλικία για παιδία που δεν διεβάζουν * </h4><input type="number" name="Min_age_no_read" id="Min_age_no_read" value="" required/>
                    </div>

                    <div class="24u$ 12u$(xsmall)">
                        <h4>Ελάχιστη Ηλικία για παιδία που διεβάζουν * </h4><input type="number" name="Min_age_read" id="Min_age_read" value="" required/>
                    </div>

                    <div class="6u$ 12u$(xsmall)">
                        <input type='checkbox' id="For_parents" name="For_parents"'>
                        <label for="For_parents">Κατάλληλο για γονείς</label>
                    </div>

                    <div class="6u$ 12u$(xsmall)">
                        <h4>Μέση Τιμή Πώλησης (€)* </h4><input type="double" name="Price" id="Price" value=""  required/>
                    </div>

                    <div class="12u$ 12u$(xsmall)">
                        <h4>Μορφή* </h4>
                        <input type='checkbox' id="Hard_copy" name="Hard_copy"'>
                        <label for="Hard_copy">Έντυπη Μορφή</label>
                        <input type='checkbox' id="E_book" name="E_book"'>
                        <label for="E_book">E-book</label>
                        <input type='checkbox' id="Audio_book" name="Audio_book"'>
                        <label for="Audio_book">Audio-book</label>
                    </div>

                    <div class="6u$ 12u$(xsmall)">
                        <h4>Σύνδεσμος</h4><input type="text" name="Link" id="Link" value=""/>
                    </div>

                    <div class="12u$ 12u$(xsmall)">
                        <h4>Δραστηριότητες και Θέματα προς συζήτηση</h4>
                        <textarea name="Curriculum" id="Curriculum" rows="4" value=""></textarea>
                    </div>

                     

                    <div class="18u$ 12u$(xsmall)">
                        <h4>Εξώφυλλο * </h4><input type="file" name="Cover" id="Cover" required/>
                    </div>

                    <div class="18u$ 12u$(xsmall)">
                        <h4>Οπισθόφυλλο</h4><input type="file" name="Back_cover" id="Back_cover"/>
                    </div>

                    <div class="12u$"><hr><h3>Κατηγορίες</h3><hr></div>
                    <?php include_once "../assets/load/load_keywords.php"; ?>

                    <div class="12u$ 12u$(xsmall)">
                        <input type='checkbox' id="Show_to_user" name="Show_to_user"'>
                        <label for="Show_to_user"><h3>Το βιβλίο να εμφανίζεται στους χρήστες</h3></label>
                    </div>
                    <div class="12u$">
                        <ul class="actions">
                            <li><input type="submit" value="Save Book" class="special" /></li>
                            <li><input type="reset" value="Reset" /></li>
                        </ul>
                    </div>


                </div>
        </form>
        </section>
    </section>

    <!-- Two -->
    <section id="two" class="wrapper style1 spotlights">
        <div class="inner">
            <h1 class="major">Λίστα Λέξεων Κλειδιών που δεν βρέθηκαν</h1>
            <?php echo $not_found?>
            
        </div>
    </section>

       
    <section id="new_subcategory" class="wrapper style2 spotlights">
        <div class="inner">
            <h1 class="major">Προσθήκη Νέας Υποκατηγορίας</h1>
                <section>
                    <form method="post" action="../assets/add_elements/new_subcategory.php">
                        <div class="row uniform">
                            <div class="12u$">
                                <h4>Κατηγορία</h4>
                                <div class="select-wrapper">
                                    <select name="select_category" id="select_category" required>
                                        <?php include "../assets/load/load_categories.php";?>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="8u$ 12u$(xsmall)">
                                 <input type="text" name="New_subcategory" id="New_subcategory" value="" placeholder="Όνομα Νέας Υποκατηγορίας" required/>
                            </div>
                             <div class="12u$">
                                <ul class="actions">
                                    <li><input type="submit" value="Sabmit Subcategory" class="special" /></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
        </div>
    </section>



    <section id="new_keyword" class="wrapper style1 spotlights">
        <div class="inner">
            <h1 class="major">Προσθήκη Νέας Λέξης Κλειδί</h1>
                <section>
                    <form method="post" action="../assets/add_elements/new_keyword.php">
                        <div class="row uniform">
                            <div class="12u$">
                                <h4>Κατηγορία</h4>
                                <div class="select-wrapper">
                                    <select name="select_category_2" id="select_category_2">
                                        <?php include "../assets/load/load_categories.php";?>
                                    </select>
                                </div>
                            </div>
                            <div class="12u$">
                                <h4>Υποκατηγορία</h4>
                                <div class="select-wrapper">
                                    <select name="select_subcategory" id="select_subcategory">
                                    </select>
                                </div>
                            </div>
                            <div class="8u$ 12u$(xsmall)">
                                 <input type="text" name="New_keyword" id="New_keyword" value="" placeholder="Όνομα Νέας Λέξης Κλειδί" required/>
                            </div>
                            <div> 
                             <div class="12u$">
                                <ul class="actions">
                                    <li><input type="submit" value="Sabmit Keyword" class="special" /></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
        </div>
    </section>


    <section id="announcements" class="wrapper style1 spotlights">
    	<div class="inner">

            <h1 class="major">Προσθήκη Ανακοίνωσης</h1>
            <section>
                <form method="post" action="../assets/add_elements/new_announcement.php" enctype="multipart/form-data">
                    <div class="row uniform">
                    	<div class="12u$">
                            <textarea name="announcement_content" id="announcement_content" rows="4" value="" required=""></textarea>
                        </div>
                        <div class="18u$ 12u$(xsmall)">
                            <h4>Εικόνα για την ανακοίνωση</h4>
                            <input type="file" name="announcement_photo" id="announcement_photo"   />
                        </div>
                         <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="Sabmit announcement" class="special" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
             </section>
		</div>
    </section>

    <section id="blog" class="wrapper style2 spotlights">
    	<div class="inner">

            <h1 class="major">Προσθήκη στο Blog</h1>
            <section>
                <form method="post" action="../assets/add_elements/new_blog.php" enctype="multipart/form-data">
                    <div class="row uniform">
                    	<div class="6u$ 12u$(xsmall)">
                        	<h4>Τίτλος</h4><input type="text" name="blog_title" id="blog_title" value="" required />
                    	</div>
                        
                        <div class="12u$">
                            <textarea name="blog_content" id="blog_content" rows="6" value=""></textarea>
                        </div>
                        <div class="18u$ 12u$(xsmall)">
                            <h4>Εικόνα για το blog</h4>
                            <input type="file" name="blog_photo" id="blog_photo"/>
                        </div>
                         <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="Save Blog" class="special" /></li>
                            </ul>
                        </div>
                    </div>

                </form>
             </section>
		</div>
    </section>


    <section id="gallery" class="wrapper style2 spotlights">
        <div class="inner">

            <h1 class="major">Προσθήκη στη Gallery</h1>
            <section>
                <form method="post" action="../assets/add_elements/new_gallery.php" enctype="multipart/form-data">
                    <div class="row uniform">
                        <div class="18u$ 12u$(xsmall)">
                            <h4>Εικόνα για τη Gallery</h4>
                            <input type="file" name="gallery_photo" id="gallery_photo" required="" />
                        </div>
                         <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="Save Gallery Photo" class="special" /></li>
                            </ul>
                        </div>
                    </div>

                </form>
             </section>
        </div>
    </section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="keyword_meaning">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title">Προσθήκη Σιμασίας Λέξης Κλειδί</h4>
        <h4 id="name_of_check_keyword"></h4>
      </div>
      <div class="modal-body">
        <input type="text" style="display:none" name="keyword_open" id="keyword_open" />
        <textarea name="meaning_content" id="meaning_content" rows="4" value=""></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary small" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary small" onclick="save_meaning();">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- 
<footer id="footer" class="wrapper style1-alt">
    <div class="inner">
        <ul class="menu">
            <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </div>
</footer> -->

<!-- Scripts -->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/jquery.scrollex.min.js"></script>
<script src="../assets/js/jquery.scrolly.min.js"></script>
<script src="../assets/js/skel.min.js"></script>
<script src="../assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="../assets/js/main.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // $('#keyword_meaning').on('shown.bs.modal', function(e) { $("#sidebar").css({position:'absolute'});})
        $('#keyword_meaning').on('hidden.bs.modal', function(e) { $("#sidebar").css({position:'fixed'});})


        $('#select_category_2').on('change', load_subcategories);


        $(".collapse_sub_categories").click(function () {
            $("#collapse_"+$(this).attr('id')).toggle();
            hide="#hide_"+$(this).attr('id');
            show="#show_"+$(this).attr('id');
            if($(show).css('display') == 'none') {
                $(show).css({'display':'block'});
                $(hide).css({'display':'none'});

            }else{
                $(show).css({'display':'none'});
                $(hide).css({'display':'block'});
            }

        });

        $(".keywords_checkbox").change(function(){
            if(this.checked){
                var name = "label[for='";
                var id = $(this).attr("id");
                name = name + id + "']";
                $("#name_of_check_keyword").text($(name).text());
                $("#keyword_open").val(id);
                $("#sidebar").css({position:'absolute'});
                $("#keyword_meaning").modal('show');
            }
        });

    

    });

    $("#search_table").on("keyup", function() {
        var value = $(this).val();

        if (value.length){
            $(".paginated tr").each(function (index) {
                if (index != 0) {

                    $row = $(this);

                    $row.find("td").each(function () {

                        var cell = $(this).text();

                        if (cell.indexOf(value) < 0) {
                            $row.hide();
                        } else {
                            $row.show();
                            return false; //Once it's shown you don't want to hide it on the next cell
                        }
                    });
                }
            });
        }else{
            //if empty search text, show all rows
            $("table tr").show();

        }
    });


    function load_subcategories() {
        var selected = $('#select_category_2').val();

        $.ajax({
            url:        '../assets/load/load_subcategories.php',
            type:       'POST',
            // dataType:   'json',
            data:       "category_id="+selected,
            success:    function(data) {
                $('#select_subcategory').html(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                // alert("some error");
                alert(textStatus);
            }
        });
    }

    function loadSubCategories(){
        var selected = 1;
        $.ajax({
            url:        '../assets/load/load_subcategories.php',
            type:       'POST',
            // dataType:   'json',
            data:       "category_id="+selected,
            success:    function(data) {
                $('#select_subcategory').html(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                // alert("some error");
                alert(textStatus);
            }
        });
    }

    function save_meaning(){
        var meaning = $('#meaning_content').val();
        var key_id= $('#keyword_open').val();
        $('#meaning_content').val('');
        $('#keyword_open').val('');

        var input_id = "#M"+key_id;
        $(input_id).val(meaning);
        $(input_id).show();
        $("#keyword_meaning").modal('hide');
    }
   
</script>
</body>
</html>
