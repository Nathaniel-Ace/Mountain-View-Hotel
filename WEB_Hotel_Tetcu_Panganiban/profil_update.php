<?php

    require_once('dbaccess.php');



    if(isset($_POST['edit'])) {

        $id = $_SESSION['id'];
        $vorname = trim($_POST['vorname']);
        $nachname = trim($_POST['nachname']); // trim enfernt Whitespaces vorne und hinten
        $email = trim($_POST['email']);
        $new_username = trim($_POST['username']);

        $sql = "SELECT * FROM user WHERE UID = $id"; 
        $result = $db_obj->query($sql);

        if($result) {
            $update = "UPDATE user SET Vorname = ?, Nachname = ?, Email = ? WHERE UID = ?"; // Vorname, Nachname und Email in der Tabelle user werden aktualisiert, wo UID =?
            $stmt = $db_obj->prepare($update);
            $stmt->bind_param("sssi", $vorname, $nachname, $email, $id);

            if($stmt->execute()) {
                $sql_oldu = "SELECT Username FROM user WHERE UID = ?"; //Username in der Tabelle user wird ausgewählt
                
                if($stmt = $db_obj->prepare($sql_oldu)) {
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $stmt->store_result(); // Username, der gefunden wurde, wird gespeichert

                    if($stmt->num_rows > 0) { //Username existiert bereits
                        $stmt->bind_result($old_username); // gefundener Username wird an Variable gebunden
                        $stmt->fetch();

                        if($new_username != $old_username) { // neuer Username wird mit alten verglichen, wenn sie ungeleich sind wird ein neuer SQL-Befehl formuliert
                            $sql_newu = "SELECT * FROM user WHERE Username = '$new_username'";
                            $result_newu = $db_obj->query($sql_newu);

                            if(mysqli_num_rows($result_newu) == 0) { // Username ist einzigartig
                                $update_u = "UPDATE user SET Username = ? WHERE UID = ?"; // Username wird aktualisiert
                                $stmt = $db_obj->prepare($update_u);
                                $stmt->bind_param("si", $new_username, $id);

                                if($stmt->execute()) {
                                    $profil_message = "Profil wurde gespeichert.";
                                    session_destroy(); // Username wurde aktualisiert und Session wird zerstört
                                    header("Refresh: 1; URL = Login.php"); // User wird zu Login gebracht
                                }
                            }
                            elseif(mysqli_num_rows($result_newu) > 0) {
                                $username_error = "Benutzername ist schon vergeben.";
                            }
                        }
                        elseif($new_username == $old_username) { // Wenn User keinen neuen Usernamen eingegeben hat bleibt er auf der Profil Seite
                            header("Location: Profil.php");   
                        }
                    }
                }
            }
            else {
                $profil_error = "Profil wurde nicht gespeichert.";
            }
        }
        else {
            $profil_error = "Profil wurde nicht gespeichert.";
        }
    }
?>