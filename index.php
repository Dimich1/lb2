<?php
require_once __DIR__."/vendor/autoload.php";
require_once __DIR__ . "/db.php";

use MongoDB\Client;

$db = new \MongoDB\Client("mongodb://127.0.0.1/");
$db = $db->library->literatures;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MONGO</title>
    <script src="script.js"></script>
</head>
<body>
<?php
if (isset($_POST["publisher"])) {
    bookByPublisher($db, $_POST["publisher"]);
} elseif (isset($_POST["start"])) {
    bookByTime($db, $_POST["start"], $_POST["stop"]);
} elseif (isset($_POST["author"])) {
    bookByAuthor($db, $_POST["author"]);
}
?>
<br>
<form action="" method="post">
    <select name="publisher">
        <?php
        showPublisher($db);
        ?>
    </select>
    <input type="submit" value="Search"><br>
</form>
<br>
<form action="" method="post">
    <input name="start" type="date">
    <input name="stop" type="date">
    <input type="submit" value="Search"><br>
</form>
<br>
<form action="" method="post">
    <select name="author">
        <?php
        showAuthor($db);
        ?>
    </select>
    <input type="submit" value="Search"><br>
</form>
<div id="res"></div>
<button onclick="add()">Add</button>
<button onclick="get()">Get</button>
</body>
</html>
