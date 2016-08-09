<?php
/**
 * Created by PhpStorm.
 * User: HpPC
 * Date: 09-Aug-16
 * Time: 1:08 PM
 */
include "../../Database/MySqlConnect.php";
$blog_id=$_GET['blog_id'];
$title=$_GET['title'];
$date=$_GET['date'];

$blog_query = $conn->prepare("SELECT blog_content,blog_photo FROM `blog` WHERE blog_id=".$blog_id."");
$blog_query->execute();
$blog= $blog_query->fetchAll(PDO::FETCH_ASSOC);
$blog= $blog[0];
$content=$blog['blog_content'];
$photo=$blog['blog_photo'];




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
    <meta name="viewport" title="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="../assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="../assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="../assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="../assets/css/ie8.css" /><![endif]-->
</head>

<body>
<!-- Header -->
<header id="header">
    <a href="../../index.php" class="title">BookeLook</a>
    <nav>
        <ul>
            <li><a href="../home/">Admin</a></li>
            <li><a href="../../index.php">Web Page</a></li>
        </ul>
    </nav>
</header>

<section id="main" class="wrapper">
    <div class="inner">
        <h2 class="major">Αλλαγή Blog <?php echo $blog_id;?> με ημερομηνία: <span style="color:#b74e91"><?php echo $date;?></span></h2>
        <section>
            <form method="post" action="../assets/add_elements/new_blog.php" enctype="multipart/form-data">
                <div class="row uniform">
                    <div class="6u$ 12u$(xsmall)" style="display: none">
                        <input type="text" name="blog_id" id="blog_id" value="<?php echo $blog_id;?>" required />
                    </div>

                    <div class="6u$ 12u$(xsmall)">
                        <h3>Τίτλος</h3><input type="text" name="blog_title" id="blog_title" value="<?php echo $title;?>" required />
                    </div>

                    <div class="12u$">
                        <textarea name="blog_content" id="blog_content" rows="6" value=""><?php echo $content?></textarea>
                    </div>
                    <div class="12u$">
                    <h3>Εικόνα για το blog</h3>
                    </div>

                    <div class="12u$" style="margin-left:5% height: 45%; width:30%;">
                        <img src="../../Database/Blog_photos/<?php echo $photo;?>"/>
                    </div>
                    <div class="18u$ 12u$(xsmall)">
                        <input type="file" name="blog_photo" id="blog_photo" value="<?php echo $photo?>"/>
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

</body>
</html>
