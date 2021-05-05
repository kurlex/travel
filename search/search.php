
<?php
$conn = mysqli_connect("localhost","root","","TP_web");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/commun.css">
    <link rel="stylesheet" href="../css/search.css">
    <link rel="stylesheet" href="../css/searchBar.css">
    <script src="../js/loading.js"></script>
    <title>Document</title>
</head>
<body>
    <style>
        .loading {
  position: relative;
  top: 19rem;
  z-index: 100;
  width: 100px;
  left: 50%;
  margin-left: -50px;
}
.img {
  height: 50px;
  width: auto;
  position: absolute;
  right: 50%;
  margin-right: -25px;
}
.ran {
  position: absolute;
  z-index: 99;
  height: 100vh;
  width: 100vw;
}
    </style>
<?php require("../loading.php");?>
    
<script>

var ID1=rot('i1');
var ID2=rot('i2');
var ID3=rot('i3',"a");
var imgs = document.images,
    len = imgs.length,
    counter = 0;
setTimeout(() => {
    
[].forEach.call( imgs, function( img ) {
    if(img.complete)
      incrementCounter();
    else
      img.addEventListener( 'load', incrementCounter, false );
} );

}, 500);


function incrementCounter() {
    counter++;
    if ( counter === len ) {
    setTimeout(() => {
      FadeOut('i1');
      FadeOut('i3');
      FadeOut('i2');
      FadeOut('a4');
        setTimeout(function(){
      clearInterval(ID1);
      clearInterval(ID2);
      clearInterval(ID3);
      document.getElementById('a4').remove();
    },500);
    var IDT1=tran('i',20,0,-3);  
    }, 500);
    
    }
}

</script>

<?php require("../navBar.php")?>
    <div class="top_search">
        <form action="search.php" method="POST">
            <div style="display: none;">
                <input type="number" value="" name="order">
                <input name="currency" value=<?php echo "\"".$_POST['currency']."\"" ?>>
                <input type="number" value=<?php echo "\"".$_POST['min']."\"" ?> name="min">
                <input type="number" value=<?php echo "\"".$_POST['max']."\"" ?> name="max">
                <fieldset name="radio">
                    <input type="radio" name="radio" value="roundTrip" <?php echo ($_POST['radio']=="roundTrip" ? "checked=\"checked\"" : "") ?>>
                    <input type="radio"  name="radio" value="oneWay" <?php echo ($_POST['radio']=="oneWay" ? "checked=\"checked\"" : "") ?>>
                </fieldset>
                <fieldset name="class">
                    <input type="radio"  name="class" value="BC" <?php echo ($_POST['class']=="BC" ? "checked=\"checked\"" : "") ?>>
                    <input type="radio"  name="class"  value="Economy" <?php echo ($_POST['class']=="Economy" ? "checked=\"checked\"" : "") ?>>
                </fieldset>
                <input type="number" name="adult" id="adult_input" value= <?php echo "\"".$_POST['adult']."\"" ?>>
                <input type="number" name="child" id="child_input" value=<?php echo "\"".$_POST['child']."\"" ?>>
                <input type="number" name="infant" id="infant_input" value=<?php echo "\"".$_POST['infant']."\"" ?>>
            </div>


            <div style="text-align: center;">
                    <div class="flex50" style="display: inline-block;">
                        <label class="text-label" for="flyingFrom">Flying From</label>
                        <input type="text" id="search" class="search" name="flyingFrom" placeholder="Departure..." value=<?php echo "\"".$_POST['flyingFrom']."\"" ?> autocomplete="off">
                        <div class="input">
                            <ul id="input-list1">

                            </ul>
                        </div>
                        <input type="number" id="numSearch1" name="departureID" value=<?php echo "\"".$_POST['departureID']."\"" ?> style="display:none">
                    </div>
                    <div class="flex50" style="display: inline-block;">
                            <label for="flyingTo" class="text-label">Flying To</label>
                            <input type="text" id="search1" class="search" name="flyingTo" placeholder="arrival..." value=<?php echo "\"".$_POST['flyingTo']."\"" ?> autocomplete="off">
                            <div class="input">
                                <ul id="input-list2">

                                </ul>
                            </div>
                            <input type="number" id="numSearch2" name="returnID" value=<?php echo "\"".$_POST['returnID']."\"" ?> style="display:none">
                    </div>
                <script src="../js/searchBarFlight.js"></script>
                <br class="mobile">
                <label for="departure" class="text-label">Departure</label>
                <input class="search" type="date" id="departure" name="departure" placeholder="Select a date" value=<?php echo "\"".$_POST['departure']."\"" ?> required>
                <br class="mobile">
                <label for="return" class="text-label" id="return1">Return</label>
                <input class="search" type="date" id="return" name="return" value=<?php echo "\"".$_POST['return']."\"" ?> placeholder="Select a date" required>
                <script>
                    var today = new Date();
                    var date = new Date();
                    date.setDate(date.getDate()+1);
                    today.setDate(today.getDate());
                    var Stoday = String(today.getFullYear())+'-'+(today.getMonth()+1 < 9 ? '0':'')+String(today.getMonth()+1)+'-'+(today.getDate() < 9 ? '0':'')+String(today.getDate());
                    var Sdate = String(date.getFullYear())+'-'+(date.getMonth()+1 < 9 ? '0':'')+String(date.getMonth()+1)+'-'+(date.getDate() < 9 ? '0':'')+String(date.getDate());
                    document.getElementById('return').min = Sdate;
                    document.getElementById('departure').min = Stoday;

                    document.getElementById('departure').addEventListener('change',(d)=>{
                        document.getElementById('return').min = d.srcElement.value;
                    });

                </script>

                <button class="submit" name="submit" value="submit" type="submit"><img src="../img/search.png" alt="search" style="height:18px"></button>

            </div>
        </form>
    </div>
    <script>
        persons = 5;
        $( function() {
          $( "#slider-range" ).slider({
            range: true,
            min: 50,
            max: 5000,
            values: [ <?php echo $_POST['min'].",".$_POST['max'] ?> ],
            slide: function( event, ui ) {
              $("#min").html(ui.values[0])
              $("#max").html(ui.values[1])
            }
          });
        } );
    </script>


        
    <div class="main-container">
        <div class="left-item">
            <div style="text-align: center;padding: 1rem;background-color: white;border-radius: 30px;box-shadow: 0 0 8px 0 rgba(0, 0, 0, 0.09);">
                <form action="search.php" method="POST">
                    <div style="display:none;">
                        <input id="order" name="order" value="0">
                        <input name="flyingFrom" value=<?php echo "\"".$_POST['flyingFrom']."\"" ?>>
                        <input  name="flyingTo" value=<?php echo "\"".$_POST['flyingTo']."\"" ?> >
                        <input name="departure" value=<?php echo "\"".$_POST['departure']."\"" ?> >
                        <input name="return" value=<?php echo "\"".$_POST['return']."\"" ?> >
                        <input name="departureID" value=<?php echo "\"".$_POST['departureID']."\"" ?> >
                        <input name="returnID" value=<?php echo "\"".$_POST['returnID']."\"" ?>>
                        <input name="currency" value=<?php echo "\"".$_POST['currency']."\"" ?>>
                        <input type="number" id="min_submit" name="min" value=<?php echo "\"".$_POST['min']."\"" ?>>
                        <input type="number" id="max_submit" name="max" value=<?php echo "\"".$_POST['max']."\"" ?>>
                    </div>
                    <h3 class="left-title">Filtres</h3>
                    <hr>
                    <h3 class="left-title">Total Budget</h3>
                    <div style="padding-bottom: 2rem;position:relative; width:80%;margin: 0 auto;">
                        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                        <div id="slider-range"></div>
                        <p style="opacity: 0.7; position:absolute;bottom:0;left:0;">min: <span id="min"><?php echo $_POST['min']?></span> $</p>
                        <p style="opacity: 0.7; position:absolute;bottom:0;right:0;">max: <span id="max"><?php echo $_POST['max']?></span> $</p>
                    </div>
                    <br><br>
                    <hr>
                    <h3 class="left-title">Trip Direction</h3>
                    <div class="parent-radio-box">
                        <fieldset name="radio">
                            <label class="container"  id="label">Round Trip
                                <input type="radio"name="radio" id="radio1" value="roundTrip">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">One Way
                                <input type="radio" name="radio" id="radio2" value="oneWay">
                                <span class="checkmark"></span>
                            </label>
                        </fieldset>

                      
                    </div>
                    <hr>
                    <h3 class="left-title">Class</h3>
                    <div style="margin:0 0 2rem 2rem;">
                        <fieldset name="class"> 
                            <label class="container">Business Class
                                <input type="radio"  name="class" value="BC"  <?php echo ($_POST['class']=="BC" ? "checked=\"checked\"" : "") ?>>
                                <span class="checkmark"></span>
                            </label>
                            <label class="container"  style="margin:0 2.5rem;">Economy
                                <input type="radio"  <?php echo ($_POST['class']=="Economy" ? "checked=\"checked\"" : "") ?> name="class"  value="Economy">
                                <span class="checkmark"></span>
                            </label>
                        </fieldset>
                    </div>
                    
                            <input name="adult" id="adult_input" value=<?php echo "\"".$_POST['adult']."\"" ?>>
                            <input name="child" id="child_input" value=<?php echo "\"".$_POST['child']."\"" ?>>
                            <input name="infant" id="infant_input" value=<?php echo "\"".$_POST['infant']."\"" ?> >
                    <button class="submit-bottom" name="submit" value="submit" type="submit" style="position:relative"> <span class="submit-btn"></span> Submit</button>
                </form>
            </div>
        
        </div>

        <div class="right-item">
        

            <div class="main-container top-menu">
                <div class="dis">Ordred By:</div>
                <div id="selected-order" style="background:url(../img/price.png) no-repeat scroll 57px 29px">Price</div>
                <div style="background:url(../img/blackStar.png) no-repeat scroll 27px 29px;padding-left:41px;">Recommendation<div style="border-right: solid rgba(0, 0, 0, 0.1) 2px;" class="embedded-div"></div></div>
                <div style="background:url(../img/time.png) no-repeat scroll 37px 29px;border-bottom-right-radius:30px;border-top-right-radius:30px;">Travel Time</div>
            </div>
            <br><br>


            <?php
            function fun($s) {
                $hour = (int)substr($s,0,2);
                $minute = (int)substr($s,3,2);
                $minute += 25;
                $hour += $minute / 60 + 2;
                $hour%=24;
                $minute%=60;
                return ($hour>9 ? $hour : "0".$hour).":".($minute>9 ? $minute : "0".$minute);
            }
                if (!$conn) {
                    die("Connection failed!");
                }
                else{
                    
                    if( isset($_POST['submit']) && isset($_POST['currency']) && isset($_POST['class']) && isset($_POST['infant'])&& isset($_POST['child']) && isset($_POST['adult']) && isset($_POST['return']) && isset($_POST['departure'])&& isset($_POST['departureID'])&& isset($_POST['returnID'])&& isset($_POST['radio'])&& isset($_POST['min']) && isset($_POST['max']) ){

                        $currency = [[1,"$"],[1,"$"],[0.83,"£"],[2.74,"TND"]];
                        $_POST['min'] = (int)$_POST['min'];
                        $_POST['min'] = ($_POST['min']==0? 100 : $_POST['min']);
                        
                        
                        $_POST['max'] = (int)$_POST['max'];
                        $_POST['max'] = ($_POST['max']==0? 2000 : $_POST['max']);

                        $_POST['infant'] = (int)$_POST['infant'];
                        $_POST['child'] = (int)$_POST['child'];
                        $_POST['adult'] = (int)$_POST['adult'];
                        $_POST['adult'] = ($_POST['adult']==0? 1 : $_POST['adult']);
                        if($_POST['infant']+ $_POST['child'] + $_POST['adult'] > 6){
                            $_POST['infant'] = 0;
                            $_POST['child'] = 0;
                            $_POST['adult'] = 1;
                        }
                        
                        if($_POST['radio']!="oneWay" &&$_POST['radio']!="roundTrip"){
                            $_POST['radio'] = "oneWay";
                        }
                        if($_POST['class']!="BC" &&$_POST['class']!="Economy"){
                            $_POST['class'] = "Economy";
                        }
                        $_POST['departureID'] = (int)$_POST['departureID'];
                        $_POST['departureID'] = ($_POST['departureID']==0? 25 : $_POST['departureID']);

                        $_POST['returnID'] = (int)$_POST['returnID'];
                        $_POST['returnID'] = ($_POST['returnID']==0? 131 : $_POST['returnID']);

                        $_POST['departure']=  getDate(strtotime($_POST['departure'])); 
                        $_POST['return']=  getDate(strtotime($_POST['return'])); 
                        
                        $_POST['currency'] = (int)$_POST['currency'];
                        $_POST['currency'] = ( ($_POST['currency']<0 ||$_POST['currency']>3) ? 1 : $_POST['currency']);
                    
                        
                            
                            $sql="select * from flight
                            where fromAirport= ".$_POST['departureID']." 
                            AND toAirport = ".$_POST['returnID']."
                            AND cost <= ".$_POST['max']."
                            AND cost >= ".$_POST['min']."
                            order BY ABS(DATEDIFF(date, '".$_POST['departure']['year']."-".($_POST['departure']['mon']<9?"0".$_POST['departure']['mon']:$_POST['departure']['mon'] )."-".($_POST['departure']['mday']<9?"0".$_POST['departure']['mday']:$_POST['departure']['mday'])."'))
                            limit 10;";
                            $result =  mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);
                            if( $num > 0){
                                $i = 0;
                                $airport = array();
                                while($row = mysqli_fetch_assoc($result)){
                                    $airport[$row['toAirport']] = 0;
                                    $airport[$row['fromAirport']] = 0;
                                    $airline[$row['airline']] = 0;
                                    $res[$i++] = $row;
                                }    
                                $s = "(" ;    
                                foreach($airport as $key => $value){
                                    $s .= $key . ",";
                                }
                                $s[strlen($s)-1] = ")";

                                $sql = "select airportID,C.code as alpha
                                from airport A , country C 
                                where A.airportID in ". $s ."and C.countryID=A.countryID";
                                $result =  mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $airport[$row['airportID']] = $row['alpha'];
                                }
                                
                                $s = "(" ;    
                                foreach($airline as $key => $value){
                                    $s .= $key . ",";
                                }

                                $s[strlen($s)-1] = ")";
                                $sql = "select name, code,airlineID 
                                from airline
                                where airlineID in ".$s;

                                $result =  mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $airline[$row['airlineID']] = $row;
                                }
                                if($_POST['radio']=="oneWay"){
                                        for($i = 0;$i<$num;$i++){
                                            $date = getDate(strtotime($res[$i]['date']));
                                            echo  "<br><div class=\"top-menu main-container offer\" style=\"padding:0 1rem;cursor: pointer;height: 12rem;\" id=\"".$res[$i]['flightID']."\">
                                                    <container class=\"right-item\" id=\"sub_".$res[$i]['flightID']."\">
                                                        <div class=\"main-container\" style=\"padding: 1rem 2rem;top: 50%;transform: translateY(-50%);\">
                                                            <div style=\"position: relative; flex:20%;\">
                                                                <img src=\"../img/Tail/".$airline[ $res[$i]['airline'] ]['code'].".png\" class=\"flightIcon\" alt=\"".$airline[$res[$i]['airline']]['name']."\">
                                                                <p class=\"bottom-flightHr\">".$airline[$res[$i]['airline']]['name']."</p>
                                                            </div>
                                                            <div style=\"position: relative; flex:55%;\">
                                                                <div class=\"main-container mid-flight\">
                                                                    <div class=\"flex25\">
                                                                        <p class=\"Time\">".$res[$i]['time']."</p>
                                                                        <p class=\"count\" >".$airport[ $res[$i]['fromAirport'] ]."</p>
                                                                    </div>
                                                                    <div class=\"flex50\">
                                                                        <hr class=\"flightHr\">
                                                                        <p class=\"bottom-flightHr\">Nonstop</p>
                                                                    </div>
                                                                    <div class=\"flex25\">
                                                                        <p class=\"Time\">".fun($res[$i]['time'])."</p>
                                                                        <p class=\"count\">".$airport[ $res[$i]['toAirport'] ]."</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class=\"flex25\">
                                                                <p class=\"travelTime\">2h 25min</p>
                                                            </div>
                                                        </div>
                                                    </container>
                                                    <container class=\"left-item\" style=\"padding:0;\">
                                                        <div class=\"embedded-div\">
                                                            <p>".substr($date['weekday'],0,3).", ".substr($date['month'],0,3)." ".$date['mday']."</p>
                                                        </div>

                                                        <div style=\"position:relative;height: 45%;margin: 2rem 2rem 0 2rem;\">
                                                            <p style=\"position:absolute;bottom:0;left:0; opacity: 0.8;\">1 Person</p>
                                                            <p id=\"price_".$res[$i]['flightID']."\" style=\"position:absolute;bottom:-4px;right:0; font-size: 30px;\">".(int)($res[$i]['cost']*$currency[$_POST['currency']][0]).$currency[$_POST['currency']][1]."</p>
                                                        </div>
                                                        <span class=\"reserve\">Reserve Now</span>
                                                    </container>
                                                </div>
                                                ";
                                        
                                    }
                                }else{
                                    $sql="select * from flight
                                    where toAirport= ".$_POST['departureID']." 
                                    AND fromAirport = ".$_POST['returnID']."
                                    AND cost <= ".$_POST['max']."
                                    AND cost >= ".$_POST['min']."
                                    order BY ABS(DATEDIFF(date, '".$_POST['return']['year']."-".($_POST['return']['mon']<9?"0".$_POST['return']['mon']:$_POST['return']['mon'] )."-".($_POST['return']['mday']<9?"0".$_POST['return']['mday']:$_POST['return']['mday'])."'))
                                    limit 10;";
                                    $result1 =  mysqli_query($conn, $sql);
                                    $num1 = mysqli_num_rows($result1);
                                    if( $num1 > 0){
                                        $i = 0;
                                        $airport1 = array();
                                        while($row = mysqli_fetch_assoc($result1)){
                                            $airport1[$row['toAirport']] = 0;
                                            $airport1[$row['fromAirport']] = 0;
                                            $airline1[$row['airline']] = 0;
                                            $res1[$i++] = $row;
                                        }    
                                        $s = "(" ;    
                                        foreach($airport1 as $key => $value){
                                            $s .= $key . ",";
                                        }
                                        $s[strlen($s)-1] = ")";
        
                                        $sql = "select airportID,C.code as alpha
                                        from airport A , country C 
                                        where A.airportID in ". $s ."and C.countryID=A.countryID";
                                        $result1 =  mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_assoc($result1)){
                                            $airport1[$row['airportID']] = $row['alpha'];
                                        }
                                        
                                        $s = "(" ;    
                                        foreach($airline1 as $key => $value){
                                            $s .= $key . ",";
                                        }
        
                                        $s[strlen($s)-1] = ")";
                                        $sql = "select name, code,airlineID 
                                        from airline
                                        where airlineID in ".$s;
        
                                        $result1 =  mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_assoc($result1)){
                                            $airline1[$row['airlineID']] = $row;
                                        }


                                        $num = min($num1,$num);
                                        for($i = 0;$i<$num;$i++){
                                            $date = getDate(strtotime($res[$i]['date']));
                                            $date1 = getDate(strtotime($res1[$i]['date']));
                                            echo  "<br><div class=\"top-menu main-container offer\" style=\"padding:0 1rem;cursor: pointer;\" id=\"".$res[$i]['flightID']."_".$res1[$i]['flightID']."\">
                                                    <container class=\"right-item\" id=\"sub_".$res[$i]['flightID']."_".$res1[$i]['flightID']."\">
                                                        <div class=\"main-container\" style=\"padding: 1rem 2rem;\">
                                                            <div style=\"position: relative; flex:20%;\">
                                                                <img src=\"../img/Tail/".$airline[ $res[$i]['airline'] ]['code'].".png\" class=\"flightIcon\" alt=\"".$airline[$res[$i]['airline']]['name']."\">
                                                                <p class=\"bottom-flightHr\">".$airline[$res[$i]['airline']]['name']."</p>
                                                            </div>
                                                            <div style=\"position: relative; flex:55%;\">
                                                                <div class=\"main-container mid-flight\">
                                                                    <div class=\"flex25\">
                                                                        <p class=\"Time\">".$res[$i]['time']."</p>
                                                                        <p class=\"count\" >".$airport[ $res[$i]['fromAirport'] ]."</p>
                                                                    </div>
                                                                    <div class=\"flex50\">
                                                                        <hr class=\"flightHr\">
                                                                        <p class=\"bottom-flightHr\">Nonstop</p>
                                                                    </div>
                                                                    <div class=\"flex25\">
                                                                        <p class=\"Time\">".fun($res[$i]['time'])."</p>
                                                                        <p class=\"count\">".$airport[ $res[$i]['toAirport'] ]."</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class=\"flex25\">
                                                                <p class=\"travelTime\">2h 25min</p>
                                                            </div>
                                                        </div>
                                                        <hr style=\"width:85%;margin: 0 auto;\">
                                                        <div class=\"main-container\" style=\"padding: 1rem 2rem;\">
                                                            <div style=\"position: relative; flex:20%;\">
                                                                <img src=\"../img/Tail/".$airline1[ $res1[$i]['airline'] ]['code'].".png\" class=\"flightIcon\" alt=\"tunisair\">
                                                                <p class=\"bottom-flightHr\">".$airline1[$res1[$i]['airline']]['name']."</p>
                                                            </div>
                                                            <div style=\"position: relative; flex:55%;\">
                                                                <div class=\"main-container mid-flight\">
                                                                    <div class=\"flex25\">
                                                                        <p class=\"Time\">".$res1[$i]['time']."</p>
                                                                        <p class=\"count\" >".$airport1[ $res1[$i]['fromAirport'] ]."</p>
                                                                    </div>
                                                                    <div class=\"flex50\">
                                                                        <hr class=\"flightHr\">
                                                                        <p class=\"bottom-flightHr\">Nonstop</p>
                                                                    </div>
                                                                    <div class=\"flex25\">
                                                                        <p class=\"Time\">".fun($res1[$i]['time'])."</p>
                                                                        <p class=\"count\">".$airport1[ $res1[$i]['toAirport'] ]."</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class=\"flex25\">
                                                                <p class=\"travelTime\">2h 25min</p>
                                                            </div>
                                                        </div>
                                                    </container>
                                                    <container class=\"left-item\" style=\"padding:0;\">
                                                        <div class=\"embedded-div\">
                                                            <p>".substr($date['weekday'],0,3).", ".substr($date['month'],0,3)." ".$date['mday'] . "<span style=\"margin:0 5px\"> - </span> " . substr($date1['weekday'],0,3).", ".substr($date1['month'],0,3)." ".$date1['mday']."</p>
                                                        </div>

                                                        <div style=\"position:relative;height: 45%;margin: 2rem 2rem 0 2rem;\">
                                                            <p style=\"position:absolute;bottom:0;left:0; opacity: 0.8;\">1 Person</p>
                                                            <p id=\"price_".$res[$i]['flightID']."_".$res1[$i]['flightID']."\" style=\"position:absolute;bottom:-4px;right:0; font-size: 30px;\">".(int)(($_POST['class']=="BC" ? 1.5 : 1) * ($res[$i]['cost']+$res1[$i]['cost'])*$currency[$_POST['currency']][0]).$currency[$_POST['currency']][1]."</p>
                                                        </div>
                                                        <span class=\"reserve\">Reserve Now</span>
                                                    </container>
                                                </div>
                                                ";
                                        }

                                    }else{
                                        echo "<h2>No matching results were found</h2>
                                        <br>
                                        <p>Either no provider sites serve the locations you specified or no results are available for your chosen dates.</p>";
                                    }
                            }
                    }else{
                        echo "<h2>No matching results were found</h2>
                        <br>
                        <p>Either no provider sites serve the locations you specified or no results are available for your chosen dates.</p>";
                    }
                    }
                $_POST["currency"] = $currency[$_POST['currency']][1];
                }
        ?>
        </div>

    </div>            
    <div id="black">
    </div>
    <div id="white">

        <div id="holder" style="text-align: center;">
        </div>
        <br>
        <style>
            .text-label1{

                color: #463568;
            }
        </style>
        <form action="../email/emailConfirmation.php" method = "POST">
            <div  style="display:none;">
                <input name="adult" id="adult_input" value=<?php echo "\"".$_POST['adult']."\"" ?>>
                <input name="child" id="child_input" value=<?php echo "\"".$_POST['child']."\"" ?>>
                <input name="infant" id="infant_input" value=<?php echo "\"".$_POST['infant']."\"" ?> >
                <input type="text" id="cost" name="cost" value="0">
                <input type="text" name="class" value=<?php echo "\"".$_POST['class']."\"" ?>>
                <input id="ids" type="text" name="ids" value="-1">
            </div>
            <div class="main-container"  style="text-align: center; border-top:1px solid rgba(0, 0, 0, 0.1);padding:2rem 3rem;">
                <div class="flex50">
                    <label class="text-label text-label1" for="firstName">First Name</label>
                    <input class="input-form" type="text" name="firstName" placeholder="Enter your name" required>
                </div>
                <div class="flex50">
                    <label class="text-label text-label1" for="surname">Last Name</label>
                    <input class="input-form" type="text" name="surname" placeholder="Enter your surname" required>        
                </div>
                <div class="flex50">
                    <label class="text-label text-label1" for="email">Email</label>
                    <input class="input-form" id="email" type="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="flex50">
                    <label class="text-label text-label1" for="cemail" id="cemail-text">Confirme Your Email</label>
                    <input class="input-form" id="cemail" type="email" name="cemail" placeholder="Enter your email" required>
                </div>
            </div>
            <div style="border-top:1px solid rgba(0, 0, 0, 0.1)">
                <div class="main-container">
                    <h2 style="position:absolute;left:1rem;opacity:0.3;top:0.5rem;">Total:</h2>
                    <h2  id="price" style="display: inline-block; position:absolute;right:1rem;font-size: 1rem; transform: translateY(61%);">255$</h2>
                </div>
            </div>
            <div style="width:100%;text-align: center;margin-top:4rem">
                <span id="fake-postQuery">Send</span>
            </div>
            <button style="display:none" name="submit" value="submit" type="submit" id="postQuery"></button>
        </form>
    </div>
    <?php 
    
    echo "
            <script>
                setTimeout(() => {
                   document.getElementById(\"radio".($_POST['radio']=="oneWay" ? "2" : "1")."\").checked = true  
               }, 500);
             </script>
    ";

    ?>
    <script>
        <?php echo "total = ".$_POST['adult'] + $_POST['child']."
                str = \"".$_POST['adult']. " x Adult + ".$_POST['child']." x child + ".$_POST['infant']." x infant(free) = \" 
                 curr = \"".$_POST['currency']."\"";?>
        
        $(".offer").click((d)=>{
        document.getElementById("ids").value = String(d.currentTarget.id)
        console.log( String(d.currentTarget.id))
        $("#price").html( str + String(total * parseInt($("#price_"+ String(d.currentTarget.id)).html())) + curr  );
        $('#cost').val(parseInt($("#price_"+ String(d.currentTarget.id)).html()));
        $("#holder").html($("#sub_"+String(d.currentTarget.id)).html());

        $("#holder > div").css("top","0");
        $("#holder > div").css("transform","initial");
        $("#black").fadeIn();
        $("#white").fadeIn();
    
    })
        $("#black").fadeOut();
        $("#white").fadeOut();
        setTimeout(() => {
            $("#black").width(window.outerWidth);
            $("#white").width(window.outerWidth*0.6);
            $("#black").height(window.outerHeight);

        }, 500);
    </script>
    <script src="../js/flight.js"></script>
    <script src="../js/search.js" ></script>
</body>
</html>