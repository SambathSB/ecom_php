<?php
  require($_SERVER['DOCUMENT_ROOT'] . "/a/admin/config/db_connection.php");
  class User {
    private $conn;
    public function __construct()
    {
      $db = new DBConnection();
      $this->conn = $db->connection();
    }

    public function count() {
      try {
        $query = "SELECT count(id) FROM users";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }
    
    public function all() {
      $query = "SELECT * FROM users ORDER BY id DESC";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
    }

    public function find($id) {
      try {
        $query = "SELECT * FROM users WHERE id = :id ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }

    public function findByUsername($username) {
      try {
        $query = "SELECT * FROM users WHERE username LIKE ? ORDER BY id DESC";
        $param = array("%$username%");
        $stmt = $this->conn->prepare($query);
        $stmt->execute($param);
        return $stmt;
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }

    public function insert($username, $email, $password, $image) {
      try {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, email, password, image) VALUES (:username, :email, :password, :image)";
          $stmt = $this->conn->prepare($query);
          $stmt->bindParam(":username", $username);
          $stmt->bindParam(":email", $email);
          $stmt->bindParam(":password", $password);
          $stmt->bindParam(":image", $image);
          $stmt->execute();
          return $stmt;
      } catch(PDOException $e) {
        echo $e->getMessage();
      }
    }

    public function update($username, $email, $password, $image, $id) {
      try {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE users SET username = :username, email = :email, password = :password, image = :image WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":image", $image);
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