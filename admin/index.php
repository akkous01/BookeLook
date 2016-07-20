<?php 
	$error="";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// echo $_POST["username"];
		if (empty($_POST["username"])) {
			$error="Wrong username";
		  } else {
		    $username = $_POST["username"];	    
		 }
		if (empty($_POST["password"])) {
			$error="Wrong password";
		  } else {
		    $password = $_POST["password"];	    
		}

		
		if(strcmp($username,"mariach")==0){
			if(strcmp($password,"password")==0){
 				header("Location: home/index.php?");
			}else{
				$error="Wrong password";	
			}
		}else{
			$error="Wrong username";
		}
	}


?>

<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>BookeLook</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>

	<body>
			<!-- Header -->
			<header id="header">
				<a href="../index.php" class="title">BookeLook</a>
				<nav>
					<ul>
						<li><a href="index.php">Admin</a></li>
						<li><a href="../index.php">Web Page</a></li>
					</ul>
				</nav>
			</header>

			<section id="main" class="wrapper">
				<div class="inner">
					<h1 class="major">Log In</h1>
						

				<section>
					
					<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> ">
						<div class="row uniform">
							<div class="12u$"><p style='color:red'><?php echo $error?></p></div>
							<div class="12u$">
								<div class="4u$ 12u$(xsmall)">
									<input type="text" name="username" id="username" value="" placeholder="Username" required="" />
								</div>
							</div>
							<div class="12u$">
								<div class="4u$ 12u$(xsmall)">
									<input type="password" name="password" id="password" value="" placeholder="Password" required="" />
								</div>
							</div>

							<div class="12u$">
								<ul class="actions">
									<li><input type="submit" value="Log In" class="button special" /></li>
								</ul>
							</div>

						</div>
					</form>
				</section>
				</div>	
			</section>

	</body>
</html>