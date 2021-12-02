<!--
Nicholas Brown,Duy Pham, Minh vu
30032159,30038701
Membership page
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Employee Page</title>
</head>



<body>
    <header>
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
        <div class="text-center pt-3">
            <h1>Employee Page</h1>
        </div>
    </header>





    <form action="adminscr.php" class="px-5 pt-5" method="POST">

        <div class="col-xs-3 form-group">
            <h4>Email:</h4>

            <input type="text" name="email" id="email" class="form-control" />
        </div>

        <div class="col-xs-3 form-group">
            <h4>Sign up for newsletter:</h4>
            <input type="checkbox" name="newsletterBox" value="true">

        </div>

        <div class="col-xs-3 form-group">
            <h4>Sign up for newsflash:</h4>
            <input type="checkbox" name="newsflashBox" value="true">
        </div>

        <div class="container row mx-1 mt-1 pl-4">
            <input type="submit" value="Update">
        </div>

    </form>
    <div class="px-5 pt-5">
        <?php include "clientlist.php"; ?>
    </div>
</body>