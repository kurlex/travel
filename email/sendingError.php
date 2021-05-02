<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="../css/font.css">
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
        .btn{
            padding:1rem 2rem;
            color:white;
            background-color: #2fa5ed;
            position: absolute;
        left: 50%;
        transform: translateX(-50%);;
        border-radius: 7px;
        font-size: large;
        letter-spacing: 1px;
        }
        .btn:hover{
            background-color: #1192e3;
        }
        .button-div{
            position:relative;
            margin: 3rem;
            height: 1rem;
        }
        .notif{
            background-color:#ff4141 ;
            color : white;
            text-align: center;
            padding: 1rem;
        }
        .check{
            height : 3rem;
        }
        h1{
            color:white;
            margin-bottom:2rem;
        }
        p , b{
            color:white;
        }
    </style>

    <section>
        <div id="black">
        </div>
        <div id="white">

            <div class="notif">
                <div>
                    <img class="check" src="../img/false.png" alt="check">
                    <h1>Failed!</h1>
                </div>
                <div style="margin-bottom : 1rem">
                    <p>
                       An error has occured while attepting to send the email
                    </p>
                     <p>Please try again, if this error continues to display, please contact the administrator!</p>
                </div>
            </div>

            <div class="button-div">
                <a href="../search/search.php" class="btn">Booking Page</a>
            </div>

        </div>
    </section>
    
</body>
</html>