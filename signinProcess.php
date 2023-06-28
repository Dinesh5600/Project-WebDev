<?php

    require_once 'serverlogin.php';
                                    
         $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
            if ($conn->connect_error) {
                
              die("Connection failed" . mysqli_connect_error());
            }
                              

            if($_POST['submit'] == 'Submit'){
                         
                $uname = $_POST['name'];
                $pass= $_POST['password'];

                // calling database for signin table 

             $myquery = "SELECT * FROM Signin WHERE Username='$uname'";
             $output = $conn->query($myquery);


        // using object oriented programing
  
            if($output->num_rows > 0){
                                                
            if($output = $conn->query($myquery)) {

                while ($rows = $output->fetch_assoc()) {

                    $userId= $rows['UserID'];
                    $artistId = $rows['ArtistID'];
                    $un = $rows['Username'];
                    $pw = $rows['Password'];
                 }
            }

                $conn->close();
                                               
                if(password_verify($pass, $pw)){

                   $_SESSION["username"] = $uname; 
                   $_SESSION["password"] = $pass;
                   $_SESSION['UserID'] = $userId;
                   $_SESSION['ArtistID'] = $artistId;
                   $_SESSION["login"] = true;

                  if(isset($_SESSION["login"]) && $_SESSION["login"] === true){


                                                       
                    header('Location: post.php');
                    exit();
                                                    
             }

                    exit();

     }
                                               
                 else{
                                                
                    $errorMessage = "Sorry password is incorrect, please try again";
                    $_SESSION['error'] = $errorMessage;
            }
    } 
                                            
                 else{

                                            
                   $errorMessage = "Username is incorrect, please try again";
                   $_SESSION['error'] = $errorMessage;
             }
    }
                                        
                                        
                                    
                                    
?>