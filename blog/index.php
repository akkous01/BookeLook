<?php

  include_once "../assets/session/load_blog.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>BOOKeLOOK</title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/phylosophy.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media       <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <![endif]-->
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <link rel="stylesheet" href="../assets/css/autocomplete-input.css">
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


  </head>
  <body>

  <header>
    <ul class="my_nav">
        <li><a href="../index.php"><img src="../assets/images/navbar/1_HomePage.png"></a></li>
        <li><a href="../philosophy"><img src="../assets/images/navbar/2_OurPhilosophy.png"></a></li>
        <li><a href="../blog/"><img src="../assets/images/navbar/3_Blog.png"></a></li>
        <li><a href="../contact/"><img src="../assets/images/navbar/4_Communicate.png"></a></li>
        <!-- <li><a href="../under_construction/"><img src="../assets/images/navbar/5_LogIn.png"></a></li> -->
        <!-- <li><a href="../under_construction/"><img src="../assets/images/navbar/6_CreateAccount.png"></a></li> -->
        <li><a href="../gallery/"><img src="../assets/images/navbar/7_Gallery.png"></a></li>
        <!-- <li><a href="../under_construction/"><img src="../assets/images/navbar/8_ZoomIn.png"></a></li> -->
    </ul>
 </header>
  <div id="main_blog">
    <div id="search_bar_div">
      <form id="search" autocomplete="on" method="post" action="../search/">
        <div id="search_box_dropdown"  style="display: none">
          <div class="search_box_dropdown_elements" style="display: none">
            <div id="search_header">
              <div id="close_button">
                <a href="#" ><img  src="../assets/images/close.png"></a>
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
                <label for="age">ΗΛΙΚΙΑ:</label>
                <input type="number" class="form-control input-sm" id="age" name="age">
              </div>
              <div class="form-group ">
                <label for="percentage_of_images" style="margin=none;" >ΑΝΑΛΟΓΙΑ ΕΙΚΟΝΑΣ/ ΓΡΑΠΤΟΥ:</label>
                <input type="text" class=" input-xs" id="percentage_of_images" name="percentage_of_images" readonly style="width:30%; border:0; color:#f6931f; font-weight:bold;margin:0%;">

                <div id="slider-range-min"></div>
              </div>


              <div class="form-group">
                <div style="width:100%;margin-bottom: 10px;">
                  <label for="price" style="width:20%;float:left;">ΤΙΜΗ: </label>
                  <input type="text" id="price" name="price" readonly style=" width:80%; border:0; color:#f6931f; font-weight:bold;">
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




        <div id="blog_area"><?php echo $blog_h4?></div>

        <div id="contact-info-area">
          <div id="contact-info-area-div"><p> Λήψη <a href="../contact/"><strong>Newsletter</strong></a></p></div>
        </div>
    </div>
  </div>


<?php echo $blog_modals ?>
<footer><strong>BOOKeLOOK © 2016</strong></footer>
  <script src="../assets/js/bootstrap.min.js"></script>
  <?php echo $blog_scripts;?>
  <script type="text/javascript" src="../assets/js/front-end.js"></script>
  <script type="text/javascript" src="../assets/js/index.js"></script>

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