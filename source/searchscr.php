<!--
Nicholas Brown, Duy Pham and Minh Vu
30032159 , 30038701 and ..
Movie Rad
-->

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Movie Search Page</title>
</head>



<body>

<nav class="navbar navbar-expand-sm bg-light">
            <a href="index.php" class="navbar-brand">
                <img src="movie-camera.svg" class="img-responsive" alt="Cite Logo" width="50" height="50">
            </a>
            <ul class="navbar-nav">
                <li class="nav-link">
                    <a href="topten.php">Top 10</a>
                </li>
                <li class="nav-link">
                    <a href="searchmovie.php">Movie Search</a>
                </li>

                <li class="nav-link">
                    <a href="membership.php">Membership Page</a>
                </li>
                <li class="nav-link">
                    <a href="employeelogin.php">Employee Login</a>
                </li>
            	<li class="nav-link">
                	<a href="adminlogin.php">Admin Login</a>
           		</li>
            </ul>
        </nav>



    <header>
        <div class="text-center pt-3">
            <h1>Movie List</h1>
        </div>
    </header>

    <div class="px-5 pt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Release Year</th>
                    <th scope="col">Score</th>
                    <th scope="col">Submit</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $title = $_POST["textsearchterm"];
                $genre = $_POST["genres"];
                $releaseyear = (int)$_POST["yearsearchterm"];
                $rating = $_POST["ratings"];
                $yearoperator = $_POST["greater_less_year"];


                require("connect.php");


                if ($yearoperator == "Higher_than") {
                    $results = $conn->query("SELECT ID, Title, Genre, ReleaseYear, Rating FROM `Movies_DVDs` WHERE (`Title` LIKE \"%$title%\" AND `Genre` LIKE \"%$genre%\" AND `Rating` LIKE \"%$rating%\" AND (`ReleaseYear` > $releaseyear))")->fetchAll(PDO::FETCH_ASSOC);
                }
                if ($yearoperator == "Lower_than") {
                    $results = $conn->query("SELECT ID, Title, Genre, ReleaseYear, Rating FROM `Movies_DVDs` WHERE (`Title` LIKE \"%$title%\" AND `Genre` LIKE \"%$genre%\" AND `Rating` LIKE \"%$rating%\" AND (`ReleaseYear` < $releaseyear))")->fetchAll(PDO::FETCH_ASSOC);
                }
                if ($yearoperator == "At_year") {
                    $results = $conn->query("SELECT ID, Title, Genre, ReleaseYear, Rating FROM `Movies_DVDs` WHERE (`Title` LIKE \"%$title%\" AND `Genre` LIKE \"%$genre%\" AND `Rating` LIKE \"%$rating%\" AND (`ReleaseYear` = $releaseyear))")->fetchAll(PDO::FETCH_ASSOC);
                }



                for ($i = 0; true; $i++) {
                    echo "<tr>";
					$id = $results[$i]['ID'];
                    echo "<td>" . $results[$i]['Title'] . "</td>";

                    echo "<td>" . $results[$i]['Genre'] . "</td>";

                    echo "<td>" . $results[$i]['Rating'] . "</td>";

                    echo "<td>" . $results[$i]['ReleaseYear'] . "</td>";
                
                    echo "<td> <form action=\"ratingscr.php\" method=\"POST\">
                        	 <select name=\"score\" id=\"score\">  
  							 <option value=\"select\">Select</option> 
  							 <option value=\"1\">1 Star</option>  
  							 <option value=\"2\">2 Star</option>  
  							 <option value=\"3\">3 Star</option>  
  							 <option value=\"4\">4 Star</option>
  							 <option value=\"5\">5 Star</option>   
							 </select></td>
							 <input type=\"hidden\" id=\"movieID\" name=\"movieID\" value=\"".$id."\">";
						
                    echo "<td><input type=\"submit\" value=\"Rate!\"></form></td>";

                    

                    echo "</tr>";

                    if ($results[$i + 1] == null) {
                        break;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>