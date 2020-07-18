<!DOCTYPE html>
<html>
<head>
    <title>Form Login </title>
</head>
<body>
    <center>
    <form action="ceklogin.php" method="POST" style="margin-top: 200px;">
        <h1>Login</h1>
        <label>Username :</label>
        <input type="text" name="username" placeholder="masukkan username" required="" autofocus="">
        <br/>
        <br/>
        <label>Password :</label>
        <input type="password" name="password" placeholder="masukkan password" required="">
        <br>
        <br>
        <button type="submit">SUBMIT LOGIN</button>
    </form>
 
    <?php if(isset($_GET['pesan'])) {  ?>
    <label style="color:red;"><?php echo $_GET['pesan']; ?></label>
    <?php } ?>  
    </center>
</body>
</html>