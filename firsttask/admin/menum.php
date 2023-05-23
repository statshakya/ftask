<?php 
    
    include ('header.php'); 
    secure();

    if(isset($_GET['delete'])){
      if($stm = $connect->prepare(' DELETE FROM menu WHERE id= ?')){
      $stm->bind_param('i', $_GET['delete']);
      $stm-> execute();
      set_message("a post" . $_GET['delete']."has been deleted");

      //to show a feedback and a welcome message
      header('location:menum.php');
      die();
      
      $stm->close();
} 
else{
  echo'could not prepare statement';
}

    }

    if($stm = $connect->prepare('SELECT* FROM menu')){
    $stm-> execute();
    
    $result = $stm->get_result();
    
      var_dump($result->num_rows);

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
    <h1>POST management</h1>
    <table class="table tabel-strip table-hover">
      <tr>
          <th>ID</th>
          <th>name</th>
          <th>link</th>
      </tr>
      <?php while ($record = mysqli_fetch_assoc($result)) {?>
      <tr>
        <td><?php echo $record['id'];?></td>
        <td><?php echo $record['name'];?></td>
        <td><?php echo $record['link'];?></td>
        <td><a href="menu_edit.php?id=<?php echo $record['id'];?>">Edit</a>
            <a href="menum.php?delete=<?php echo $record['id'];?>">Delete</a>
        </td>
      </tr>
        <?php } ?>
    </table>
    <a href="menu_add.php"> Add menu</a>
    



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