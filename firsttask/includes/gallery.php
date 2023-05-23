<?php
include("../includes/header.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body><?php


      if ($stm = $connect->prepare(' SELECT * FROM images')) {
        //$stm->bind_param('i', $_GET ['id']);
        $stm->execute();

        $result = $stm->get_result();
        
        while ($post = mysqli_fetch_assoc($result)) { ?>
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $post['img_src']?>" class="card-img-top" " >
            <div class="card-body">
            <h5 class="card-title"><?php echo $post['img_name']?></h5>
            </div>
            </div>
      
  <?php    }
        $stm->close();
      } else {
        echo 'could not prepare statement';
      }

  ?>
 
</body>
</html>