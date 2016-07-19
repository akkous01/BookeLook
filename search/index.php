<?php
session_start();
if(isset($_SESSION['list_of_books'])){
  $list_of_books=$_SESSION['list_of_books'];
}
include "../assets/session/search_list_of_book.php";
// include_once "../assets/session/load_data_from_database.php";

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Book-e-Look</title>

      <!-- Bootstrap -->
      <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/search.css">
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

       <!--[endif] -->
  </head>
  <body>



  <header>
    <ul class="my_nav">
        <li><a href="../index.php"><img src="../assets/images/navbar/1_HomePage.png"></a></li>
        <li><a href="../philosophy/"><img src="../assets/images/navbar/2_OurPhilosophy.png"></a></li>
        <li><a href="../blog/"><img src="../assets/images/navbar/3_Blog.png"></a></li>
        <li><a href="../contact/"><img src="../assets/images/navbar/4_Communicate.png"></a></li>
        <li><a href="../under_construction/"><img src="../assets/images/navbar/5_LogIn.png"></a></li>
        <li><a href="../under_construction/"><img src="../assets/images/navbar/6_CreateAccount.png"></a></li>
        <li><a href="../under_construction/"><img src="../assets/images/navbar/7_Gallery.png"></a></li>
        <li><a href="../under_construction/"><img src="../assets/images/navbar/8_ZoomIn.png"></a></li>
    </ul>
  </header>

  <div id="main_search">
      <div id="search_box">
          <form  id="search_form" method="post" action="#">
            <div id="up_box">

                <div class="form-group ">
                    <label for="title">ΤΙΤΛΟΣ ΒΙΒΛΙΟΥ:</label>
                    <input type="text" class="form-control input-sm" id="title" name="title" value="<?php echo $title;?>">
                </div>
                <div class="form-group ">
                    <label for="theme">ΘΕΜΑ:</label>
                    <select class="form-control input-sm" id="theme" name="theme">
                        <option value="1" <?php echo $theme[0];?>>Ηθικά/ Πνευματικά μηνυματα</option>
                        <option value="2" <?php echo $theme[1];?>>Ανάλυση-κατανόηση και παραγωγή γραπτού λόγου / Σκέφτομαι και Γράφω </option>
                        <option value="3" <?php echo $theme[2];?>>Γραμματική – Σύνταξη – Λεξιλόγιο</option>
                        <option value="4" <?php echo $theme[3];?>>Σύνδεση με διάφορα άλλα θέματα</option>
                        <option value="5" <?php echo $theme[4];?>>Επιπλέον χαρακτηριστικά</option>
                        <option value="6" <?php echo $theme[5];?>>Όλες οι Κατηγορίες</option>

                    </select>
                </div>

                <div class="form-group ">
                    <label for="writer">ΣΥΓΓΡΑΦΕΑΣ:</label>
                    <input type="text" class="form-control input-sm" id="writer" name="writer" value="<?php echo $writer;?>">
                </div>
               
                <div class="form-group ">
                    <label for="searched_keywords">ΛΕΞΕΙΣ ΚΛΕΙΔΙΑ:</label>
                    <div style="width:100%;">
                        <input style="width: 75%;float: left;"  readonly="readonly" type="text" class="form-control input-sm" id="searched_keywords" name="searched_keywords" value="<?php echo $list_for_input;?>">
                        <button  style="width: 25%" id="button_change" class="btn btn-sm" type="button" >Αλλαγή</button>
                    </div>
                </div>
<!--                <div class="form-group search2_div" id="all_keywards">-->
<!--                    <label >ΛΕΞΕΙΣ ΚΛΕΙΔΙΑ:</label>-->
<!--                    <input type="hidden" name="count" value="1" />-->
<!--                    <div id="field">-->
<!--                        <input   class=" form-control input-sm keywords" id="field1"  name="keyword1" type="text" />-->
<!--                        <button  id="b1" class="btn btn-sm add-more keywords_button" type="button">+</button>-->
<!--                    </div>-->
<!--                </div>-->

            </div>
            <div id="down_box">
                <div class="form-group ">
                    <label for="percentage_of_images">ΑΝΑΛΟΓΙΑ ΕΙΚΟΝΑΣ/ΓΡΑΠΤΟΥ:</label>
                    <input type="number" class="form-control input-sm" id="percentage_of_images" name="percentage_of_images" value="<?php echo $percentage_of_images;?>">
                </div>
                <div class="form-group ">
                    <label for="age">ΗΛΙΚΙΑ:</label>
                    <input type="number" class="form-control input-sm" id="age" name="age" value="<?php echo $age;?>">
                </div>
                <div class="form-group ">
                    <div style="width:100%;margin-bottom: 10px;">
                        <label for="price" style="width:20%;float:left;">ΤΙΜΗ:</label>
                        <input type="text" id="amount" name="amount" readonly style=" width:80%; border:0; color:#f6931f; font-weight:bold;">
                    </div>
                    <div id="slider-range"></div>
                </div>
                <div id="search_button">
                    <button id="search_submit" type="submit" class="btn btn-info btn-sm">Ψάξε Ξανά ...</button>
                </div>
            </div>
          </form>
      </div>

    <div id="results">
        <div id="not_found_query" style="display:<?php echo $not_found_search;?>;"><h4>Δεν βρέθηκαν αποτελέσματα με αυτή την αναζήτηση ...</h4><h5 style="text-decoration: underline;">'Ολα τα Βιβλία:</h5></div>
        <div id="table_of_books">
            <?php echo  $books ?>
        </div>
    </div>


      <!-- change Keywords Modal -->
      <div class="modal fade" id="change_keywords_modal" role="dialog">
          <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Αλλαγή των Λέξεων κλειδιών που επιλέξατε</h4>
                  </div>
                  <div class="modal-body">
                          <p>Διάγρεψε ή Πρόσθεσε λέξεις κλειδιά για την αναζήτηση:</p>
                          <div class="all_keywords"></div>
                          <div class="keyword_main">
                              <div id="keywords_Autofill_div" >
                                <input   class=" form-control input-sm " id="keywords_Autofill"  name="keywords_Autofill" type="text"  />
                              </div>
                              <button  id="keywords_button_add" class="btn btn-sm " type="button">+</button>
                              <p id="keyword_required">*Γράψετε μία Λέξη Κλειδί !</p>
                              <br>
                          </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" id="save_keywords" class="btn btn-default">Αποθήκευση</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
              </div>

          </div>
      </div>


</div>
</div>
<footer><strong>Maria Christodoulou © 2016</strong></footer>



      <!--      <img class='small_img' id='big_cover_img' src='../Database/Covers/". $value['Cover']."'/>-->

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <!--      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
      <script src="../assets/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="../assets/js/front-end.js"></script>
      <script type="text/javascript" src="../assets/js/index.js"></script>

      <script>
          $( document ).ready(function() {
              var num_of_keywords=0;
              $(".search_book").click(function(){
                  var book_id=$(this).attr('id').split("_")[1];
                  var ithiki=$("#m_"+book_id+"_1").attr('name');
                  var sindesi=$("#m_"+book_id+"_2").attr('name');
                  var epipleon=$("#m_"+book_id+"_3").attr('name');
                  var gramatiki=$("#m_"+book_id+"_4").attr('name');
                  var analisi=$("#m_"+book_id+"_5").attr('name');

                  $.get("../assets/session/search_book.php",
                      {book_id:book_id,
                          ithiki:ithiki,
                          sindesi:sindesi,
                          epipleon:epipleon,
                          gramatiki:gramatiki,
                          analisi:analisi,
                          submit:'true'},
                      function(data, textStatus, jqXHR)
                      {
                          window.open("../book_profile/");
                      });
              });

              $('#title').typeahead({
                  local: <?php echo $titles;?>
              });
              $('#writer').typeahead({
                  local: <?php echo $writers;?>
              });
               $('#keywords_Autofill').typeahead({
                   local: <?php echo $keywords;?>
               });
              $('.tt-query').css('background-color','#fff');
              $('header').css('z-index','3');
//              var list_of_keywords=$("#keywords_Autofill").val().split();
//              for()

//              $( "#keywords_button_add" ).click(function() {
//                  var value=$("#keywords_Autofill").val();
//                  if(value!=""){
//                      $('#keyword_required').css("display","none");
//                      var div_keyword = "<div class='keyword' id='div_k_"+num_of_keywords+"'>" +
//                          "<input  style='width: 85%;float: left;' class=' form-control input-sm ' id='k_"+num_of_keywords+"'  name='k"+num_of_keywords+"' type='text' readonly='readonly' value='"+value+"'/>"+
//                          "<button  style='width: 15%' id='"+num_of_keywords+"' class='btn btn-sm btn-danger keywords_button_remove' type='button'>-</button>"+
//                          "</div>";
//                      num_of_keywords++;
//                      $(".all_keywords").append(div_keyword);
//                      $("#keywords_Autofill").val('');
//                      $( ".keywords_button_remove" ).click(function() {
//                          var id=$(this).attr('id');
//                          $('#div_k_'+id).remove();
//                      });
//                  }else{
//                     $('#keyword_required').css("display","block");
//                  }
//
//              });
//
//              $( "#save_keywords").click(function() {
//                  var list_of_keywords="";
//                  for(i=0;i<num_of_keywords;i++){
//                      if($('#div_k_'+i).length){
//                          list_of_keywords=list_of_keywords+$('#k_'+i).val()+" , ";
//                      }
//                  }
//                  list_of_keywords=list_of_keywords+$("#keywords_Autofill").val()+"...";
//                  $('#searched_keywords').val(list_of_keywords);
//                  $('#change_keywords_modal').modal('toggle');
//              });

          });
      </script>
</body>
</html>