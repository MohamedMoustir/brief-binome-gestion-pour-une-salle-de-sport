<?php

  session_start();
require_once ("class_sports.php");

class login extends users
{
  
   public function __construct($email,$password)
   {
       $db = new Database();
       $this->pdo = $db->getPdo();
       $this->email = $email;
       $this->password = $password;
  
   }
    
   public function IsertionLogin(){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
  
    if (empty($email)||empty($password)) {
      echo "Please enter both email and password.";
    } else {
           var_dump($email);
  echo "<br>";
  var_dump($password);
  echo "<br> ///////////////////////////////// <br>";

      try {
        $stmt ="SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($stmt);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_OBJ);
 
        if ($user) {
          if (password_verify($password, $user->pass_word)) {
           
            $_SESSION['id'] = $user->id;
            $_SESSION['email'] = $user->email;
            $_SESSION['password'] = $user->password;
            $_SESSION['Role'] = $user->Role;
         
            if ($user->Role == 0) {
              header('Location:index.php');
              exit();
            } else {
              header('Location:dashboard.php');
              exit();
            }
          } else {
            echo "Incorrect password.";
          }
        } else {
          echo "No user found with this email.";
        }
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  
  }
}