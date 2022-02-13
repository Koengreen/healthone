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
    <form method="post">
<div class="mb-3">
    <label for="example1" class ="form-label">email address</label>
    <input type="text" class="form-control" name="email" id="example1">
</div>
<div class="mb-3">
    <label for="example2" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="example2">
</div>
<div class="mb-3">
    <label for="example2" class="form-label">First name</label>
    <input type="text" name="Fname" class="form-control" id="example2">
</div>
<div class="mb-3">
    <label for="example2" class="form-label">Last name</label>
    <input type="text" name="Lname" class="form-control" id="example2">
</div>

<button type="submit" name="submit" class="btn-primary">Submit</button>
</form>
<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fname = $_POST['Fname'];
    $lname = $_POST['Lname'];
    $query = $pdo->prepare("INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`, `role`) VALUES (NULL, '$email', '$password', '$fname', '$lname', 'member')");
    $query->execute();
    echo "<h3> registratie voltooid<h3>";
}
    include_once('defaults/footer.php');

    ?>
</div>

</body>
</html> 