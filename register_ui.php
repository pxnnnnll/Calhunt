<?php 
//register
include('conn.php');
session_start();

if(isset($_SESSION['username']) != '') {
    header('location: index.php');
    exit(0);
}

?>

<?php include('head_ui.html'); ?>
<body>
    <h1>REGISTER</h1>
    <form action="register_sys.php" method="POST">
        <label>Username</label>
        <input type="text" name="username"><br><br>
        <label>Password</label>
        <input type="password" name="password"><br><br>
        <label>Name</label>
        <input type="text" name="name"><br><br>
        <label>Last Name</label>
        <input type="text" name="lname"><br><br>
        <label>Height</label>
        <input type="int" name="height"><br><br>
        <label>Weight</label>
        <input type="int" name="weight"><br><br>
        <label>Age</label>
        <input type="date" name="age"><br><br>
        <label>Chromosome</label>
        <select id="chs" name="chs"><br><br>
            <option value="XX">XX</option>
            <option value="XY">XY</option>
            <option value="ETC">Neither</option>
        <select><br><br>
        <input type="submit">
      
    </form>


</body>
</html>