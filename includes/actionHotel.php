
<?php


$conn = mysqli_connect("localhost","root","","TP_web");
if (!$conn) {
    die("Connection failed!");
}
else{
    if(isset($_POST['query'])){
        $queryText =$_POST['query'];

        $sql = "SELECT CC.cityName as cityname, C.name as countryname, C.code as alpha , CC.id as id
        FROM city CC, country C
        WHERE (
        C.name like '$queryText%' OR
        CC.cityName like '$queryText%') AND
        CC.countryID = C.countryID
        Limit 6
        ";

        $result =  mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if( $num > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<li>
                <div class='input-item input-item-active".$_POST['num']."'>
                    <div class='input-item-img'>
                        <img class='airportIcon' src='../img/buildIcon.png' alt='airplane'>
                    </div>
                    <div class='input-item-info' >
                        <h4>" . $row['cityname'] . ", " . $row['countryname'] . "</h4>
                    </div>
                    <div class='input-item-alpha'>
                        <p>".$row['alpha']."</p> 
                    </div>   
                    <span class='airportSpan'>".$row['cityname']."(".$row['alpha']."),".$row['id']."</span>
                </div>
            </li>";
            }         
        }else{
            echo "<li>
            <div class='input-item'>
                <div class='input-item-img'>
                    <img class='airportIcon' src='../img/searchBlack.png' alt='search'>
                </div>
                <div class='input-item-info' >
                    <h4> No result is found! </h4>
                </div>
                <div class='input-item-alpha'>
                <p> </p> 
                </div>
            </div>
        </li>";
        }
    }   
}

