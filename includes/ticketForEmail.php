<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

$one3 ="<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>
    <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css\">
    <script src=\"https://code.jquery.com/jquery-1.12.4.js\"></script>
    <script src=\"https://code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>
    <link rel=\"stylesheet\" href=\"../css/font.css\">
    <title>Document</title>
</head>
<body>

    <style>
        body{
            position : relative;
        }
        #black{
            background-color: white;
            position: fixed;
            height:100vh;
            width : 100vw;
            z-index : -5;

        }
        #white{
            margin:1rem;
            position : absolute;
            left : 50%;
            transform: translateX(-50%);
            border-radius: 10px;
            background-color: #f7f7f7;
            width:700px;
            box-shadow: 0 0 16px rgba(0, 0, 0, 0.3);
            padding:1.5rem;
        }
        section{
            position:relative;
            height:100vh;
        }

        .card{
            border: solid rgba(0, 0, 0, 0.3)  1px;
            border-radius: 15px;
            padding:1rem;
        }
        .card-title{
            padding:10px;
            width:100%;
        }
        .airline-section{
            margin: 1rem 0;
            position:relative;
        }
        .flightIcon{
            height:2rem;
            display: inline-block;
            margin :0 1rem
        }
        .bottom-flightHr{
            display: inline-block;
            position:relative;
        }
        .Ycenter{
            top:50%;
            transform: translateY(-50%);
        }
        .class{
            position: absolute;
            right :0;
        }
        .separator{
            color:rgba(0, 0, 0, 0.5)
        }

        .dErF-time-graph {
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            align-items: center;
            width: 26px;
            margin-right: 16px;
        }

        .dErF-time-graph .dErF-axis {
        width: 1px;
        background-color: #e2e2e2;
        flex-grow: 1;
        }
        .dErF-time-graph .dErF-dot {
            height: 7px;
            width: 7px;
            border: 1px solid #e2e2e2;
            border-radius: 50%;
            margin-bottom: 6px;
        }
        .dErF-arrival-row {
        display: flex;
        }
        .dErF-time-info.dErF-arrival {
        margin-top: 12px;
        }
        .dErF-time-info.dErF-departure {
            margin-bottom: 12px;
        }
        .dErF-time-info {
        display: flex;
        flex-direction: column;
        font-size: 16px;
        line-height: 24px;
        }
        .dErF-time-info-text-wrapper {
            display: flex;
            align-items: flex-start;
        }
        .dErF-time {
            margin-right: 4px;
            min-width: 80px;
            flex: 1 1 auto;
            font-family: HelveticaNeue-Bold,'Helvetica Neue',Helvetica,Arial,sans-serif;
            font-weight: 600;
        }
        .dErF-location-block {
            display: flex;
            flex-flow: column;
            justify-content: flex-start;
            align-items: flex-start;
        }
        .dErF-station {
            font-family: 'HelveticaNeue','Helvetica Neue','Helvetica Neue',Helvetica,Arial,sans-serif;
            font-weight: 400;
            line-height: 24px;
            font-size: 16px;
        }
        .dErF-segment-body {
        display: flex;
        flex-direction: column;
    }
    .dErF-departure-row, .dErF-arrival-row {
        display: flex;
    }
    .dErF-duration-row {
        display: flex;
        align-items: center;
    }
    .dErF-duration-text {
        font-size: 12px;
        line-height: 16px;
        margin-right: 12px;
    }
    .dErF-eq-icon {
        height: 26px;
        width: 100%;
    }
    .dErF-segment-extras-wrapper {
        margin-left: 42px;
        margin-top: 4px;
    }
    .dErF-carrier-text {
        font-size: 12px;
        line-height: 16px;
        color: #5a6872;
    }
    .dErF-carrier-icon img {
        height: 20px;
        max-width: 100%;
    }
    .dErF-carrier-icon {
        height: 20px;
        width: 26px;
        margin-right: 16px;
        display: flex;
        justify-content: center;
    }
    .dErF-carrier-info {
        display: flex;
        align-items: center;
        padding-bottom: 12px;
    }
    .dErF-segment-info {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    .dErF-body {
        padding: 0 24px;
    }

    .dErF-segment {
        display: flex;
        flex-direction: row;
        padding: 16px 0;
    }
    .dErF-segment-amenities {
        align-self: flex-start;
        display: flex;
        flex-direction: column;
        width: 224px;
    margin: 0 0 0 24px;
    align-items: flex-end;
    }
    .dErF-cabin-class {
        font-size: 12px;
        line-height: 16px;
        margin-bottom: 8px;
    }
    .note{
        font-size: 14px;
        opacity:0.8;
    }
    .header{

        width:100%;
        text-align: center;

    }

    .logo {
    height: 3rem;
    margin: 0.5rem;
    margin-bottom: 1.5rem;
    }
    .halfpadding{
        padding : 0.5rem;
    }
    .btn{
        padding:1rem 2rem;
        color:white;
        background-color: #00d66c;
        position: absolute;
    left: 50%;
    transform: translateX(-50%);;
    border-radius: 7px;
    font-size: large;
    letter-spacing: 1px;
    }
    .btn:hover{
        background-color: #01c061;
    }
    .button-div{
        position:relative;
        margin: 3rem;
        height: 1rem;
    }
    </style>

    <section>
        <div id=\"black\">
        </div>
        <div id=\"white\">

            <div class=\"header\">
                <a href=\"../index.php\" class=\"click_logo\"><img class=\"logo\" src=\"../img/logo.png\" alt=\"\"></a>
            </div>
            <p class=\"halfpadding\">Please take a last look and confirm your reservation, this email is only available for 2 hours.
            </p>
            <div class=\"halfpadding\">
                <div style=\"display: inline-block;\">
                    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"13\" height=\"13\" viewBox=\"0 0 24 24\"><path d=\"M13.25 7c0 .69-.56 1.25-1.25 1.25s-1.25-.56-1.25-1.25.56-1.25 1.25-1.25 1.25.56 1.25 1.25zm10.75 5c0 6.627-5.373 12-12 12s-12-5.373-12-12 5.373-12 12-12 12 5.373 12 12zm-2 0c0-5.514-4.486-10-10-10s-10 4.486-10 10 4.486 10 10 10 10-4.486 10-10zm-13-2v2h2v6h2v-8h-4z\"/></svg>
                </div>
                <span class=\"note\">
                    This email is being sent because someone has requested a flight reservation, if you are not affected by this reservation, please ignore this email.
                </span>
            </div>
            <br>
";

$three3 = "
            <div class=\"button-div\">
                <a href=\"./checkReservation?key=".$key."\" class=\"btn\">confirm</a>
            </div>

        </div>
    </section>

</body>
</html>
";























function fun($s) {
    $hour = (int)substr($s,0,2);
    $minute = (int)substr($s,3,2);
    $minute += 25;
    $hour += $minute / 60 + 2;
    $hour%=24;
    $minute%=60;
    return ($hour>9 ? $hour : "0".$hour).":".($minute>9 ? $minute : "0".$minute);
}
    require("../database.php");

    if( isset($_POST['class']) && isset($_POST['submit']) &&  isset($_POST['firstName']) &&  isset($_POST['surname']) &&  isset($_POST['email']) &&  isset($_POST['cemail']) &&  isset($_POST['ids'])){

        $sql = "
        SELECT count(*) as num FROM reservation
        where ip_addr = \"". $_SERVER['REMOTE_ADDR']."\"
        AND date = \"". date("Y-m-d")."\"";
        
        $result = mysqli_query($con, $sql);

        $num = mysqli_num_rows($result);


        while($row = mysqli_fetch_assoc($result)){
            $num = $row['num'];
        }

        if($num >= 3){
            require('../includes/limits.php');
        }else{
            
            $sql = "
            select flightID,
            a.name as airlinename,
            a.code as airlinecode,
            date,
            time,
            fromAirport,
            toAirport
            from flight f, airline a
            where flightID in ($ids[0] ".( count($ids)>1 ? ", $ids[1] " : "" ).")
            AND a.airlineID = f.airline
            ";

            $result = mysqli_query($con, $sql);
            $num = mysqli_num_rows($result);

            if($num==0){
                die("please try to resubmit the form!");
            }else{
                
                while($row = mysqli_fetch_assoc($result)){
                    $flights[(int)($row['flightID']==$ids[0])] = $row;
                }

                $sql = "
                select a.city as city,a.name as airportname,airportID, c.code as code from airport a, country c
                WHERE airportID in (".$flights[1]['fromAirport'].",".$flights[1]['toAirport'].")
                AND  c.countryID = a.countryID;
                ";

                $result = mysqli_query($con, $sql);
                $num = mysqli_num_rows($result);

                if($num==0){
                    die("please try to resubmit the form!");
                }else{

                    while($row = mysqli_fetch_assoc($result)){
                        if($row['airportID']==$flights[1]['fromAirport']){
                            $from = $row;
                        }
                        else{
                            $to = $row;
                        }
                    }

                    $date = getDate(strtotime($flights[1]['date']));
                    $html = "
                    <div class=\"card\">
                        <h3 class=\"card-title\">Departure • ".substr($date['weekday'],0,3).", ".substr($date['month'],0,3)." ".$date['mday']."</h3>
                        <hr class=\"separator\">
                        <div class=\"dErF-body\">
                            <div class=\"dErF-segment js-segment\">
                                <div class=\"dErF-segment-info\">
                                    <div class=\"dErF-carrier-info\">
                                        <div class=\"dErF-carrier-icon\">
                                        <img src=\"../img/Tail/".$flights[1]['airlinecode'].".png\" alt=\"".$flights[1]['airlinename']."\">
                                        </div>
                                        <div class=\"dErF-carrier-text\">
                                        ".$flights[1]['airlinename']." </div>
                                    </div>
                                    <div class=\"dErF-segment-body\">
                                        <div class=\"dErF-departure-row\">
                                            <div class=\"dErF-time-graph\">
                                                <span class=\"dErF-dot\"></span>
                                                <span class=\"dErF-axis\"></span>
                                            </div>
                                            <div class=\"dErF-time-info dErF-departure\">
                                                <div class=\"dErF-time-info-text-wrapper\">
                                                    <span class=\"dErF-time\">
                                                    ".$flights[1]['time']."
                                                    </span>
                                                    <div class=\"dErF-location-block\">
                                                        <span class=\"dErF-station\">
                                                        ".$from['city']." ".$from['airportname']." (".$from['code'].")
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"dErF-duration-row\">

                                            <div class=\"dErF-time-graph\">
                                                <svg class=\"dErF-eq-icon\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 200 200\"><path d=\"M178.081 41.973c-2.681 2.663-16.065 17.416-28.956 30.221c0 107.916 3.558 99.815-14.555 117.807l-14.358-60.402l-14.67-14.572c-38.873 38.606-33.015 8.711-33.015 45.669c.037 8.071-3.373 13.38-8.263 18.237L50.66 148.39l-30.751-13.513c10.094-10.017 15.609-8.207 39.488-8.207c8.127-16.666 18.173-23.81 26.033-31.62L70.79 80.509L10 66.269c17.153-17.039 6.638-13.895 118.396-13.895c12.96-12.873 26.882-27.703 29.574-30.377c7.745-7.692 28.017-14.357 31.205-11.191c3.187 3.166-3.349 23.474-11.094 31.167zm-13.674 42.469l-8.099 8.027v23.58c17.508-17.55 21.963-17.767 8.099-31.607zm-48.125-47.923c-13.678-13.652-12.642-10.828-32.152 8.57h23.625l8.527-8.57z\"></path></svg>
                                            </div>
                                            <div class=\"dErF-duration-text\">
                                                2h 25m
                                            </div>
                                        </div>

                                        <div class=\"dErF-arrival-row\">
                                            <div class=\"dErF-time-graph\">
                                                <span class=\"dErF-axis\"></span>
                                                <span class=\"dErF-dot\"></span>
                                            </div>
                                            <div class=\"dErF-time-info dErF-arrival\">
                                                <div class=\"dErF-time-info-text-wrapper\">
                                                    <span class=\"dErF-time\">
                                                        ".fun($flights[1]['time'])."
                                                    </span>
                                                <div class=\"dErF-location-block\">
                                                    <span class=\"dErF-station\">
                                                    ".$to['city']." ".$to['airportname']." (".$to['code'].")
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"dErF-segment-extras-wrapper\">
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class=\"dErF-segment-amenities\">
                                    <div class=\"dErF-cabin-class js-farename\">
                                        ".$_POST['class']=="BC" ? "Business Class" : "Economy"."
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
                if( count($ids)>1){

                    $date = getDate(strtotime($flights[0]['date']));
                    $html .= "
                    <br>
                    <div class=\"card\">
                        <h3 class=\"card-title\">Departure • ".substr($date['weekday'],0,3).", ".substr($date['month'],0,3)." ".$date['mday']."</h3>
                        <hr class=\"separator\">
                        <div class=\"dErF-body\">
                            <div class=\"dErF-segment js-segment\">
                                <div class=\"dErF-segment-info\">
                                    <div class=\"dErF-carrier-info\">
                                        <div class=\"dErF-carrier-icon\">
                                        <img src=\"../img/Tail/".$flights[0]['airlinecode'].".png\" alt=\"".$flights[0]['airlinename']."\">
                                        </div>
                                        <div class=\"dErF-carrier-text\">
                                        ".$flights[0]['airlinename']." </div>
                                    </div>
                                    <div class=\"dErF-segment-body\">
                                        <div class=\"dErF-departure-row\">
                                            <div class=\"dErF-time-graph\">
                                                <span class=\"dErF-dot\"></span>
                                                <span class=\"dErF-axis\"></span>
                                            </div>
                                            <div class=\"dErF-time-info dErF-departure\">
                                                <div class=\"dErF-time-info-text-wrapper\">
                                                    <span class=\"dErF-time\">
                                                    ".$flights[0]['time']."
                                                    </span>
                                                    <div class=\"dErF-location-block\">
                                                        <span class=\"dErF-station\">
                                                        ".$to['city']." ".$to['airportname']." (".$to['code'].")
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"dErF-duration-row\">

                                            <div class=\"dErF-time-graph\">
                                                <svg class=\"dErF-eq-icon\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 200 200\"><path d=\"M178.081 41.973c-2.681 2.663-16.065 17.416-28.956 30.221c0 107.916 3.558 99.815-14.555 117.807l-14.358-60.402l-14.67-14.572c-38.873 38.606-33.015 8.711-33.015 45.669c.037 8.071-3.373 13.38-8.263 18.237L50.66 148.39l-30.751-13.513c10.094-10.017 15.609-8.207 39.488-8.207c8.127-16.666 18.173-23.81 26.033-31.62L70.79 80.509L10 66.269c17.153-17.039 6.638-13.895 118.396-13.895c12.96-12.873 26.882-27.703 29.574-30.377c7.745-7.692 28.017-14.357 31.205-11.191c3.187 3.166-3.349 23.474-11.094 31.167zm-13.674 42.469l-8.099 8.027v23.58c17.508-17.55 21.963-17.767 8.099-31.607zm-48.125-47.923c-13.678-13.652-12.642-10.828-32.152 8.57h23.625l8.527-8.57z\"></path></svg>
                                            </div>
                                            <div class=\"dErF-duration-text\">
                                                2h 25m
                                            </div>
                                        </div>

                                        <div class=\"dErF-arrival-row\">
                                            <div class=\"dErF-time-graph\">
                                                <span class=\"dErF-axis\"></span>
                                                <span class=\"dErF-dot\"></span>
                                            </div>
                                            <div class=\"dErF-time-info dErF-arrival\">
                                                <div class=\"dErF-time-info-text-wrapper\">
                                                    <span class=\"dErF-time\">
                                                        ".fun($flights[0]['time'])."
                                                    </span>
                                                <div class=\"dErF-location-block\">
                                                    <span class=\"dErF-station\">
                                                    ".$from['city']." ".$from['airportname']." (".$from['code'].")
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"dErF-segment-extras-wrapper\">
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class=\"dErF-segment-amenities\">
                                    <div class=\"dErF-cabin-class js-farename\">
                                        ".$_POST['class']=="BC" ? "Business Class" : "Economy"."
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    ";}
                }

            }



        }
        

        $return = $one3 . $html . $three3;


    }
    else{
        die("please resubmit the form");
    }
?>
