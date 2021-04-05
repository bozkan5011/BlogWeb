<?php
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"eshop");
if($_SESSION["admin"] != 1){
	header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
	
		
        <div class="main">
            <div class="box round first">
                <h2>
                   Add Product</h2>
                <div class="block">
                    
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1">
					<tr>
					<td>Product Name</td>
					<td><input type="text" name="pnm"></td>
					</tr>
					<tr>
					<td>Product Price</td>
					<td><input type="text" name="pprice"></td>
					</tr>
					<tr>
					<td>Product Image</td>
					<td><input type="file" name="pimage"></td>
					</tr>
					<tr>
					<td>Product Category</td>
					<td>
					<select name="pcategory">
					<option value="android">Android</option>
					<option value="IOS">IOS</option>
					</select>
					</td>
					</tr>
					<tr>
					<td colspan="2" align="center"><input type="submit" name="submit1" value="upload"></td>
				</tr>
					
					
					</table>
					
					
					</form>
					</div>
            </div>
		</div>
		
</body>
</html>


<?php
if(isset($_POST["submit1"]))
{
   $v1=rand(1111,9999);
   $v2=rand(1111,9999);
   
   $v3=$v1.$v2;
   
   $v3=md5($v3);
   
   
   $fnm=$_FILES["pimage"]["name"];
   $dst="./product_image/".$v3.$fnm;
   $dst1="product_image/".$v3.$fnm;
   move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);



mysqli_query($link,"insert into product values('','$_POST[pnm]',$_POST[pprice],'$dst1','$_POST[pcategory]')");


}

?>					
					
					
                