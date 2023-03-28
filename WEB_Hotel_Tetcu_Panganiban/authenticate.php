<?php
  // Session wird gestartet
  session_start();    
  
  // Datenbankverbindung wird einmal included
  require_once ('dbaccess.php');

  // User drückt auf Login
  if(isset($_POST['login'])) {
    $username = trim($_POST['username']); //Username wird an Variable gebunden und Whitespaces vorne und hinten werden entfernt
    $password = trim($_POST['password']); //Passwort wird an Variable gebunden und Whitespaces vorne und hinten werden entfernt

    // SQL-Befehl, der die UID und Passwort von der Tabelle user auswähllt, wo der Username = ?
    $sql =  "SELECT UID, Passwort FROM user WHERE Username = ?";

    if($stmt = $db_obj->prepare($sql)) { //SQL-Befehl wird vorbereitet 
      // Parameter einbinden
      $stmt->bind_param("s", $username);

      $stmt->execute(); // SQL-Befehl wird ausgeführt

      // Ergebnisse werden gepeichert
      $stmt->store_result();

      if($stmt->num_rows > 0) /* Benutzername existiert */ {
        // UID und das gehashte Passwort werden an Variablen gebunden
        $stmt->bind_result( $id, $hashed_password);

        $stmt->fetch(); // Variablen werden geholt

        // Passwort wird mit Passwort in der DB verglichen
        if(password_verify($password, $hashed_password)) {
          
          session_regenerate_id(); // Session bekommt eine neue ID

          $_SESSION['loggedin'] = TRUE; // bei Start einer Session auf einer anderen Seite wird $_SESSION['loggedin'] als wahr angesehen
          $_SESSION['name'] = $username; // Username wird zu $_SESSION['name']
          $_SESSION['id'] = $id; // UID wird zur $_SESSION['id']
          $_SESSION['login_time'] = time(); // Zeitpunkt des Logins wird in $_SESSION['login_time'] gespeichert
          
          header("location: index.php"); // bei erfolgreichen Login wird der User zur Startseite gebracht
          
        }
        else {
          $password_error = "Passwort ist inkorrekt.";
        }
      }
      else {
        $username_error = "Dieser Benutzername existiert nicht.";
      }
    }
    $stmt->close();
    $db_obj->close();
  }

?>