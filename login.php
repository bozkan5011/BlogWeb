<!doctype html>
<?php
if($_POST){

session_start();
require("database.php");
$db = new db();
if(isset($_POST['Login'])){
$user=$_POST['user'];
$pass = $_POST['pass'];
$usertype=$_POST['usertype'];
$query = "SELECT * FROM `login` WHERE username='".$user."' and password = '".$pass."' and usertype='".$usertype."'";
$user = $db->query($query)->fetchArray();

if(@$user["username"] != "") {
 
    

    echo '<script>alert("Logged in successfully, redirecting")</script>';
    if($user["usertype"] == "admin"){
        $_SESSION["admin"] = 1;
        $_SESSION["id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        header("Refresh:1; url=admin.php");
    } else {
        $_SESSION["admin"] = 0;
        $_SESSION["id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        header("Refresh:1; url=homework1.php");
    }
}else {
    echo '<script>alert("Username or password is wrong!")</script>';
}
}
}

?>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
 
<body>
<header class="header">
        <h1 class="genre">PHONE SHOP</h1>
        
</header>
<div class="wrap">
    <h2>LOGIN</h2>
    <form method="post">
        <table>
        <tr>
            <td>Username:<input type="text" name="user" placeholder="enter your username"></td>
        
        </tr>
        <tr>
            <td>Password:<input type="password" name="pass" placeholder="enter your password"></td>
        </tr>
        <tr>
        <td>
            Select user type: <select name="usertype">
        <option value="admin">admin</option>
        <option value="user">user</option>
        </select>
        </td>
        </tr>
        <tr>
        <td><input type="submit" name="Login" value="Login"></td>
        </tr>
        </table>
    </form>
    
    <button onclick="window.location.href='registration.php'">Don't you have account, Register</button>
    
</div>
</body>

</html>