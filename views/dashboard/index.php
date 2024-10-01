<?php ob_start(); ?>
<h1 class="mb-4">Welcome, <?php echo $_SESSION['username']; ?>!</h1>
<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Manage Students</h5>
        <p class="card-text">View, add, edit, or delete student records.</p>
        <a href="index.php?action=students" class="btn btn-primary">Go to Students</a>
      </div>
    </div>
  </div>
  <!-- Add more dashboard widgets here -->
</div>
<?php 
$content = ob_get_clean(); 
include ROOT_PATH . 'views/layouts/main.php';
?>