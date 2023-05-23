<?php
function new_tab(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $filename = $_POST['filename'];
        $content= $_POST['content'];
        
        $file = fopen($filename . ".php" ,"w");
        fwrite($file,$content);
        fclose($file);
        echo"file created";
    }
    else{
       echo"you cant even do this simple php";
    } 
}?>