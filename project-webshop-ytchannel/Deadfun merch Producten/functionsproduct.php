<?php
// auteur: Vul hier je naam in
// functie: algemene functies tbv hergebruik

include_once "configproduct.php";

 function connectDb(){
    $servername = SERVERNAME;
    $username = USERNAME;
    $password = PASSWORD;
    $dbname = DATABASE;
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        //echo "Connected successfully";
        return $conn;
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

 }

 function crudMain(){

    // Menu-item   insert
    $txt = "
    <h1>Crud</h1>
    <nav>
		<a href='insert.php'>Toevoegen nieuwe Item</a>
    </nav><br>";
    echo $txt;

    // Haal alle fietsen record uit de tabel 
    $result = getData(CRUD_TABLE);

    //print table
    printCrudTabel($result);
    
 }

 // selecteer de data uit de opgeven table
 function getData($table){
    // Connect database
    $conn = connectDb();

    // Select data uit de opgegeven table methode query
    // query: is een prepare en execute in 1 zonder placeholders
    // $result = $conn->query("SELECT * FROM $table")->fetchAll();

    // Select data uit de opgegeven table methode prepare
    $sql = "SELECT * FROM $table";
    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();

    return $result;
 }

 // selecteer de rij van de opgeven id uit de table fietsen
 function getRecord($id){
    // Connect database
    $conn = connectDb();

    // Select data uit de opgegeven table methode prepare
    $sql = "SELECT * FROM " . CRUD_TABLE . " WHERE prodID = :id";
    $query = $conn->prepare($sql);
    $query->execute([':id'=>$id]);
    $result = $query->fetch();

    return $result;
 }


// Function 'printCrudTabel' print een HTML-table met data uit $result 
// en een wzg- en -verwijder-knop.
function printCrudTabel($result) {
    // Controleer of $result niet leeg is
    if (empty($result)) {
        echo "<p>Geen gegevens gevonden.</p>";
        return;
    }

    // Zet de hele tabel in een variabele
    $table = "<table border='1'>";

    // Haal de kolomnamen uit de eerste rij
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach ($headers as $header) {
        $table .= "<th>" . htmlspecialchars($header) . "</th>";   
    }

    // Voeg actie kopregel toe
    $table .= "<th colspan='2'>Actie</th></tr>";

    // Print elke rij
    foreach ($result as $row) {
        $table .= "<tr>";

        // Print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . htmlspecialchars($cell) . "</td>";  
        }

        // Haal het ID op en maak het veilig
        $id = htmlspecialchars($row['prodID']);

        // Wijzig knopje
        $table .= "<td>
            <form method='post' action='update.php?id=$id'>       
                <button type='submit'>Wzg</button>	 
            </form>
        </td>";

        // Verwijder knopje
        $table .= "<td>
            <form method='post' action='delete.php?id=$id'>       
                <button type='submit'>Verwijder</button>	 
            </form>
        </td>";

        $table .= "</tr>";
    }

    $table .= "</table>";
    
    // Print de tabel één keer
    echo $table;
}



function updateRecord($row){
    // Maak database connectie
    $conn = connectDb();

    // Maak een query
    $sql = "UPDATE " . CRUD_TABLE . "
        SET prodNaam = :prodNaam, 
            prijs = :prijs, 
            Foto = :Foto, 
            leverancierID = :leverancierID
        WHERE prodId = :prodId";

    // Prepare query
    $stmt = $conn->prepare($sql);

    // Uitvoeren
    $stmt->execute([
        ':prodNaam' => $row['prodNaam'],
        ':prijs' => $row['prijs'],
        ':Foto' => $row['Foto'],
        ':leverancierID' => $row['leverancierID'],
        ':prodId' => $row['prodId']
    ]);

    // Test of database actie is gelukt
    $retVal = ($stmt->rowCount() == 1) ? true : false;
    return $retVal;
}

function insertRecord($post){
    // Maak database connectie
    $conn = connectDb();

    // Maak een query 
    $sql = "
        INSERT INTO " . CRUD_TABLE . " (prodNaam, prijs, Foto, leverancierID)
        VALUES (:prodNaam, :prijs, :Foto, :leverancierID) 
    ";

    // Prepare query
    $stmt = $conn->prepare($sql);

    // Uitvoeren
    $stmt->execute([
        ':prodNaam' => $post['prodNaam'],
        ':prijs' => $post['prijs'],
        ':Foto' => $post['Foto'],
        ':leverancierID' => $post['leverancierID']
    ]);

    // test of database actie is gelukt
    $retVal = ($stmt->rowCount() == 1) ? true : false ;
    return $retVal;  
}

function deleteRecord($id){
    // Connect database
    $conn = connectDb();
    
    // Maak een query
    $sql = "DELETE FROM " . CRUD_TABLE . " WHERE prodID = :id";

    // Prepare query
    $stmt = $conn->prepare($sql);

    // Uitvoeren
    $stmt->execute([
        ':id' => $id
    ]);

    // test of database actie is gelukt
    $retVal = ($stmt->rowCount() == 1) ? true : false ;
    return $retVal;
}

?>