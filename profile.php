<?php
session_start();
require("database.php");
$db = new db();

if($_POST) {
    $adress = $_POST["adress"];
    $phone = $_POST["phone"];
    $user = $db->query('UPDATE login set adress="'.$adress.'", phone="'.$phone.'" where id='.@$_SESSION["id"]);
}


$query = "SELECT * from login where id=".$_SESSION["id"];
$user = $db->query($query)->fetchArray();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  
<link rel="stylesheet" href="style.css" >

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
<header class="header">
        <h1 class="genre">PHONE SHOP</h1>
        <nav class="nav">
    <ul>
                <li><a href="homework1.php">Web Page</a></li>
                <li><a href="logout.php">Logout</a></li>

            </ul>
        </nav>
</header>
<div class="cont">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<div class="profile-userpic">
					<img src="https://static.change.org/profile-img/default-user-profile.svg" class="img-responsive" alt="">
				</div>
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
                    <li style="font-size:20px"id="news">Username: <?=@$user["username"]?> </li>
				</div>
                    <div class="profile-address">
                    <li style="font-size:20px"id="news">Adress: <?=@$user["adress"]?> </li>
					
					</div>
					<div class="profile-number">
                    <li style="font-size:20px"id="news">Number: <?=@$user["phone"]?> </li>
					
					</div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="wrap">
    <h2>Profile</h2>
    <form method="post">
        <table>
        <tr>
            <td>Adress:<input type="text" name="adress" value="<?=$user["adress"]?>" placeholder="enter your address"></td>
        
        </tr>
        <tr>
            <td>Mobile Number:<input type="text" name="phone" value="<?=$user["phone"]?>" placeholder="enter your mobile number"></td>
        </tr>
        <tr>
        <td><input type="submit" value="Update"></td>
        </tr>
        </table>
    </form>

 
</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
<br>
<br>
</body>
</html>