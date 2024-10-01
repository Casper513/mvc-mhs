<?php ob_start(); ?>
<h1 class="mb-4">Student List</h1>
<a href="index.php?action=create" class="btn btn-primary mb-3">Add New Student</a>
<?php if (isset($error)): ?>
<div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>
<div class="table-responsive">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>NIM</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($students as $student): ?>
      <tr>
        <td><?php echo $student['nim']; ?></td>
        <td><?php echo $student['name']; ?></td>
        <td><?php echo $student['email']; ?></td>
        <td><?php echo $student['phone']; ?></td>
        <td>
          <a href="index.php?action=view&id=<?php echo $student['id']; ?>" class="btn btn-sm btn-info">View</a>
          <a href="index.php?action=edit&id=<?php echo $student['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="index.php?action=delete&id=<?php echo $student['id']; ?>" class="btn btn-sm btn-danger"
            onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php 
$content = ob_get_clean(); 
include ROOT_PATH . 'views/layouts/main.php';
?>