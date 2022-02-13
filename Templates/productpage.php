<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
?>

<body>

<div class="container">
    <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    include_once('defaults/pictures.php');
    ?>
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/categories">Categories</a></li>
            <li class="breadcrumb-item"><a href="/products">Products</a></li>
        </ol>

    </nav>
    <div class="row gy-3 ">
        <?php global $product; ?>
            <div class="col-sm-4 col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                            <img class="product-img img-responsive center-block" src="/img/<?= $product->picture?>"/>
                        <div class="card-title mb-3"><?=$product->name?> </div>
                        <div class="card-title mb-3"><?=$product->description?> </div>
                    </div>

                </div>
            </div>
            <br>
            
            <a href="/reviewpage/<?=$product->id?>">
       <button name="submit" type="submit" class="btn btn-primary">schrijf een Review</button>
    </a>

    </div>



    <?php
        $db = new PDO("mysql:host=localhost;dbname=healthone", "root", ""); 
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $reviews = $db->prepare("SELECT * FROM reviews ORDER BY id DESC");
        $reviews->execute();
        $result = $reviews->fetchAll(PDO::FETCH_ASSOC);
        echo "<table>";
        foreach($result as &$data) {
                echo "<h7>" . $data["date"] . "</h7>";
                echo "<h4>" . $data["sterren"] ." ★</h4>";
                echo "<h3>" . $data["review"] . "</h3>";               
                echo"<hr>";
        };
        echo "</table>";
    include_once('defaults/footer.php');

    ?>
</div>

</body>
</html>

