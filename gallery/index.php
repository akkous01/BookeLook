<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>BookeLook</title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/phylosophy.css">

    <style>
      .carousel-inner > .item > img,
      .carousel-inner > .item > a > img {
          width: 70%;
          margin: auto;
      }
    </style>

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
        <li><a href="../philosophy/"><img src="../assets/images/navbar/2_OurPhilosophy.png"></a></li>
        <li><a href="../blog/"><img src="../assets/images/navbar/3_Blog.png"></a></li>
        <li><a href="../contact/"><img src="../assets/images/navbar/4_Communicate.png"></a></li>
        <li><a href="#"><img src="../assets/images/navbar/5_LogIn.png"></a></li>
        <li><a href="#"><img src="../assets/images/navbar/6_CreateAccount.png"></a></li>
        <li><a href="#"><img src="../assets/images/navbar/7_Gallery.png"></a></li>
        <li><a href="#"><img src="../assets/images/navbar/8_ZoomIn.png"></a></li>
    </ul>
 </header>

<div id="main_comingsoon">
 <div id="comingsoon_area">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="img_chania.jpg" alt="Chania" width="460" height="345">
        </div>

        <div class="item">
          <img src="img_chania2.jpg" alt="Chania" width="460" height="345">
        </div>
      
        <div class="item">
          <img src="img_flower.jpg" alt="Flower" width="460" height="345">
        </div>

        <div class="item">
          <img src="img_flower2.jpg" alt="Flower" width="460" height="345">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

</div>
</div>

<footer><strong>Maria Christodoulou © 2016</strong></footer>

  <script src="../assets/js/bootstrap.min.js"></script>

</body>
</html>