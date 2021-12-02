<!--
Nicholas Brown
30032159
Activity 3
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Rating Page</title>
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
            <h1>Rating</h1>
        </div>
    </header>
	<div class="px-5 pt-5 text-center">
    
    <?php
    //Select ID,AverageRating From Movies_DVDs WHERE AverageRating ORDER BY AverageRating Desc LIMIT 10
    require ("connect.php");
    $sql = "Select ID,AverageRating From Movies_DVDs WHERE AverageRating ORDER BY AverageRating Desc LIMIT 10";
    $smt = $conn->prepare($sql);
    $smt->execute();
    $result = $smt->fetchAll();
    
    for($x = 0; $x < 10; $x++)
    {
    	$sql = "INSERT INTO analytics(movieID, AverageRating)
        		VALUES(?,?)";
    	$stmt = $conn->prepare($sql);
    	$stmt->bindValue(1, $result[$x]['ID'], PDO::PARAM_INT);
    	$stmt->bindValue(2, $result[$x]['AverageRating'], PDO::PARAM_INT);
		$stmt->execute();
    }
    
    //get id and score
	$id = $_POST["movieID"];
	$score = $_POST["score"];
    if ($score == "select")
    {
    	echo "<p>Score is empty!</p>";
    } else {
	require ("connect.php");
	$sql = "SELECT Score, Counter FROM Movies_DVDs WHERE ID = $id";
	$smt = $conn->prepare($sql);
	if ($smt->execute())
	{
    	$result = $smt->fetch();
	}

	$score += $result["Score"];
	$counter = $result["Counter"] + 1;
	$average = $score / $counter;
	$sql = "UPDATE Movies_DVDs 
            SET 
            Score = '$score', 
            Counter = '$counter',
            AverageRating = '$average'
            WHERE ID = '$id'";
	$smt = $conn->prepare($sql);
	
    if ($smt->execute()){
    	echo "<h3>Score have been submitted! </h3>";
    }
	
    }
?>
    </div>

	

</body>
