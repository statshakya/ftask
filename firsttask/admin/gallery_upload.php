<?php
include('header.php');
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
    <form action="gallery_upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="upfile" id="upfile">
        <input type="submit" value="upload" name="upload">
    </form>
</body>
</html>
<?php
if(isset($_POST['upload']))
{
    /*$filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "image/".$filename;
    move_uploaded_file($tempname,$folder);

    if($filename!="")
    {
        $querry 
    }*/
    $image = ($_FILES['upfile']);
    $imgname = $image['name'];
    $imgtype = $image['type'];
    $imgtmpname= $image['tmp_name'];
    $error = $image['error'];
    $size = $image['size'];

    if(!$error){
        $requriedSize = 5*1024*1024;
        if($size <= $requriedSize){
            $allowedExt = ["PNG","png","JPG","jpg","JPEG","jpeg"];
            if(in_array(explode('/',$imgtype)[1],$allowedExt)){
                $destinationFolder ="../images/";
                if( move_uploaded_file($imgtmpname,$destinationFolder.$imgname)){
                    include_once "../includes/database.php";
                    $imgpath="images/".$imgname;
                    $sql ="INSERT INTO images(img_name,img_src) values(?,?)";
                    $stm=$connect->prepare($sql);
                    
                    $result = $stm->execute([$imgname,$imgpath]);
                    if($result){
                        echo $_SESSION['img_src'] = $imgpath;
                        header("location:gallery_upload.php?success=right");
                        exit(0);
                    }else{
                        header("location:gallery_upload.php?error=data");
                        exit(0);

                    }
                }
                else{
                    header("location:gallery_upload.php?error=wong");
                exit(0);
    }
            }
            else{
        header("location:gallery_upload.php?error=wong ext");
        exit(0);
    }
        }else{
        header("location:gallery_upload.php?error=5 mb img only");
        exit(0);
    }
    }else{
        header("location:gallery_upload.php?error=incorrect");
        exit(0);
    }

}
?>