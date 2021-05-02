<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="../css/font.css">
<link rel="stylesheet" href="../css/head.css">
<link rel="stylesheet" href="../css/aboutus.css">
</head>
<body style="overflow: hidden;">
    
<?php require("../loading.php")?>
    
    <script src="../js/loading.js" charset="utf-8"></script>
    <script src="../js/about.js"></script>
    <!-- navbar -->
        
    <?php require("../navBar.php")?>
        <img  class="high" src="../img/about.png" alt="high" >
        <div class="flex-container">
            <div class="flex-item-left"> 
                <p class="flex-text">"High" is a travel agency based in Ariana. Since 2020, we've been helping people have a good time with our travel plan and best price offers.
                <br><br> As our clients face new challenges due to the global pandemic, we have created a cheaper and gentler alternative to the traditional agency model.
                <br><br> We are storytellers whose mission is to improve the experience of our customers while traveling with us</p>
            </div>
            <div class="flex-item-right"><img class="flex-img" src="../img/california.jpg" alt="" style="width: 90%;"></div>
        </div>
        
        <div class="who-we-are">
            <div class="flex-ft">
                <img class="icon" src="../img/planeIcon.png" alt="plane">
                <h1>Flights</h1>
                <p class="card-text">Fundamentally, your comfort is a promise: a comfortable and fast flight is the fulfillment. We align promise and happiness.</p>
            </div>
            <div class="flex-sd">
                <img class="icon" src="../img/hotel.webp" alt="hotel">
                <h1>Hotels</h1>
                <p class="card-text">We only recommend trusted hotels, we guarantee you a good time with the best Residence thanks to our countless offers.</p>
            </div>
            <div class="flex-td">
                <img class="icon" src="../img/plan.webp" alt="plan">
                <h1>Plans</h1>
                <p class="card-text">take advantage of our wonderful, inexpensive warranty plan that we offer. each period has its own discounts, stay tuned!</p>
            </div>
        </div>

        <div style="text-align: center;padding-top:3rem; padding-bottom:1rem;">
            <h1 style="color:#1e1e1e">Team Members</h1>
            <div class="team-container">
                <div class="ft-item">
                    <img style="height:70%" src="../img/aziz.png" alt="aziz">
                    <h3>Med Aziz Bel Haj Amor</h3>
                </div>
                <div class="sd-item">
                    <img style="height:70%" src="../img/hamza.png" alt="aziz">
                    <h3>Hamza Chamkhi</h3>
                </div>
            </div>

        </div>


</body>
</html>
