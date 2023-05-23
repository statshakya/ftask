<?php

include('header.php');

//qury is changable with this method
/*if(isset($_POST['user'])){
$query = ' SELECT * FROM users WHERE
user = "' .$_POST['user'] . '"
AND
password ="' .SHA1($_POST['password']) . '"';
//var_dump($query);

$result = mysqli_query($connect, $query);

//var_dump($result);
$record = mysqli_fetch_assoc($result);
var_dump($record);
}*/
/*if(!isset($_SESSION['id']) ){
      header('location: dashboard.php');  
      die();
    }*/
if (isset($_POST['user'])) {
  if ($stm = $connect->prepare('SELECT* FROM users WHERE user = ? AND password = ? AND active = 1')) {
    $hashed = SHA1($_POST['password']);
    $stm->bind_param('ss', $_POST['user'], $hashed);
    $stm->execute();
    $result = $stm->get_result();
    $user = $result->fetch_assoc();
    var_dump($user);
    if ($user) {
      $_SESSION['id'] = $user['id'];
      $_SESSION['user'] = $user['user'];
      $_SESSION['email'] = $user['email'];

      set_message("you ahve succesfully logged in" . $_SESSION['user']);

      //to show a feedback and a welcome message
      header('location:dashboard.php');
      die();
    }
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content center">
      <div class="col-mt-6">
        <form method="post">
          <div class="mb-3">
            <label for="user" class="user">USER</label>
            <input type="text" class="form-control" id="user" name="user">
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="submit">sign in</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
<?php
//var_dump($_POST);
?>