<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../public/images/android-chrome-512x512.png">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="../public/css/navigation.css">
    <link rel="stylesheet" type="text/css" href="../public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/css/adminPanel.css">
    <link rel="stylesheet" type="text/css" href="../public/css/adminProducts.css">
    <title>Mobile Store</title>
</head>
<body>

    <?php 
        require_once('../inc/adminNavigation.php'); 
    ?>

    <div class="container-for-btn">
        <button class="menuBtn"><a href="addProduct.php">Add new phone</a></button>
    </div>

    <?php
        $sql = "SELECT gitara.gitara_id, gitara.ime, gitara.cena, tip.tip
                FROM gitara
                LEFT JOIN tip on gitara.tip_id = tip.tip_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $gitare = $stmt -> fetchAll();

        foreach($gitare as $gitara){
    ?>


    <div class="phone-box">
        <div class="phoneId">
            <h3 class="phone-header">Phone ID</h3>
            <h3 class="dinamicItem"><?php echo $gitara['gitara_id']?></h3>
        </div>
        <div class="phoneName">
            <h3 class="phone-header">Phone Name</h3>
            <h3 class="dinamicItem"><?php echo $gitara['ime']?></h3>
        </div>
        <div class="phoneId">
            <h3 class="phone-header">Phone Price</h3>
            <h3 class="dinamicItem"><?php echo $gitara['cena']?>€</h3>
        </div>
        <div class="phoneId">
            <h3 class="phone-header">Producer Name</h3>
            <h3 class="dinamicItem"><?php echo $gitara['tip']?></h3>
        </div>
        
        <div class="aktivnosti">
            <button class="edit"><a href="editProduct.php?gitara_id=<?php echo $gitara['gitara_id'] ?>">Edit</a></button>
            <button class="delete"><a href="deleteProduct.php?gitara_id=<?php echo $gitara['gitara_id'] ?>">Delete</a></button>
        </div>

    </div>


    <?php 
        }
        require_once('../inc/adminFooter.php');
    ?>
    <script src="public/js/hamburger.js"></script>

</body>
</html>