<?php

include('header.php');
secure();
if (isset($_POST['user'])) {
  if ($stm = $connect->prepare(' UPDATE users set user= ?,email= ?,active=? WHERE id = ?')) {
    $stm->bind_param('sssi', $_POST['user'], $_POST['email'], $_POST['active'], $_GET['id']);
    $stm->execute();
    set_message("a user" . $_GET['id'] . "has been updated");

    //to show a feedback and a welcome message
    $stm->close();
    if (isset($_POST['password'])) {
      if ($stm = $connect->prepare(' UPDATE users set password = ? WHERE id = ?')) {
        $hashed = SHA1($_POST['password']);
        $stm->bind_param('si', $hashed, $_GET['id']);
        $stm->execute();
        $stm->close();
      } else {
        echo 'could not update passowrd';
      }
      set_message("a user" . $_GET['id'] . "has been updated");
      header('location:userm.php');
      die();
    } else {
      echo 'could not update user statement';
    }
  }
}
if (isset($_GET['id'])) {
  if ($stm = $connect->prepare(' SELECT * FROM users WHERE id =?')) {
    $stm->bind_param('i', $_GET['id']);
    $stm->execute();

    $result = $stm->get_result();
    $user = $result->fetch_assoc();

    if ($user) {

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
          <div class="row  justify-content-center">
            <div class="col-md-6">
              <h1>Edit User</h1>
              <form method="post">
                <div class="mb-3">
                  <label for="user" class="user">Username</label>
                  <input type="text" class="form-control active" id="user" name="user" value="<?php echo $user['user'] ?>">
                  <div class="mb-3">
                    <div class="mb-3">
                      <label for="email" class="email">E-mail</label>
                      <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email'] ?>">
                      <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                      </div>
                      <div class="mb-3">
                        <select name="active" class="form-select" id="active">
                          <option <?php echo ($user['active']) ? "selected" : ""; ?> value="1">active</option>
                          <option <?php echo ($user['active']) ? "" : "selected"; ?> value="0">inactive</option>
                        </select>
                      </div>
                      <button type="submit" class="submit">update user</button>
              </form>
            </div>
          </div>
        </div>

      </body>

      </html>
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