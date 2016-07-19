<?php

$email_address = "kkoushi_antria13@hotmail.com";

$name = $surname = $tel = $email = $occup = $city = $sinergasia = $paraggelia = $newsletter = $msg = "" ;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (empty($_POST['name'])) {
        $error = "Το όνομα σας είναι υποχρεωτικό πεδίο";
        header("Location: ../../message/error/index.php?error=".$error);
    } else {
        $name = $_POST['name'];
    }

    if (empty($_POST['surname'])) {
        $error = "Το επίθετο σας είναι υποχρεωτικό πεδίο";
        header("Location: ../../message/error/index.php?error=".$error);
    } else {
        $surname = $_POST['surname'];
    }
    

    $tel = $_POST['tel'];
    

    if (empty($_POST['email'])) {
        $error = "Το email σας είναι υποχρεωτικό πεδίο";
        header("Location: ../../message/error/index.php?error=".$error);
    } else {
        $email = $_POST['email'];
    }


    if (empty($_POST['occup'])) {
        $error = "H Ιδιότητα σας είναι υποχρεωτικό πεδίο";
        header("Location: ../../message/error/index.php?error=".$error);
    } else {
        $occup = $_POST['occup'];
    }

    $city = $_POST["city"];


    if(! empty($_POST["sinergasia"])){
	    $sinergasia = "Πιθανή συνεργασία";
	  }
	  
	  if(! empty($_POST["paraggelia"])){
	    $paraggelia = "Παραγγελία έντυπου οδηγού";
	  }
	  
	  if(! empty($_POST["newsletter"])){
	    $newsletter = "Εγγραφή στο newsletter";
	  }

	  $msg = $_POST["msg"];


	  $subject= "Μήνυμα Χρήστη";

	  $message = "Όνομα: ".$name."\n";
	  $message .= "Επίθετο: ".$surname."\n";
	  $message .= "Τηλέφωνο: ".$tel."\n";
	  $message .= "E-mail:".$email."\n";
	  $message .= "Ιδιότητα: ".$occup."\n";
	  $message .= "Πόλη: ".$city."\n";
	  $message .= "Ενδιαφέρομαι για:\n";
	  $message .= $sinergasia." ".$paraggelia." ".$newsletter."\n\n";

	  $message .= "Μήνυμα:\n".$msg;

	  $message = wordwrap($message,70);

	  if( !mail($email_address,$subject,$message)){
	  	$error = "Απέτυχε η αποστολή του μηνύματος. Προσπαθήστε ξανά.";
        header("Location: ../../message/error/index.php?error=".$error);
	  }else{
	  	 header("Location: ../../message/success/");
	  }
	  
}
?>