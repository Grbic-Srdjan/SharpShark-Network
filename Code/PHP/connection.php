<?php

define("SERVER", "127.0.0.1"); 
define("USER", "root"); 
define("DATABASE", "sharpsharknetwork"); 
define("PASSWORD", ""); 

function connectUserToTheNetwork($Username, $Password){ // This Function is used to Log In User to their Profile

    // Linking to the Database
    $Link = mysqli_connect(SERVER, USER, PASSWORD, DATABASE) 
    or die (mysqli_connect_error()); 

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

        header("Location: /SharpShark/Code/PHP/profile.php"); // Transporting User to its Profile
    
    }
    else { // Username does not Match with Password or maybe does not exist in the Database
        // Checking if the user even exist in the Database and telling user that user does not exist, if user does not exist or that user has entered just wrong password
        $DoesUserExistQuery = "SELECT * FROM users WHERE username = '$Username' "; 
        if(mysqli_query($Link, $DoesUserExistQuery) -> num_rows > 0) echo "<h4 style = 'color: #83CDBB'> You Entered Wrong Password for that User! </h4>";
        else echo "<h4 style = 'color: #83CDBB'> That user does not exist (Try to Enter different Username) ! </h4>";  
    }

}

function addUserToTheNetwork($Username, $EMailAdress, $Password, $RepeatedPassword, $DateOfBirth){
    // Linking to the Database
    $Link = mysqli_connect(SERVER, USER, PASSWORD, DATABASE) 
    or die (mysqli_connect_error());

    // Checking if the User is Eligible for Creating an Account
    // checking if the passwords are matching.. 
    if(strcmp($Password, $RepeatedPassword) != 0) echo "<h4 style = 'color: #83CDBB'> Repeated Password does not Match with First Password :~ ! </h4>"; 
    else if (False) echo "Something :D :D . "; // TODO:: Add Terms of Service and Check is User Old Enough
    else{ // Now see if there already is the User with the Same Username
        $DoesUserAlreadyExistQuery = "SELECT * FROM users WHERE username = '$Username' "; 
        $SameUserQueryResult = mysqli_query($Link, $DoesUserAlreadyExistQuery) or die ("There was an Error. We are so so sorry, please please try again Later On ;) :) . "); 
        if($SameUserQueryResult > 0) echo "<h4 style = 'color: #83CDBB'> There is already User with that username :{ ! Maybe try some other Username :] . </h4>"; 
        else{ // Now User is Eligable for Creating an Account
            $AccountCreationQuery = "INSERT INTO users VALUES(NULL, 0, '$Username', '$EMailAdress', '$Password', '$DateOfBirth')"; 
            $AccCreatedResult = mysqli_query($Link, $AccountCreationQuery) or die ("Failed to create you an Account :( . Plase try again Later On :) . "); 
            $NumberOfCreatedRows = mysqli_affected_rows($Link); 
            if($NumberOfCreatedRows > 0) { // Account is Created! 
                                        
                connectUserToTheNetwork($Username, $Password); // Transfering User to his newly created Account! 

            }
            else echo "<h4 style = 'color: #83CDBB'> Network Refused to enable you to Join. Sorry, we will talk to it. Just try later on and then she will be in beeter mood :D :D ! </h4>";  
        }
    }
}

?>