<?php

include('header.php');
if (isset($_POST['title'])) {
  if ($stm = $connect->prepare(' UPDATE detial set title= ?,number= ?,address= ? WHERE id = ?')) {
    $stm->bind_param('sssi', $_POST['title'], $_POST['number'], $_POST['address'], $_GET['id']);
    $stm->execute();
    set_message("detial" . $_GET['id'] . "has been updated");

    //to show a feedback and a welcome message
    $stm->close();

    set_message("a post" . $_GET['id'] . "has been updated");
    header('location:pdetail.php');
    die();
  } else {
    echo 'could not update user statement';
  }
}


if (isset($_GET['id'])) {
  if ($stm = $connect->prepare(' SELECT * FROM detial WHERE id =?')) {
    $stm->bind_param('i', $_GET['id']);
    $stm->execute();

    $result = $stm->get_result();
    $post = $result->fetch_assoc();

    if ($post) {

?>
      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>detail edit</title>
      </head>

      <body>
        <div class="container mt-5">
          <div class="row  justify-content-center">
            <div class="col-md-6">
              <h1>Edit detail</h1>
              <form method="post">
                <div class="mb-3">
                  <label for="title" class="title">name of website</label>
                  <input type="text" class="form-control" id="title" name="title" value="<?php echo $post['title'] ?>">
                  <div class="mb-3">
                    <div class="mb-3">
                      <label for="number" class="number">number</label>
                  <input type="text" class="form-control" id=   "number" name="number" value="<?php echo $post['number'] ?>">
                    </div>
                    <div class="mb-3">
                      <label for="address" class="address">address</label>
                      <input type="text" class="form-control" id="address" name="address" value="<?php echo $post['address'] ?>">
                    </div>
                    <button type="submit" class="submit">update</button>
              </form>
            </div>
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