<?php
  $servername= "localhost"; 
  $benutzername= "root";
  $passwort="";
  $datenbank="mitarbeiterDB";

  $conn = new mysqli($servername, $benutzername, $passwort, $datenbank);
 
  if($conn->connect_error){
    die("Verbindung Fehlgeschlage: " .$conn->connect_error);
  }
  ?>