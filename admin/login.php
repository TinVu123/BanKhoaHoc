<?php
include '../config.php';
session_start();
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,md5($_POST['password']));
    $select_user = mysqli_query($conn,"SELECT * FROM `admin` WHERE email_admin = '$email' AND password_admin = '$password';") or die('query failed');
    if(mysqli_num_rows($select_user)>0){
        $row = mysqli_fetch_assoc($select_user);
            echo "<script>alert('success');</script>";
            header('Location:admin_page.php');
            $_SESSION['admin_name'] = $row['name_admin'];
            $_SESSION['admin_email'] = $row['email_admin'];
            $_SESSION['admin_id'] = $row['id_admin'];
            $_SESSION['level'] = $row['level'];
            header('Location:admin_page.php');
    }
    else{
        echo "<script>alert('failed');</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login admin</title>
    <link rel="stylesheet" href="../CSS/register_login.css">
</head>
<body>
    <div class="container-box">
        <form action="" method="post">
            <h2>Login admin</h2>
            <input type="email" name="email" placeholder="enter your email" required class="box">
            <input type="password" name="password" placeholder="enter your password" required class="box">
            <input type="submit" value="login"  class="btn" name="submit" id="">
        </form>
    </div>
</body>
</html>