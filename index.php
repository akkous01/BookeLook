<?php 
include_once "assets/session/load_data_from_database.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Book-e-Look</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media       <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <![endif]-->
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <link rel="stylesheet" href="assets/css/autocomplete-input.css">
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


  </head>
  <body ondragstart="return false" onselectstart="return false">




  <header>
    <ul class="my_nav">
        <li><a href="#"><img src="assets/images/navbar/1_HomePage.png"></a></li>
        <li><a href="philosophy/"><img src="assets/images/navbar/2_OurPhilosophy.png"></a></li>
        <li><a href="blog/"><img src="assets/images/navbar/3_Blog.png"></a></li>
        <li><a href="contact/"><img src="assets/images/navbar/4_Communicate.png"></a></li>
        <li><a href="under_construction/"><img src="assets/images/navbar/5_LogIn.png"></a></li>
        <li><a href="under_construction/"><img src="assets/images/navbar/6_CreateAccount.png"></a></li>
        <li><a href="under_construction/"><img src="assets/images/navbar/7_Gallery.png"></a></li>
        <li><a href="under_construction/"><img src="assets/images/navbar/8_ZoomIn.png"></a></li>
    </ul>

 </header>


<div id="main">

  <div id="main-top" >
    <div id="search_bar_book">
        <form id="search" autocomplete="on" method="post" action="search/">
            <div id="search_box_dropdown"  style="display: none">
                <div class="search_box_dropdown_elements" style="display: none">
                    <div id="search_header">
                        <div id="close_button">
                            <a href="#" ><img  src="assets/images/close.png"></a>
                        </div>
                    </div>
                    <div id="search_elements">
                        <div class="form-group">
                            <label for="title">ΤΙΤΛΟΣ ΒΙΒΛΙΟΥ:</label>
                            <input type="text" class="form-control input-sm" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="theme">ΘΕΜΑ:</label>
                            <select class="form-control input-sm" id="theme" name="theme">
                                <option value="1" >Ηθικά/ Πνευματικά μηνυματα</option>
                                <option value="2" >Ανάλυση-κατανόηση και παραγωγή γραπτού λόγου / Σκέφτομαι και Γράφω </option>
                                <option value="3" >Γραμματική – Σύνταξη – Λεξιλόγιο</option>
                                <option value="4" >Σύνδεση με διάφορα άλλα θέματα</option>
                                <option value="5" >Επιπλέον χαρακτηριστικά</option>
                                <option value="6" selected >Όλες οι Κατηγορίες</option>


                            </select>
                        </div>
                        <div class="form-group">
                            <label for="writer">ΣΥΓΓΡΑΦΕΑΣ:</label>
                            <input type="text" class="form-control input-sm" id="writer" name="writer">
                        </div>
                        <div class="form-group">
                            <label for="age">ΗΛΙΚΙΑ:</label>
                            <input type="number" class="form-control input-sm" id="age" name="age">
                        </div>
                        <div class="form-group">
                            <label for="percentage_of_images">ΑΝΑΛΟΓΙΑ ΕΙΚΟΝΑΣ/ΓΡΑΠΤΟΥ:</label>
                            <input type="number" class="form-control input-sm" id="percentage_of_images" name="percentage_of_images" placeholder="--%">
                        </div>
                        <div class="form-group" id="all_keywards">
                            <label >ΛΕΞΕΙΣ ΚΛΕΙΔΙΑ:</label>
                            <div class="all_keywords"></div>
                            <div class="keyword">
                                <div id="keywords_Autofill_div" >
                                    <input   class=" form-control input-sm " id="keywords_Autofill"  name="keywords_Autofill" type="text" />
                                </div>
                                <button  id="keywords_button_add" class="btn btn-sm " type="button">+</button>
                                <p id="keyword_required">*Γράψετε μία Λέξη Κλειδί !</p>
                                <br>
                            </div>
                        </div>
                        <div class="form-group">
                            <div style="width:100%;margin-bottom: 10px;">
                                <label for="price" style="width:20%;float:left;">ΤΙΜΗ: </label>
                                <input type="text" id="amount" name="amount" readonly style=" width:80%; border:0; color:#f6931f; font-weight:bold;">
                            </div>
                            <div id="slider-range"></div>
                        </div>

                    </div>
                    <div id="search_footer">
                        <button id="search_submit" type="submit" class="btn btn-info btn-sm">Ψάξε στα <?php echo count($book);?> Βιβλία ...</button>
                    </div>

                </div>

            </div>

            <div id="search_bar"></div>
        </form>


      <div id="book">
        <div class="bookmarks_left">
          <div class="bookmark_left">
            <img id="ithika" src="assets/images/bookmark-1.png" class="bookmark_tag">
            <img id="ithika_new" src="assets/images/bookmark-1-new.png" class="bookmark_tag_new" style="display: none">
          </div>
          <div class="bookmark_left">
            <img id="sindesi" src="assets/images/bookmark-2.png" class="bookmark_tag">
            <img id="sindesi_new" src="assets/images/bookmark-2-new.png" class="bookmark_tag_new" style="display: none">
          </div>
          <div class="bookmark_left">
            <img id="epipleon" src="assets/images/bookmark-3.png" class="bookmark_tag">
            <img id="epipleon_new" src="assets/images/bookmark-3-new.png" class="bookmark_tag_new" style="display: none">
          </div>
        </div>

		<div class="book_img">
          <div id="subcategories_area">
            <table id = "first_table" class="subcategories_table">
              <tr>
                <td style="text-align:center"><h4 style="color:#8a6d3b">Δες τους σελιδοδείκτες και βιβλία βρες...</h4></td>
                <td></td>
              </tr>
            </table>
            <?php echo $ithika_table; echo $sindesi_table; echo $epipleon_table; echo $analisi_table; echo $gramatiki_table;?>
          </div>
        </div>     

        <div class="bookmarks_right">
          <div class="bookmark_right">
          <img id="analisi" src="assets/images/bookmark-4.png" class="bookmark_tag">
          <img id="analisi_new" src="assets/images/bookmark-4-new.png" class="bookmark_tag_new" style="display: none">
          </div>
          <div class="bookmark_right_2">
            <img id="gramatiki" src="assets/images/bookmark-5.png" class="bookmark_tag">
            <img id="gramatiki_new" src="assets/images/bookmark-5-new.png" class="bookmark_tag_new" style="display: none">
          </div>
        </div>
      </div>

    </div>
  
  <div id="contact-info">
    <div id="contact-link-div"><p> Για παραλαβή του <strong>Newsletter</strong> πατήστε <a href="contact/">εδώ</a></div>
  </div>
  </div>

  <div id="main-bottom" >
    
    <div id="new_inserts">
      <div id="new_books_show">
      		<?php echo $new_books_script; ?>
      </div>
    </div>

    <div id="middle">
        <div id="facebook_div"><img id="facebook_icon" src="assets/images/facebook-02.png" ></div>
        <div id="instagram_div"><img id="instagram_icon" src="assets/images/instagram-02.png" ></div>
    </div>

    <div id="anakinosis">
      <div id="anakinosis_show">

		    <!-- <div id="carousel-example-generic" class="carousel slide" style="height:100%;width:100%" data-ride="carousel">
			  <ol class="carousel-indicators">
			  	<?php echo $anakinosis_script_ol ?>
			  </ol>

			  <div class="carousel-inner" role="listbox">
			    <?php echo $anakinosis_script_div;?>
			  </div>

			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div> -->

<div id="text-carousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="row">
        <div class="col-xs-offset-1 col-xs-11">
            <div class="carousel-inner">
            <?php echo $anakinosis_script; ?>
            </div>
        </div>
    </div>
    <!-- Controls --> <a class="left carousel-control" href="#text-carousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
 <a class="right carousel-control" href="#text-carousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>

</div>


      </div>
    </div>

  </div>

<!-- </div> -->

<footer><strong>Maria Christodoulou © 2016</strong></footer>

<!-- <div id="cotact-side"></div> -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
      <script src="assets/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="assets/js/front-end.js"></script>
      <script type="text/javascript" src="assets/js/index.js"></script>
     
      <script>
          $( document ).ready(function() {


              $('#title').typeahead({
                  local: <?php echo $titles;?>
              });
              $('#writer').typeahead({
                  local: <?php echo $writers;?>
              });
               $('#keywords_Autofill').typeahead({
                   local: <?php echo $keywords;?>
               });

              $(function() {
                  var keywords_tags = <?php echo $keywords;?>;
                  $(".keywords").autocomplete({
                    source:keywords_tags
                  });
              });

              $('.tt-query').css('background-color','#fff');

          });
    </script>
  </body>
</html>