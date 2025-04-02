<?php
function ConnectDb(){



  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "deadfun merch";

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


// Print de CRUD tabel voor leveranciers


function Crudleverancieren() {
    // Add a title and a link for inserting a new leverancier
    echo "<h1>CRUD Leveranciers</h1>";
    echo "<a href='insert_leverancier.php'>Voeg een nieuwe leverancier toe</a><br><br>";

    $result = GetData("leverancier"); // Fetch data from the `leverancier` table
    $table = "<table border='1'>";

    // Print header table
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach ($headers as $header) {
        $table .= "<th bgcolor='gray'>" . $header . "</th>";
    }
    $table .= "<th colspan='2'>Actie</th>";
    $table .= "</tr>";

    // Print each row
    foreach ($result as $row) {
        $table .= "<tr>";

        foreach ($row as $cell) {
            $table .= "<td>" . htmlspecialchars($cell) . "</td>";
        }

        // Update button
        $table .= "<td>
            <form method='get' action='update_leverancier.php'>
                <input type='hidden' name='leverancierID' value='$row[leverancierID]'>
                <button type='submit'>Wijzigen</button>
            </form>
        </td>";

        // Delete button
        $table .= "<td>
            <form method='post' action='delete_leverancier.php' onsubmit=\"return confirm('Weet je zeker dat je deze leverancier wilt verwijderen?');\">
                <input type='hidden' name='leverancierID' value='$row[leverancierID]'>
                <button type='submit'>Verwijderen</button>
            </form>
        </td>";

        $table .= "</tr>";
    }

    $table .= "</table>";
    echo $table;
}

function Insertleverancier($post) {
    $conn = ConnectDb();
    $sql = "INSERT INTO leverancier (leverancierNaam, leverancierAchternaam, contact)
            VALUES (:leverancierNaam, :leverancierAchternaam, :contact)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':leverancierNaam', $post['leverancierNaam'], PDO::PARAM_STR);
    $stmt->bindParam(':leverancierAchternaam', $post['leverancierAchternaam'], PDO::PARAM_STR);
    $stmt->bindParam(':contact', $post['contact'], PDO::PARAM_STR);
    $stmt->execute();
    $conn = null;

    // Redirect back to the CRUD page
    header("Location: crud_leverancier.php");
    exit();
}


function Deleteleverancier($leverancierID) {
    try {
        $conn = ConnectDb();

        $query = $conn->prepare("
            DELETE FROM leverancier 
            WHERE leverancierID = :leverancierID
        ");
        $query->bindParam(':leverancierID', $leverancierID, PDO::PARAM_INT);

        $query->execute();
        $conn = null;

        // Redirect back to the CRUD page
        header("Location: crud_leverancier.php");
        exit();
    } catch (PDOException $e) {
        echo "Delete failed: " . $e->getMessage();
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



// Update de leverancier met de opgegeven leverancierID
function UpdateLeverancier($post) {
    $conn = ConnectDb();
    $sql = "UPDATE leverancier 
            SET leverancierNaam = :leverancierNaam, leverancierAchternaam = :leverancierAchternaam, contact = :contact 
            WHERE leverancierID = :leverancierID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':leverancierID', $post['leverancierID'], PDO::PARAM_INT);
    $stmt->bindParam(':leverancierNaam', $post['leverancierNaam'], PDO::PARAM_STR);
    $stmt->bindParam(':leverancierAchternaam', $post['leverancierAchternaam'], PDO::PARAM_STR);
    $stmt->bindParam(':contact', $post['contact'], PDO::PARAM_STR);
    $stmt->execute();
    $conn = null;

    // Redirect back to the CRUD page
    header("Location: crud_leverancier.php");
    exit();
}

?>