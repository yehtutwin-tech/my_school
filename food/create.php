<?php
  include_once '../partials/header.php';
?>
  <h1 class="my-3">
    <a
      class="btn btn-outline-secondary"
      href="<?= $base_url ?>/food/index.php">
      &larr;
    </a>
    Food Create
  </h1>
  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $image = '';

      if (isset($_FILES['image'])) {
        $file = $_FILES['image'];

        $ext = explode(".", $file['name']);
        $new_filename = time() . '.' . end($ext);

        move_uploaded_file(
          $file['tmp_name'],
          '../assets/foods/' . $new_filename,
        );

        $image = $new_filename;
      }

      $sql = "INSERT INTO foods (name, description, image)
      VALUES ('$name', '$description', '$image')";
      
      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  ?>

  <form method="post" enctype="multipart/form-data">
    <input type="text" name="name" class="form-control" placeholder="Name..." />
    <br/>
    <textarea name="description" class="form-control" placeholder="Description..." rows="5"></textarea>
    <br/>
    <input type="file" name="image" class="form-control" />
    <br/>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
<?php
  include_once '../partials/footer.php';
?>
