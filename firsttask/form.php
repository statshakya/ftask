<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="form.php" method="get">
        <label for="name">name</label>
        <input type="text" id="name" name="name">
        <input type="submit" value="submit">
    </form>
</body>
<?php
$url = $_SERVER['REQUEST_URI'];
     echo "URL: " . $url; 
//if (isset($_GET['name'])) {
 //   echo $_GET['name'];
//}
?>
</html>