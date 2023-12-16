<?php
class TeamManager {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getTeamMembers() {
        $stmt = $this->pdo->query('SELECT * FROM Team');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTeamMember($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM Team WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createTeamMember($teamMember) {
        $stmt = $this->pdo->prepare('INSERT INTO Team (team_member, role, bio) VALUES (?, ?, ?)');
        $stmt->execute([$teamMember['Team member'], $teamMember['Role'], $teamMember['Bio']]);
    }

    public function updateTeamMember($id, $updatedTeamMember) {
        $stmt = $this->pdo->prepare('UPDATE Team SET team_member=?, role=?, bio=? WHERE id=?');
        $stmt->execute([$updatedTeamMember['Team member'], $updatedTeamMember['Role'], $updatedTeamMember['Bio'], $id]);
        return $stmt->rowCount() > 0;
    }

    public function deleteTeamMember($id) {
        $stmt = $this->pdo->prepare('DELETE FROM Team WHERE id=?');
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }
}
?>
