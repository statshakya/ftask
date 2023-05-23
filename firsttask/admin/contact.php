<?php 
    
    include ('header.php'); 
  
    if($stm = $connect->prepare('SELECT * FROM detial')){
    $stm-> execute();
    
    $result = $stm->get_result();
    if($result->num_rows){
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <h1>contact</h1>
    <table class="table tabel-strip table-hover">
      <?php while ($record = mysqli_fetch_assoc($result)) {?>
      <tr>
        <td><?php echo $record['id'];?></td>
        <td><?php echo $record['title'];?></td>
        <td><?php echo $record['number'];?></td>
        <td><?php echo $record['address'];?></td> 
      </tr>
        <?php } ?>
    </table>
    
  </body>

</html>
<?php    
    } else{
        echo'no users found';

    }
$stm->close();
} 
else{
  echo'could not prepare statement';
}
?>