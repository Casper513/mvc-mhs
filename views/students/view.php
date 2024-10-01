<?php ob_start(); ?>
<h1 class="mb-4">Student Details</h1>
<div class="card">
  <div class="card-body">
    <h5 class="card-title"><?php echo $student['name']; ?></h5>
    <p class="card-text"><strong>NIM:</strong> <?php echo $student['nim']; ?></p>
    <p class="card-text"><strong>Email:</strong> <?php echo $student['email']; ?></p>
    <p class="card-text"><strong>Phone:</strong> <?php echo $student['phone']; ?></p>
    <p class="card-text"><strong>Created at:</strong> <?php echo $student['created_at']; ?></p>
  </div>
</div>
<div class="mt-3">
  <a href="index.php?action=edit&id=<?php echo $student['id']; ?>" class="btn btn-warning">Edit</a>
  <a href="index.php?action=students" class="btn btn-secondary">Back to List</a>
</div>
<?php 
$content = ob_get_clean(); 
include ROOT_PATH . 'views/layouts/main.php';
?>