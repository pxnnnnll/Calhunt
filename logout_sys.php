<?php 
include('conn.php');
session_start();
$logout = $_GET['logout'];
    if($logout == 1) {
        $_SESSION['logout'] == 1;
        session_destroy();
        header('location: login_ui.php');
}

?>