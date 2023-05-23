<?php

include('header.php');
secure();

if (isset($_POST['user'])) {
  if ($stm = $connect->prepare(' INSERT INTO users (user,email,password,active) VALUES(?,?,?,?)')) {
    $hashed = SHA1($_POST['password']);
    $stm->bind_param('ssss', $_POST['user'], $_POST['email'], $hashed, $_POST['active']);
    $stm->execute();
    set_message("a new user" . $_SESSION['user'] . "has been addded");

    //to show a feedback and a welcome message
    header('location:userm.php');
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
        <h1>ADD User</h1>
        <form method="post">
          <div class="mb-3">
            <label for="user" class="user">Username</label>
            <input type="text" class="form-control" id="user" name="user">
            <div class="mb-3">
              <div class="mb-3">
                <label for="email" class="email">E-mail</label>
                <input type="text" class="form-control" id="email" name="email">
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                  <select name="active" class="form-select" id="active">
                    <option value="1">active</option>
                    <option value="0">inactive</option>
                  </select>
                </div>
                <button type="submit" class="submit">Add user</button>
        </form>
        <a href="user_add.php"> Add users</a>
      </div>
    </div>
  </div>

</body>

</html>