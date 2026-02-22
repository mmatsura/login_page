<?php
session_start();

$errors = [
    'login_error' => $_SESSION['login_error'] ?? null,
    'register_error' => $_SESSION['register_error'] ?? null
];
$active_form = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error){
    return !empty($error) ? "<p class='error-message'>$error</p>" : "";
}

function isActive($formName, $activeForm){
    return $formName === $activeForm ? "active" : "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <header>
        <h2 class="logo">Logo</h2>
        <nav class="navigation">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Services</a>
                <a href="#">Contact</a>
                <button class="btnLogin-popup">Login</button>
        </nav>
    </header>

    <div class="wrapper">
        <div class="form-box login" id="<?php echo isActive('login', $active_form); ?>">
            <h2>Login</h2>
            <?php echo showError($errors['login_error']); ?>
            <form action="login_register.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" name="btnLogin" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>

        <div class="form-box register" id="<?php echo isActive('register', $active_form); ?>">
            <h2>Registration</h2>
            <?php echo showError($errors['register_error']); ?>
            <form action="login_register.php"  method="post">
                <div class="input-box" name ="name">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <input type="text" name="name" required>
                    <label>Username</label>
                </div>
                <div class="input-box" name="email">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box" name="password">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">I agree to the terms and conditions</label>
                </div>
                <button type="submit" name="btn" class="btn">Register</button>
                <div class="login-register">
                    <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>