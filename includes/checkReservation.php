<?php

if(isset($_GET['key'])){


    $sql = "select * from preReservation where preReservationID = " . $key ." AND date = ".date("Y-m-d");

    $result = mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);
    if($num==0){
        die("no reservation is found!");
    }else{
        while($row = mysqli_fetch_assoc()){
            $sql = "
            insert into preReservation 
            (cost , adult , child , infant , departureFlightID , returnFlightID , date , ip_addr , lastName , firstName , email) VALUES
            
            (".$row['cost']." , "
            .$row['adult'] .", "
            .$row['child']." , "
            .$row['infant']." , ".
            $row['departureFlightID']." , ".
            $row['returnFlightID']." , "
            .date("Y-m-d")." , "
            .$row['REMOTE_ADDR']." , "
            .$row['lastName']." , "
            .$row['firstName']." , ".
            $row['email'].");";
            break;
        }
        $del = "delete from preReservation where preReservationID = " . $key ." AND date = ".date("Y-m-d");
        if(mysqli_query($con,$sql) && mysqli_query($con,$del)){
            require "../email/congrats.php";
        }
        else{
            die("failed!, Plase try again later!");
        }
    }
}
else{

    die("forbidden connection!");
}
?>