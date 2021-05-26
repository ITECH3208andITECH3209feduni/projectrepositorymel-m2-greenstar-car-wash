<?php
$active = 'profile';
require_once 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
  // For image upload
  $target_dir = "images/profile-picture/";
  $target_file = $target_dir . basename($profileImageName);
  // VALIDATION
  // validate image size. Size is calculated in Bytes
  if ($_FILES['profileImage']['size'] > 200000) {
    $error = "Image size should not be greated than 200Kb";
  }
  // check if file exists
  if (file_exists($target_file)) {
    $error = "File already exists";
  }

  if (empty($error)) {
    if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
      $stmt = $pdo->prepare('UPDATE users SET img = ? WHERE email = ?');
      $executed = $stmt->execute([$profileImageName, $_SESSION['user']->email]);
      if ($executed) {
        $_SESSION['user']->img = $profileImageName;
        header('location: profile.php');
      } else {
        $error = "There was an error in the database";
      }
    } else {
      $error = "There was an erro uploading the file";
    }
  }
}

$stmt = $pdo->prepare('SELECT * FROM cars WHERE user_id = ?');
$stmt->execute([$_SESSION['user']->id]);
$cars = $stmt->fetchAll();
?>
<br><br>

<div class="container-fluid bg-3 text-center" style="min-height: 100vh;">
  <div class="container-fluid">
    <div class="row ">
      <div class="col-sm-12">
        <div class="set-border-brown set-bg-black">
          <div class="panel-heading ">
            <h2>User Details</h2>
          </div>
          <div style="margin: 2rem 0">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
              <div class="image-container text-center" style="margin: 2rem auto;">
                <img src="./images/profile-picture/<?= $_SESSION['user']->img ?>" alt="profile-picture">
              </div>
              <div class="text-center">
                <input style="margin: 2rem auto;" type="file" name="profileImage" onChange="displayImage(this)" id="profileImage">
                <button type="submit">Upload Picture</button>
              </div>
              <?php if (!empty(($error))) : ?>
                <small style='color: red; text-align: center;'><?= $error ?></small>
              <?php unset($error);
              endif; ?>
            </form>
          </div>
          <div style="margin-top: 3rem; width: 100%;" class="text-center">
            <p style="margin: 1rem 0;"><strong>Full name: </strong> <?= $_SESSION['user']->full_name ?></p>
            <p style="margin: 1rem 0;"><strong>Email: </strong> <?= $_SESSION['user']->email ?></p>
          </div>
          <table border="1" style="color: #fff; border-color: #fff; width: 70%; margin: 1rem auto;">
            <thead>
              <tr>
                <th>Reg. Number</th>
                <th>Make</th>
                <th>Model</th>
                <th>Year Manufactured</th>
                <th>Odometer</th>
                <th>Colour</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($cars as $car) : ?>
                <tr>
                  <td><?= $car->reg_number ?></td>
                  <td><?= $car->make ?></td>
                  <td><?= $car->model ?></td>
                  <td><?= $car->year_manufactured ?></td>
                  <td><?= $car->odometer ?></td>
                  <td><?= $car->colour ?></td>
                  <td>
                    <a href=<?= "./history.php?car=".$car->id ?> class="link">Check History</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <a href=<?= "./update_user.php?user=".$_SESSION['user']->id ?> class="link">Update Details</a>
          <span> / </span>
          <a href="./add_car.php" class="link">Add New Car</a>
          <div class="panel-footer ontainer-fluid">
            <a href="mailto:<?= $_SESSION['user']->email ?>" class="btn btn-lg">Contact Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<br>
<br>
<br>
<br>
<br>
<?php
require_once 'footer.php'
?>