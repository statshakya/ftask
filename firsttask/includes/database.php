<?php
$connect = mysqli_connect('localhost', 'root', '','ftask');
if(mysqli_connect_error()){
    exit('failed to connect to MySQL:' . mysqli_connect_error());
    SESSION_START();
}
