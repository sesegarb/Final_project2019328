<?php
if(!isset($_SESSION))
{
    session_start();
}
if(!$_SESSION['id_user']){
    header('Location: login.php');
    exit();
}
?>