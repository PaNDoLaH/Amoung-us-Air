<?php 
    session_start();
    include('server.php');
    require_once "server.php";
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
        $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
        $Tel = mysqli_real_escape_string($conn, $_POST['Tel']);

        if (empty($username)) {
            array_push($errors, "Username is required");
            $_SESSION['error'] = "Username is required";
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
            $_SESSION['error'] = "Email is required";
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password is required";
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
            $_SESSION['error'] = "The two passwords do not match";
        }
        if (empty($birthday)) {
            array_push($errors, "birthday is required");
            $_SESSION['error'] = "birthday is required";
        }
        if (empty($Tel)) {
            array_push($errors, "Tel is required");
            $_SESSION['error'] = "Tel is required";
        }

        $user_check_query = "SELECT * FROM User WHERE Username = '$username' OR Email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($result['email'] === $email) {
                array_push($errors, "Email already exists");
            }
            if ($result['Tel'] === $Tel) {
                array_push($errors, "Tel already exists");
            }
        }

        if (count($errors) == 0) {
            $password = md5($password_1);

            $sql = "INSERT INTO User (Username, Email, Password,Birthday, Tel, userlevel) VALUES ('$username', '$email', '$password','$birthday','$Tel','m')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        } else {
            $_SESSION['error'] = "Something went wrong";
            header("location: register.php");
        }
    }

?>
