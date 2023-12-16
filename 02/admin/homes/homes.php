<?php

class HomesManager {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $stmt = $this->pdo->query('SELECT * FROM homes');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function detail($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM homes WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($product) {
        $stmt = $this->pdo->prepare('INSERT INTO homes (address, city, state, zipcode, image) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$product['address'], $product['city'], $product['state'], $product['zipcode'], $product['image']]);
    }

    public function edit($id, $product) {
        $stmt = $this->pdo->prepare('UPDATE homes SET address = ?, city = ?, state = ?, zipcode = ?, image = ? WHERE id = ?');
        $stmt->execute([$product['address'], $product['city'], $product['state'], $product['zipcode'], $product['image'], $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM homes WHERE id = ?');
        $stmt->execute([$id]);
    }
}
