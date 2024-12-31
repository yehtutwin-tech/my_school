<?php
  include_once '../partials/header.php';
?>
  <h1 class="my-3">
    <a
      class="btn btn-outline-secondary"
      href="<?= $base_url ?>/course/index.php">
      &larr;
    </a>
    Course Create
  </h1>
  <?php
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
        $sql = "INSERT INTO courses (name, description)
        VALUES ('$name', '$description')";
        
        if ($conn->query($sql) === TRUE) {
          $alert = "New record created successfully";
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
          <input type="text" name="name" class="form-control" />
          <span class="text-danger"><?= $nameErr ?></span>
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" class="form-control" rows="5"></textarea>
          <span class="text-danger"><?= $descriptionErr ?></span>
        </div>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </div>
  </form>
<?php
  include_once '../partials/footer.php';
?>
