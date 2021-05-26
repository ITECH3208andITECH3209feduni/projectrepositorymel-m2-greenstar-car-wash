<?php
$active = 'sign_in';
require_once 'header.php';
if (!empty($_SESSION['logged_in'])) {
  header('location: home.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ? AND password=?');
  $stmt->execute([$email, $pass]);
  $user = $stmt->fetch();
  if (empty($user)) {
    $error = 'User does not exists';
  } else {
    $_SESSION['logged_in'] = true;
    $_SESSION['user'] = $user;
    header('location: home.php');
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
        <form method="post" action="sign_in.php" name="sign_in_form">
          <div class="text-center"><img src="./images/avatar.png"></div>

          <h1 class="color-white text-center">Sign in</h1>
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
            <label>
              <h4 class="color-white">Password</h4>
            </label><br>
            <input class="form-control" type="password" name="password" placeholder="Password" required>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Sign in</button>
          </div>
          <a href="./forgot.php" class="forgot">Forgot your email or password?</a>
          <a href="./sign_up.php" class="forgot">Need an account- Sign up</a>
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