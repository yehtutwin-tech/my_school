<?php
  include_once '../partials/header.php';
?>
  <h1 class="my-3">
    <a
      class="btn btn-outline-secondary"
      href="<?= $base_url ?>/class/index.php">
      &larr;
    </a>
    Class Create
  </h1>
  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['name'];
      $course_id = $_POST['course_id'];
      $teacher_id = $_POST['teacher_id'];

      $sql = "INSERT INTO classes (name, course_id, teacher_id) VALUES ('$name', $course_id, $teacher_id)";
      
      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  ?>

  <form method="post">
    <input type="text" name="name" class="form-control" placeholder="Name..." />
    <br/>
    <select name="course_id" class="form-select">
      <option value="">Select Course</option>
      <?php
        $sql = "SELECT * FROM courses";
        $result = $conn->query($sql);
        foreach ($result as $row) {
          echo "<option value='".$row['id']."'>".$row['name']."</option>";
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
          echo "<option value='".$row['id']."'>".$row['first_name'].' '.$row['last_name']."</option>";
        }
      ?>
    </select>
    <br/>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
<?php
  include_once '../partials/footer.php';
?>
