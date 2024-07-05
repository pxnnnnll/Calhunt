<?php 
    include('conn.php');
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $Lname = $_POST['lname'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $age = $_POST['age'];
    $chs = $_POST['chs'];

    $result = mysqli_query($conn,"SELECT * FROM user where user_username = '".$username."'");
    $row = mysqli_fetch_assoc($result);

    if($username == $row['user_username']) {
        header('location: register_ui.php');
        exit(0);
        
    }else{
         $_SESSION['username'] = $username ; 
         $sqlinsert = "INSERT INTO user(user_id,user_username,user_name,user_lname,user_pass,user_height,user_weight,user_age,user_chromosome) VALUES ('','$username','$password','$name','$Lname','$height','$weight','$age','$chs')";
         $resultinsert = mysqli_query($conn,$sqlinsert);
         header('location: index.php');
         exit(0);

        
    }





?>