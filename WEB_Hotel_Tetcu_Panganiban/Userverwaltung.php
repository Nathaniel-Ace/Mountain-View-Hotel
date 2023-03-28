<?php
    session_start();
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
            

                <button 
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto">
                        <?php if(isset($_SESSION['name']) && $_SESSION['name'] == 'admin') { ?>
                            <li class="nav-item navcenter">
                                <a href="Index.php" class="nav-link">Startseite</a>
                            </li>
                            <li class="nav-item navcenter">
                                <a href="FAQ.php" class="nav-link">Hilfe</a>
                            </li>
                            <li class="nav-item navcenter">
                                <a href="Impressum.php" class="nav-link">Impressum</a>
                            </li>
                            <li>
                                <a href="Reservierverwaltung.php" class="nav-link">Reservierungsverwaltung</a>
                            </li>
                            <li class="nav-item navcenter">
                                <a href="Logout.php" class="nav-link">Logout</a>
                            </li>
                        <?php } ?>


                    </ul>
                </div>
            </div>
        </nav>

        <section class="main-content">
            <div class="d-flex align-items-center h-100">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px; background-color: #bacec1">
                                <div class="card-body p-4">
                                    <h2 class="text-center mb-1 fw-bold">Liste aller User</h2>

                                        <div class="d-flex justify-content-center">
                                            <div class="form-outline mb-3 fw-bold">
                                                <table>
                                                    <tr>
                                                        <th height ="35" width ="50"><u>UID</u></th>
                                                        <th height ="35" width ="50"><u>Benutzername</u></th>
                                                    </tr>
                                                    <?php
                                                        require_once('dbaccess.php');

                                                        $sql = "SELECT DISTINCT Username, UID FROM user WHERE Username != 'admin'";
                                                        $result = $db_obj->query($sql);

                                                        if(mysqli_num_rows($result) > 0) {
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<tr>";
                                                                echo "<td>" . $row['UID'] . "</td>";
                                                                echo "<td><a href='profil_detail_admin.php?UID=" . $row['UID'] . "'>" . $row['Username'] . "</a></td>"; // Link zum Kundenprofil mit der UID des Kunden in der URL
                                                                echo "</tr>";
                                                            }
                                                        }
                                                    ?>
                                                </table>
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