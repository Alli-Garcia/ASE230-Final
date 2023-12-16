<?php

include_once 'db.php';

class AwardManager {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $stmt = $this->pdo->query('SELECT * FROM awards');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($year, $description) {
        $stmt = $this->pdo->prepare('INSERT INTO awards (year, description) VALUES (?, ?)');
        $stmt->execute([$year, $description]);
        return $this->pdo->lastInsertId();
    }
    

    public function edit($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM awards WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public function detail($id) {
        $stmt = $this->pdo->prepare('SELECT description FROM awards WHERE id = ?');
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo $result['description'];
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM awards WHERE id = ?');
        $stmt->execute([$id]);
        echo 'Changes made.';
    }
}
?>
