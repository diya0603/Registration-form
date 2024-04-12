<?php
require_once('config.php');
?>
<?php
session_start();
if(isset($_SESSION["user"])){
    header("Location: index.php");
}
?>
<DOCTYPE html>
<html>
<head>
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div>
    <?php
        if(isset($_POST["login"])){
            $email = $_POST["email"];
            $password = $_POST["password"];

            $sql = "SELECT * FROM users WHERE email = ?";
            $stmtlogin = $db->prepare($sql);
            $stmtlogin->execute([$email]);
            $user = $stmtlogin->fetch(PDO::FETCH_ASSOC);
            if($user){
                if ($user["password"] == $password){
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "Password Does not match";
                }
            }else{
                echo "Email does not exist";
            }
        }

    ?>
</div>
<div class="container">
    <form action="login.php" method="post">
    <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h1>Log In</h1>
                    <p>Enter your account details.</p>
                    <hr class="mb-3">

                    <label for="email"><b>Email Address</b></label>
                    <input class="form-control" type="email" name="email" required>

                    <label for="password"><b>Password</b></label>
                    <input class="form-control" type="text" name="password" required>
                    <hr class="mb-3">
                    <input class="btn btn-primary" type="submit" name="login" value="Log In"> 
                </div>
            </div>    
        </div>
    </form>
</div>

</body>
</html>