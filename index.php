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
           		   		<input type="text" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<button name = "PlayButton" type = "submit" class = "btn">Play</button>
                <button name = "JoinButton" class = "btn">Join the Network</button>
				<?php
					if(isset($_POST["JoinButton"])) header("Location: Code/PHP/joining.php"); 
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