<?php
  include_once '../partials/header.php';
?>
  <h1 class="my-3">
    <a
      class="btn btn-outline-secondary"
      href="<?= $base_url ?>/course/index.php">
      &larr;
    </a>
    Course Edit
  </h1>
  <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];

      $sql = "SELECT * FROM courses WHERE id=$id";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
    }

    $nameErr = $descriptionErr = "";
    $name = $description = "";
    $alert = "";
    $alertClass = "alert-success";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (empty($_POST['name'])) {
        $nameErr = "Name is required";
      } else {
        $name = $_POST['name'];
      }

      if (empty($_POST['description'])) {
        $descriptionErr = "Description is required";
      } else {
        $description = $_POST['description'];
      }

      if ($name && $description) {
        $sql = "UPDATE courses SET name='$name', description='$description' WHERE id=$id";
        
        if ($conn->query($sql) === TRUE) {
          $alert = "Record updated successfully";
        } else {
          $alert = "Error: " . $sql . "<br>" . $conn->error;
          $alertClass = "alert-danger";
        }
      }
    }
  ?>

  <?php
    if ($alert) {
      echo "<div class='alert $alertClass'>$alert</div>";
    }
  ?>
  <form method="post">
    <div class="row gap-3">
      <div class="col-12">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>" />
          <span class="text-danger"><?= $nameErr ?></span>
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" class="form-control" rows="5"><?= $row['description'] ?></textarea>
          <span class="text-danger"><?= $descriptionErr ?></span>
        </div>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </form>
<?php
  include_once '../partials/footer.php';
?>
