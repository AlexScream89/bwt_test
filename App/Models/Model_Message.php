<?php
namespace App\Models;
use App\Classes\Model_Base;
Class Model_Message Extends Model_Base {

    protected $table = 'messages';

    public function save(array $data) {
        $stmt = parent::$pdo->prepare("INSERT INTO $this->table(name,email,message)
                                      VALUES (:name,:email,:message)");
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':message', $data['message']);
        $stmt->execute();
    }

    public function get_messages() {
        $stmt = parent::$pdo->query("SELECT * FROM $this->table");
        parent::$pdo->exec('SET CHARACTER SET utf8');
        $result = $stmt->fetchAll();
        return $result;
    }
}