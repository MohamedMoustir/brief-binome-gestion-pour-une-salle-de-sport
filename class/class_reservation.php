

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

  
    public function addReservation($activityId,$userId, $date_activity, $time_activity) {
        try {
            $sql = "INSERT INTO reservations ( activityId, userId, date_activity, time_activity)
                    VALUES (:activityId,:userId,:date_activity,:time_activity)";
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

        
            $stmt->execute();
            return "Réservation supprimée avec succès.";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    // public function getReservationById($id) {
    //     try {
    //         $sql = "SELECT * FROM reservations WHERE id = :id";
    //         $stmt = $this->pdo->prepare($sql);
    //         $stmt->bindParam(':id', $id);
    //         $stmt->execute();

    //         $reservation = $stmt->fetch(PDO::FETCH_ASSOC);
    //         if ($reservation) {
    //             $this->id = $reservation['id'];
    //             $this->activity_id = $reservation['activity_id'];
    //             $this->client_name = $reservation['client_name'];
    //             $this->client_email = $reservation['client_email'];
    //             $this->reservation_date = $reservation['reservation_date'];
    //             $this->status = $reservation['status'];
    //             return $this;
    //         } else {
    //             return null;  
    //         }
    //     } catch (PDOException $e) {
    //         return "Erreur : " . $e->getMessage();
    //     }
    // }

  
    // public function getAllReservations() {
    //     try {
    //         $sql = "SELECT * FROM reservations";
    //         $stmt = $this->pdo->prepare($sql);
    //         $stmt->execute();

    //         $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //         return $reservations;
    //     } catch (PDOException $e) {
    //         return "Erreur : " . $e->getMessage();
    //     }
    // }

    // // Méthode pour mettre à jour le statut d'une réservation
    // public function updateReservationStatus($id, $status) {
    //     try {
    //         $sql = "UPDATE reservations SET status = :status WHERE id = :id";
    //         $stmt = $this->pdo->prepare($sql);

    //         // Lier les paramètres
    //         $stmt->bindParam(':status', $status);
    //         $stmt->bindParam(':id', $id);

    //         // Exécuter la requête
    //         $stmt->execute();
    //         return "Statut de la réservation mis à jour avec succès.";
    //     } catch (PDOException $e) {
    //         return "Erreur : " . $e->getMessage();
    //     }
    // }
}
