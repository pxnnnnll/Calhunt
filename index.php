<?php 
include('conn.php');
include('head_ui.html');
session_start();
date_default_timezone_set('Asia/bangkok');

if(isset($_SESSION['username']) == '') {
        header('location: login_ui.php');
        exit();
        
}

$resultfood = mysqli_query($conn,"SELECT * FROM food");
$resultact = mysqli_query($conn,"SELECT * FROM act");

$resultBMI = mysqli_query($conn,"SELECT * FROM user where user_username = '".$_SESSION['username']."' ");
$rowBMI = mysqli_fetch_assoc($resultBMI);
$_SESSION['id'] = $rowBMI['user_id'];
$userweight = $rowBMI['user_weight'];
$userheight = $rowBMI['user_height'];

$userBMI = $userweight/(($userheight/100)**2);
?>

        
<body>
       
        <?php echo "Welcome ". $_SESSION['username'] ; 
         echo ("  BMI = "). number_format($userBMI,1); ?> 
        <?php   if($userBMI > 30.0){
                    echo("อ้วนมาก");
                }elseif($userBMI < 29.9 && $userBMI > 25.0 ){
                    echo("อ้วน");
                }elseif($userBMI < 18.6 && $userBMI > 24.0 ){
                    echo("น้ำหนักปกติ");
                }else{
                    echo("ผอมเกินไป");
                }
        
        ?>
        <form action="food_sys.php" method="GET">
            <select id="food" name="food">
                <?php while($rowfood = mysqli_fetch_assoc($resultfood)) { ?>
                <option value="<?php echo $rowfood['food_id'] ?>"><?Php echo $rowfood['food_name'] ?></option>
                <?php } ?>
            </select>
            <input type="submit">


        </form>



        <form action="act_sys.php" method="GET">
        <select id="act" name="acti">
                <?php while($rowact = mysqli_fetch_assoc($resultact)) { ?>
                <option value="<?php echo $rowact['act_id']?>"><?Php echo $rowact['act_activity'] ?></option>
                <?php } ?>
            </select>
            <input type="number" value="0" name="min">
            <label>นาที</label>
            <input type="submit">
        </form>


        <a href="mycal.php"><button>My Calorie</button></a>
        <a href="static.php"><button>Static</button></a>
        <a href="myprofile.php"><button>My Profile</button></a>
        <a href="logout_sys.php?logout=1"><button>Log out</button></a>


</body>
</html>