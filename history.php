<?php
$active = 'profile';
require_once 'header.php';


$car_id = $_GET['car'];
$stmt = $pdo->prepare('SELECT cars.reg_number, car_service.service_date FROM cars INNER JOIN car_service ON cars.id = car_service.car_id WHERE id = ?');
$stmt->execute([$car_id]);
$car_services = $stmt->fetchAll();
?>
<br><br>

<div class="container-fluid bg-3 text-center" style="min-height: 100vh;">
  <div class="container-fluid">
    <div class="row ">
      <div class="col-sm-12">
        <div class="set-border-brown set-bg-black">
          <table border="1" style="color: #fff; border-color: #fff; width: 70%; margin: 1rem auto;">
            <thead>
              <tr>
                <th>Reg. Number</th>
                <th>Service Date</th>
                <th>Service Day</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($car_services as $service) : ?>
                <tr>
                  <td><?= $service->reg_number ?></td>
                  <td><?= $service->service_date ?></td>
                  <td><?= date('l', strtotime($service->service_date)); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<br>
<?php
require_once 'footer.php'
?>