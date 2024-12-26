<?php
require_once __DIR__ . "/../db/database.php";

class users
{
    protected $username;
    protected $email;
    private $password;
    protected $role;
    private $pdo;

    public function __construct($username, $email, $password, $role)
    {
        $db = new Database();
        $this->pdo = $db->getPdo();
        $this->username = $username;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->role = $role;
    }

    public function insertUsers()
    {
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

}

class Client extends users
{
}

class admin extends users
{
}
?>
