<?php

require "../database.php";
extract($_POST);
if(!(isset($opp) && isset($query) && isset($data))){
    die("forbidden connection!");
}
$opp = (int)$opp;


switch ($opp){

    case 1:
        if($data != "reservation" && $data!="reservationHotel"){
            $data ="reservation";
        }
        $sql='
        delete from '.$data.'
        where reservationID in ('.$query.')
        ';
        if(!mysqli_query($con,$sql)){
            die("Error!, can't delete from DataBase");
        }
        break;
    case 2:
        if($data != "reservation" && $data!="reservationHotel"){
            $data ="reservation";
        }
        $sql='
        delete from '.$data.'
        where DATEDIFF("'.date("Y-m-d").'", date) > 7;
        ';
        echo $sql;
        if(!mysqli_query($con,$sql)){
            die("Error!, can't delete from DataBase");
        }        

        break;
    default:
        if($data != "preReservation" && $data!="preReservationHotel"){
            $data ="preReservation";
        }
        $sql='
        delete from '.$data.'
        where DATEDIFF("'.date("Y-m-d").'", date) >= 1;
        ';
        echo $sql;
        if(!mysqli_query($con,$sql)){
            die("Error!, can't delete from DataBase");
        } 

        


}