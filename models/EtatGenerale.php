<?php 

class EtatGenerale
{
  // DB stuff
  private $conn;
  private $table = 'etat_generale';

  // Patient Properties
  public $painte;
  public $fatigue;
  public $travail;
  public $activites;
  public $appetit;
  public $autonomie;
  public $douleur;
  public $depression;
  public $id_etat;


  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Create Patient
  public function create()
  {
    // Create query
    $query = "INSERT into ". $this->table ." (painte, fatigue, travail, activites, appetit, autonomie, douleur, depression, id_etat) values (:painte, :fatigue, :travail, :activites, :appetit, :autonomie, :douleur, :depression, :id_etat)";

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->painte = htmlspecialchars(strip_tags($this->painte));
    $this->fatigue = htmlspecialchars(strip_tags($this->fatigue));
    $this->travail = htmlspecialchars(strip_tags($this->travail));
    $this->activites = htmlspecialchars(strip_tags($this->activites));
    $this->appetit = htmlspecialchars(strip_tags($this->appetit));
    $this->autonomie = htmlspecialchars(strip_tags($this->autonomie));
    $this->douleur = htmlspecialchars(strip_tags($this->douleur));
    $this->depression = htmlspecialchars(strip_tags($this->depression));
    $this->id_etat = htmlspecialchars(strip_tags($this->id_etat));

    // Bind data
    $stmt->bindParam(':painte', $this->painte);
    $stmt->bindParam(':fatigue', $this->fatigue);
    $stmt->bindParam(':travail', $this->travail);
    $stmt->bindParam(':activites', $this->activites);
    $stmt->bindParam(':appetit', $this->appetit);
    $stmt->bindParam(':autonomie', $this->autonomie);
    $stmt->bindParam(':douleur', $this->douleur);
    $stmt->bindParam(':depression', $this->depression);
    $stmt->bindParam(':id_etat', $this->id_etat);

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
    $query = 'UPDATE '. $this->table .' SET painte = :painte, fatigue = :fatigue, travail = :travail, activites = :activites, appetit = :appetit, autonomie = :autonomie, douleur = :douleur, depression =:depression WHERE id_etat = :id_etat';
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->painte = htmlspecialchars(strip_tags($this->painte));
    $this->fatigue = htmlspecialchars(strip_tags($this->fatigue));
    $this->travail = htmlspecialchars(strip_tags($this->travail));
    $this->activites = htmlspecialchars(strip_tags($this->activites));
    $this->appetit = htmlspecialchars(strip_tags($this->appetit));
    $this->autonomie = htmlspecialchars(strip_tags($this->autonomie));
    $this->douleur = htmlspecialchars(strip_tags($this->douleur));
    $this->depression = htmlspecialchars(strip_tags($this->depression));
    $this->id_etat = htmlspecialchars(strip_tags($this->id_etat));

    // Bind data
    $stmt->bindParam(':painte', $this->painte);
    $stmt->bindParam(':fatigue', $this->fatigue);
    $stmt->bindParam(':travail', $this->travail);
    $stmt->bindParam(':activites', $this->activites);
    $stmt->bindParam(':appetit', $this->appetit);
    $stmt->bindParam(':autonomie', $this->autonomie);
    $stmt->bindParam(':douleur', $this->douleur);
    $stmt->bindParam(':depression', $this->depression);
    $stmt->bindParam(':id_etat', $this->id_etat);

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
    $query = 'DELETE FROM '. $this->table .' WHERE id_etat = :id_etat';
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id_etat = htmlspecialchars(strip_tags($this->id_etat));

    // Bind data
    $stmt->bindParam(':id_etat', $this->id_etat);
    
    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);
    return false;
  }

}
