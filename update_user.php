<?php
$active = 'sign_up';
require_once 'header.php';
if (empty($_SESSION['logged_in'])) {
    header('location: sign_in.php');
}

$user_id = $_GET['user'];
$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$user_id]);
$current_user = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!empty($user)) {
        $error = 'User already exists';
        if ($user->email === $_SESSION['user']->email) {
            $error = 'You are using this email';
        }
    } else {
        $error = '';
    }
    
    if (empty($error)) {
        $stmt = $pdo->prepare('UPDATE users SET full_name = ?, email = ? WHERE id = ?');
        $stmt->execute([$name, $email, $_SESSION['user']->id]);
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        $_SESSION['user'] = $user;
        header('location: profile.php');
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
                <form method="post" action=<?= "update_user.php?user=".$user_id ?> name="sign_up_form">
                    <div class="text-center"><img src="./images/avatar.png"></div>

                    <h1 class="color-white text-center">Update Details</h1>
                    <?php if (!empty(($error))) : ?>
                        <small style='color: red; text-align: center;'><?= $error ?></small>
                    <?php unset($error);
                    endif; ?>

                    <div class="form-group">
                        <label for="name">
                            <h4 class="color-white">Full Name</h4>
                        </label><br>
                        <input class="form-control" type="text" id="name" name="name" placeholder="Full name" value="<?= $current_user->full_name ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">
                            <h4 class="color-white">Email</h4>
                        </label><br>
                        <input class="form-control" type="email" id="email" name="email" placeholder="Email" value="<?= $current_user->email ?>" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Update</button>
                    </div>
                    <a href="./profile.php" class="forgot">Go back to profile</a>
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