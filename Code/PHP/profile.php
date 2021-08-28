<?php

session_start(); 
include "connection.php"; 

?>

<!DOCTYPE html>
<html>
<head>
	<title>SharpShark Network</title>
	<link rel="stylesheet" type="text/css" href="/SharpShark/Code/CSS/homestyle.css">
    <link rel = "stylesheet" type = "text/css" href = "/SharpShark/Code/CSS/profilestyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header>
        <div class = "AccountInfo">
            <h1 class = "YourSharpSharkName"><?php echo $_SESSION["username"] ?></h1>
        </div>
    </header>
    <main>
        <img src = "/SharpShark/Images/ProfileTempBackground.png" class = "BackgroundImage">
        <div class = "Texts">
            <h2>See what are your fellows up to!</h2>
            <div class = "TextsBox">
                <h3>You do not have any fellow sharks yet :(</h3> 
                <br> <br>
                <h4>You can find new fellows in <a href = "explore.php">Explore the Ocean</a> page! </h4>
            </div>
            <div class = "TextsButtons">
                <button name = "MoveLeft"><</button>
                <button name = "MoveRight">></button>
            </div>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>