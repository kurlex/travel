<?php

if(!(isset($_GET['submit']) && isset($_GET['key']))){
    die("forbidden connection!");
}

require "../database.php";
$sql = "select * from preReservation where preReservationID = \"" . $_GET['key']."\"";

$result = mysqli_query($con,$sql);
$num = mysqli_num_rows($result);
if($num==0 ){


    $sql = "select * from preReservationHotel where preReservationID = \"" . $_GET['key']."\"";

    $result = mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);
    if($num==0){
        require "sendingError.php";
        die("");
    }
    $row = mysqli_fetch_assoc($result);
        $sql="
        insert into reservationHotel  (cost, adult, child, infant ,hotelID,date, ip_addr ,firstName ,lastName,email)
        values  (".$row['cost'].", ".$row['adult'].",".$row['child'] .", ".$row['infant']." ,".$row['hotelID'] .",\"".$row['date']."\", \"".$row['ip_addr'] ."\",\"".$row['firstName']."\" ,\"".$row['lastName']."\",\"".$row['email']."\")
        ;";
        if(!mysqli_query($con,$sql)){

            require "sendingError.php";
            die("");
        }
        $sql="delete from preReservationHotel where preReservationID = \"".$_GET['key']."\"";
        if(!mysqli_query($con,$sql)){

            require "sendingError.php";
            die("");
        }
        require "congrats.php";
    

}
else{

    while($row = mysqli_fetch_assoc($result)){
        $sql="
        insert into reservation  (cost, adult, child, infant ,departureFlightID ,returnFlightID ,date, ip_addr ,firstName ,lastName,email)
        values  (".$row['cost'].", ".$row['adult'].",".$row['child'] .", ".$row['infant']." ,".$row['departureFlightID'].",".$row['returnFlightID'] .",\"".$row['date']."\", \"".$row['ip_addr'] ."\",\"".$row['firstName']."\" ,\"".$row['lastName']."\",\"".$row['email']."\")
        ;";
        if(!mysqli_query($con,$sql)){

            require "sendingError.php";
            die("");
        }
        $sql="delete from preReservation where preReservationID = \"".$_GET['key']."\"";
        if(!mysqli_query($con,$sql)){

            require "sendingError.php";
            die("");
        }
        require "congrats.php";
        break;
    }

}
?>