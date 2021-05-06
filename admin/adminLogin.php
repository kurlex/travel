<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
</head>


<body >

    <style>
        <?php 
        if(isset($WA)){
            echo "
            .WA{
                background-color : #e8334b !important;
            }
            ";
        }
        ?>
    </style>
    <section>

    <div class="main">
        <div class="header WA">
            <h1><?php 
                if(isset($WA)){
                    echo "Wrong Login or Password";
                }
                else{
                    echo "LogIn";
                }                
                ?></h1>
        </div>
        
        <form action="admin.php" method="POST" class="form">
            <div class="div">
            <label for="login"> 
                LogIn
            </label>
            <input type="text" name="login" id="login" required>
            </div>
            <div class="div">

            <label for="pwd">Password</label>
            <input type="password" name="pwd" id="pwd">
            </div>
            <div class="div">

            <button type="submit" name="submit" value="submit" class="btn">submit</button>
            </div>
        </form>
    </div>

    </section>
</body>
</html>