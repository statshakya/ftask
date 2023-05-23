
<?php
if($stme = $connect->prepare(' SELECT * FROM detial')){
  $stme->execute();

  $result = $stme->get_result();
}
  if($stm = $connect->prepare('SELECT * FROM locations')){
    $stm-> execute();
    
    $locations = $stm->get_result();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
  <?php while ($detail = mysqli_fetch_assoc($result)){?>
    <div class="row col-5">
      <div><?php echo $detail['title'];?>,</div>
      <div class=""><?php echo $detail['address'];?></div>
      <div class=""><?php echo $detail['number'];?></div>
      <div class=""><?php echo $detail['email'];?></div>
    </div>
    <?php }?>

    <?php while ($map = mysqli_fetch_assoc($locations)) {?>
    <div style="width: 100%">
    <iframe width="600" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
    src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?php echo $map['latitude'];?>,<?php echo $map['longitude'];?>&amp;t=&amp;z=20&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/sport-gps/">swimming watch</a></iframe></div>
    <div id="map" style="width: 100%; height: 400px;"></div>
      <?php } ?> 
</body>
</html>