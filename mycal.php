<?php 
include('conn.php');
session_start();
date_default_timezone_set('Asia/bangkok');
$date = date('d/m/Y');
echo $date;
$result = mysqli_query($conn,"SELECT * FROM actuser where actuser_date = '$date' AND actuser_user = '".$_SESSION['id']."'  ");
$resultfood = mysqli_query($conn,"SELECT * FROM fooduser where fooduser_date = '$date' AND fooduser_user = '".$_SESSION['id']."' ");
$allcalo = 0;
$allate = 0;
$dificit = 0;

if(isset($_SESSION['username']) == '') {
    header('location: login_ui.php');
    exit();
}

?>

<?php include('head_ui.html'); ?>
<body>

    <h1>Your Activity in <?php echo $date ?></h1>
    <table>
        <tr>
            <td align="center">Activity</td>
            <td align="center">Calorie</td>
            <td align="center">Time</td>
        </tr>

        <?php 
        while($row = mysqli_fetch_assoc($result)) {
          
            $result2 = mysqli_query($conn,"SELECT * FROM act where act_id = '".$row['actuser_act']."'");
                    
            while($row2 = mysqli_fetch_assoc($result2)) { 
                    $calorie = $row2['act_calmin']*$row['actuser_min']; 
                    $allcalo += $calorie; 
        ?>

                <tr>
                    <td><?php echo $row2['act_activity']; ?></td>
                    <td align="center"><?php echo  $calorie ; ?></td>
                    <td align="center"><?php echo  $row['actuser_date']; ?></td>
                </tr>
        <?php }} ?>
       
        
    </table>
    <h4>Calorie today = <?php echo $allcalo; ?> </h4>    



    <h1>Your food you ate today</h1>
    <table>
        <tr>
            <td align="center">Food</td>
            <td align="center">Calorie</td>
            <td align="center">Time</td>
        </tr>
        <?php while($rowfood1 = mysqli_fetch_assoc($resultfood)) {
             $resultfood2 = mysqli_query($conn,"SELECT * FROM food where food_id = '".$rowfood1['fooduser_food']."' ");
             while($rowfood2 = mysqli_fetch_assoc($resultfood2)) { 
             $allate += $rowfood2['food_cal']; ?>
        <tr>
            <td><?php echo $rowfood2['food_name'];  ?></td>
            <td align="center"><?php echo $rowfood2['food_cal']; ?></td>
            <td align="center"><?php echo $rowfood1['fooduser_time'];  ?></td>
        </tr>
        <?php }} ?>
    </table>
    <?php $dificit = $allate-$allcalo ?>
    <h4><?php echo ("Your Calorie Today : ").$allate; ?></h4>
    <p><?php echo ("Your Dificit = ").$dificit; ?></p>
    
        <a href="index.php"><button>HOME</button></a>

</body>
</html>