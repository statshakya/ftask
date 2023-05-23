<?php

include('header.php');
secure();
if (isset($_POST['title'])) {
  if ($stm = $connect->prepare(' UPDATE settings set title= ?, favicon= ?,, meta_n= ? WHERE id = ?')) {
    $stm->bind_param('sssi', $_POST['title'], $_POST['favicon'], $_POST['meta_n'], $_GET['id']);
    $stm->execute();
    set_message("a user" . $_GET['id'] . "has been updated");

    //to show a feedback and a welcome message
    $stm->close();
     set_message("a post" . $_GET['id'] . "has been updated");
    header('location:settings.php');
    die();
  } else {
    echo 'could not update user statement';
  
   
  }
}
if (isset($_GET['id'])) {
  if ($stm = $connect->prepare(' SELECT * FROM settings WHERE id =?')) {
    $stm->bind_param('i', $_GET['id']);
    $stm->execute();
    
   
    $result = $stm->get_result();
    $nam = $result->fetch_assoc();

    if ($nam) {

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
              <h1>Edit menu</h1>
              <form method="POST">
                <div class="mb-3">
                  <label for="title" class="title">name</label>
                  <input type="text" class="form-control active" id="title" name="title" value="<?php echo $nam['title'] ?>">
                  <div class="mb-3">
                    <div class="mb-3">
                      <label for="favicon" class="favicon">favicon</label>
                      <input type="text" class="form-control" id="favicon" name="favicon" value="<?php echo $nam['favicon'] ?>">
                    <label for="meta_n" class="meta_n">meta author</label>
                      <input type="text" class="form-control" id="meta_n" name="meta_n" value="<?php echo $nam['meta_n'] ?>">

                      <button type="submit" class="submit">update</button>
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
}else {
  echo "no user selected";
  die();
}


?>