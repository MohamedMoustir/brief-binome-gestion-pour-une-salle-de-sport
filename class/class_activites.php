<?php


class activites
{
    public $Nom_activite;
    public $Description_activite;
    public $Capacite;
    public $date_debut;
    public $date_fin;
    public $Disponibilite;
    public $upload_img;
    protected $pdo;
    protected $id_activite;

    public function __construct( ) {
        $db = new Database();
        $this->pdo = $db->getPdo();
        


    }


    public function Insertactivites(
        $Nom_activite,
        $Description_activite,
        $Capacite,
        $date_debut,
        $date_fin,
        $Disponibilite,
        $upload_img
    )
    { 
        $this->Nom_activite = $Nom_activite;
        $this->Description_activite = $Description_activite;
        $this->Capacite = $Capacite;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->Disponibilite = $Disponibilite;
        $this->upload_img = $upload_img;

            try {
                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {

                    $permited = array('jpg', 'png', 'jpeg', 'gif');
                    $file_name = $_FILES['avatar']['name'];
                    $file_size = $_FILES['avatar']['size'];
                    $file_temp = $_FILES['avatar']['tmp_name'];
                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                
                    if (in_array($file_ext, $permited)) {
                      $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                      $this->upload_img = " upload/" . $unique_image;
                    //   move_uploaded_file($file_temp, $this->upload_img);
                      if (move_uploaded_file($file_temp, $this->upload_img)) {


                      } else {
                
                        $this->upload_img = NULL;
                      }
                    }
                 }
                
                    $query = "INSERT INTO activites(Nom_activite,Description_activite, Capacite, date_debut,date_fin,Disponibilite,image_path) VALUES (?,?,?,?,?,?,?)";
                    $stmt = $this->pdo->prepare($query);
                    $stmt->execute([$this->Nom_activite,$this->Description_activite, $this->Capacite, $this->date_debut, $this->date_fin, $this->Disponibilite, $this->upload_img]);
                    return true;
                  
            } catch (PDOException $e) {
                echo "Insert failed: " . $e->getMessage();
                return false;

                }
        
    }



    public function affichageActivites(){

        $stmt = $this->pdo->prepare('SELECT * FROM activites');
        $stmt->execute();
        $activites = $stmt->fetchAll(PDO::FETCH_ASSOC);
       return  $activites;
         if ($activites) {
            return " users found with the role: ";
          return $activites;
        } else {
            return "No users found with the role: ";
        }
     }

     public function getActivites($id_activite){

        $stmt = $this->pdo->prepare('SELECT * FROM activites where id_activite = :id_activite');
        
        $stmt->bindParam(':id_activite', $id_activite);
        $stmt->execute();
        $activites = $stmt->fetch(PDO::FETCH_ASSOC);
       return  $activites;
         if ($activites) {
            return " users found with the role: ";
          return $activites;
        } else {
            return "No users found with the role: ";
        }
     }
 


     public function updateActivites(
        $Nom_activite,
        $Description_activite,
        $Capacite,
        $date_debut,
        $date_fin,
        $Disponibilite,
        $id_activite
    ) {
        try {
            $sql = "UPDATE activites SET
                Nom_activite = :Nom_activite,
                Description_activite = :Description_activite,
                Capacite = :Capacite,
                date_debut = :date_debut,
                date_fin = :date_fin,
                Disponibilite = :Disponibilite
                WHERE id_activite = :id_activite";
    
            $stmt = $this->pdo->prepare($sql);
    
            $stmt->bindParam(':Nom_activite', $Nom_activite, PDO::PARAM_STR);
            $stmt->bindParam(':Description_activite', $Description_activite, PDO::PARAM_STR);
            $stmt->bindParam(':Capacite', $Capacite, PDO::PARAM_INT);
            $stmt->bindParam(':date_debut', $date_debut, PDO::PARAM_STR);
            $stmt->bindParam(':date_fin', $date_fin, PDO::PARAM_STR);
            $stmt->bindParam(':Disponibilite', $Disponibilite, PDO::PARAM_BOOL);
            $stmt->bindParam(':id_activite', $id_activite, PDO::PARAM_INT);
    
            $stmt->execute();
    
            return "Statut de l'activité mis à jour avec succès.";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }
    

    // Getters
    public function getNom_activite()
    {
        return $this->Nom_activite;
    }

    public function getDescription_activite()
    {
        return $this->Description_activite;
    }

    public function getCapacite()
    {
        return $this->Capacite;
    }
    public function getDate_debut()
    {
        return $this->date_debut;
    }
    public function getdate_fin()
    {
        return $this->date_fin;
    }
    public function getDisponibilite()
    {
        return $this->Disponibilite;
    }
    public function getImage_path()
    {
        return $this->upload_img;
    }
    // Setters
    public function setNom_activite($Nom_activite)
    {
        $this->Nom_activite = $Nom_activite;
    }

    public function setDescription_activite($Description_activite)
    {
        $this->Description_activite = $Description_activite;
    }

    public function setCapacite($Capacite)
    {
        $this->Capacite = $Capacite;
    }

    public function setdate_debut($date_debut)
    {
        $this->date_debut = $date_debut;
    }

    public function setdate_fin($date_fin)
    {
        $this->date_fin = $date_fin;
    }

    public function setDisponibilite($Disponibilite)
    {
        $this->Disponibilite = $Disponibilite;
    }

    public function setImage_path($upload_img)
    {
        $this->upload_img = $upload_img;
    }




}


