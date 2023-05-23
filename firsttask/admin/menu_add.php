<?php

include('header.php');
secure();

if (isset($_POST['name'])) {
  if ($stm = $connect->prepare(' INSERT INTO menu (name,link) VALUES(?,?)')) {
    $stm->bind_param('ss', $_POST['name'], $_POST['link']);
    $stm->execute();
    set_message("a new menu" . $_SESSION['name'] . "has been addded");

    //to show a feedback and a welcome message
    header('location:menum.php');
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
        <h1>ADD menu</h1>
        <form method="post">
          <div class="mb-3">
            <label for="name" class="name">name</label>
            <input type="text" class="form-control" id="name" name="name">
            <div class="mb-3">
              <div class="mb-3">
                <label for="link" class="link">link</label>
                <input type="text" class="form-control" id="link" name="link">
              </div>
              <button type="submit" class="submit">Add link</button>
        </form>
        <a href="menu_add.php"> Add menu</a>
      </div>
    </div>
  </div>

</body>

</html>