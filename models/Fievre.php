<?php 

class Fievre 
{
  // DB stuff
  private $conn;
  private $table = 'fievre';

  // Patient Properties
  public $id_fievre;
  public $dure;
  public $mesure;
  public $date_apparition;

  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Create Patient
  public function create()
  {
    // Create query
    $query = "INSERT into ". $this->table ." (id_fievre, dure, mesure, date_apparition) values (:id_fievre, :dure, :mesure, :date_apparition)";

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id_fievre = htmlspecialchars(strip_tags($this->id_fievre));
    $this->dure = htmlspecialchars(strip_tags($this->dure));
    $this->mesure = htmlspecialchars(strip_tags($this->mesure));
    $this->date_apparition = htmlspecialchars(strip_tags($this->date_apparition));

    // Bind data
    $stmt->bindParam(':id_fievre', $this->id_fievre);
    $stmt->bindParam(':dure', $this->dure);
    $stmt->bindParam(':mesure', $this->mesure);
    $stmt->bindParam(':date_apparition', $this->date_apparition);

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
    $query = 'UPDATE '. $this->table .' SET dure = :dure, mesure = :mesure, date_apparition = :date_apparition WHERE id_fievre = :id_fievre';
    // Prepare statement

    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id_fievre = htmlspecialchars(strip_tags($this->id_fievre));
    $this->dure = htmlspecialchars(strip_tags($this->dure));
    $this->mesure = htmlspecialchars(strip_tags($this->mesure));
    $this->date_apparition = htmlspecialchars(strip_tags($this->date_apparition));
    // Bind data
    $stmt->bindParam(':id_fievre', $this->id_fievre);
    $stmt->bindParam(':dure', $this->dure);
    $stmt->bindParam(':mesure', $this->mesure);
    $stmt->bindParam(':date_apparition', $this->date_apparition);

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
    $query = 'DELETE FROM '. $this->table .' WHERE id_fievre = :id_fievre';
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id_fievre = htmlspecialchars(strip_tags($this->id_fievre));

    // Bind data
    $stmt->bindParam(':id_fievre', $this->id_fievre);
    
    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);
    return false;
  }

}
