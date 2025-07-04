<?php
    include("config/db.php");
    
    if(isset($_GET['mitBeaID'])){
      $sql = $conn->prepare("SELECT * FROM mitarbeiter WHERE idnummer = ?");
      $sql->bind_param("i", $_GET['mitBeaID']);
      $sql->execute();
      $result = $sql->get_result();
      $mitarbeiter = $result->fetch_assoc();
     
     $idnummer = $mitarbeiter['idnummer'];
     $vorname = $mitarbeiter['vorname'];
     $nachname = $mitarbeiter['nachname'];
     $abteilungID = $mitarbeiter['abteilungID'];    

    }
?>

<!DOCTYPE html>
<html lang="de">
    <head>
      <meta charset="UTF-8">
      <title>mitarbeiter bearbeiten</title>
      <link rel="stylesheet" href="css/style.css">
    </head>
  <body>
   <h1>Mitarbeiter bearbeiten</h1>
   <form action="config/funktionen.php" method="POST">
       <input type="hidden" name="idnummer" value="<?=$idnummer; ?>">
       <label for="vorname">Vorname</label>
       <input type="text" name="vorname" required value="<?=$vorname; ?>">
       <label for="nachname">Nahname</label>
       <input type="text" name="nachname" required value="<?=$nachname; ?>">
       <label for="abteilung">Abteilung:</label>
       <select name="abteilung" required>
          <option disabled> Waehlen Sie eine Abteilung</option>
          <?php
            $sql = $conn->query("SELECT * FROM abteilung");
            while ($abteilung = $sql->fetch_assoc()) {
                $selected = ($abteilung['abtID'] == $abteilungID) ? 'selected' : '';
    
                echo "<option value='{$abteilung['abtID']}' {$selected}>{$abteilung['bezeichnung']}</option>";
            }
          ?>   
       <input type="hidden" name="idnummer" value="<?=$idnummer?>">
       <input type="submit" name="mitBearbeiten" value="Speichern">
    </form>
  </body>
</html>