<?php
/*$to = "statshakya@gmail.com";
$subject = "test mail";
$message = "hello dodo";
$from ="templehousenp@gmail.com";
$headers= "From : $from";

mail($to , $subject, $message, $headers);
echo"mail sent";*/

if(isset($_POST['sent'])){
    $uname = $_POST['uname'];    
    $email = $_POST['email'];    
    $subject = $_POST['subject'];    
    $msg = $_POST['msg'];
    
    if(empty($uname) || empty($email) || empty($subject) || empty($msg)){

        header('location:email.php?error');
    }
    else
    {
        $to= "statshakya@gmail.com";
        if(mail($to,$subject,$msg,$email)){
            header("location:email.php?success");
        }
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
                  <label for="uname" class="uname">uname</label>
                  <input type="text" class="form-control" id="uname" name="uname" value="uname">
                  <div class="mb-3">
                    <div class="mb-3">
                      <label for="email" class="email">email</label>
                  <input type="email" class="form-control" id="email" name="email" value="email">
                    </div>
                    <div class="mb-3">
                      <label for="subject" class="subject">subject</label>
                      <input type="text" class="form-control" id="subject" name="subject" value="subject">
                    </div>
                    <div class="mb-3">
                      <label for="msg" class="msg">subject</label>
                      <input type="text" class="form-control" id="msg" name="msg" value="msg">
                    </div>
                    <button type="submit" class="submit" name="sent">SEND</button>
              </form>
            </div>
          </div>
        </div>
</body>
</html>