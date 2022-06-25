<?php 

class Medecin 
{
  // DB stuff
  private $conn;
  private $table = 'medecin';

  // Patient Properties
  public $id_medecin;
  public $Nom;
  public $Prenom;
  public $email;
  public $telephone;
  public $id_admin;
  public $password;
  public $token;

  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Create Patient
  public function create()
  {
    // Create query
    $query = "INSERT into ". $this->table ." (id_medecin, Nom, Prenom, email, telephone, id_admin, password, token) values (:id_medecin, :Nom, :Prenom, :email, :telephone, :id_admin, :password, :token)";

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id_medecin = htmlspecialchars(strip_tags($this->id_medecin));
    $this->Nom = htmlspecialchars(strip_tags($this->Nom));
    $this->Prenom = htmlspecialchars(strip_tags($this->Prenom));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->telephone = htmlspecialchars(strip_tags($this->telephone));
    $this->id_admin = htmlspecialchars(strip_tags($this->id_admin));
    $this->password = htmlspecialchars(strip_tags($this->password));
    $this->token = htmlspecialchars(strip_tags($this->token));

    // Bind data
    $stmt->bindParam(':id_medecin', $this->id_medecin);
    $stmt->bindParam(':Nom', $this->Nom);
    $stmt->bindParam(':Prenom', $this->Prenom);
    $stmt->bindParam(':email', $this->email);

    $stmt->bindParam(':telephone', $this->telephone);
    $stmt->bindParam(':id_admin', $this->id_admin);
    $stmt->bindParam(':password', $this->password);
    $stmt->bindParam(':token', $this->token);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);
    return false;
  }

  public function update()
  {
    // Create query
    $query = 'UPDATE '. $this->table .' SET Nom = :Nom, Prenom = :Prenom, email = :email, telephone = :telephone, id_admin = :id_admin, password = :password, token = :token WHERE id_medecin = :id_medecin';
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id_medecin = htmlspecialchars(strip_tags($this->id_medecin));
    $this->Nom = htmlspecialchars(strip_tags($this->Nom));
    $this->Prenom = htmlspecialchars(strip_tags($this->Prenom));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->telephone = htmlspecialchars(strip_tags($this->telephone));
    $this->id_admin = htmlspecialchars(strip_tags($this->id_admin));
    $this->password = htmlspecialchars(strip_tags($this->password));
    $this->token = htmlspecialchars(strip_tags($this->token));

    // Bind data
    $stmt->bindParam(':id_medecin', $this->id_medecin);
    $stmt->bindParam(':Nom', $this->Nom);
    $stmt->bindParam(':Prenom', $this->Prenom);
    $stmt->bindParam(':email', $this->email);

    $stmt->bindParam(':telephone', $this->telephone);
    $stmt->bindParam(':id_admin', $this->id_admin);
    $stmt->bindParam(':password', $this->password);
    $stmt->bindParam(':token', $this->token);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);
    return false;
  }

  public function delete()
  {
    // Create query
    $query = 'DELETE FROM '. $this->table .' WHERE id_medecin = :id_medecin';
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id_medecin = htmlspecialchars(strip_tags($this->id_medecin));

    // Bind data
    $stmt->bindParam(':id_medecin', $this->id_medecin);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);
    return false;
  }
}
