<?php

 
    require_once('dbaccess.php');

    $user_id = $_GET['UID']; // Variable user_id wird mit UID, die sich in der URL befindet, durch $_GET verbunden

    $sql = "SELECT Vorname, Nachname, Email, Username FROM user WHERE UID = '$user_id'";
    $result = $db_obj->query($sql);
    $row = $result->fetch_assoc();
    
    $_SESSION['Vorname'] = $row['Vorname'];
    $_SESSION['Nachname'] = $row['Nachname'];      //Session-Variablen werden zu Daten aus der Tabelle user
    $_SESSION['Email'] = $row['Email'];
    $_SESSION['user_name'] = $row['Username'];



?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mountain View Hotel - Hilfe</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <link rel="stylesheet" href="css/Stylesheet.css">

    </head>

    <body id="bgcolorlogin">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #bacec1">
            <div class="container-fluid">
                <a href="Index.php" class="navbar-brand">Mountain View Hotel</a>
            </div>
        </nav>

    <section class="vh-100 background-image" style="background-image: url(IMG/pexels-eberhard-grossgasteiger-1004665.jpg); background-repeat: no-repeat; position: relative; background-size: cover;">
    <div class="d-flex align-items-center h-100">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px; background-color: #f6f4e8">
            <div class="card-body p-4">
              <h2 class="text-center mb-1 fw-bold">Kundenprofil</h2>

                <div class="form-group">
                    <div class="container h-100">
                        <div class="col-3">
                            <label>Vorname:</label>
                        </div>
                        <div class="col">
                            <p><?php echo $_SESSION['Vorname'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="container h-100">
                        <div class="col-3">
                            <label>Nachname:</label>
                        </div>
                        <div class="col">
                            <p><?php echo $_SESSION['Nachname'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="container h-100">
                        <div class="col-3">
                            <label>Email:</label>
                        </div>
                        <div class="col">
                            <p><?php echo $_SESSION['Email'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="container h-100">
                        <div class="col-3">
                            <label>Benutzername:</label>
                        </div>
                        <div class="col">
                            <p><?php echo $_SESSION['user_name'] ?></p>
                        </div>
                    </div>
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