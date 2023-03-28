<?php

    include('dbaccess.php');
    
    $username = "";
    $email = "";
    $vname="";
    $nname="";

    if(isset($_POST['register'])) {

        // Daten die mit Post verschickt werden, werden an Variablen gebunden
        $vname = isset($_POST['vorname']) ? $_POST['vorname'] : '';
        $nname = isset($_POST['nachname']) ? $_POST['nachname'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $password1 = isset($_POST['password1']) ? trim($_POST['password1']) : '';
        $password2 = isset($_POST['password2']) ? $_POST['password2'] : '';

        $sql_username = "SELECT * FROM user WHERE Username='$username'"; // SQL-Befehl wählt alles aus von der Tabelle user, wo der Username gleich $username ist

        $result_username = $db_obj->query($sql_username); // SQL-Befehl wird ausgeführt

        if(mysqli_num_rows($result_username) > 0) { // wenn der eingegebene Username schon vergeben ist, wird eine Error-Nachricht formuliert
            $username_error = "Benutzername ist schon vergeben.";
        }
        elseif($password1 != $password2) { // Passwörter müssen wiederholt werden, wenn sie nicht übereinstimmen wird eine Error-Nachricht formuliert
            $password_error = "Passwörter stimmen nicht überein.";
        }
        elseif(empty($_POST['password1'])){ // wenn kein Passwort eingegeben wurde, wird eine Error-Nachricht formuliert
            $password_error = "Bitte geben Sie ein Passwort ein.";
        }
        else {

            $rolle = "Kunde/Kundin";
            //$rolle = "Admin";

            $hash_password = password_hash(trim($_POST["password1"]), PASSWORD_DEFAULT); // Passwort wird gehasht

            $sql = "INSERT INTO user (Vorname, Nachname, Email, Username, Passwort, Rolle)
                    VALUES (?, ?, ?, ?, ?, ?)"; // SQL-Befehl wird formuliert
            
            $stmt = $db_obj->prepare($sql); // SQL-Befehl wird vorbereitet

            $stmt -> bind_param("ssssss", $vname, $nname, $email, $username, $hash_password, $rolle); // Parameter werden gebunden

            if($stmt->execute()) {
                header("location: Login.php"); // wenn der SQL-Befehl erfolgreich ausgeführt wurde, wird der User zur Login-Seite gebracht
            }
            else {
                echo "Ups! Etwas ist schiefgelaufen. Bitte versuchen Sie es erneut."; // Fehlermeldung wenn der SQL-Befehl nicht ausgeführt wurde
            }

            $stmt->close(); 
            $db_obj->close();
            
        }
    }
        
?>