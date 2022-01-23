<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<?php
include_once('defaults/head.php');
?>

<body>

<div class="container">
    <?php
    include_once('defaults/header.php');
    include_once('defaults/pictures.php');
    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/contact">Contact</a></li>
        </ol>
    </nav>
    <h1>Openingstijden</h1>
    <?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=healthone","root", "");
        $query = $db->prepare ("SELECT * FROM times");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        echo "<table>";
        foreach ($result as &$data) {
            echo "<td>" . $data ["dag"] . " ";
            echo "<td>" . $data ["tijd"] . "<br>";
            echo "</tr>";
        }
        echo "</table>";
    } catch(PDOException $e) {
        die("Error!: " . $e->getMessage());
    }
    ?>
    <h2>Find us!</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1329.858406702439!2d4.33134515325898!3d51.99512845798715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5b44d61a108cf%3A0x9da6361d0a36ebd1!2sZuidhoornseweg%206A%2C%202625%20DV%20Den%20Hoorn!5e0!3m2!1snl!2snl!4v1634204330404!5m2!1snl!2snl" width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    <hr>
    <?php
    include_once('defaults/footer.php');

    ?>
</div>






<style type="text/css">
    table {
        wdith: 100px;
        border-collapse: collapse;
        border: 1px solid black;
        background-color: lightgray;
    }
    td {
        border: 1px solid black;
        width: 100px;
    }
    iframe {

    }
    h2 {
        margin-top: 50px;
    }

</style>
</body>
</html>

