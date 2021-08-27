<?php

session_start(); 
include "Code/PHP/connection.php"; 

?>

<!DOCTYPE html>
<html>
<head>
	<title>SharpShark Network</title>
	<link rel="stylesheet" type="text/css" href="Code/CSS/homestyle.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header>
        <h1 class = "Title">Turn your Life into a Video Game! </h1>
    </header>
    <main>
    <img class="BackgroundImage" src="Images/BackgroundImage.png">
	<div class="container">
		<div class="LogoImage">
			<img src="Images/SharkCoolLogo.png">
		</div>
		<div class="login-content">
			<form method = "POST" action="#">
				<img src="Images/avatar.png">
				<h2 style = "color: #83CDBB">Ready?</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input name = "UsernameInputField" type="text" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input name = "PasswordInputField" type="password" class="input">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<button name = "PlayButton" type = "submit" class = "btn">Play</button>
                <button name = "JoinButton" class = "btn">Join the Network</button>
				<?php
					if(isset($_POST["PlayButton"])){ // Checking if the LogIn Button is Pressed

						// Getting Users Input
						$Username = $_POST["UsernameInputField"]; 
						$Password = $_POST["PasswordInputField"]; 

						// Making Query to Find that User in the Database
						$Query = "SELECT * FROM users WHERE username = '$Username' and password = '$Password' "; 
						$QueryResult = mysqli_query($Link, $Query) or die ("There was an Error :( . So Sorry. Please try again later on :) . "); 
						$DatabaseRows = $QueryResult -> num_rows; 
						if($DatabaseRows > 0){
							// User Founded! 
							
							// Storing all of the Users Information from Database into a variables
							$UserID = $DatabaseRows[0]; 
							$IsUserAdmin = $DatabaseRows[1]; 
							$EMailAdress = $DatabaseRows[3];  
							$DateOfBirth = $DatabaseRows[5]; 

							// Storing all of the Users Information from Variables to Sessions
							$_SESSION["id"] = $UserID;
							$_SESSION["admin"] = $IsUserAdmin; 
							$_SESSION["username"] = $Username; 
							$_SESSION["email"] = $EMailAdress; 
							$_SESSION["password"] = $Password; 
							$_SESSION["birthday"] = $DateOfBirth; 

							header("Location: Code/PHP/profile.php"); // Transporting User to its Profile
							

						}
						else { // Username does not Match with Password or maybe does not exist in the Database
							// Checking if the user even exist in the Database and telling user that user does not exist, if user does not exist or that user has entered just wrong password
							$DoesUserExistQuery = "SELECT * FROM users WHERE username = '$Username' "; 
							if(mysqli_query($Link, $DoesUserExistQuery) -> num_rows > 0) echo "<h4 style = 'color: #83CDBB'> You Entered Wrong Password for that User! </h4>";
							else echo "<h4 style = 'color: #83CDBB'> That user does not exist (Try to Enter different Username) ! </h4>";  
						}

					}
					else if(isset($_POST["JoinButton"])) header("Location: Code/PHP/joining.php"); // If LogIn is not pressed, checking if the button for creating a new ac is pressed
				?>
            </form>
        </div>
    </div>
    </main>
    <footer>
        <h4 class = "Text" style = "text-align: right; padding: 5px; ">SharpShark Network DOO</h4>
    </footer>
    <script type="text/javascript" src="Code/JS/homefrontendmechanics.js"></script>
</body>
</html>