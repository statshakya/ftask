<?php 
    
    include ('header.php'); 
    

    if($stm = $connect->prepare('SELECT* FROM detial')){
    $stm-> execute();
    
    $result = $stm->get_result();}
    
    if($stme = $connect->prepare('SELECT* FROM locations ')){
    $stme-> execute();
    
    $location = $stme->get_result();
   

    }
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
    <h1>detail management</h1>
    <table class="table tabel-strip table-hover">
        <tr>
            
            <th>name</th>
            <th>link</th>
        </tr>
        <?php while ($record = mysqli_fetch_assoc($result)) {?>
            <tr>
                <td><?php echo $record['title'];?></td>
                <td><?php echo $record['number'];?></td>
                <td><?php echo $record['address'];?></td>
                <td><a href="detail_edit.php?id=<?php echo $record['id'];?>">Edit</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <h2>Location</h2>
    <table class="table tabel-strip table-hover">
      <tr>
          <th>longitude</th>
          <th>latitude</th>
      </tr>
      <?php while ($map = mysqli_fetch_assoc($location)) {?>
      <tr>
        <td><?php echo $map['longitude'];?></td>
        <td><?php echo $map['latitude'];?></td>
        <td><a href="location_edit.php?id=<?php echo $map['id'];?>">Edit</a>
        </td>
      </tr>
        <?php } ?>
    </table>

    



</body>

</html>
