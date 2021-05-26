<?php
$active = 'wash_services';
require_once 'header.php';
$stmt = $pdo->prepare('SELECT * FROM services WHERE type = ?');
$stmt->execute(['wash_service']);
$services = $stmt->fetchAll();
?>
<br><br>

<div class="container-fluid bg-3 text-center wash-services">
  <div class="container-fluid">
    <div class="row" style="justify-content: center; display: flex; flex-wrap: wrap;">
      <?php foreach ($services as $service) : ?>
        <div class="col-sm-4" style="margin-bottom: 3rem;">
          <div class="set-border-brown set-bg-black">
            <div class="panel-heading ">
              <h2><?= $service->name ?></h2>
            </div>
            <div class="panel-body container-fluid" style="">
              <p>
                <i><strong>Sedan</strong></i> $<?= $service->sedan_price ?>- <i><strong>SUV/4WD</strong></i> $<?= $service->suv_price ?>
              </p>
              <img src="./images/<?= $service->img ?>" class="img-responsive" style="width:100%" alt="Car">
              <p>
                <?= $service->description ?>
              </p>

              <?php if (isset($service->extra_service)) : ?>
                <ul>
                  <li><i><strong>Protective Wax - </strong></i>Just add $10</li>
                </ul>
              <?php endif; ?>
              <?php if (isset($_SESSION['user']) && $_SESSION['user']->user_type === 'admin') : ?>
                <form action="update_service.php" method="GET">
                  <input type="hidden" name="service" value="<?= $service->id ?>">
                  <button class="btn btn-danger btn-sm mt-3">Edit</button>
                </form>
              <?php endif; ?>
            </div>
            <div class="panel-footer ontainer-fluid">
              <form action="contact.php"><button class="btn btn-lg">Contact Now</button></form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>


</div>
</div><br>

<?php
require_once 'footer.php'
?>