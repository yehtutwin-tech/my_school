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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['name'];
      $description = $_POST['description'];

      $sql = "INSERT INTO courses (name, description)
      VALUES ('$name', '$description')";
      
      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  ?>

  <form method="post">
    <input type="text" name="name" class="form-control" placeholder="Title..." />
    <br/>
    <textarea name="description" class="form-control" placeholder="Outline..." rows="5"></textarea>
    <br/>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
<?php
  include_once '../partials/footer.php';
?>
