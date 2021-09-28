<?php
    session_start();
    include('server.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="login_register.css">
</head>
<body>
    <div class ="container">
    <div class ="left">
    <div class="header">
        <h2 class="animation a1">Login</h2>
        <h2></h2>
    </div>

    <form action="login_db.php" method="post">
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
            <input type="text"class="form-field animation2 a2" name="username">
        <label class="animation a2" for="password">Password</label>
            <input type="password" class="form-field animation2 a2" name="password">
        
        
            <button class="animation a3" type="submit" name="login_user" class="btn1 danger">Login</button>
        
        <p class="animation a4">Not have Account? <a href="register.php">Sign Up</a></p>
        </div>
    </form>
    </div>
    <div class="right"></div>
    </div>
</body>
</html>