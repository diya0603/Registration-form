<?php
require_once('config.php');
?>
<DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div>
    <?php
    if(isset($_POST["create"])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $password = $_POST['password'];

        $sql = "INSERT INTO users (firstname, lastname, email, phonenumber, password ) VALUES(?,?,?,?,?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$firstname, $lastname, $email, $phonenumber, $password]);
        if($result){
            echo 'Successfully saved';
        }else{
            echo 'Error';
        }
       
    }
    ?>
</div>

<div>
    <form action="registration.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h1>Registration</h1>
                    <p>Fill up the form with the correct values.</p>
                    <hr class="mb-3">
                    <label for="firstname"><b>First Name</b></label>
                    <input class="form-control" type="text" name="firstname" required>

                    <label for="lastname"><b>Last Name</b></label>
                    <input class="form-control" type="text" name="lastname" required>

                    <label for="email"><b>Email Address</b></label>
                    <input class="form-control" type="email" name="email" required>

                    <label for="phonenumber"><b>Phone Number</b></label>
                    <input class="form-control" type="text" name="phonenumber" required>

                    <label for="password"><b>Password</b></label>
                    <input class="form-control" type="text" name="password" required>
                    <hr class="mb-3">
                    <input class="btn btn-primary" type="submit" name="create" value="Sign Up"> 
                </div>
            </div>    
        </div>
    </form>
</div>
</body>
</html>