<?php
require_once '../models/Student.php';

class StudentController {
    private $studentModel;

    public function __construct($db) {
        $this->studentModel = new Student($db);
    }

    public function index() {
        $students = $this->studentModel->getAll();
        require ROOT_PATH.'views/students/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nim = $_POST['nim'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            if ($this->studentModel->create($nim, $name, $email, $phone)) {
                header('Location: index.php?action=students');
            } else {
                $error = "Error creating student.";
                require ROOT_PATH.'views/students/create.php';
            }
        } else {
            require ROOT_PATH.'views/students/create.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nim = $_POST['nim'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            if ($this->studentModel->update($id, $nim, $name, $email, $phone)) {
                header('Location: index.php?action=students');
            } else {
                $error = "Error updating student.";
                $student = $this->studentModel->getById($id);
                require ROOT_PATH.'views/students/edit.php';
            }
        } else {
            $student = $this->studentModel->getById($id);
            require ROOT_PATH.'views/students/edit.php';
        }
    }

    public function delete($id) {
        if ($this->studentModel->delete($id)) {
            header('Location: index.php?action=students');
        } else {
            $error = "Error deleting student.";
            $this->index();
        }
    }

    public function view($id) {
        $student = $this->studentModel->getById($id);
        require ROOT_PATH.'views/students/view.php';
    }
}