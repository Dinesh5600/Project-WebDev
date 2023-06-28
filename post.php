
<?php

session_start();
  

if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true){
    header("location: signin.php");
    exit();
}



?>




<DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>post</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html">Art by you</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="post.php">Post</a></li>

                           
                            <li class="nav-item"><a class="nav-link" href="artists.php">Artists</a></li>
                            <li class="nav-item"><a class="nav-link" href="collections_t.php">Collections</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Signin</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                    <li><a class="dropdown-item" href="signin.php">Sign in</a></li>
                                    <li><a class="dropdown-item" href="signin.php?signout=true">Sign Out</a></li>
                                </ul>
                            </li>
                           
                           
                           
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                          <!--  <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div> -->
                         <!--   <h1 class="fw-bolder">Upload New Art</h1> -->
                          

                         <?php 

                         require_once 'serverlogin.php';

                         $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

                         if ($conn ->connect_error) {
                            die("Connection Failed! ". mysqli_connect_error());
                         }

                         mysqli_select_db($conn, $db_database) or die("Database Umavailable: " . mysql_error());

                         $name = "";
                         $title = "";
                         $theme = "";
                         $file_name = "";
                         $file_path = "";
                         $artistId = $_SESSION["AristId"];

                         if(isset($_POST['submit'])){
                           
                            if($_POST['submit'] == 'Submit'){
                           
                                $title = $_POST['artTitle'];
                                $theme = $_POST['theme'];
                                $file_name = $_POST['fileName'];
                                $file_path = "files/".$theme."/".$file_name;

                              


                                $myquery1 = "SELECT DISTINCT ThemeID FROM themes WHERE Theme = \"$theme\"";
                                $output1 = mysqli_query ($conn,$myquery1);
                                if($output1->num_rows > 0){

                                    while($row = $output1  -> fetch_assoc()){
                                        $artTheme = $row["ThemeID"];
                                    }
                                }else{

                                    $stmt = $conn->prepare("INSERT INTO themes (Theme, ThemeImage) VALUES (?,?)");
                                    $stmt ->bind_param("ss", $theme,$filePath);
                                    $stmt ->execute();
                                    $stmt ->close();

                                    $output1 = mysqli_query($conn,$myquery1);

                                    while($row = $output1 -> fetch_assoc()){
                                        $artTheme = $row("ThemeID");
                                    }
                                }
                                
                            }


                               
                    }
                        

                        $myquery = "SELECT * FROM Artists WHERE ArtistID = '$artistId'";
                        $output  = $conn->query($myquery);

                        if($output->num_rows > 0){

                            echo "hello";

                            while($row = $output->fetch_assoc()) {

                        

                                $artistId = $row["ArtistID"];
                                $name = $row["Name"];
                                $artist_image = $row["ArtistImage"];
                                $artist_type = $row["Type"];
                                $artist_decr = $row["Description"];


                            }

                            echo $name;

                            $displayPage = <<<HTML

            

                                    <h1 class="fw-bolder">$name Upload New Art</h1>
                            HTML;
                            echo $displayPage;

                        }


                       

                        

                        $statement = $conn->prepare("INSERT INTO ArtWork (Title, ArtImage, ThemeID, ArtistID) VALUES (?, ?, ?, ?)");
                        $statement->bind_param("ssii", $title, $file_path, $themeID, $artistId);

                        $statement->execute();


                        $sql = "INSERT INTO Artwork (Title, ArtImage, ThemeID, ArtistID ) VALUES ('$title', '$file_path', '$themeID', '$artistId')";
                                $statement->close();
                                $conn->close();


                         ?>

                        
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">


                            


                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- * * SB Forms Contact Form * *-->
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- This form is pre-integrated with SB Forms.-->
                                <!-- To make this form functional, sign up at-->
                                <!-- https://startbootstrap.com/solution/contact-forms-->
                                <!-- to get an API token!-->
                               
                                <form id="contactForm" action ="post.php" method ="post">
                                   
                                <!-- art title input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="artTitle" type="text" name="artTitle" />
                                        <label for="artTitle ">art title</label>
                                    </div>

                                    <!-- Theme input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="theme" type="text" name="theme" />
                                        <label for="theme">theme</label>
                                        
                                        
                                    </div>

                                    
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="filename" type="text" name="filename" />
                                        <label for="fileName">fileName</label>
                                        
                                    
                                    </div>
                                    
                                    
                                   
                                    
                                    <div class="d-grid"><button class="btn btn-primary btn-lg"  id="submitButton" name= "submit" type="submit" value = "Submit">Submit</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
 </main>
                    <!-- Contact cards-->
                    
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2022</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>