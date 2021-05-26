<?php
$active = 'customers';
require_once 'header.php';

if (isset($_GET['regNumber'])) {
    
    $reg = $_GET['regNumber'];
    $stmt = $pdo->prepare('SELECT users.*, cars.id as carId, cars.* FROM users INNER JOIN cars ON users.id = cars.user_id WHERE reg_number = ?');
    $stmt->execute([$reg]);
    $user = $stmt->fetch();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $service_id = $_POST['service_id'];
        $service_date = $_POST['service_date'];
        $reg = $_GET['regNumber'];
        $stmt = $pdo->prepare('INSERT INTO car_service (car_id, service_id, service_date) values(?, ?, ?)');
        $stmt->execute([$user->carId, $service_id, $service_date]);
    }

    $stmt = $pdo->prepare('SELECT cars.reg_number, car_service.service_id, car_service.service_date FROM cars INNER JOIN car_service ON cars.id = car_service.car_id WHERE id = ?');
    $stmt->execute([$user->carId]);
    $car_services = $stmt->fetchAll();

    $stmt = $pdo->prepare('SELECT * FROM services');
    $stmt->execute();
    $services = $stmt->fetchAll();
}
?>
<br><br>

<div class="container-fluid bg-3" style="min-height: 100vh;">
    <div class="container-fluid">
        <div class="row" style="width: 100%">
            <div class="col-sm-3" style="margin: 1rem auto;">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
                    <div class="form-group">
                        <label for="regNumber">Search Customer By Car Registration Number</label>
                        <input type="text" class="form-control" name="regNumber" placeholder="Enter car register number" value="<?= $_GET['regNumber'] ?? '' ?>" required>
                    </div>
                    <button class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
        <?php if (isset($user)) : ?>
            <div class="row" style="width: 100%">
                <div class="col-sm-6" style="margin: 1rem auto;">
                    <h4>User Image</h4>
                    <div class="image-container" style="margin: 2rem 0;">
                        <img src="./images/profile-picture/<?= $user->img ?>" alt="profile-picture">
                    </div>
                    <h4>User Details</h4>
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $user->full_name ?></td>
                                <td><?= $user->email ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <h4>Car Details</h4>
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Reg. Number</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Year Manufactured</th>
                                <th>Odometer</th>
                                <th>Colour</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $user->reg_number ?></td>
                                <td><?= $user->make ?></td>
                                <td><?= $user->model ?></td>
                                <td><?= $user->year_manufactured ?></td>
                                <td><?= $user->odometer ?></td>
                                <td><?= $user->colour ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <h4>Service History</h4>
                    <table border="1" style="margin: 1rem 0;">
                        <thead>
                            <tr>
                                <th>Service Name</th>
                                <th>Service Type</th>
                                <th>Service Date</th>
                                <th>Service Day</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($car_services as $service) : ?>
                                <tr>
                                    <?php foreach ($services as $sv) : ?>
                                        <?php if ($sv->id == $service->service_id) : ?>
                                            <td><?= $sv->name ?></td>
                                            <td><?= strtoupper(str_replace('_', ' ', $sv->type)) ?></td>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <td><?= $service->service_date ?></td>
                                    <td><?= date('l', strtotime($service->service_date)); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-3" style="margin: 1rem 0;">
                    <h2>Add New Service</h2>
                    <form action="<?= $_SERVER['PHP_SELF'] . "?regNumber=" . $_GET['regNumber'] ?>" method="POST">
                        <div class="form-group">
                            <label for="service_id">Select Service</label>
                            <select class="form-control" name="service_id" id="service_id" required>
                                <option value="">Select Any One</option>
                                <?php foreach ($services as $sv) : ?>
                                    <option value="<?= $sv->id ?>"><?= $sv->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="service_date">Select Date</label>
                            <input class="form-control" type="date" min="<?= date('Y-m-d') ?>" id="service_date" name="service_date" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<br>
<?php
require_once 'footer.php'
?>