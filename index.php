<?php
include ("config/db.php");
?>

<!DOCTYPE html>
<html>
  <head>  
      <link rel="stylesheet" href="css/style.css">
  </head>    
  <body>
   <div class="formulare">

     <nav class="navigation">
         <ul style="background-color:black; display:flex; justify-content:space-around; padding:15px; list-style:none;">
             <li><a href="index.php"><button class="nav-btn">Startseite</button></a></li>
             <li><a href="abteilung.php"><button class="nav-btn">Abteilungen</button></a></li>
         </ul>
     </nav>
    
     <form action="config/funktionen.php" method="POST">
       <label>Vorname</label>
       <input type="text" name="vorname" required>
       <label>Nahname</label>
       <input type="text" name="Nachname" required>
       <label>Abteilung:</label>
         <select name="abteilung" required>
             <option disabled> Waehlen Sie eine Abteilung</option>
             <?php
                $sql=$conn->query("SELECT * FROM abteilung");
                $abteilungen = $sql->fetch_assoc();
                while ($abteilung = $sql->fetch_assoc()) {
                    echo "<option value='{$abteilung['abtID']}'>{$abteilung['bezeichnung']}</option>";
                }
             ?>
         </select>
       <button type="submit" name="mitarbeiterInsert">
        Hinzufügen
       </button>
     </form>

    <table>
     <thead>
      <tr>
         <th>MitarbeiterID</th>
         <th>Vorname</th>
         <th>Nachname</th>
         <th>Abteilung-Bezeichnung</th>
         <th>Aktionen</th>
      </tr>
     </thead>

    <?php
       $sql = $conn->query("SELECT * FROM mitarbeiter");
       while($zeile = $sql->fetch_array()){
        $sqlabteilung=$conn->query("SELECT bezeichnung FROM abteilung WHERE abtID=".$zeile['abteilungID']);
        $zeileabteilung = $sqlabteilung->fetch_array();
    ?>
    <tr>
      <td><?=$zeile['idnummer'];?></td>
      <td><?=$zeile['vorname'];?></td>
      <td><?=$zeile['nachname'];?></td>
      <td><?=$zeileabteilung['bezeichnung'];?></td>
      <td>
         <a href="config/funktionen.php?mitDelid=<?=$zeile['idnummer'];?>">Delete</a>
         <a href="mitBearbeiten.php?mitBeaID=<?=$zeile['idnummer'];?>">Bearbeiten</a>
      </td>
    </tr>
    <?php
      }
    ?>
    </table>
   </div>
  </body>
 </html>



