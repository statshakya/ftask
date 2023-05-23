<?php

include('header.php');
secure();
if (isset($_POST['title'])) {
  if ($stm = $connect->prepare(' UPDATE posts set title= ?,content= ?,description= ?, date= ? WHERE id = ?')) {
    $stm->bind_param('ssssi', $_POST['title'], $_POST['content'], $_POST['description'], $_POST['date'], $_GET['id']);
    $stm->execute();
    set_message("a post" . $_GET['id'] . "has been updated");

    //to show a feedback and a welcome message
    $stm->close();

    set_message("a post" . $_GET['id'] . "has been updated");
    header('location:postm.php');
    die();
  } else {
    echo 'could not update user statement';
  }
}


if (isset($_GET['id'])) {
  if ($stm = $connect->prepare(' SELECT * FROM posts WHERE id =?')) {
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
        <title>post edit</title>
      </head>

      <body>
        <div class="container mt-5">
          <div class="row  justify-content-center">
            <div class="col-md-6">
              <h1>Edit post</h1>
              <form method="post">
                <div class="mb-3">
                  <label for="title" class="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="<?php echo $post['title'] ?>">
                  <div class="mb-3">
                    <div class="mb-3">
                      <label for="content" class="content">Title</label>
                  <input type="text" class="form-control" id="title" name="content" value="<?php echo $post['content'] ?>">
                    </div>
                    <div class="mb-3">
                      <textarea name="description" id="" cols="30" rows="10" <?php echo $post['description'] ?>></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="date" class="date">Date</label>
                      <input type="date" class="form-control" id="date" name="date" value="<?php echo $post['date'] ?>">
                    </div>
                    <button type="submit" class="submit">Add user</button>
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