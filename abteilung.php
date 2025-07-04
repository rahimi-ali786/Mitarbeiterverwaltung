<?php
include("config/db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Abteilungen</title>
     <link rel="stylesheet" href="css/style.css">
</head>    
 <body>
   <div class="formulare">
    <nav class="navigation">
        <ul style="background-color:black; display:flex; justify-content:space-around; padding:10px; list-style:none;">
            <li><a href="index.php"><button class="nav-btn">Startseite</button></a></li>
            <li><a href="abteilung.php"><button class="nav-btn">Abteilungen</button></a></li>
        </ul>
    </nav>
    
     <form action="config/funktionen.php" method="POST">
       <label>Bezeichnung</label>
       <input type="text" name="bezeichnung" required>
       <button type="submit" name="abteilungInsert">
        Hinzufügen
       </button>
     </form>

    <table>
     <thead>
      <tr>
         <th>ID Nummer</th>
         <th>Bezeichnung</th>
         <th>Aktionen</th>
      </tr>
    </thead>
    <?php
     $sql= $conn->query("SELECT * FROM abteilung");
     while ($zeile = $sql->fetch_assoc()){
    ?>
    <tr>
    <td><?=$zeile['abtID'];?></td>
    <td><?=$zeile['bezeichnung'];?></td>
    <td>

       <a href="config/funktionen.php?abtDelid=<?=$zeile['abtID'];?>">Delete</a>
       <a href="abtBearbeiten.php?abtID=<?=$zeile['abtID'];?>">Bearbeiten</a>
    </td>
    </tr>
    <?php
    
       }
     ?>
    </table>
   </div>
 </body>
</html>



