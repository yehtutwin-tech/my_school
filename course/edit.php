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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['name'];
      $description = $_POST['description'];

      $sql = "UPDATE courses SET name='$name', description='$description' WHERE id=$id";
      
      if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  ?>

  <form method="post">
    <input
      type="text" name="name" class="form-control" placeholder="Title..."
      value="<?= $row['name'] ?>"
    />
    <br/>
    <textarea
      name="description" class="form-control" placeholder="Outline..." rows="5"
    ><?= $row['description'] ?></textarea>
    <br/>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
<?php
  include_once '../partials/footer.php';
?>
