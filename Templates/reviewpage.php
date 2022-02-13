
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
    global $product;
    ?>
<form method="POST" action="">
  <div class="form-group row">
    <label for="review" class="col-4 col-form-label">Review</label> 
    <div class="col-8">
      <textarea id="review" name="review" cols="40" rows="5" class="form-control"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label"></label> 
    <div class="col-8">
      <select id="select" name="select" class="custom-select">
        <option value="1star">1 Ster</option>
        <option value="2star">2 Sterren</option>
        <option value="3star">3 Sterren</option>
        <option value="4star">4 Sterren</option>
        <option value="5star">5 Sterren</option>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <br>
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

<?php
  if (isset($_POST['submit'])) {
    $review = $_POST['review'];
    $rating = $_POST['select'];
    
    echo "<h3> Het Review is verzonden </h3>";
    global $pdo;
    global $product;
    $currentId = 1;
    $query = $pdo->prepare("INSERT INTO reviews (id, review, date, sterren, product_id) VALUES (NULL, '$review', current_timestamp(), '$rating', '$currentId');");
    $query->execute();
  }
  

?>

    <hr>
    <?php
    include_once('defaults/footer.php');

    ?>
</div>

</body>
</html>

?>