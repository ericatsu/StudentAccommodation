<?php

session_start();

if (isset($_SESSION['uid'])) {
    header('location:admin/dashboard.php');
}
?>
<html lang="en_US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./css/login.css">

</head>

<body>
    <section class="box">


        <form id="aform" action="login.php" method="post" class="form">

            <input type="username" name="username" placeholder="Username" required class="login_body">
            <input type="password" name="password" placeholder="Password" required class="login_body">
            <button type="submit" name="login" value="Login" class="button">Login</button>
            <p><input type="checkbox" value="remember-me" name="rememberMe"> Remember me </p>

        </form>
    </section>
</body>

</html>

<?php

include('dbcon.php');

if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $qry = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";

    $run = mysqli_query($con, $qry);

    $row = mysqli_num_rows($run);

    if ($row >= 1) {
        $data = mysqli_fetch_assoc($run);
        $id = $data['id'];



        $_SESSION['uid'] = $id;

        header('location:admin/dashboard.php');
    } else {
?>
        <script>
            alert('Username Or Password Dont match');
            window.open('login.php', '_self')
        </script>
<?php
    }
}

?>