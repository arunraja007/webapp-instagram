<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Instagram OAuth Login</title>

<style type="text/css">
      * {
        margin: 0px;
        padding: 0px;
      }

      a.button {
        background: url(instagram-login-button.png) no-repeat transparent;
        cursor: pointer;
        display: block;
        height: 29px;
        margin: 50px auto;
        overflow: hidden;
        text-indent: -9999px;
        width: 200px;
      }

      a.button:hover {
        background-position: 0 -29px;
      }
    </style>
  </head>
  <body>
	<div style='text-align:center'>
	<h1>Login with Instragram</h1>
    <?php
session_start();
/*if (!empty($_SESSION['userdetails'])) 
{
	header('Location: home.php');
}*/
      require 'instagram.class.php';
      require 'instagram.config.php';
      
      // Display the login button
      $loginUrl = $instagram->getLoginUrl();
      echo "<a class=\"button\" href=\"$loginUrl\">Sign in with Instagram</a>";
    ?>

  </body>
</html>