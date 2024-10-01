<?php
class DashboardController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }
        require ROOT_PATH.'views/dashboard/index.php';
    }
}