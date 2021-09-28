<?php 
    session_start();
    include('server.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link rel="stylesheet" href="login_register.css">
</head>
<body>
<div class ="container">
    <div class ="left">
    <div class="header">
        <h2 class="animation a1">Register</h2>
        <h2></h2>
    </div>

    <form action="register_db.php" method="post">
        <?php include('errors.php'); ?>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <div class="form">
        
            <label class="animation a2" for="username">Username</label>
            <input type="text" class="form-field animation2 a2" name="username" required>
        
       
            <label class="animation a2" for="email">Email</label>
            <input type="email" class="form-field animation2 a2"name="email" required >
        
        
            <label class="animation a2" for="password_1">Password</label>
            <input type="password" class="form-field animation2 a2"name="password_1" required >
        
        
            <label class="animation a2" for="password_2">Confirm Password</label>
            <input type="password" class="form-field animation2 a2"name="password_2" required>
       
        
            <label class="animation a2" for="Birthday">Birthday</label>
            <input type="date" class="form-field animation2 a2"name="birthday" required>
        
       
            <label class="animation a2" for="Tel">Tel</label>
            <input type="text" class="form-field animation2 a2"name="Tel" pattern="\d{10}" required maxlength="10">
        
        
            <button class="animation a3" type="submit" name="reg_user" class="btn1 danger">Register</button>
        
        <p class="animation a4">Already a member? <a href="login.php">Sign in</a></p>
        </div>
    </form>
    </div>
    <div class="right2"></div>
    </div>

</body>
</html>