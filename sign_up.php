<?php
$active = 'sign_up';
require_once 'header.php';
if (!empty($_SESSION['logged_in'])) {
    header('location: home.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
    if (!empty($user)) {
        $error = 'User already exists';
    } else {
        $error = '';
    }
    if (empty($error)) {
        $stmt = $pdo->prepare('INSERT INTO users (full_name, email, password, user_type) values(?, ?, ?, ?)');
        $stmt->execute([$name, $email, $pass, 'standard']);
        $to = $email;
        $subject = "Registration Successful";

        $message = "<strong>{$name}, you have successfully regsistered</strong>";
        $message .= "<h1>You can now use our services</h1>";

        $header = "From:abc@somedomain.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        $retval = mail($to, $subject, $message, $header);

        if ($retval == true) {
            $_SESSION['logged_in'] = true;
        } else {
            echo "Message could not be sent...";
        }
        header('location: sign_in.php');
    }
}
?>
<br><br><br><br><br><br>
<div class="row">
    <div class="col-sm-3">

    </div>
    <div class="col-sm-6">
        <div class="container-fluid bg-3">
            <div class="login-dark">
                <form method="post" action="sign_up.php" name="sign_up_form">
                    <div class="text-center"><img src="./images/avatar.png"></div>

                    <h1 class="color-white text-center">Sign up</h1>
                    <?php if (!empty(($error))) : ?>
                        <small style='color: red; text-align: center;'><?= $error ?></small>
                    <?php unset($error);
                    endif; ?>

                    <div class="form-group">
                        <label for="name">
                            <h4 class="color-white">Full Name</h4>
                        </label><br>
                        <input class="form-control" type="text" id="name" name="name" placeholder="Full name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">
                            <h4 class="color-white">Email</h4>
                        </label><br>
                        <input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">
                            <h4 class="color-white">Password</h4>
                        </label><br>
                        <input class="form-control" type="password" id="password" name="password" placeholder="********" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Sign up</button>
                    </div>
                    <a href="./forgot.php" class="forgot">Forgot your email or password?</a>
                    <a href="./sign_in.php" class="forgot">Already have an account- Sign in</a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-3">

    </div>
</div>

<?php
require_once 'footer.php'
?>