<?php
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"eshop");
if($_SESSION["admin"] != 1){
	header("Location:login.php");
}
require("database.php");
$db = new db();

if($_POST) {
    $username= $_POST["username"];
    $password= $_POST["password"];

    if($username != "" && $password !="") {
        $add = $db->query("INSERT INTO login(username,password,usertype) VALUES(?,?,?)",array($username,$password,'admin'));
        if($add->affectedRows()) {
            print('<script>alert("Yönetici eklendi")</script>');
        }
    } else {
        print('<script>alert("Tüm alanları doldurunuz")</script>');
    }
    


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header class="header">
        <h1 class="genre">PHONE SHOP</h1>
        <nav class="nav">
    <ul>
                <li><a href="admin.php">Add Product</a></li>
                <li><a href="productList.php">Products</a></li>
                <li><a href="management.php">User Management</a></li><br>
                <li><a href="homework1.php">Web Page</a></li>
                <li><a href="logout.php">Logout</a></li>

            </ul>
        </nav>
</header>
<title>User Management</title>
<link rel="stylesheet" href="style.css">
		
        <div class="main">
            <div class="box round first">
                <h2>
                   Manage User</h2>
                <div class="block">
                    
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1">
					<tr>
					<td>Username</td>
					<td><input type="text" name="username"></td>
					</tr>
					<tr>
					<td>Password</td>
					<td><input type="text" name="password"></td>
                    </tr>
                    <tr>
					<td>User Type</td>
					<td>
					admin
					</td>
					</tr>
					<tr>
					<td colspan="2" align="center"><input type="submit" name="submit1" value="EKLE"></td>
				    </tr>
					
					
					</table>
					
					
                </form>
    </div>   </div>         
</div>
<div class="clear"></div>

</body>
</html>

