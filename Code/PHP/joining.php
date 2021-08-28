<?php

session_start(); 
include "connection.php"; 

?>

<!DOCTYPE html>
<html>
    <head>
	    <title>SharpShark Network</title>
	    <link rel="stylesheet" type="text/css" href="/SharpShark/Code/CSS/homestyle.css">
        <link rel = "stylesheet" type = "text/css" href = "/SharpShark/Code/CSS/registrationstyle.css"> 
	    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <header>
            <h2 class = "JoiningSpecialTitle">Registering New Player..</h2>
            <img src = "/SharpShark/Images/RegistrationCoolGrafitti.png" width = "550px" style = "margin-top: 4%">
        </header>
        <main>
            <img class="BackgroundImage" src="/SharpShark/Images/RegistrationBackground.png">
	        <form method = "POST" action="#">
			        <div class = "JoiningInformation">
                        <input name = "Username" type = "text" placeholder = "Username"> <br> <br>
                        <input name = "Mail" type = "text" placeholder = "E-Mail">
                        <input name = "Password" type = "password" placeholder = "Password">
                        <input name = "RepeatedPassword" type = "text" placeholder = "RepeatPassword">
                        <input name = "DatePfBirth" type = "date" placeholder = "Date of Birth">
                        <div class = "JoinButton">
                            <button type = "submit" name = "JoinButton">Dive In</button>
                            <button name = "BackToHome">Float Out</button>
                        </div>
                    </div>
                    <?php
                        if(isset($_POST["JoinButton"])){ // Checking if the User has pressed the button for creating the account

                            // Collecting Users Inputed Information
                            $Username = $_POST["username"]; 
                            $EMailAdress = $_POST["Mail"]; 
                            $Password = $_POST["password"]; 
                            $RepeatedPassword = $_POST["RepeatedPassword"]; 
                            $DateOfBirth = $_POST["Birthday"];
                            
                            addUserToTheNetwork($Username, $EMailAdress, $Password, $RepeatedPassword, $DateOfBirth); // Creating an Account for the User

                        }
                        else if(isset($_POST["BackToHome"])) header("Location: /SharpShark/index.php"); // Getting User Back to the Home Page! 
                    ?>
            </form>
        </main>
        <footer>
            <h4 class = "Text" style = "text-align: right; padding: 5px; ">SharpShark Network DOO</h4>
        </footer>
            <script type="text/javascript" src="Code/JS/homefrontendmechanics.js"></script>
    </body>
</html>