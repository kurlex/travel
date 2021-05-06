<?php 


if(!isset($_POST['pwd']) and (!isset($acc) || $acc!=true)){
    die("forbidden connection!");
}

error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="reservation.css">
    <title>Document</title>
</head>
<body>
    <section>
        <div class="leftBar">
            <a href="../"><img src="../img/logo.png" alt="high" class="logo"></a>    
        
            <p>Options</p>

            <hr>
            <div class="div-link">
                <span id="flight" class="spe link">Flights Reservations</span>                
            </div>
            <div class="div-link">
                <span id="hotel" class="link">Hotels Reservations</span>
            </div>
        </div>
        <div class="main">
            <div class="mid">

            <h2>Flights Reservations</h2>
                <?php
                $none = "";

                    $sql ="
                    SELECT *
                    from reservation
                    limit 0 , 10;
                    ";
                $result = mysqli_query($con,$sql);
                $num = mysqli_num_rows($result);
                
                if($num==0){
                    echo '
                        <div style="text-align:left;padding:1rem; margin:4rem">
                            <h3>No matching results were found</h3>
                            <p>Either no provider sites serve the locations you specified or no results are available for your chosen id.</p>
                        </div>
                            ';
                    $none = "dis";
                                   
                }
                else{

                    echo '
                    <table>
                    <tr>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Email</th>
                        <th>Cost</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Date</th>
                        <th>Check</th>
                    </tr>
                    ';

                    $i = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $i++;
                        $sql ="
                        select fromAirport,toAirport
                        from flight
                        where flightID = ".$row['departureFlightID'];
                        $result1 = mysqli_query($con,$sql);
                        $num = mysqli_num_rows($result1);
                        if($num==0){
                            die("Error!");
                        }
                        $row1 = mysqli_fetch_assoc($result1);

                        $sql ="
                        select c.code as code, a.airportID as airportID, a.name as airportname
                        from airport a , country c
                        where a.airportID in (".$row1['fromAirport'].",".$row1['toAirport'].");
                        ";

                        $result1 = mysqli_query($con,$sql);
                        $num = mysqli_num_rows($result1);
                        if($num==0){
                            die("Error!");
                        }
                        while($row2 = mysqli_fetch_assoc($result1)){
                            if($row2['airportID']==$row1['fromAirport']){
                                $from = $row2['airportname']." (".$row2['code'].")";
                            }
                            else{
                                $to = $row2['airportname']." (".$row2['code'].")";
                            }
                        }



                        $class="";
                        if($i%2){
                            $class="odd";
                        }
                        echo "
                        <a class=\"cl-row ".$class."\" href=\"FlightDetail.php?id=".$row['reservationID']."\">
                            <tr>
                                <td>".$row['firstName']."</td>
                                <td>".$row['lastName']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['cost']."</td>
                                <td>".$from."</td>
                                <td>".$to."</td>
                                <td>".$row['date']."</td>
                                <td> <input type=\"checkbox\" name=\"id_"
                                .$row['reservationID']
                                ."\" id=\""
                                .$row['reservationID']
                                ."\"> </td>
                            </tr>

                        </a>
                        ";

                    }
                    echo '
                    </table>
                    ';
                }
                ?>
                    <div class="bottom-bar">
                        <div class="col">
                            <span class="btn" title="Clear every request placed a week ago" onclick="expired('reservation','#flight')">Clear</span>
                            <span id="checkAll" class="btn" onclick="checkAll()">Check All</span>
                        </div>
                        <div class="col">
                            <?php
                                $none1 = "dis";
                            echo '
                            <a class="'.$none1.'" id="left">
                                <img class="arrow" style="transform: rotate(180deg);"src="../img/arrow.png" alt="left arrow">
                            </a>
                            <p id="i" >1</p>
                            <a class="'.$none.'" id="right">
                                <img class="arrow" src="../img/arrow.png" alt="right arrow">
                            </a>';
                            ?>
                        </div>
                        <div class="col">
                            <span class="btn" title="It is recommended to click once regularly" onclick="cache('preReservation','#flight')">Cache</span>
                            <span class="btn" onclick="confirm('reservation','#flight')">Confirm</span>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <script src="reservation.js"></script>
</body>
</html>