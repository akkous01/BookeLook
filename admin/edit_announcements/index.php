<?php
/**
 * Created by PhpStorm.
 * User: HpPC
 * Date: 09-Aug-16
 * Time: 1:08 PM
 */
include "../../Database/MySqlConnect.php";
$announcement_id=$_GET['announcement_id'];
// $content=$_GET['content'];
$date=$_GET['date'];
$content = $string = html_entity_decode($_GET['content']);
$content = strip_tags($content);
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
    <link rel="stylesheet" href="../assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="../assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="../assets/css/ie8.css" /><![endif]-->
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
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
        <h2 class="major">Αλλαγή Ανακοινώσης <?php echo $announcement_id;?> με ημερομηνία: <span style="color:#b74e91"><?php echo $date;?></span></h2>
        <section>
            <form method="post" action="../assets/add_elements/new_announcement.php" enctype="multipart/form-data">
                <div class="12u$">
                    <input name="announcement_id" id="announcement_id" value="<?php echo $announcement_id;?>" required=""/>
                </div>
                <div class="row uniform">
                    <div class="12u$">
                        <textarea name="announcement_content" id="announcement_content" rows="4" required=""><?php echo $content;?></textarea>
                    </div>
                    <div class="12u$">
                        <ul class="actions">
                            <li><input type="submit" value="Sabmit announcement" class="special" /></li>
                            <li><input type="button" onclick="location.href = '../assets/delete_elements/delete_announcements.php?announcement_id=<?php echo $announcement_id;?>';" value="Delete Announcement" class="special" /></li>
                        </ul>

                    </div>
                </div>
            </form>

        </section>
    </div>
</section>

</body>
</html>
