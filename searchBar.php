
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./searchBar.css">
    <title>Document</title>
</head>
<body>
    
    <form action="result.php" method="POST">
        <div style="position:relative">
            <input type="text" id="search" class="search" name="search" placeholder="search..." value="">
            <div class="input">
                <ul id="input-list1">

                </ul>
            </div>
            <input type="number" id="numSearch" name="numSearch" value="-1" style="display:none">
        </div>
        <input type="submit" value="submit" name="submit">
    </form>
</body>
<script src="./searchBar.js"></script>
</html>
