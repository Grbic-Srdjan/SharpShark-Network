<?php

session_start(); 
include "/SharpShark/Code/PHP/connection.php"; 

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
                        <input name = "Username" type = "text" placeholder = "Username" required> <br> <br>
                        <input name = "Mail" type = "text" placeholder = "E-Mail" required>
                        <input name = "Password" type = "password" placeholder = "Password" required>
                        <input name = "RepeatedPassword" type = "text" placeholder = "RepeatPassword" required>
                        <input name = "DatePfBirth" type = "date" placeholder = "Date of Birth" required>
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
                            
                            // Checking if the User is Eligible for Creating an Account
                            // checking if the passwords are matching.. 
                            if(strcmp($Password, $RepeatedPassword) != 0) echo "<h4 style = 'color: #83CDBB'> Repeated Password does not Match with First Password :~ ! </h4>" 
                            else if (False) echo "Something :D :D . "; // TODO:: Add Terms of Service and Check is User Old Enough
                            else{ // Now see if there already is the User with the Same Username
                                $DoesUserAlreadyExistQuery = "SELECT * FROM users WHERE username = '$Username' "; 
                                $SameUserQueryResult = mysqli_query($Link, $DoesUserAlreadyExistQuery) or die ("There was an Error. We are so so sorry, please please try again Later On ;) :) . "); 
                                // TODO:: Continue Building this Registration Mechanics until the End
                            }

                        }
                        else if(isset($_POST["BackToHome"])) header("Location: /SharpShark/index.php"); 
                    ?>
            </form>
        </main>
        <footer>
            <h4 class = "Text" style = "text-align: right; padding: 5px; ">SharpShark Network DOO</h4>
        </footer>
            <script type="text/javascript" src="Code/JS/homefrontendmechanics.js"></script>
    </body>
</html>