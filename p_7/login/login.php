<?php
// cek apakah tombol submit sudah ditekan atau blm
if(isset($_POST["submit"] )){
//cek username dan password
if($_POST ["username"] =="admin" && $_POST["password"] == "123"){
//jika bena=r ridairect ke halaman admin
header("Location: admin.php");
exit;
}else{
//sika salah, tampilkan pesan kesalahan
    $error = true;
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Login Admin</h1>
<?php if( isset($error)): ?>
    <p style+>username / password ssalah!</p>
<?php endif; ?>
<ul>
    <form action="" method="post">
        <li>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <label for="password">Password :</label>
            <input type="password" name="password" id="password">
        </li>
        <button>
            <button type="submit" name="submit">Login</button>
        </li>
    </form>
</ul>
</body>
</html>