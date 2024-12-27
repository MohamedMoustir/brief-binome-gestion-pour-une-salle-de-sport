<?php 
require_once __DIR__ . "/../db/database.php";



class Reservation {
  
    public $id;
    public $activityId;
    public $userId;
    public $date_activity;
    public $time_activity;
    public $status;
    protected $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getPdo();
    }

    public function addReservation($activityId, $userId, $date_activity, $time_activity) {
        try {
            $sql = "INSERT INTO reservations (activityId, userId, date_activity, time_activity)
                    VALUES (:activityId, :userId, :date_activity, :time_activity)";
            $stmt = $this->pdo->prepare($sql);
            
            $stmt->bindParam(':activityId', $activityId);
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':date_activity', $date_activity);
            $stmt->bindParam(':time_activity', $time_activity);
             
            if ($stmt->execute()) {
                return "Réservation ajoutée avec succès.";
            }
         
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    public function deleteReservation($id) {
        try {
            $sql = "DELETE FROM reservations WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    public function getReservationById() {
        try {
            $sql = "SELECT *
                    FROM reservations 
                    JOIN activites ON reservations.activityId = activites.id_activite
                    JOIN users ON reservations.userId = users.id_users";
             
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $reservation = $stmt->fetchAll(PDO::FETCH_ASSOC);
         
                return $reservation;
            
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }


    public function modifyReservation($id, $newDate, $newTime) {
        try {
            $sql = "UPDATE reservations SET date_activity = :date, time_activity = :time WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':date', $newDate);
            $stmt->bindParam(':time', $newTime);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    function modifystatus($id) {
        try {
            $sql = "UPDATE `reservations` 
                    SET `status` = 'confirmee' 
                    WHERE `id` = :id";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $result = $stmt->execute();
            if ($result) {
                echo "Reservation updated successfully.";
            } else {
                echo "Error: Reservation could not be updated.";
            }
    
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    

  
    
    
    public function getTotalReservation() {
        try {
    
            $sql = "SELECT COUNT(*) AS total_reservation FROM reservations";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
          $result = $stmt->fetch(PDO::FETCH_ASSOC);        
            return $result['total_reservation'];
            
        } catch (PDOException $e) {
           
            echo "Error: " . $e->getMessage();
            return 0;
        }
    }

}


