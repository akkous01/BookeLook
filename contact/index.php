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
  <body ondragstart="return false" onselectstart="return false">

  <header>
    <ul class="my_nav">
        <li><a href="../index.php"><img src="../assets/images/navbar/1_HomePage.png"></a></li>
        <li><a href="../philosophy/"><img src="../assets/images/navbar/2_OurPhilosophy.png"></a></li>
        <li><a href="../blog/"><img src="../assets/images/navbar/3_Blog.png"></a></li>
        <li><a href="../contact/"><img src="../assets/images/navbar/4_Communicate.png"></a></li>
        <!-- <li><a href="../under_construction/"><img src="../assets/images/navbar/5_LogIn.png"></a></li> -->
        <!-- <li><a href="../under_construction/"><img src="../assets/images/navbar/6_CreateAccount.png"></a></li> -->
        <li><a href="../gallery/"><img src="../assets/images/navbar/7_Gallery.png"></a></li>
        <!-- <li><a href="../under_construction/"><img src="../assets/images/navbar/8_ZoomIn.png"></a></li> -->
    </ul>
 </header>

<div id="main_contact">
  <div id="phylosophy_area" style="overflow-x:hidden; padding-top:1%;text-align:center">
  <!-- <div class="container"> -->

    <form id="condact_form" method="post" class="form-horizontal" action="../assets/session/sent_email.php">
       <div class="form-group">
          <label class="control-label col-sm-4" for="name">Όνομα: *</label>
          <div class="col-sm-5"><input type="text" class="form-control" id="name" name="name" required=""></div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="surname">Επίθετο: *</label>
          <div class="col-sm-5"><input type="text" class="form-control" id="surname" name="surname" required=""></div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-4" for="tel">Τηλέφωνο:</label>
          <div class="col-sm-5"><input type="text" class="form-control" id="tel" name="tel"></div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-4" for="email">E-mail: *</label>
          <div class="col-sm-5"><input type="email" class="form-control" id="email" name="email" required=""></div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-4" for="occup">Ιδιότητα: *</label>
          <div class="col-sm-5"><input type="text" class="form-control" id="occup" name="occup" required=""></div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-4" for="city">Πόλη:</label>
          <div class="col-sm-5"><input type="text" class="form-control" id="city" name="city"></div>
        </div>

        <label>Ενδιαφέρομαι για:</label>
        <div style="width:70%; margin-left:15%; text-align:left">
          <div class="checkbox">
            <label><input id="sinergasia" name="sinergasia" type="checkbox" value="">Πιθανή συνεργασία</label>
          </div>
          <div class="checkbox">
            <label><input id="paraggelia" name="paraggelia" type="checkbox" value="">Παραγγελία έντυπου οδηγού</label>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" id="newsletter" name="newsletter" value="">Εγγραφή στο newsletter</label>
          </div>
        </div>
        <div style="margin-top:4%;width:70%; margin-left:15%; text-align:left">
          <p>Μήνυμα:</p>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" ></label>
          <div class="col-sm-8" style="margin-bottom:3%"><textarea class="form-control" rows="4" id="msg" name="msg"></textarea> 
        </div>
        </div>
        <div style="margin-top:4%;width:70%; margin-left:15%; text-align:left">
        <!-- <div class="form-group"> -->
          <input type="submit" class="btn btn-info" value="Αποστολή">
        </div>

    </form>
  <!-- </div> -->
  </div>
</div>

<footer><strong>BOOKeLOOK © 2016<strong></footer>

  <script src="../assets/js/bootstrap.min.js"></script>

</body>
</html>