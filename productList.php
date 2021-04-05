<?php
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"eshop");
if($_SESSION["admin"] != 1){
	header("Location:login.php");
}
require("database.php");
$db = new db();

if(isset($_GET["id"]) && $_GET["id"] >0){
    $id = $_GET["id"];
    $delete = $db->query("DELETE from product where id = ?",array($id));

}

$products = $db->query("SELECT * from product")->fetchAll();




?>
<!DOCTYPE html>
<html lang="en">
<head>
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
<title>Product List</title>
<link rel="stylesheet" href="style.css">
	
        <div class="main">
            <div class="box round first">
                <h2>
                   Product List</h2>
                <div class="block">
                    
					<form name="form1" action="" method="post" enctype="multipart/form-data">
                        <table border="1">
                            <tr>
                                <td>Image</td>
                                <td>Product Name</td>
                                <td>Category</td>
                                <td>Price</td>
                                <td>Remove</td>
                            </tr>
                            <?php 
                           
                            foreach($products as $product) {
                            ?>
                            <tr>
                                <td><img src="<?=$product['product_image']?>" width="25" alt=""></td>
                                <td><?=$product['product_name']?></td>
                                <td><?=$product['category']?></td>
                                <td><?=$product['product_price']?> ₺</td>
                                <td><a href="?id=<?=$product['id']?>">Delete</a></td>
                            </tr>

                            <?php } ?>

                        <tr>
                   
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
