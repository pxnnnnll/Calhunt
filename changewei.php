<?php 
include('conn.php'); 
session_start();
date_default_timezone_set('Asia/bangkok');

    if(isset($_POST['submit'])) {
        $height =  $_POST['height'];
        echo $height. $_SESSION['id'];
        $result = mysqli_query($conn,"UPDATE user SET user_height = '$height' where user_id = '".$_SESSION['id']."' ");
        header('location: myprofile.php');
        exit(0);
    }

?>

<?php include('head_ui.html'); ?>
<body>
    <?php 
        if($height = 1) { ?>
        <p>Change Your Height</p>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <label>Height</label>
        <input type="int" name="height"><br><br>
        <input type="submit" name="submit">
        </form>
    <?php } ?> 

    <?php /*
        if($weight = 1) { ?>
        <p>Change Your Weight</p>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label>Weight</label>
        <input type="int" name="weight"><br><br>
        <input type="submit" name="submit3">
        </form>
    <?php } */?> 
    
    
</body>
</html>