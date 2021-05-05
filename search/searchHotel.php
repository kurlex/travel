<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
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
        <form action="searchHotel.php" method="POST">
            <div style="display: none;">
                <input type="number" value="" name="order">
                <input name="currency" value=<?php echo "\"".$_POST['currency']."\"" ?>>
                <input type="number" value=<?php echo "\"".$_POST['min']."\"" ?> name="min">
                <input type="number" value=<?php echo "\"".$_POST['max']."\"" ?> name="max">
                <input type="number" name="adult" id="adult_input" value= <?php echo "\"".$_POST['adult']."\"" ?>>
                <input type="number" name="child" id="child_input" value=<?php echo "\"".$_POST['child']."\"" ?>>
                <input type="number" name="infant" id="infant_input" value=<?php echo "\"".$_POST['infant']."\"" ?>>
            </div>


            <div style="text-align: center;">
                    <div class="flex50" style="display: inline-block;">
                        <label class="text-label" for="flyingFrom">Flying From</label>
                        <input type="text" id="search" class="search" name="location" placeholder="city..." value=<?php echo "\"".$_POST['location']."\"" ?> autocomplete="off">
                        <div class="input">
                            <ul id="input-list1">

                            </ul>
                        </div>
                        <input type="number" id="numSearch1" name="locationID" value=<?php echo "\"".$_POST['locationID']."\"" ?> style="display:none">
                    </div>
                <script src="../js/searchBarHotel.js"></script>
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
            min: 0,
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
                <form action="searchHotel.php" method="POST">
                    <div style="display:none;">
                        <input id="order" name="order" value="0">
                        <input  name="location" value=<?php echo "\"".$_POST['location']."\"" ?> >
                        <input name="departure" value=<?php echo "\"".$_POST['departure']."\"" ?> >
                        <input name="return" value=<?php echo "\"".$_POST['return']."\"" ?> >
                        <input name="locationID" value=<?php echo "\"".$_POST['locationID']."\"" ?> >
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
                    $currency = [[1,"$"],[1,"$"],[0.83,"£"],[2.74,"TND"]];
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
                    if(isset($_POST['submit']) && isset($_POST['currency']) && isset($_POST['infant'])&& isset($_POST['child']) && isset($_POST['adult']) && isset($_POST['return']) && isset($_POST['departure'])&& isset($_POST['locationID'])&& isset($_POST['min']) && isset($_POST['max']) ){

                        $_POST['min'] = (int)$_POST['min'];
                        $_POST['min'] = ($_POST['min']<0? 100 : $_POST['min']);
                        
                        
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
                        
                        
                        
                        $departure = getDate(strtotime($_POST['departure']));
                        $return = getDate(strtotime($_POST['return']));

                        $_POST['locationID'] = (int)$_POST['locationID'];
                        $_POST['locationID'] = ($_POST['locationID']==0? 25 : $_POST['locationID']);


                        $_POST['currency'] = (int)$_POST['currency'];
                        $_POST['currency'] = ( ($_POST['currency']<0 ||$_POST['currency']>3) ? 1 : $_POST['currency']);
                    
                                                
                            $sql="select c.name as countryname , cc.cityName as cityName  
                            from city as cc , country as c 
                            where cc.id = ".$_POST['locationID']."
                            AND cc.countryID = c.countryID";
                            $result =  mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);
                            if( $num != 0){
                                $cord = mysqli_fetch_assoc($result);
                                
                                $sql = "
                                select *
                                from hotels 
                                where cityID = ".$_POST['locationID']."
                                and cost <= ".$_POST['max']."
                                and cost >= ".$_POST['min']."
                                ";
                                $result =  mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $span ="";

                                    for($i = 0;$i<(int)$row['stars'];$i++){
                                        $span.="
                                                            <span>
                                                                <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" focusable=\"false\" aria-hidden=\"true\" role=\"img\" style=\"height:12px\">
                                                                    <path style=\"fill: #febb02;\" d=\"M23.555,8.729a1.505,1.505,0,0,0-1.406-.98H16.062a.5.5,0,0,1-.472-.334L13.405,1.222a1.5,1.5,0,0,0-2.81,0l-.005.016L8.41,7.415a.5.5,0,0,1-.471.334H1.85A1.5,1.5,0,0,0,.887,10.4l5.184,4.3a.5.5,0,0,1,.155.543L4.048,21.774a1.5,1.5,0,0,0,2.31,1.684l5.346-3.92a.5.5,0,0,1,.591,0l5.344,3.919a1.5,1.5,0,0,0,2.312-1.683l-2.178-6.535a.5.5,0,0,1,.155-.543l5.194-4.306A1.5,1.5,0,0,0,23.555,8.729Z\"></path>
                                                                </svg>
                                                            </span>
                                        ";
                                    }
                                    $free ="";
                                    if((int)$row['free']==1){
                                        $free ="
                                        
                                        <div style=\"color : green;font-size:14px;text-align: left;\">
                                        <b style=\"color : green\">FREE cancellation • No prepayment needed</b> <br> 
                                        You can cancel later, so lock in this great price today! 
                                        </div>
                                        ";
                                    }
                                    echo "
                                    <br>
                                    <div class=\"top-menu main-container offer\" style=\"padding:0 1rem;cursor: pointer;\" id=\"".$row['hotelID']."\">
                                        <container class=\"right-item\" id=\"sub_".$row['hotelID']."\">
                                            <div class=\"main-container\">
                                                <div style=\"position: relative;flex:40%\">
                                                    <img src=\"../img/".$row['img'].".webp\" alt=\"\" style=\"margin:1rem\">
                                                </div>
                                                <div style=\"position: relative;flex:60%;margin:1rem 0\">
                                                    <p style=\"text-align: left;font-size: 20px;\">
                                                    ".$row['hotelName']."
                                                        <span style=\"margin:0 10px;\">
                                                        ".$span."
                                                        </span>
                                                    </p>
                                                    <div style=\"width:100%;margin:1rem 0;font-size: 14px;opacity: 0.8;text-align: left;\">
                                                        <p>
                                                            ".$cord['cityName']."
                                                            <span style=\"width: 3px;height: 3px;display: inline-block;background-color: #bdbdbd;border-radius: 50%; margin: 0 2px 2px 2px;\"></span>
                                                            ".$cord['countryname']."
                                                        </p>
                                                    </div>
                                                    <p style=\"font-size:14px;margin-bottom: 10px;text-align: left;\">".$row['description']."
                                                    </p>
                                                    ".$free."
                                                </div>
                                            </div>
                                        </container>
                                        <container class=\"left-item\" style=\"padding:0;\">
                                            <div style=\"position: absolute;bottom: 1rem;left: 50%;transform: translateX(-50%);\">
                                                <div style=\"position: relative; flex:100%\">
                                                    <div class=\"main-container\">
                                                        <div style=\"position: relative; flex:50%;opacity: 0.8;height:37px\">
                                                            <div style=\"position: absolute;bottom:4px;left:50%;transform: translateX(-50%);width:100%\">
                                                                ".$_POST['adult'] + $_POST['child']." Person(s)
                                                            </div>
                                                        </div>
                                                        <div id=\"price_".$row['hotelID']."\" style=\"position: relative; flex:50%;font-size: 30px;\">".($_POST['adult'] + $_POST['child'])*(int)$row['cost']*((strtotime($_POST['return']) - strtotime($_POST['departure']))/60/60/24)*$currency[$_POST['currency']][0].$currency[$_POST['currency']][1]."</div>
                                                    </div>
                                                </div>
                                                <div style=\"position: relative; flex:100%;width:120%;transform: translateX(-10%);\" class=\"reserve\">
                                                    Reserve Now
                                                </div>
                                            </div>
                                            <div class=\"embedded-div\">
                                                <p>".substr($departure['weekday'],0,3).", ".substr($departure['month'],0,3)." ".$departure['mday'] . "<span style=\"margin:0 5px\"> - </span> " . substr($return['weekday'],0,3).", ".substr($return['month'],0,3)." ".$return['mday']."</p>
                                            </div>
                                        </container>
                                    </div>
                                    ";
                                }
                                
                               
                            }
                            else{
                                echo "<h2>No matching results were found</h2>
                                <br>
                                <p>Either no provider sites serve the locations you specified or no results are available for your chosen dates.</p>";
                            
                            }
                    }else{
                        echo "<h2>No matching results were found</h2>
                        <br>
                        <p>Either no provider sites serve the locations you specified or no results are available for your chosen dates.</p>";
                    }
                }
                $_POST["currency"] = $currency[$_POST['currency']][1];
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
        <form action="../email/emailConfirmationHotel.php" method = "POST">
            <div  style="display:none;">
                <input name="adult" id="adult_input" value=<?php echo "\"".$_POST['adult']."\"" ?>>
                <input name="child" id="child_input" value=<?php echo "\"".$_POST['child']."\"" ?>>
                <input name="infant" id="infant_input" value=<?php echo "\"".$_POST['infant']."\"" ?> >
                <input type="text" id="cost" name="cost" value="0">
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


    <script>


        <?php  echo "curr = \"".$currency[ (int)$_POST['currency'] ][1]."\"";?>
        
        $(".offer").click((d)=>{
        document.getElementById("ids").value = String(d.currentTarget.id)
        console.log( String(d.currentTarget.id))
        $("#price").html( String( parseInt($("#price_"+ String(d.currentTarget.id)).html())) + curr  );
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