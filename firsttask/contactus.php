<?php
include('includes/header.php');

if(isset($_POST['sent'])){
    $uname = $_POST['uname'];    
    $email = $_POST['email'];    
    $subject = $_POST['subject'];    
    $msg = $_POST['msg'];
    
    if(empty($uname) || empty($email) || empty($subject) || empty($msg)){

    header('location:contactus.php?error');
    }
    else
    {
        $to= "projproj741@gmail.com,$email";
        if(mail($to,$subject,$msg,$email)){
            header("location:contactus.php?success");
        }
    }
}
if (isset($_POST['uname'])) {
  if ($stm = $connect->prepare(' INSERT INTO inquiry (uname,email,subject,msg) VALUES(?,?,?,?)')) {
    $stm->bind_param('ssss', $_POST['uname'],$_POST['email'],$_POST['subject'], $_POST['msg']);
    $stm->execute();
    set_message("a new menu" . $_SESSION['name'] . "has been addded");

    //to show a feedback and a welcome message
    header('location:contactus.php');
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
          <div class="row  justify-content-center">
            <div class="col-md-6">
              <h1>Edit detail</h1>
              <?php
              $msg="";
                if(isset($_GET['error'])){
                    $msg = "please fill in the blank ";
                    echo'<div class= "alert alert-danger">'.$msg.'</div>';
                }
                if(isset($_GET['success'])){
                    $msg = "your message has been sent";
                    echo'<div class= "alert alert-success">'.$msg.'</div>';
                }
              ?>
              <form method="post">
                <div class="mb-3">
                  <label for="uname" class="uname">name</label>
                  <input type="text" class="form-control" id="uname" name="uname" value="">
                  <div class="mb-3">
                    <div class="mb-3">
                      <label for="email" class="email">email</label>
                  <input type="email" class="form-control" id="email" name="email" value="">
                    </div>
                    <div class="mb-3">
                      <label for="subject" class="subject">subject</label>
                      <input type="text" class="form-control" id="subject" name="subject" value="">
                    </div>
                    <div class="mb-3">
                      <label for="msg" class="msg">inquiry</label>
                      <input type="text" class="form-control" id="msg" name="msg" value="">
                    </div>
                    <button type="submit" class="submit" name="sent">SEND</button>
              </form>
            </div>
          </div>
        </div>
</body>
</html>