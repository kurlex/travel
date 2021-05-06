
                <?php
                require_once "../database.php";
                extract($_POST);
                if(!isset($id)){
                    die("error!");
                }

                $id = (int)$id;
                echo "<h2>Flights Reservations</h2>";
                $none = "";

                    if((int)$id < 1){
                        $id = 1;
                    }
                    $start = ((int)$id-1)*10;
                    $sql ="
                    SELECT *
                    from reservation
                    limit ".$start.", 10;";
                
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
                
                echo '
                
                <div class="bottom-bar">
                <div class="col">
                    <span class="btn" title="Clear every request placed a week ago" onclick="expired(\'reservation\',\'#flight\')">Clear</span>
                    <span id="checkAll" class="btn" onclick="checkAll()">Check All</span>
                </div>
                <div class="col">';
                    if($id<=0){
                        $id = 1;
                    }
                    $none1 = "";
                    if($id==1){
                        $none1 = "dis";
                    }
                    echo '
                    <a class="'.$none1.'" id="left">
                        <img class="arrow" style="transform: rotate(180deg);"src="../img/arrow.png" alt="left arrow">
                    </a>
                    <p id="i">'
                    .$id.'</p>
                    <a class="'.$none.'" id="right">
                        <img class="arrow" src="../img/arrow.png" alt="right arrow">
                    </a>
                </div>
                <div class="col">
                    <span class="btn" title="It is recommended to click once regularly" onclick="cache(\'preReservation\',\'#flight\')">Cache</span>
                    <span class="btn" onclick="confirm(\'reservation\',\'#flight\')">Confirm</span>
                </div>
            </div>';