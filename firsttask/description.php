<?php
include("includes/header.php");
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
    <?php


 
if (isset($_GET['id'])) {
  if ($stm = $connect->prepare(' SELECT * FROM posts WHERE id =?')) {
    $stm->bind_param('i', $_GET['id']);
    $stm->execute();

    $result = $stm->get_result();
    $post = $result->fetch_assoc();

    if ($post) {
?>

                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Title: <?php echo $post['title']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Date: <?php echo $post['date']; ?></h6>
                        <p class="card-text">content: <?php echo $post['content']; ?></p>
                        <h5>Description:</h5>
                        <p class="card-text"><?php echo $post['description']; ?></p>
                    </div>
                </div>





    <?php
       }
    $stm->close();
  } else {
    echo 'could not prepare statement';
  }
} else {
  echo "no user selected";
  die();
}
    ?>
</body>

</html>