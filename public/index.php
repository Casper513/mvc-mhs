<?php
define('ROOT_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);
session_start();
require_once '../config/database.php';
require_once '../controllers/StudentController.php';
require_once '../controllers/AuthController.php';
require_once '../controllers/DashboardController.php';

$studentController = new StudentController($conn);
$authController = new AuthController($conn);
$dashboardController = new DashboardController();

$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($action) {
    case 'login':
        $authController->login();
        break;
    case 'register':
        $authController->register();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'dashboard':
        $dashboardController->index();
        break;
    case 'students':
        $studentController->index();
        break;
    case 'create':
        $studentController->create();
        break;
    case 'edit':
        $studentController->edit($id);
        break;
    case 'delete':
        $studentController->delete($id);
        break;
    case 'view':
        $studentController->view($id);
        break;
    default:
        header('Location: index.php?action=login');
        break;
}