<?php
  require($_SERVER['DOCUMENT_ROOT'] . "/a/admin/config/db_connection.php");
  class User {
    private $conn;
    public function __construct()
    {
      $db = new DBConnection();
      $this->conn = $db->connection();
    }
    
    public function all() {
      $query = "SELECT * FROM users";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
    }

    public function find($id) {
      $query = "SELECT * FROM users WHERE id = :id";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
      return $stmt;
    }

    public function insert($username, $email, $password) {
      try {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
          $stmt = $this->conn->prepare($query);
          $stmt->bindParam(":username", $username);
          $stmt->bindParam(":email", $email);
          $stmt->bindParam(":password", $password);
          $stmt->execute();
          return $stmt;
      } catch(PDOException $e) {
        echo $e->getMessage();
      }
    }

    public function update($username, $email, $password, $id) {
      try {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE users SET username = :username, email = :email, password = :password WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }

    public function delete($id) {
      try {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }
  }

?>