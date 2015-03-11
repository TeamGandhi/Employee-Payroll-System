<!DOCTYPE html>
<html>
    <head>
        <title>Team </title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
           <header id="header" class="page-header col-lg-12">
             <h1> <small>Employee Payroll System</small></h1>
         </header>
         </div>
        <?php

        session_start();

        if (isset($_POST["username"]) && isset($_POST["password"]))
        {
            include_once "php/users.php";

            if (Users::login($_POST["username"], $_POST["password"]))
            {
                $_SESSION["username"] = $_POST["username"];
            }
            else
            {
                echo "Invalid login credentials";
            }
        }

        if (isset($_SESSION["username"]))
        {
            include "MainPage.html";
        }
        else
        {
            include "login.html";
        }

        ?>
        <div class="container">
         <footer id="footer" class="footer col-lg-12">
            <ul class="list-inline">
                  <li><h4>Copyright: Team Gandhi</h4></li>
            </ul>
         </footer>
      </div>

    </body>
</html>
