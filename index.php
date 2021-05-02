<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="./css/font.css">
<link rel="stylesheet" href="./css/index.css">
<link rel="stylesheet" href="./css/head.css">
</head>
<body>
  <div id="a4" style="position : fixed ; height : 100vh;width:100vw; z-index:99999;background-color: white;">
        <div id='i'class="loading">
        <img id="i1" class="img"src="./img/lod1.png" alt="">
        <img id="i2" class="img" src="./img/lod2.png" alt="">
        <img id="i3" class="img" src="./img/lod3.png" alt="">
  </div>
</div>
<script src="./js/loading.js" charset="utf-8"></script>
<script src="./js/index.js"></script>
    <section>
    <!-- navbar -->
    <div class="navbar">
        <a href="./index.php" class="click_logo"><img class="logo" src="./img/logo.png" alt=""></a>
        <a href="https://www.google.com/maps/d/u/0/embed?mid=150jI-U0v6-YUC3iDlg-f-ynR3_UGZMD7" class="textLink">Near me</a>
        <a href="./aboutus/aboutus.php" class="textLink">About us</a>
</div>
    <!-- grid  -->
        <div class="row">
            
            <!-- left side code -->
            <div class="main">
                <div class="list">
                  <a class="list-link" href="./search/hotel.php">Hotels</a>
                    <a class="list-link" href="./search/flight.php">Flights</a>
                    <a class="list-blind"  href="#" style="color:#fbfbfb">.</a>
                    <a class="list-blind" href="#">Our Offers</a>
                </div>
                <div style="width:100%;overflow: hidden; position: relative;">
                    <div class="uper_img" id="uper_img">
                        <p class="head">Tunisia, Douze</p>
                        <p class="desc">from 70$</p>
                    </div>
                    <div class="slider">
                      <figure>
                        <a href="#"><img id="a6" src="./img/hawaii.jpg" alt="Please refresh the page"></a>
                        <a href="#"><img src="./img/oasis.jpg" alt="Please refresh the page" ></a>
                        <a href="#"><img src="./img/india.jpg" alt="Please refresh the page"></a>
                        <a href="#"><img src="./img/java.jpg" alt="Please refresh the page"></a>
                        <a href="#"><img src="./img/hawaii.jpg" alt="Please refresh the page"></a>
                      </figure>
                    </div>
                </div>
            </div>
            
            <!-- right side code -->
            <div class="side">
                
                <div class="side_box">
                    <a href="#">
                        <div class="sub_side_box">
                            <h2>Destinations</h2>
                            <p>explore top travel deals</p>
                        </div>
                        <img src="./img/arrow.png" alt="" style="float: right;height: 30px; margin:58px 20px;">
                    </a>
                </div>
                
                <div class="uper_img">
                    <p class="head">Your Partner</p>
                    <p class="desc">for a better trip</p>
                </div>
                <div class="slider">
                  <figure>
                    <img id="a5" src="./img/travelingMan.webp" alt="Please refresh the page">
                    <img src="./img/wing.jpg" alt="Please refresh the page" >
                    <img src="./img/flyingPlane.jpg" alt="Please refresh the page">
                    <img src="./img/runway.jpg" alt="Please refresh the page" >
                    <img src="./img/travelingMan.webp" alt="Please refresh the page">
                  </figure>
                </div>
            </div>
        </div>
    </section>
<style>
  .slider{
    overflow:hidden;
  }
  .slider figure{
    position: relative;
    width:500%;
    left:0;
    margin:0;

  box-shadow: 0 10px 8px 0 rgba(0, 0, 0, 0.2), 0 12px 20px 0 rgba(0, 0, 0, 0.19);
  z-index:5;
    animation: 20s slider ease-in-out infinite;
  }
  .slider figure img{
    float : left;
    width:20%;
  }
  @keyframes slider { 0%{left:0;}5%{left:-100%;}25%{left:-100%;}30%{left:-200%;}50%{left:-200%;}55%{left:-300%;}75%{left:-300%;}80%{left:-400%;}100%{left:-400%;}
  }
</style>
<script>
        var i = 1;
        setInterval(() => {
            i = (i+1)%4;


            FadeOut("uper_img",45);
            setTimeout(() => {
              document.querySelector("#uper_img .head").innerHTML = head[i];
              document.querySelector("#uper_img .desc").innerHTML = desc[i];
              FadeIn("uper_img",45);
            }, 500);
            setTimeout(() => {
              
            }, 4);
        }, 5000);
</script>
</body>
</html>
