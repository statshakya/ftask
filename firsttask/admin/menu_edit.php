<?php

include('header.php');
secure();
if (isset($_POST['name'])) {
  if ($stm = $connect->prepare(' UPDATE menu set name= ?, link= ? WHERE id = ?')) {
    $stm->bind_param('ssi', $_POST['name'], $_POST['link'], $_GET['id']);
    $stm->execute();
    set_message("a user" . $_GET['id'] . "has been updated");

    //to show a feedback and a welcome message
    $stm->close();
     set_message("a post" . $_GET['id'] . "has been updated");
    header('location:menum.php');
    die();
  } else {
    echo 'could not update user statement';
  
   
  }
}
if (isset($_GET['id'])) {
  if ($stm = $connect->prepare(' SELECT * FROM menu WHERE id =?')) {
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
              <form method="GET">
                <div class="mb-3">
                  <label for="name" class="name">name</label>
                  <input type="text" class="form-control active" id="name" name="name" value="<?php echo $nam['name'] ?>">
                  <div class="mb-3">
                    <div class="mb-3">
                      <label for="link" class="link">link</label>
                      <input type="text" class="form-control" id="link" name="link" value="<?php echo $nam['link'] ?>">

                      <button type="submit" class="submit">update menu</button>
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