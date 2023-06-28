<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Theme Collections</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">

            <!-- Navigation-->
            <!-- Ubdated the navigation bar with sign in sign out feature-->

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
            <!-- Header-->
            
            <!-- Features section-->
           
            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center">


  <?php

                                $theme = urldecode($_GET['title']);

                                require_once 'serverlogin.php';
                                                
                                $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                                            
                                if ($conn->connect_error) { 
                                    //using Obejct Oriented Proramming
                                    die("Connection failed!" . mysqli_connect_error());
                                }

                                $myquery = "SELECT ThemeID,Theme FROM Themes";
                                $result = mysqli_query ($conn,$myquery);
                                            
                                            

                                if ($result = $conn->query($myquery)) { 
                                    //query using Obejct Oriented Proramming

                                    while ($row = $result->fetch_assoc()) {
                                        //result stored in assoc array

                                       
                                        $themeId = $row["ThemeID"];
                                        $themes = $row["Theme"];
                                        

                                        if($theme == $themes){
                                            
                                            $displayPage=<<<HTML
                                                
                                            <h2 class="fw-bolder">$themes</h2>

                                        
                                            HTML;
                                            echo $displayPage;
                                            $theme_Id = $themeId;
                                            
                                        }

                                        
                                    }
                                }
                                $conn->close();
                                ?>

                            </div>
                        </div>
                     </div>
                </div>


                <div class="row gx-5">
                    
                    <?php
                            $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                                            
                            if ($conn->connect_error) { 
                                 //using Obejct Oriented Proramming
                                
                                 die("Connection failed!" . mysqli_connect_error());
                            }

                            $myqueryArtist = "SELECT * FROM Artists";
                            

                            $myqueryArtWork = "SELECT  * FROM Artwork";
                            
                            $result = mysqli_query ($conn,$myqueryArtist);
                            $result1 = mysqli_query ($conn,$myqueryArtWork);


                                            
                                            

                            if ($result = $conn->query($myqueryArtist)) {   

                                //query using Obejct Oriented Proramming

                                

                                while ($row = $result->fetch_assoc()) {     
                                    
                                    //result stored in assoc.array
                                    
                                
                                    $artistID = $row["Artist ID"];
                                    $artistName = $row["Name"];
                                    $artistImage = $row["ArtistImage"];
                                    $artistType = $row["Type"];
                                    $artistDescription = $row["Description"];

                                    

                                    

                                    if ($result1 = $conn->query($myqueryArtWork)) { 
                                        
                                        //query using Obejct Oriented Proramming
                                        
                                        while ($row = $result1->fetch_assoc()) {
                                            
                                            $artID = $row["ArtID"];
                                            $artTitle = $row["Title"];
                                            $artImage = $row["ArtImage"];
                                            $artThemeID = $row["ThemeID"];
                                            $artArtistID = $row["ArtistID"];
                                        
                                            if($theme_Id == $artThemeID && $artistID == $artArtistID){
                                                
                                                
                                                $displayPage=<<<HTML
                                                    
                                                    <div class="col-lg-4 mb-5">
                                                    <div class="card h-100 shadow border-0">
                                                    <img class="card-img-top" src="$artImage" alt="..." width="100" height="200"/>
                                                        <div class="card-body p-4">
                                                            
                                                            
                                                            <h5 class="fw-bolder"><a href = "aboutArtists.php?title=$artistName">$artistName</a></h5>
                                                            <div class="fst-italic text-muted">$artTitle</div>
                                                        </div>
                                    
                                                    </div>
                                                    </div>

                                            
                                                HTML;
                                                echo $displayPage;
                                            }

                                        
                                    }
                                }
                            }
                        }
                        $conn->close();
                            
                            
                            
                            
                    ?>
                    
                </div>
            </section>
        </main>

                    </section>

                </main>
                    <!-- Call to action-->


                    



                    
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
    </body>
</html>