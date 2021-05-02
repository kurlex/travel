<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
require "../database.php";
if( isset($_POST['class']) && isset($_POST['submit']) &&  isset($_POST['firstName']) &&  isset($_POST['surname']) &&  isset($_POST['email']) &&  isset($_POST['cemail']) &&  isset($_POST['ids']) && isset($_POST['cost']) && isset($_POST['infant'])&& isset($_POST['child']) && isset($_POST['adult']) ){
    

    $ids = explode("_",$_POST['ids']);

    if($_POST['email']!=$_POST['cemail']){
        die("emails don't match");
    }
    $key = hash("sha256",$_SERVER['REMOTE_ADDR'] . $_POST['email']) ;
    $sql = "select * from preReservation where preReservationID = '" . $key ."' AND date = ".date("Y-m-d");
    $result = mysqli_query($con,$sql);
    
    
    $num = mysqli_num_rows($result);
    if($num !=0 ){
        die("you reached your number of reservation limit for today!");
    }

    require "../includes/ticketForEmail.php";
    $mailTo = $_POST['cemail'];
    $subject = "Confirmation Email";
    $header = "From: higth <medazizbelhajamor@gmail.com>"."\r\n"."MIME-Version: 1.0"."\r\n"."Content-Type: text/html; charset=ISO-8859-1"."\r\n";
    $sql = "
    insert into preReservation 
    (preReservationID , cost , adult , child , infant , departureFlightID , returnFlightID , date , ip_addr , lastName , firstName , email) VALUES
    
    (".$key.", "
    .$_POST['cost']." , "
    .$_POST['adult'] .", "
    .$_POST['child']." , "
    .$_POST['infant']." , "
    .$ids[0]." , "
    .(count($ids)>1 ? $ids[1] : "")." , "
    .date("Y-m-d")." , "
    .$_SERVER['REMOTE_ADDR']." , "
    .$_POST['surname']." , "
    .$_POST['firstName']." , ".
    $_POST['email'].");";


      if( mail($mailTo,$subject,$return,$header) && mysqli_query($con,$sql)){
        require "./emailSent.php";
    }
    else{
        require "./sendingError.php";
    }

}else{
    die("forbidden connection!");
}

