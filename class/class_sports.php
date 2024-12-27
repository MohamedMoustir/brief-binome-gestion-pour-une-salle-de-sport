<?php
require_once __DIR__ . "/../db/database.php";

class users
{
    protected $username;
    protected $email;
    protected $password;
    protected $role;
    protected $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getPdo();
        
    }

    public function insertUsers($username, $email, $password, $role)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->role = $role;
        try {
            $query = "INSERT INTO users (username, email, pass_word, Role) VALUES (?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$this->username, $this->email, $this->password, $this->role]);
            return true;
        } catch (PDOException $e) {
            echo "Insert failed: " . $e->getMessage();
            return false;
        }
    }

 

    public function selectUsers()
    {
        try {
            $query = "SELECT * FROM users";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        } catch (PDOException $e) {
            echo "Select failed: " . $e->getMessage();
            return false;
        }
    }
    
    public function deleteUser($id)
{
    try {
       
        $query = "DELETE FROM users WHERE id_users = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]); 
        return true;
    } catch (PDOException $e) {
        echo "Delete failed: " . $e->getMessage();
        return false;
    }
}
public function getTotalusers() {
    try {

        $sql = "SELECT COUNT(*) AS total_users FROM users";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $result['total_users'];
        
    } catch (PDOException $e) {
       
        echo "Error: " . $e->getMessage();
        return 0;
    }
}
    // Getters
    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }

    // Setters
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function setRole($role)
    {
        $this->role = $role;
    }


}

?>