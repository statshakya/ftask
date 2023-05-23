<?php 
    
    include ('header.php'); 
    secure();

    if(isset($_GET['delete'])){
      if($stm = $connect->prepare(' DELETE FROM images WHERE id= ?')){
      $stm->bind_param('i', $_GET['delete']);
      $stm-> execute();
      set_message("a post" . $_GET['delete']."has been deleted");

      //to show a feedback and a welcome message
      header('location:gallerym.php');
      die();
      
      $stm->close();
} 
else{
  echo'could not prepare statement';
}

    }

    if($stm = $connect->prepare('SELECT* FROM images')){
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
    <h1>gallery management</h1>
    <table class="table tabel-strip table-hover">
      <tr>
          <th>ID</th>
          <th>image</th>
          <th>image name</th>
          <th>Delete</th>
      </tr>
      <?php while ($record = mysqli_fetch_assoc($result)) {?>
      <tr>
        <td><?php echo $record['id'];?></td>
        <td><img src= "<?php echo $record['img_src'];?>"</td>
        <td><?php echo $record['img_name'];?></td>
        <td>
            <a href="gallerym.php?delete=<?php echo $record['id'];?>">Delete</a>
        </td>
      </tr>
        <?php } ?>
    </table>
    <a href="gallery_upload.php"> Add image</a>
    



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