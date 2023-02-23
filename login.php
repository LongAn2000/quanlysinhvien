<?php
require_once('dbhelp.php');
if(!empty($_POST)){
    $email = $password = '';
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
    if(isset($_POST['password'])){
        $password = $_POST['password'];
    }
    $sql = 'SELECT * FROM users WHERE email ="'.$email.'" AND password ="'.$password.'"';
    $result = executeResult($sql);

    if($result != null && count($result) > 0){
        header("Location: list.php");
    }
}