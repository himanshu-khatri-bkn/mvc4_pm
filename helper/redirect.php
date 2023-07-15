<?php 
function redirect($path){
    $path=str_replace('.','/',$path);
    echo $path=ROOT.$path;
    header("Location:$path");
    exit;

}
// himanshu pagal hai
?>git