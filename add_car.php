<?php
$active = 'sign_up';
require_once 'header.php';
if (empty($_SESSION['logged_in'])) {
    header('location: sign_in.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reg_number = $_POST['reg_number'];
    $model = $_POST['model'];
    $make = $_POST['make'];
    $year_manufactured = $_POST['year_manufactured'];
    $colour = $_POST['colour'];
    $odometer = $_POST['odometer'];
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (strlen($year_manufactured) !== 4) {
        $error = 'Please enter a year';
    } else {
        $error = '';
    }
    
    if (empty($error)) {
        $stmt = $pdo->prepare('INSERT INTO cars (reg_number, model, make, year_manufactured, colour, odometer, user_id) values(?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$reg_number, $model, $make, $year_manufactured, $colour, $odometer, $_SESSION['user']->id]);
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
            <div class="login-dark" style="height: auto !important;">
            <form method="post" action=<?= $_SERVER['PHP_SELF'] ?> name="sign_up_form">
                    <div class="text-center"><img src="./images/avatar.png"></div>

                    <h1 class="color-white text-center">Add New Car</h1>
                    <?php if (!empty(($error))) : ?>
                        <small style='color: red; text-align: center;'><?= $error ?></small>
                    <?php unset($error);
                    endif; ?>

                    <div class="form-group">
                        <label for="reg_number">
                            <h4 class="color-white">Registration Number</h4>
                        </label><br>
                        <input class="form-control" type="text" id="reg_number" name="reg_number" placeholder="Reg number" required>
                    </div>
                    <div class="form-group">
                        <label for="model">
                            <h4 class="color-white">Model</h4>
                        </label><br>
                        <input class="form-control" type="text" id="model" name="model" placeholder="Model" required>
                    </div>
                    <div class="form-group">
                        <label for="make">
                            <h4 class="color-white">Make</h4>
                        </label><br>
                        <input class="form-control" type="text" id="make" name="make" placeholder="Make" required>
                    </div>
                    <div class="form-group">
                        <label for="year_manufactured">
                            <h4 class="color-white">Year Manufactured</h4>
                        </label><br>
                        <input class="form-control" type="text" id="year_manufactured" name="year_manufactured" placeholder="Year manufactured" required>
                    </div>
                    <div class="form-group">
                        <label for="colour">
                            <h4 class="color-white">Colour</h4>
                        </label><br>
                        <input class="form-control" type="text" id="colour" name="colour" placeholder="Colour" required>
                    </div>
                    <div class="form-group">
                        <label for="odometer">
                            <h4 class="color-white">Odometer</h4>
                        </label><br>
                        <input class="form-control" type="text" id="odometer" name="odometer" placeholder="Odometer" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Add</button>
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