<?php

include('header.php');
secure();

if (isset($_GET['title'])) {
  if ($stm = $connect->prepare(' INSERT INTO posts (title,author,content,description,date) VALUES(?,?,?,?,?)')) {
    $stm->bind_param('sssss', $_GET['title'], $_SESSION['id'], $_GET['content'], $_GET['description'], $_GET['date']);
    $stm->execute();
    set_message("a new user" . $_SESSION['title'] . "has been addded");

    //to show a feedback and a welcome message
    header('location:postm.php');
    die();

    $stm->close();
  } else {
    echo 'could not prepare statement';
  }
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
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1>ADD POST</h1>
        <form method="GET">
          <div class="mb-3">
            <label for="title" class="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
            <div class="mb-3">
              <div class="mb-3">
                <label for="content" class="content">Content</label>
                <input type="text" class="form-control" id="content" name="content">
            
              </div>
              <div class="mb-3">
                <textarea name="description" id="" cols="30" rows="10"></textarea>
              </div>

              <div class="mb-3">
                <label for="date" class="date">Date</label>
                <input type="date" class="form-control" id="date" name="date">
              </div>
              <button type="submit" class="submit">Add Post</button>
        </form>
        <a href="post_add.php"> Add POST</a>
      </div>
    </div>
  </div>

</body>

</html>