<?php
namespace App\Models;
use App\Classes\Model_Base;
Class Model_User Extends Model_Base {

   protected $table='users';

    public function save(array $data) {
        $stmt = parent::$pdo->prepare("INSERT INTO $this->table(name,surname,email,password,gender,dob)
                                      VALUES (:name,:surname,:email,:password,:gender,:dob)");
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':surname', $data['surname']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':gender', $data['gender']);
        $stmt->bindParam(':dob', $data['dob']);
        $stmt->execute();
   }

   public function user_enter(array $data) {
       $stmt = parent::$pdo->prepare("SELECT * FROM $this->table WHERE email = :email");
       $stmt->bindParam(':email', $data['email']);
       $stmt->execute();
       $result = $stmt->fetch(\PDO::FETCH_ASSOC);
       $_SESSION['user'] = $result['email'];
       $password = $result['password'];
       if (password_verify($data['password'],$password)) {
           return true;
       }
       else {
           return false;
       }
   }

   public function unique_email($email) {
       $stmt = parent::$pdo->prepare("SELECT email FROM $this->table WHERE email = :email");
       $stmt->bindParam(':email', $email);
       $stmt->execute();
       if (!empty($stmt->fetchAll())) {
           return false;
       }
       else {
           return true;
       }
   }

   public static function is_auth() {
       if (!empty($_SESSION['user'])) {
           return true;
       }
       else {
           return false;
       }
   }

}