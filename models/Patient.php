<?php 

class Patient 
{
  // DB stuff
  private $conn;
  private $table = 'patient';

  // Patient Properties
  public $Id;
  public $Nom;
  public $Prenom;
  public $tel;
  public $sexe;
  public $datnais;
  public $protocole;
  public $date_cure;
  public $age;
  public $email;
  public $id_admin;
  public $id_etat;
  public $id_tox;
  public $id_gonadique;
  public $code;
  public $id_cu;
  public $id_degestive;
  public $id_oculaire;
  public $token;
  public $ip;
  public $cod;

  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Create Patient
  public function create()
  {
    // Create query
    $query = "INSERT into ". $this->table ." (Id, Nom, Prenom, tel, sexe, datnais, protocole, date_cure, age, email, id_admin, id_etat, id_tox, id_gonadique, code, id_cu, id_degestive, id_oculaire, token, ip, cod) values (:Id ,:Nom ,:Prenom ,:tel, :sexe, :datnais,:protocole,:date_cure,:age,:email,:id_admin,:id_etat,:id_tox,:id_gonadique,:code,:id_cu,:id_degestive,:id_oculaire,:token,:ip,:cod)";
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->Id = htmlspecialchars(strip_tags($this->Id));
    $this->Nom = htmlspecialchars(strip_tags($this->Nom));
    $this->Prenom = htmlspecialchars(strip_tags($this->Prenom));
    $this->tel = htmlspecialchars(strip_tags($this->tel));
    $this->sexe = htmlspecialchars(strip_tags($this->sexe));
    $this->datnais = htmlspecialchars(strip_tags($this->datnais));
    $this->protocole = htmlspecialchars(strip_tags($this->protocole));
    $this->date_cure = htmlspecialchars(strip_tags($this->date_cure));
    $this->age = htmlspecialchars(strip_tags($this->age));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->id_admin = htmlspecialchars(strip_tags($this->id_admin));
    $this->id_etat = htmlspecialchars(strip_tags($this->id_etat));
    $this->id_tox = htmlspecialchars(strip_tags($this->id_tox));
    $this->id_gonadique = htmlspecialchars(strip_tags($this->id_gonadique));
    $this->code = htmlspecialchars(strip_tags($this->code));
    $this->id_cu = htmlspecialchars(strip_tags($this->id_cu));
    $this->id_degestive = htmlspecialchars(strip_tags($this->id_degestive));
    $this->id_oculaire = htmlspecialchars(strip_tags($this->id_oculaire));
    $this->token = htmlspecialchars(strip_tags($this->token));
    $this->ip = htmlspecialchars(strip_tags($this->ip));
    $this->cod = htmlspecialchars(strip_tags($this->cod));

    // Bind data
    $stmt->bindParam(':Id', $this->Id);
    $stmt->bindParam(':Nom', $this->Nom);
    $stmt->bindParam(':Prenom', $this->Prenom);
    $stmt->bindParam(':tel', $this->tel);

    $stmt->bindParam(':sexe', $this->sexe);
    $stmt->bindParam(':datnais', $this->datnais);
    $stmt->bindParam(':protocole', $this->protocole);
    $stmt->bindParam(':date_cure', $this->date_cure);

    $stmt->bindParam(':age', $this->age);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':id_admin', $this->id_admin);
    $stmt->bindParam(':id_etat', $this->id_etat);

    $stmt->bindParam(':id_tox', $this->id_tox);
    $stmt->bindParam(':id_gonadique', $this->id_gonadique);
    $stmt->bindParam(':code', $this->code);
    $stmt->bindParam(':id_cu', $this->id_cu);

    $stmt->bindParam(':id_degestive', $this->id_degestive);
    $stmt->bindParam(':id_oculaire', $this->id_oculaire);
    $stmt->bindParam(':token', $this->token);
    $stmt->bindParam(':ip', $this->ip);

    $stmt->bindParam(':cod', $this->cod);

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
    $query = 'UPDATE '. $this->table .' SET Nom = :Nom, Prenom = :Prenom, tel = :tel, sexe = :sexe, datnais = :datnais, protocole = :protocole, date_cure = :date_cure, age = :age, email = :email, id_admin = :id_admin, id_etat = :id_etat, id_tox = :id_tox, id_gonadique = :id_gonadique, code = :code, id_cu = :id_cu, id_degestive = :id_degestive, id_oculaire = :id_oculaire, token = :token, ip = :ip, cod = :cod WHERE Id = :Id';
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->Id = htmlspecialchars(strip_tags($this->Id));
    $this->Nom = htmlspecialchars(strip_tags($this->Nom));
    $this->Prenom = htmlspecialchars(strip_tags($this->Prenom));
    $this->tel = htmlspecialchars(strip_tags($this->tel));
    $this->sexe = htmlspecialchars(strip_tags($this->sexe));
    $this->datnais = htmlspecialchars(strip_tags($this->datnais));
    $this->protocole = htmlspecialchars(strip_tags($this->protocole));
    $this->date_cure = htmlspecialchars(strip_tags($this->date_cure));
    $this->age = htmlspecialchars(strip_tags($this->age));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->id_admin = htmlspecialchars(strip_tags($this->id_admin));
    $this->id_etat = htmlspecialchars(strip_tags($this->id_etat));
    $this->id_tox = htmlspecialchars(strip_tags($this->id_tox));
    $this->id_gonadique = htmlspecialchars(strip_tags($this->id_gonadique));
    $this->code = htmlspecialchars(strip_tags($this->code));
    $this->id_cu = htmlspecialchars(strip_tags($this->id_cu));
    $this->id_degestive = htmlspecialchars(strip_tags($this->id_degestive));
    $this->id_oculaire = htmlspecialchars(strip_tags($this->id_oculaire));
    $this->token = htmlspecialchars(strip_tags($this->token));
    $this->ip = htmlspecialchars(strip_tags($this->ip));
    $this->cod = htmlspecialchars(strip_tags($this->cod));

    // Bind data
    $stmt->bindParam(':Id', $this->Id);
    $stmt->bindParam(':Nom', $this->Nom);
    $stmt->bindParam(':Prenom', $this->Prenom);
    $stmt->bindParam(':tel', $this->tel);

    $stmt->bindParam(':sexe', $this->sexe);
    $stmt->bindParam(':datnais', $this->datnais);
    $stmt->bindParam(':protocole', $this->protocole);
    $stmt->bindParam(':date_cure', $this->date_cure);

    $stmt->bindParam(':age', $this->age);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':id_admin', $this->id_admin);
    $stmt->bindParam(':id_etat', $this->id_etat);

    $stmt->bindParam(':id_tox', $this->id_tox);
    $stmt->bindParam(':id_gonadique', $this->id_gonadique);
    $stmt->bindParam(':code', $this->code);
    $stmt->bindParam(':id_cu', $this->id_cu);

    $stmt->bindParam(':id_degestive', $this->id_degestive);
    $stmt->bindParam(':id_oculaire', $this->id_oculaire);
    $stmt->bindParam(':token', $this->token);
    $stmt->bindParam(':ip', $this->ip);

    $stmt->bindParam(':cod', $this->cod);

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
    $query = 'DELETE FROM '. $this->table .' WHERE Id = :Id';
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->Id = htmlspecialchars(strip_tags($this->Id));

    // Bind data
    $stmt->bindParam(':Id', $this->Id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);
    return false;
  }

}
