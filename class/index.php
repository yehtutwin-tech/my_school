<?php
  include_once '../partials/header.php';
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Class List</h1>
  <a
    class="btn btn-primary float-end"
    href="<?= $base_url ?>/class/create.php">
    + New Class
  </a>
</div>
  <?php
    $sql = "SELECT 
      classes.id,
      classes.name AS class_name,
      courses.name AS course_name,
      CONCAT(teachers.first_name, ' ', teachers.last_name) AS teacher_name,
      classes.created_at
      FROM classes
      INNER JOIN courses ON classes.course_id = courses.id
      INNER JOIN teachers ON classes.teacher_id = teachers.id";
    $result = $conn->query($sql);
  ?>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Course</th>
        <th>Teacher</th>
        <th>Created At</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($result as $row): ?>
        <tr>
          <td><?= $row["class_name"] ?></td>
          <td><?= $row["course_name"] ?></td>
          <td><?= $row["teacher_name"] ?></td>
          <td><?= date('M d, h:i A', strtotime($row["created_at"])) ?></td>
          <td>
            <a
              class="btn btn-warning"
              href="<?= $base_url ?>/class/edit.php?id=<?= $row['id'] ?>">
              <i class="fa-solid fa-pen-to-square"></i>
              Edit
            </a>

            <a
              class="btn btn-danger"
              href="<?= $base_url ?>/class/delete.php?id=<?= $row['id'] ?>">
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
