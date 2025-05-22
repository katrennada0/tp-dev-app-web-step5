<?php
class BmiModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function saveBmiRecord($name, $weight, $height, $bmi, $status) {
        $stmt = $this->db->prepare("INSERT INTO bmi_records (user_id, name, weight, height, bmi, status)
                                    VALUES (1, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $weight, $height, $bmi, $status]);
    }
    public function getUserBmiHistory($userId) {
        $stmt = $this->db->prepare("SELECT * FROM bmi_records WHERE user_id = ? ORDER BY timestamp ASC");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
