<?php
session_start();
require_once 'config.php';

if(isset($_POST['btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check_email = $conn->query("SELECT email FROM users WHERE email='$email'");
    
    if ($check_email->num_rows > 0){
        $_SESSION['register_error'] = "Email already exists!";
        $_SESSION['active_form'] = 'register';
    }
    else{
        $conn->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
    }

<<<<<<< Updated upstream
    header("Location: login.php");
=======
    header("Location: ../login.php");
>>>>>>> Stashed changes
    exit();
}

if (isset($_POST['btnLogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
<<<<<<< Updated upstream
            header("Location: dashboard.php");
=======
            header("Location: ../dashboard.php");
>>>>>>> Stashed changes
            exit();
        }
    }

    // Якщо щось не співпало
    $_SESSION['login_error'] = "Invalid email or password!";
    $_SESSION['active_form'] = 'login';
<<<<<<< Updated upstream
    header("Location: login.php");
=======
    header("Location: ../login.php");
>>>>>>> Stashed changes
    exit();
}
?>
