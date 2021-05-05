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
            padding: 0.5rem 1rem;
            color: white;
            background-color: #2fa5ed;
            border-radius: 7px;
            font-size: inherit;
            letter-spacing: 1px;
            border: solid 1px rgba(255,255,255,0.3);
            cursor: pointer;
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
            background-color:#1dd378 ;
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
        .key{
            margin:1rem;padding: 0.5rem;
            width: 70%;
            border-radius: 5px;
            border: solid 1px rgba(0,0,0,0.2);
            outline:none;
        }
    </style>

    <section>
        <div id="black">
        </div>
        <div id="white">

            <div class="notif">
                <div>
                    <img class="check" src="../img/check.png" alt="check">
                    <h1>success!</h1>
                </div>
                <div style="margin-bottom : 1rem">
                    <p>
                        you will receive an email within 2 minutes to confirm your reservation
                    </p>
                     <p>Please check the spam section, the email might be there!</p>
                </div>
            </div>
            <div style="text-align: center;">
                <form action="./confirm.php" method="GET">
                <input class="key" type="text" name="key" value="" placeholder="Key" autocomplete="off">
                <div style="display: block;"></div>
                <button class="btn" type="submit" name="submit" value="submit">submit</button>
                </form>
            </div>
        </div>
    </section>
    
</body>
</html>