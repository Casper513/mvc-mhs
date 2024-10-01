<?php ob_start(); ?>
<h1 class="mb-4">Edit Student</h1>
<?php if (isset($error)): ?>
<div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>
<form action="index.php?action=edit&id=<?php echo $student['id']; ?>" method="post">
  <div class="mb-3">
    <label for="nim" class="form-label">NIM</label>
    <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $student['nim']; ?>" required>
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $student['name']; ?>" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $student['email']; ?>" required>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $student['phone']; ?>">
  </div>
  <button type="submit" class="btn btn-primary">Update Student</button>
</form>
<?php 
$content = ob_get_clean(); 
include ROOT_PATH . 'views/layouts/main.php';
?>