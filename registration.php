<!DOCTYPE html>
  <?php 
    require("database.php");
  
  ?>
<?php
if($_POST) {

  $db = new db();
  $user = $db->query("INSERT INTO login(username,password,userType)  VALUES(?,?,'user')",array($_POST["username"],$_POST["password"]));
  

}
?>
<html>
<header class="header">
        <h1 class="genre">PHONE SHOP</h1>
</header>
  <link rel="stylesheet" href="style.css">
  <head>
    <title>Registration Page</title>

  </head>
  <body>
    <div class="container">
      <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading-text-center">
            <h1>Registration Form</h1>
          </div>
          <div class="panel-body">
            <form action="registration.php" method="post">
              <div class="form-group">
                <label for="firstName">Username</label>
                <input
                  type="text"
                  class="form-control"
                  id="firstName"
                  name="username"
                />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                />
              </div>
              <Button type="submit">Register</Button>
              <button class="loginRedirect" onclick="window.location.href='login.php'">I have account, Login</button>
            </form>
          </div>
        </div>
      </div>
      <?php 
      if($_POST) {
        if($user->affectedRows() >0 ){
          echo '<script>alert("Registration completed, Redirecting")</script>';
          header("Refresh:2; url=login.php");
        }
      }
      ?>
    </div>
  </body>
  
</html>