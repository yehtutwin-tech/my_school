<?php
  include_once '../partials/header.php';
?>
  <h1 class="my-3">
    <a
      class="btn btn-outline-secondary"
      href="<?= $base_url ?>/class/index.php">
      &larr;
    </a>
    Class Edit
  </h1>
  <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];

      $sql = "SELECT * FROM classes WHERE id=$id";
      $result = $conn->query($sql);
      $class_row = $result->fetch_assoc();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['name'];
      $course_id = $_POST['course_id'];
      $teacher_id = $_POST['teacher_id'];

      $sql = "UPDATE classes SET name='$name', course_id=$course_id, teacher_id=$teacher_id WHERE id=$id";
      
      if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  ?>

  <form method="post">
    <input type="text" name="name" class="form-control" placeholder="Name..." value="<?= $class_row['name'] ?>" />
    <br/>
    <select name="course_id" class="form-select">
      <option value="">Select Course</option>
      <?php
        $sql = "SELECT * FROM courses";
        $result = $conn->query($sql);
        foreach ($result as $row) {
          echo "<option value='".$row['id']."'" . ($row['id'] == $class_row['course_id'] ? 'selected' : '') . ">".$row['name']."</option>";
        }
      ?>
      
    </select>
    <br/>
    <select name="teacher_id" class="form-select">
      <option value="">Select Teacher</option>
      <?php
        $sql = "SELECT * FROM teachers";
        $result = $conn->query($sql);
        foreach ($result as $row) {
          echo "<option value='".$row['id']."'" . ($row['id'] == $class_row['teacher_id'] ? 'selected' : '') . ">".$row['first_name'].' '.$row['last_name']."</option>";
        }
      ?>
    </select>
    <br/>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
<?php
  include_once '../partials/footer.php';
?>
