<?php
function ConnectDb(){



  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "deadfun merch v3";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  //echo "Connected successfully"; 
    return $conn;
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}


function GetData($table){
  $conn = ConnectDb();

  $query = $conn->prepare("SELECT * FROM $table");
  $query->execute();
  $result = $query->fetchALL();

  //var_dump($result);
  return $result;
}


function Crudleverancieren(){
  $txt = "
  <h1>Crud leverancier</h1>
  <nav>
  <a href='insert_leverancier.php'>toevoegen nieuw leverancier</a>
  </nav>";
  echo $txt;
  $result = GetData("leverancier");
  PrintCrudleverancieren($result);
}

function PrintCrudleverancieren($result){
  $table = "<table border = 1px>";

  // Print header table
  
      // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
      $headers = array_keys($result[0]);
      $table .= "<tr>";
      foreach($headers as $header){
          $table .= "<th bgcolor=gray>" . $header . "</th>";  
      }
      $table .= "</tr>";

  //print elke rij
  foreach ($result as $row) {

    $table .= "<tr>";

    foreach ($row as $cell) {
      $table .= "<td>" .  $cell . "</td>" ;
      
    
    }

    $table .= "<td>
    <form method='post' action='update_leverancier.php?leverancierID=$row[leverancierID]' >      
           <button name='wzg'>Wijzigen</button>    
   </form>
</td>";

$table .= "<td>
  <a href='delete_leverancier.php?leverancierID=$row[leverancierID]'>Delete</a>
</td>";

$table .= "</tr>";




  }
  $table .= "</table>";
  echo $table;
  //var_dump($result);
}

function Insertleverancier($post) {

    
  try {
      $conn = ConnectDb();

      $query = $conn->prepare(
      "INSERT INTO leverancier (leverancierNaam, leverancierAchternaam, contact) 
      VALUES (:leverancierNaam, :leverancierAchternaam, :contact)");

  

      $status = $query->execute(
          [
          
          'leverancierNaam' => $post['leverancierNaam'],
          'leverancierAchternaam' => $post['leverancierAchternaam'],
          'contact' => $post['contact']
          ]);


          echo "insert status: " . $status;
          echo $query->rowCount() . " records inserted";  
  }
  catch(PDOException $e) {
      echo "insert failed: " . $e->getMessage();
  }
}

function Deleteleverancier($leverancierID){
  echo "Delete row<br>";
  try{
    $conn = ConnectDb();

    $query = $conn->prepare("
   DELETE FROM leverancier 
   WHERE leverancier.leverancierID = '$leverancierID'");


    $query->execute();
  }

  catch(PDOException $e){
    echo "delete failed: " . $e->getMessage();
  }
}
// selecteer de rij van de opgeven leverancierID uit de table leverancier
function Getleverancier($leverancierID){
  // Connect database
  $conn = ConnectDb();

  // Select data uit de opgegeven table methode prepare

  $query = $conn->prepare("SELECT * FROM leverancier WHERE leverancierID = :leverancierID");
  $query->execute([':leverancierID'=>$leverancierID]);
  $result = $query->fetch();

  return $result;

}
?>