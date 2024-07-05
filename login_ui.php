<?php 
include('conn.php'); 
session_start();

if(isset($_SESSION['username']) != '') {
    header('location: index.php');
    exit(0);
}
?>

<?php include('head_ui.html'); ?>
<body>
    <form action="login_sys.php" method="POST">
        <label>Username</label>
        <input type="text" name="username"><br><br>
        <label>Password</label>
        <input type="password" name="password"><br><br>
        <input type="submit">

    </form>


    <?php 
           if(isset($_SESSION['countsign'] )> 0){
                echo ("Wrong Username or Password <br>");
                session_destroy();
                
           }
    ?>
    <a href="register_ui.php"><button>Register</button></a>
</body>
</html>