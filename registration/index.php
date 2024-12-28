<?php
  include_once '../partials/header.php';
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Registration List</h1>
  <a
    class="btn btn-primary float-end"
    href="<?= $base_url ?>/registration/create.php">
    + New Register
  </a>
</div>
  <?php
      $sql = "SELECT
        student_classes.id,
        student_classes.enrollment_date,
        CONCAT(students.first_name, ' ', students.last_name) AS student_name,
        classes.name AS class_name,
        courses.name AS course_name,
        CONCAT(teachers.first_name, ' ', teachers.last_name) AS teacher_name
        FROM student_classes
        INNER JOIN students ON student_classes.student_id=students.id
        INNER JOIN classes ON student_classes.class_id=classes.id
        INNER JOIN courses ON classes.course_id=courses.id
        INNER JOIN teachers ON classes.teacher_id=teachers.id
        ";
    $result = $conn->query($sql);
  ?>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Class Name</th>
        <th>Course Name</th>
        <th>Teacher Name</th>
        <th>Enrollment Date</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($result as $row): ?>
        <tr>
          <td><?= $row["student_name"] ?></td>
          <td><?= $row["class_name"] ?></td>
          <td><?= $row["course_name"] ?></td>
          <td><?= $row["teacher_name"] ?></td>
          <td><?= date('M d, h:i A', strtotime($row["enrollment_date"])) ?></td>
          <td>
            <a
              class="btn btn-warning"
              href="<?= $base_url ?>/registration/edit.php?id=<?= $row['id'] ?>">
              <i class="fa-solid fa-pen-to-square"></i>
              Edit
            </a>

            <a
              class="btn btn-danger"
              href="<?= $base_url ?>/registration/delete.php?id=<?= $row['id'] ?>">
              <i class="fa-solid fa-trash"></i>
              Delete
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php
  include_once '../partials/footer.php';
?>
