<?php
include('header.php');


if (isset($_POST['latitude'])) {
  if ($stm = $connect->prepare(' UPDATE locations set latitude= ?,longitude= ? WHERE id = ?')) {
    $stm->bind_param('ssi', $_POST['latitude'], $_POST['longitude'], $_GET['id']);
    $stm->execute();
    set_message("a user". "has been updated");

    //to show a feedback and a welcome message
    $stm->close();
      set_message("a user" . $_GET['id'] . "has been updated");
      header('location:pdetail.php');
      die();
    } else {
      echo 'could not update user statement';
    }
  }

if (isset($_GET['id'])) {
  if ($stm = $connect->prepare(' SELECT * FROM locations WHERE id =?')) {
    $stm->bind_param('i', $_GET['id']);
    $stm->execute();
    
    
    $location = $stm->get_result();
    $map = $location->fetch_assoc();

    if ($map) {

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
              <h1>Edit locations</h1>
              <form method="POST">
                <div class="mb-3">
                  <label for="latitude" class="latitude">latitude</label>
                  <input type="text" class="form-control active" id="latitude" name="latitude" value="<?php echo $map['latitude']?>">
                  <div class="mb-3">
                    <div class="mb-3">
                      <label for="longitude" class="longitude">longitude</label>
                      <input type="text" class="form-control" id="longitude" name="longitude" value="<?php echo $map['longitude']?>">

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
  echo "no detail selected";
  die();
}


?>