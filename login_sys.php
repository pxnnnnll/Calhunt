<?php 
include('conn.php'); 
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM user where user_username = '".$username."' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$_SESSION['countsign'] = 0 ;

    if($username == $row['user_username']) {
        if($password == $row['user_pass']) {
            $_SESSION['id'] = $row['user_id'];
            $_SESSION['username'] = $username;
            header('location: index.php');
        }else{
            header('location: login_ui.php');
            $_SESSION['countsign']++;
        }
    }else{
        header('location: login_ui.php');
        $_SESSION['countsign']++;
    }
?>