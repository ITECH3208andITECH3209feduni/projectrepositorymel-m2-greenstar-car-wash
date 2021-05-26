<?php
$active = 'protection_services';
require_once 'header.php';
$stmt = $pdo->prepare('SELECT * FROM services WHERE type = ?');
$stmt->execute(['protection_services']);
$services = $stmt->fetchAll();
?>
<br><br>

<div class="container-fluid bg-3 text-center wash-services">



  <div class="container-fluid">
    <div class="row " style="justify-content: center; display: flex; flex-wrap: wrap;">
    <?php foreach ($services as $service) : ?>
        <div class="col-sm-4" style="margin-bottom: 3rem;">
          <div class="set-border-brown set-bg-black">
            <div class="panel-heading ">
              <h2><?= $service->name ?></h2>
            </div>
            <div class="panel-body container-fluid">
              <p>
                <strong><i>$<?= $service->from_price ?></i></strong>
              </p>
              <img src="./images/<?= $service->img ?>" class="img-responsive" style="width:100%" alt="Car">
              <p>
                <?= $service->description ?>
              </p>
              <?php if (isset($_SESSION['logged_in']) && $_SESSION['user']->user_type === 'admin') : ?>
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
  <!--service line 1-->



</div>
</div><br>

<?php
require_once 'footer.php'
?>