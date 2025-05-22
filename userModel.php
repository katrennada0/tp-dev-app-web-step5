<?php
class UserModel {
    private $db;
    public function __construct($database) {
        $this->db = $database;
    }

    public function authenticate($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && hash('sha256', $password) === $user['password']) {
            return $user;
        }
        return false;
    }
}
?>