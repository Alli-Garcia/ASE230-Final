<?php
class ContactManager {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function loadContactRequests() {
        try {
            $stmt = $this->pdo->query('SELECT * FROM ContactRequests');
            $contactRequests = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $contactRequests;
        } catch (PDOException $e) {
            // Log or display the error
            error_log('Error fetching contact requests: ' . $e->getMessage());
            return []; // Return an empty array or handle the error in another way
        }
    }

    public function index() {
        return $this->loadContactRequests();
    }

    public function detail($id) {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM ContactRequests WHERE id = ?');
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log or display the error
            error_log('Error fetching contact request details: ' . $e->getMessage());
            return false; // Return false or handle the error in another way
        }
    }

    public function create($contactRequest) {
        try {
            // Validate input data here if needed

            $stmt = $this->pdo->prepare('INSERT INTO ContactRequests (name, email) VALUES (?, ?)');
            $stmt->execute([$contactRequest['name'], $contactRequest['email']]);
        } catch (PDOException $e) {
            // Log or display the error
            error_log('Error creating contact request: ' . $e->getMessage());
            // Optionally, rethrow the exception to let the calling code handle it
            throw $e;
        }
    }

    public function edit($id, $contactRequest) {
        try {
            // Validate input data here if needed

            $stmt = $this->pdo->prepare('UPDATE ContactRequests SET name=?, email=? WHERE id=?');
            $stmt->execute([$contactRequest['name'], $contactRequest['email'], $id]);
        } catch (PDOException $e) {
            // Log or display the error
            error_log('Error editing contact request: ' . $e->getMessage());
            // Optionally, rethrow the exception to let the calling code handle it
            throw $e;
        }
    }

    public function delete($id) {
        try {
            $stmt = $this->pdo->prepare('DELETE FROM ContactRequests WHERE id=?');
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            // Log or display the error
            error_log('Error deleting contact request: ' . $e->getMessage());
            // Optionally, rethrow the exception to let the calling code handle it
            throw $e;
        }
    }
}
?>
