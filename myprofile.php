<?php 
include('conn.php');
session_start();
date_default_timezone_set('Asia/bangkok');
$user_id = $_SESSION['id'];
$resultuser = mysqli_query($conn,"SELECT * FROM user where user_id = '".$user_id."' ");
$rowuser = mysqli_fetch_assoc($resultuser);
$dateuser = $rowuser['user_age'];
$datenow = date('Y-m-d');

$datetime1 = date_create($dateuser);
$datetime2 = date_create($datenow);

$diff = date_diff($datetime1,$datetime2);


?>

<?php include('head_ui.html') ?>
<body>
    <p>MY Profile</p>
    <?php 
    
    echo ("Username : ").$_SESSION['username'].("<br>"); 
    echo ("Your Name : ").$rowuser['user_name'].(" ").$rowuser['user_lname'].("<br>"); 
    echo ("Your Age : ").$diff->format('%Y year %M month').("<br>"); 
    echo ("Your Height : ").$rowuser['user_height'].("<br>"); 
    echo ("Your Weight : ").$rowuser['user_weight'].("<br>"); 
    echo ("Your Chromosome : ").$rowuser['user_chromosome'].("<br>"); 
    ?>
    <a>Change Profile : </a>
    <a href="changepro.php?n=1"><button>name</button></a>
    <a href="changewei.php?w=1"><button>height</button><a>
    <a href="changehei.php?h=1"><button>weight</button><a><br>
    <a href="index.php"><button>HOME</button></a>

   
</body>
</html>