<?php
include('conn.php');
session_start();

$resultuser = mysqli_query($conn,"SELECT * FROM user ORDER BY user_todaycal desc");

?>

<?php include('head_ui.html'); ?>
<body>
    <h1>EAT calorie Rank</h1>
    <table>
        <tr>
            <td>Name</td>
            <td>Cal</td>
        </tr>

        <?php while($rowuser = mysqli_fetch_assoc($resultuser)) { 
            if($rowuser['user_todaycal'] != 0) { ?>
        <tr>
            <td><?php echo $rowuser['user_username']; ?></td>
            <td><?php echo $rowuser['user_todaycal']; ?></td>
        </tr>
        <?php }} ?>
    </table>

    <h1>ACTIVITY calorie Rank</h1>
    <table>
        <tr>
            <td>Name</td>
            <td>Cal</td>
        </tr>

       
        <tr>
            <td></td>
            <td></td>
        </tr>
        
    </table>
</body>
</html>