<?php
function secure() {
    if(!isset($_SESSION['id']) ){
        set_message("please login to the page first");
        header('location: login.php');
        die();
    }
}
function set_message($message){
    $_SESSION['message'] = $message;
}

function get_message(){
    if($_SESSION['message']){
        echo '<P>' . $_SESSION['message'] . '</p> <hr>';
        unset($_SESSION['message']);
    }
}

    
?>