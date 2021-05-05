<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/commun.css">
    <link rel="stylesheet" href="../css/flight.css">
    <link rel="stylesheet" href="../css/searchBar.css">
    <title>Document</title>
</head>
<body>
    <script src="../js/loading.js"></script>
    <?php require("../navBar.php")?>
    <style>
        .quote{
            color:white;
            font-size: 56px;
            font-family: 'Product_sans_bold';
            margin:5rem 0 3rem;
        }
        @media screen and (max-width: 680px) {
            .quote{
                font-size:40px;
            }
        }
    </style>
    <div class="main-container">
        <div class="left-item commun-item">
           
        <div class="top-item">
                <div class="sub-top-item">
                    <img class="blueIcon" src="../img/hotelIconBlue.png" alt="hotel Icon" >
                    <p style="color:#273cbf">Book a Room</p>
                </div>
            </div>

            <form action="searchHotel.php" method ="POST">
                <div style="display: none;">
                    <input type="number" value="100" name="min">
                    <input type="number" value="2000" name="max">
                    <input id="radio1">
                    <input id="radio2">
                </div>
                    <div style="width:100%; margin-top:2rem;" class="main-container">
                        <div class="flex50" style="display: inline-block;">
                            <label class="text-label" for="flyingFrom">Location</label>
                            <input type="text" id="search" class="search" name="location" placeholder="City..." value="" autocomplete="off" required>
                            <div class="input">
                                <ul id="input-list1">

                                </ul>
                            </div>
                            <input type="number" id="numSearch1" name="locationID" value="-1" style="display:none">
                        </div>
                        <div style="display:block;width:20px;height:20px">
                        </div>
                        
                        <div class="flex50">
                            <label for="departure" class="text-label">CheckIn</label>
                            <input style="cursor:pointer;"class="search" type="date" id="departure" name="departure" placeholder="Select a date" required>
                        </div>
                        <div class="flex50">
                            <div style=position:absolute;right:0;>
                                <label for="return" class="text-label" id="return1">CheckOut</label>
                                <input style="cursor:pointer;" class="search" type="date" id="return" name="return" placeholder="Select a date" required>
                            </div>
                        </div>
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

                    </div>

                    
                    <div class="adj-container">
                        <p style="display :inline-block; margin-bottom: 15px;color:#273cbf;">Adults <span class="span">+12 years</span></p>
                        <br>
                        <div class="main-container">
                            <img src="../img/minus.png" alt="minus" onclick="minus('adult')" class="operators item1">
                            <p class="commun-item op-text" style="padding:0;" id="adult">0</p>
                            <input type="number" name="adult" id="adult_input" value="0">
                            <img src="../img/add.png" alt="add" class="operators item1" onclick="add('adult')">
                        </div>
                    </div>
                    <div class="adj-container">
                        <p style="display :inline-block; margin-bottom: 15px;color:#273cbf;">Childrens <span class="span">2-12 years</span></p>
                        <br>
                        <div class="main-container" style="width:113px;transform: translateX(3.5%);">
                            <img src="../img/minus.png" alt="minus" onclick="minus('child')" class="operators item1">
                            <p class="op-text commun-item" style="padding:0;" id="child">0</p>
                            <input type="number" name="child" id="child_input" value="0">
                            <img src="../img/add.png" alt="add" class="operators item1" onclick="add('child')">
                        </div>
                    </div>
                    <div class="adj-container">
                        <p style="display :inline-block; margin-bottom: 15px;color:#273cbf;">Infants <span class="span">0-2 years</span></p>
                        <br>
                        <div class="main-container">
                            <img src="../img/minus.png" alt="minus" onclick="minus('infant')" class="operators item1">
                            <p class="op-text commun-item"  style="padding:0;"id='infant'>0</p>
                            <input type="number" name="infant" id="infant_input" value="0">
                            <img src="../img/add.png" alt="add" class="operators item1" onclick="add('infant')">
                        </div>
                    </div>

                    <div id="caution"></div>
                    <p style="font-family: 'Product_sans_bold';color: #463568;margin: 0 0 1rem 2rem;">Currency</p>
                    <div class="custom-select" style="width:200px;margin-left: 2rem;">
                        <select name=" currency">
                            <option value="0">USD</option>
                            <option value="1">USD</option>
                          <option value="2">Euro</option>
                          <option value="3">TND</option>
                        </select>
                    </div>  
                    
                    <div>
                        <button class="submit" name="submit" type="submit">Submit</button>
                    </div>
              </form>
        </div>
        <div class="right-item  commun-item">
            <span id="triangle"></span>
            <div class="top-item" style="border-color: rgba(255, 255, 255,0.8);">
                <div class="sub-top-item" style="border-color: white;">
                    <img class="blueIcon" src="../img/planeIcon.png" alt="Plane Icon" >
                    <p style="color:white">Book a Flight</p>
                </div>
            </div>
            <p style="color:white;font-size: 46px;font-family: 'Product_sans_bold';margin:5rem 0 3rem;";>“The world is a book and those who do not travel read only one page.”</p>
            <p style="color: white;font-size: 16px;opacity: 0.8;letter-spacing: 2px;">Saint Augustine</p>
            <a class="button" href="./flight.php" >Book a ticket</a>
        </div>
    </div>
    <script src="../js/searchBarHotel.js"></script>
    <script src="../js/flight.js"></script>
</body>
</html>