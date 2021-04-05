<?php 
session_start();

require("database.php");
$db = new db();
$androidPhones = $db->query("select * from product where category=?",array('android'))->fetchAll();

$iosPhones = $db->query("select * from product where category=?",array('IOS'))->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Phone Shop</title>
    <link rel="stylesheet" href="homework1.css" />
    <script src="homework1.js"></script>
</head>
<body>
    <header class="header">
        <h1 class="genre">PHONE SHOP</h1>
         <nav class="nav nav">
            <ul>
                <li><a href="homework1.php">HOME</a></li>
                <li><a href="#">ABOUT</a></li>
                <li id="news">Hello <a href="profile.php"><?=@$_SESSION["username"]?> </a></li>
<li id="news"> <?php if(@$_SESSION["username"]) { ?> <a href="logout.php">LOGOUT</a> <?php }?>
<?php if(@!$_SESSION["username"]) { ?> <a href="login.php">Login</a> <?php }?>
</li><br><br>

<?php if(@$_SESSION["admin"] == 1){ ?> <li><a href="admin.php">Control Panel</a></li><?php }?>
            </ul>
        </nav>
        
    </header>
    <section class="container">
        <h2 class="android-header">ANDROID</h2>
        <div class="phones">
            <?php foreach($androidPhones as $android) { ?>
            <div class="phone">
                <span class="phone-title"><?=$android['product_name']?></span>
                <img class="phone-image" src="<?=$android['product_image']?>">
                <div class="phone-details">
                    <button class="btn btn-orange add-button" type="button">ADD TO BASKET</button>
                    <span class="phone-price"><?=$android['product_price']?> ₺</span>
                    
                </div>
            </div>
            <?php }?>
            
        </div>
    </section>
    <section class="container ">
        <h2 class="ios-header">IOS</h2>
        <div class="phones">
        <?php foreach($iosPhones as $ios) { ?>
            <div class="phone">
                <span class="phone-title"><?=$ios['product_name']?></span>
                <img class="phone-image" src="<?=$ios['product_image']?>">
                <div class="phone-details">
                    <button class="btn btn-orange add-button" type="button">ADD TO BASKET</button>
                    <span class="phone-price"><?=$ios['product_price']?> ₺</span>
                    
                </div>
            </div>
            <?php }?>
          
        </div>
    </section>
    <section class="container ">
        <h2 class="section-header">BASKET</h2>
        <div class="basket-row">
            <span class="basket-item basket-header basket-column">PHONE</span>
            <span class="basket-price basket-header basket-column">PRICE</span>
            <span class="basket-quantity basket-header basket-column">QUANTITY</span>
        </div>
        <div class="basket-items">
        </div>
        <div class="basket-total">
            <strong class="basket-total-title">BASKET TOTAL PRICE</strong>
            <span class="basket-total-price">0₺</span>
        </div>
        <button class="btn btn-orange btn-purchase" type="button">COMPLETE PURCHASE</button>
    </section>
    <footer class="footer">
            <h3>PHONE SHOP</h3>
    </footer>
</body>
</html>