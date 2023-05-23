<?php
include("includes/header.php")
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

      $url = $_SERVER['REQUEST_URI'];
      echo "URL: " . $url;
      

      if ($stm = $connect->prepare(' SELECT * FROM posts')) {
        //$stm->bind_param('i', $_GET ['id']);
        $stm->execute();

        $result = $stm->get_result();
        
        while ($post = mysqli_fetch_assoc($result)) { ?>
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <a href="description.php? id=<?php echo $post['id'];?>" style="text-decoration: none;>
            <h2 class="card-title"><?php echo $post['title']; ?></h2>
          </a>
          <h6 class="card-subtitle mb-2 text-muted"><?php echo $post['date']; ?></h6>
          <p class="card-text"><?php echo $post['content']; ?></p>
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