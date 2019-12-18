<!DOCTYPE html>
<html>
    <head>
        <title> SRDB Log In </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/w3.css">
        <link rel="stylesheet" type="text/css" href="logon.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body class="signin">
                    <?php
                        session_start();
                        if(isset($_ERROR['Error'])) {
                            echo"<div class='alert alert-danger'>";
                            echo "<strong>Error: </strong>";
                            echo $_ERROR['Error'] , "<br>";
                            // unset($_ERROR['Error']);
                        }
                    ?>
        <div class='container'>
            <div class='header' style="text-align: center;">
                <a href="DatabaseHome.html" aria-label="Homepage">
                    <img class="image" src='images/SRDBlogo.jpg' alt="SRDB Logo">
                </a>
            </div>
            <br>
            <h3 >Sign in to SRDB</h3>
            <div id='wrapper' class='wrapper w3-panel w3-border w3-round-xlarge' 
            style="border: 2px solid gray; padding: 30px; margin-right: 30%; margin-left: 30%;">
                <form action="connection.php" method="post" style="box-sizing: border-box; display: block;">
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" class="form-control" aria-label="Small" aria-describedBy="inputGroup-sizing-sm" name="username" style="margin-bottom:10px;" required placeholder="Enter Username" autofocus><br/>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <input type="password" class="form-control" aria-label="Small" aria-describedBy="inputGroup-sizing-sm" name="password" style="margin-bottom:10px;" required placeholder="Enter Password">
                    </div>
                    <input id="sign-in-button" class="btn btn-primary btn-lg btn-block" type="submit" name="Login" value="Sign In">
                </form>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
            