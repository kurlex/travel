<?php 

    if(!(isset($_POST['submit']) && isset($_POST['login']) && isset($_POST['pwd']))){
        die("forbidden connection!");
    }

    require "../database.php";

    $sql = "
    select *
    from admin
    where pwd = \"".$_POST['pwd']."\"
    AND login = \"".$_POST['login']."\";
    ";
    $result = mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);

    if($num==0){
        $WA = true;
        require "adminLogin.php";    
    }
    else{
        $acc=true;
        require "FlightReservations.php";
    }

?>
