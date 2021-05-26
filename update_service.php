<?php
$active = 'sign_up';
require_once 'header.php';
if (empty($_SESSION['logged_in'])) {
    header('location: sign_in.php');
}

$service = $_GET['service'];
$stmt = $pdo->prepare('SELECT * FROM services WHERE id = ?');
$stmt->execute([$service]);
$current_service = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $sedan_price = $_POST['sedan_price'];
    $suv_price = $_POST['suv_price'];
    $description = $_POST['description'];
    $from_price = $_POST['from_price'];

    if ($sedan_price > $suv_price) {
        $error = 'Sedan service cost cannot be greater';
    } else {
        $error = '';
    }

    if (empty($error)) {
        if ($_POST['service_type'] === 'wash_service') {
            $stmt = $pdo->prepare('UPDATE services SET name = ?, sedan_price = ?, suv_price = ?, description = ? WHERE id = ?');
            $stmt->execute([$name, $sedan_price, $suv_price, $description, $service]);
            header('location: wash_services.php');
        } else {
            $stmt = $pdo->prepare('UPDATE services SET name = ?, from_price = ?, description = ? WHERE id = ?');
            $stmt->execute([$name, $from_price, $description, $service]);
        }
        if ($_POST['service_type'] === 'car_detailing')
            header('location: car_detailing.php');
        else
            header('location: protection_services.php');
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
                <form method="post" action=<?= "update_service.php?service=" . $service ?> name="sign_up_form">
                    <div class="text-center"><img src="./images/avatar.png"></div>

                    <h1 class="color-white text-center">Update Details</h1>
                    <?php if (!empty(($error))) : ?>
                        <small style='color: red; text-align: center;'><?= $error ?></small>
                    <?php unset($error);
                    endif; ?>
                    <input type="hidden" name="service_type" value="<?= $current_service->type ?>">

                    <div class="form-group">
                        <label for="name">
                            <h4 class="color-white">Service Name</h4>
                        </label><br>
                        <input class="form-control" type="text" id="name" name="name" value="<?= $current_service->name ?>" required>
                    </div>

                    <?php if ($current_service->type === 'wash_service') : ?>
                        <div class="form-group">
                            <label for="name">
                                <h4 class="color-white">Sedan Price</h4>
                            </label><br>
                            <input class="form-control" type="number" id="sedan_price" name="sedan_price" value="<?= $current_service->sedan_price ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="name">
                                <h4 class="color-white">Suv Price</h4>
                            </label><br>
                            <input class="form-control" type="number" id="suv_price" name="suv_price" value="<?= $current_service->suv_price ?>" required>
                        </div>
                    <?php else : ?>
                        <div class="form-group">
                            <label for="from_price">
                                <h4 class="color-white">From Price</h4>
                            </label><br>
                            <input class="form-control" type="number" id="from_price" name="from_price" value="<?= $current_service->from_price ?>" required>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="name">
                            <h4 class="color-white">Description</h4>
                        </label><br>
                        <textarea class="form-control" type="number" id="description" name="description" required><?= $current_service->description ?></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Update</button>
                    </div>
                    <a href="javascript:history.go(-1)" class="forgot">Go back</a>
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