<?php
class ContactManager {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function loadContactRequests() {
        $stmt = $this->pdo->query('SELECT * FROM ContactRequests');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function index() {
        return $this->loadContactRequests();
    }

    public function detail($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM ContactRequests WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($contactRequest) {
        $stmt = $this->pdo->prepare('INSERT INTO ContactRequests (name, email) VALUES (?, ?)');
        $stmt->execute([$contactRequest['name'], $contactRequest['email']]);
    }
    
    

    public function edit($id, $contactRequest) {
        $stmt = $this->pdo->prepare('UPDATE ContactRequests SET name=?, email=? WHERE id=?');
        $stmt->execute([$contactRequest['name'], $contactRequest['email'], $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM ContactRequests WHERE id=?');
        $stmt->execute([$id]);
    }
}
?>
