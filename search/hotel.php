<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/commun.css">
    <link rel="stylesheet" href="../css/flight.css">
    <title>Document</title>
</head>
<body>
    <script src="../js/loading.js"></script>
    
    <?php require("../navBar.php")?>

    <div class="main-container">
        <div class="left-item  commun-item">
           
            <div class="top-item">
                <div class="sub-top-item">
                    <img class="blueIcon" src="../img/hotelIconBlue.png" alt="hotel Icon" >
                    <p style="color:#273cbf">Book a Room</p>
                </div>
            </div>

            <form>
                <div style="display: none;">
                    <input id="radio1">
                    <input id="radio2">
                    <input type="number" value="" name="min">
                    <input type="number" value="" name="max">
                </div>
                <br><br>
                    <div style="text-align: center;">
                        <label class="text-label" for="Location">Location</label>
                        <input class="input-form" list="Countries" name="Location" id="Location" placeholder="Choose a city" required>
                            <datalist id="Countries">
                                <option value="tunisia">
                                <option value="marocco">
                                <option value="algeria">
                                <option value="most">
                                <option value="post">
                            </datalist>
                        <br class="mobile">
                        <label for="-" class="text-label"></label>
                        <input id="none" class="input-form" style="opacity: 0; pointer-events: none;">
                        <br>
                        <label for="checkIn" class="text-label">Check In</label>
                        <input class="input-form" type="date" id="checkIn" name="checkIn" placeholder="Select a date" required>
                        <br class="mobile">
                        <label for="checkOut" class="text-label" id="checkOut1">Check Out</label>
                        <input class="input-form" type="date" id="checkOut" name="checkOut" placeholder="Select a date" required>
                        <script>
                            var today = new Date();
                            var date = new Date();
                            date.setDate(date.getDate()+1);
                            today.setDate(today.getDate());
                            var Stoday = String(today.getFullYear())+'-'+(today.getMonth()+1 < 9 ? '0':'')+String(today.getMonth()+1)+'-'+(today.getDate() < 9 ? '0':'')+String(today.getDate());
                            var Sdate = String(date.getFullYear())+'-'+(date.getMonth()+1 < 9 ? '0':'')+String(date.getMonth()+1)+'-'+(date.getDate() < 9 ? '0':'')+String(date.getDate());
                            document.getElementById('checkOut').min = Sdate;
                            document.getElementById('checkIn').min = Stoday;
                            document.getElementById('checkIn').addEventListener('change',(d)=>{
                                var dat = new Date(d.srcElement.value)
                                dat.setDate(dat.getDate()+1);
                                var Sdat = String(dat.getFullYear())+'-'+(dat.getMonth()+1 < 9 ? '0':'')+String(dat.getMonth()+1)+'-'+(dat.getDate() < 9 ? '0':'')+String(dat.getDate());
                                document.getElementById('checkOut').min = Sdat;
                            });
                        </script>

                    </div>
                    
                    <div class="adj-container">
                        <p style="display :inline-block; margin-bottom: 15px;color:#273cbf;">Adults <span class="span">+12 years</span></p>
                        <br>
                        <div class="main-container">
                            <img src="../img/minus.png" alt="minus" onclick="minus('adult')" class="operators item1">
                            <p class="commun-item op-text" style="padding:0" id="adult">0</p>
                            <input type="number" name="adult" id="adult_input" value="0">
                            <img src="../img/add.png" alt="add" class="operators item1" onclick="add('adult')">
                        </div>
                    </div>
                    <div class="adj-container">
                        <p style="display :inline-block; margin-bottom: 15px;color:#273cbf;">Childrens <span class="span">2-12 years</span></p>
                        <br>
                        <div class="main-container" style="width:113px;transform: translateX(3.5%);">
                            <img src="../img/minus.png" alt="minus" onclick="minus('child')" class="operators item1">
                            <p class="commun-item op-text" style="padding:0" id="child">0</p>
                            <input type="number" name="child" id="child_input" value="0">
                            <img src="../img/add.png" alt="add" class="operators item1" onclick="add('child')">
                        </div>
                    </div>
                    <div class="adj-container">
                        <p style="display :inline-block; margin-bottom: 15px;color:#273cbf;">Infants <span class="span">0-2 years</span></p>
                        <br>
                        <div class="main-container">
                            <img src="../img/minus.png" alt="minus" onclick="minus('infant')" class="operators item1">
                            <p class="commun-item op-text" style="padding:0" id='infant'>0</p>
                            <input type="number" name="infant" id="infant_input" value="0">
                            <img src="../img/add.png" alt="add" class="operators item1" onclick="add('infant')">
                        </div>
                    </div>
                    <div id="caution"></div>
                    
                    <p style="font-family: 'Product_sans_bold';color: #463568;margin: 0 0 1rem 2rem;"">Currency</p>
                    <div class="custom-select" style="width:200px;margin-left: 2rem;">
                        <select name=" Currency">
                            <option value="0">USD</option>
                            <option value="1">USD</option>
                          <option value="2">Euro</option>
                          <option value="3">TND</option>
                        </select>
                    </div>  
                    
                    <div>
                        <button class="submit" type="submit">Submit</button>
                    </div>
              </form>
        </div>
        <div class="right-item  commun-item">
            <span id="triangle"></span>
            <div class="top-item" style="border-color: rgba(255, 255, 255,0.8);">
                <div class="sub-top-item" style="border-color: white;">
                    <img class="blueIcon" src="../img/planeIcon.png" alt="Plane Icon" >
                    <p style="color:white">Book a flight</p>
                </div>
            </div>
            <p style="color:white;font-size: 46px;font-family: 'Product_sans_bold';margin:5rem 0 3rem;";>“The world is a book and those who do not travel read only one page.”</p>
            <p style="color: white;font-size: 16px;opacity: 0.8;letter-spacing: 2px;">Saint Augustine</p>
            <a class="button" href="./flight.php" >Book a ticket</a>
        </div>
    </div>
    <script src="../js/flight.js"></script>
</body>
</html>