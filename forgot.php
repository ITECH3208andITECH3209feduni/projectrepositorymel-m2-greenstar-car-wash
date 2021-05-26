<?php
$active = 'sign_in';
require_once 'header.php';

if (!empty($_SESSION['logged_in'])) {
    header('location: home.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if (empty($user)) {
        $error = 'User does not exists';
    } else {
        $stmt = $pdo->prepare('UPDATE users SET password = ? WHERE email = ?');
        $stmt->execute([$pass, $email]);
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
                <form method="post" action="forgot.php" name="forgot_form">
                    <div class="text-center"><img src="./images/avatar.png"></div>

                    <h1 class="color-white text-center">Forgot password</h1>
                    <?php if (!empty(($error))) : ?>
                        <small style='color: red; text-align: center;'><?= $error ?></small>
                    <?php unset($error);
                    endif; ?>

                    <div class="form-group">
                        <label for="email">
                            <h4 class="color-white">Email</h4>
                        </label><br>
                        <input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">
                            <h4 class="color-white">New Password</h4>
                        </label><br>
                        <input class="form-control" type="password" id="password" name="password" placeholder="********" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
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