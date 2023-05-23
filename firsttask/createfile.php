<!DOCTYPE html>
<html lang="en">
    <?php 
        include('./includes/header.php');
        
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="createfile.php" method="GET">
        <label for="filename">file name</label>
        <input type="text" name="filename" id="filename">
        <input type="submit" value="geturl">

    </form>
   <?php
   if (isset($_GET['submit'])) {
  // Form has been submitted, call your function here
  new_tab();

}
function new_tab(){
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $filename = $_GET[""];
        $content= $_POST['content'];
        
        echo $filename;
        }
    else{
       echo"you cant even do this simple php";
    } 
}?>
</body>
</html> 