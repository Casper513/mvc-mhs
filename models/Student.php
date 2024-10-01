<?php
class Student {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM students";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM students WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($nim, $name, $email, $phone) {
        $query = "INSERT INTO students (nim, name, email, phone) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss", $nim, $name, $email, $phone);
        return $stmt->execute();
    }

    public function update($id, $nim, $name, $email, $phone) {
        $query = "UPDATE students SET nim = ?, name = ?, email = ?, phone = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssi", $nim, $name, $email, $phone, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM students WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}