<?php

    session_start();
    include('profil_update.php'); // php-Datei für das Aktualisieren des Profils wird inkludiert
    require_once('dbaccess.php');

    

    $sql = "SELECT Vorname, Nachname, Email FROM user WHERE UID = ?"; // SQL-Befehl, der Vorname, Nachname und Email von der Tabelle user auswählt wo die UID = ?

    if($stmt = $db_obj->prepare($sql)) { //SQL-Befehl wird vorbereitet

        $stmt->bind_param("i", $id); // Parameter der Session ID wird angebunden

        $id = $_SESSION['id'];

        $stmt->execute(); // SQL-Befehl wird ausgeführt

        $stmt->bind_result($vorname, $nachname, $email); // Vorname, Nachname und Email werden an Variablen gebunden

        $stmt->fetch();

    }

    $stmt->close();

    $db_obj->close();

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style_login.css">

    
    <title>Mountain View Hotel - Profil</title>
</head>
<body>
<!-- Responsive Navbar, dunkel -->
<!-- Container erstellt in der Navbar mit links dem Hotelnamen und rechts einem Toggler der ab einer bestimmten Größe erscheint mit den Elementen darunter. Die Elemente werden bei normaler Größe angezeigt -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #bacec1">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Mountain View Hotel</a>

        <button 
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
            <!-- nur eingeloggte User können das hier sehen -->
            <?php if(isset($_SESSION['loggedin'])){ ?>
                <li class="nav-item navcenter">
                    <a href="Index.php" class="nav-link">Startseite</a>
                </li>
                <li class="nav-item navcenter">
                <a href="FAQ.php" class="nav-link">Hilfe</a>
                </li>
                <li class="nav-item navcenter">
                <a href="Impressum.php" class="nav-link">Impressum</a>
                </li>
                <li class="nav-item navcenter">
                <a href="Reservierung.php" class="nav-link">Reservierung</a>
                </li>
                <li class="nav-item navcenter">
                <a href="Logout.php" class="nav-link">Logout</a>
                </li>

            <?php } ?>
            </ul>
         </div>
        </div>
    </nav>


<!--  -->
<section class="vh-100 background-image" style="background-image: url(IMG/pexels-eberhard-grossgasteiger-1004665.jpg); background-repeat: no-repeat; position: relative; background-size: cover;">
  <div class="d-flex align-items-center h-100">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px; background-color: #f6f4e8">
            <div class="card-body p-4">
              <h2 class="text-center mb-1 fw-bold">Ihr Profil</h2>

                <form method="post"  action="Profil.php">
                    <div class="form-group">
                        <div class="container h-100">
                            <div class="col-3">
                                <label>Vorname:</label>
                            </div>
                            <div class="col">
                                <input type="text" name="vorname" value="<?php echo $vorname ?>" class="form-control" required><br> <!-- Vorname in der Datenbank wird hier angezeigt -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="container h-100">
                            <div class="col-3">
                                <label>Nachname:</label>
                            </div>
                            <div class="col">
                                <input type="text" name="nachname" value="<?php echo $nachname ?>" class="form-control" required><br> <!-- Nachname in der Datenbank wird hier angezeigt -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="container h-100">
                            <div class="col-3">
                                <label>Email:</label>
                            </div>
                            <div class="col">
                                <input type="text" name="email" value="<?php echo $email ?>" class="form-control" required><br> <!-- Email in der Datenbank wird hier angezeigt -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="container h-100">
                            <div class="col-3">
                                <label>Benutzername:</label>
                            </div>
                            <div class="col">
                                <input type="text" name="username" value="<?php echo $_SESSION['name'] ?>" class="form-control"required> <!-- Username in der Datenbank wird hier angezeigt -->
                                <!-- wenn Username schon vergeben ist, kommt diese Fehlermeldung -->
                                <?php if(isset($username_error)): ?>
                                    <span style="color:#BE0000"><?php echo $username_error; ?></span>
                                <?php endif ?>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="Profil_Passwort.php" class="nav-link">Passwort neu setzen</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="form-group">
                            <br><input type="submit" value="Profil speichern" name="edit">
                            <!-- Fehlermeldung -->
                            <br><?php if(isset($profil_error)): ?>
                                    <span style="color:#BE0000"><?php echo $profil_error; ?></span>
                            <?php endif ?>
                            <!-- Nachricht popt up, die sagt, dass das Profil gespeichert wurde -->
                            <?php if(isset($profil_message)): ?>
                                    <span style="color:blue"><?php echo $profil_message; ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  </div>
</section>
                        
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>