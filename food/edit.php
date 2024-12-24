<?php
  include_once '../partials/header.php';
?>
  <h1 class="my-3">
    <a
      class="btn btn-outline-secondary"
      href="<?= $base_url ?>/food/index.php">
      &larr;
    </a>
    Food Edit
  </h1>
  <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];

      $sql = "SELECT * FROM foods WHERE id=$id";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $image = $row['image'];

      if (isset($_FILES['image'])) {
        $file = $_FILES['image'];

        move_uploaded_file(
          $file['tmp_name'],
          '../assets/foods/' . $file['name']
        );

        $image = $file['name'];
      }

      $sql = "UPDATE foods SET name='$name', description='$description', image='$image' WHERE id=$id";
      
      if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  ?>

  <form method="post" enctype="multipart/form-data">
    <input
      type="text" name="name" class="form-control" placeholder="Name..."
      value="<?= $row['name'] ?>"
    />
    <br/>
    <textarea
      name="description" class="form-control" placeholder="Description..." rows="5"
    ><?= $row['description'] ?></textarea>
    <br/>
    <input type="file" name="image" class="form-control" />
    <img src="../assets/foods/<?= $row["image"] ?>" width="100" />
    <br/><br/>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
<?php
  include_once '../partials/footer.php';
?>
