<?php
  include_once '../partials/header.php';
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Teacher List</h1>
  <a
    class="btn btn-primary float-end"
    href="<?= $base_url ?>/teacher/create.php">
    + New Teacher
  </a>
</div>
  <?php
    $sql = "SELECT * FROM teachers";
    $result = $conn->query($sql);
  ?>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Hire Date</th>
        <th>Created At</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($result as $row): ?>
        <tr>
          <td><?= $row["first_name"] . ' ' . $row['last_name'] ?></td>
          <td><?= $row["email"] ?></td>
          <td><?= $row["phone"] ?></td>
          <td><?= date('M d, h:i A', strtotime($row["hire_date"])) ?></td>
          <td><?= date('M d, h:i A', strtotime($row["created_at"])) ?></td>
          <td>
            <a
              class="btn btn-warning"
              href="<?= $base_url ?>/teacher/edit.php?id=<?= $row['id'] ?>">
              <i class="fa-solid fa-pen-to-square"></i>
              Edit
            </a>

            <a
              class="btn btn-danger"
              href="<?= $base_url ?>/teacher/delete.php?id=<?= $row['id'] ?>">
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
