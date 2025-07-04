<?php
   include("db.php");

   if(isset($_POST['abteilungInsert'])){
       $sql = $conn->prepare("INSERT INTO abteilung VALUES (NULL, ?)");
       $sql->bind_param("s", $_POST['bezeichnung']);
       if($sql->execute()){
           header("location:../abteilung.php");
           exit();
       } else {
           echo "Fehler: " . $sql->error;
       }
   }

    if(isset($_POST['mitarbeiterInsert'])){
        $sql = $conn->prepare("INSERT INTO mitarbeiter VALUES (NULL, ?, ?, ?)");
        $sql->bind_param("ssi", $_POST['vorname'], $_POST['Nachname'], $_POST['abteilung']);
        if($sql->execute()){
            header("location:../index.php");
            exit();
        } else {
            echo "Fehler: " . $sql->error;
        }
    }

    if(isset($_GET['abtDelid'])){
        $sql = $conn->prepare("DELETE FROM abteilung WHERE abtID = ?");
        $sql->bind_param("i", $_GET['abtDelid']);
        if($sql->execute()){
            header("location:../abteilung.php");
            exit();
        } else {
            echo "Fehler: " . $sql->error;
        }
    }  

    if(isset($_GET['mitDelid'])){
        $sql = $conn->prepare("DELETE FROM mitarbeiter WHERE idnummer = ?");
        $sql->bind_param("i", $_GET['mitDelid']);
        if($sql->execute()){
            header("location:../index.php");
            exit();
        } else {
            echo "Fehler: " . $sql->error;
        }
    }

    if(isset($_POST['mitBearbeiten'])){
        $sql = $conn->prepare("UPDATE mitarbeiter SET vorname = ?, nachname = ?, abteilungID = ? WHERE idnummer = ?");
        $sql->bind_param("ssii", $_POST['vorname'], $_POST['nachname'], $_POST['abteilung'], $_POST['idnummer']);
        if($sql->execute()){
            header("location:../index.php");
            exit();
        } else {
            echo "Fehler: " . $sql->error;
        }
    }

    if(isset($_POST['abtBearbeiten'])){
        $sql = $conn->prepare("UPDATE abteilung SET bezeichnung = ? WHERE abtID = ?");
        $sql->bind_param("si", $_POST['bezeichnung'], $_POST['abtID']);
        if($sql->execute()){
            header("location:../abteilung.php");
            exit();
        } else {
            echo "Fehler: " . $sql->error;
        }
    }
?>
