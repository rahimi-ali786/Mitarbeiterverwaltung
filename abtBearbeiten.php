<?php
   include("config/db.php");

  if(isset($_GET['abtID'])){
     $sql = $conn->prepare("SELECT * FROM abteilung WHERE abtID = ?");
     $sql->bind_param("i", $_GET['abtID']);
     $sql->execute();
     $result = $sql->get_result();
     $abteilung = $result->fetch_assoc();

     $abtID = $abteilung['abtID'];
     $bezeichnung = $abteilung['bezeichnung'];
  }
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Abteilung bearbeiten</title>
  <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
  <h1>Abteilung bearbeiten</h1>
  <form action="config/funktionen.php" method="POST">
    <input type="hidden" name="abtID" value="<?=$abtID; ?>">
    <label for="bezeichnung">Bezeichnung</label>
    <input type="text" name="bezeichnung" required value="<?=$bezeichnung; ?>">
    <input type="submit" name="abtBearbeiten" value="Speichern">
  </form>
  <a href="abteilung.php">Zurück zur Abteilungsliste</a>
</body> 
</html>
