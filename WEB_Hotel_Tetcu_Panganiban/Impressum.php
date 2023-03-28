<?php
    // Session wird gestartet
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Stylesheet.css">
    <title>Mountain View Hotel- Impressum</title>
</head>

<body id="bgimageimp">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #bacec1">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Mountain View Hotel</a>

        <button 
        class="navbar-toggler"b
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
                <!-- eingeloggte User sehen andere Seiten als anonyme User -->
                <?php if(isset($_SESSION['loggedin'])){ ?>
                    <!-- admin hat ZUgriff auf andere Seiten-->
                    <?php if(isset($_SESSION['name']) && $_SESSION['name'] == 'admin') { ?>
                        <li class="nav-item navcenter">
                            <a href="Index.php" class="nav-link">Startseite</a>
                        </li>
                        <li class="nav-item navcenter">
                            <a href="FAQ.php" class="nav-link">Hilfe</a>
                        </li>
                        <li>
                            <a href="Reservierverwaltung.php" class="nav-link">Reservierungsverwaltung</a>
                        </li>
                        <li class="nav-item navcenter">
                            <a href="Userverwaltung.php" class="nav-link">Userverwaltung</a>
                        </li>
                        <li class="nav-item navcenter">
                            <a href="Logout.php" class="nav-link">Logout</a>
                        </li>
                    <?php } else {?>
                        <li class="nav-item navcenter">
                            <a href="Index.php" class="nav-link">Startseite</a>
                        </li>
                        <li class="nav-item navcenter">
                            <a href="FAQ.php" class="nav-link">Hilfe</a>
                        </li>
                        <li class="nav-item navcenter">
                            <a href="Reservierung.php" class="nav-link">Reservierung</a>
                        </li>
                        <li class="nav-item navcenter">
                        <a href="Profil.php" class="nav-link"><u><?php echo $_SESSION['name'] ?></u></a>
                        </li>
                        <li class="nav-item navcenter">
                            <a href="Logout.php" class="nav-link">Logout</a>
                        </li>

                    <?php } ?>
                <?php } else { ?>
                    <li class="nav-item navcenter">
                            <a href="Index.php" class="nav-link">Startseite</a>
                    </li>
                    <li class="nav-item">
                        <a href="Index.php" class="nav-link">Startseite</a>
                    </li>
                    <li class="nav-item">
                        <a href="Login.php" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="Registrierung.php" class="nav-link">Registrierung</a>
                    </li>
                    <li class="nav-item navcenter">
                        <a href="FAQ.php" class="nav-link">Hilfe</a>
                    </li>
                <?php } ?>
            </ul>
         </div>
        </div>
    </nav>

    <div>
        <section class="blogpost imprint">
            <h1 style="color: #1d3124">Impressum</h1>
            <br>
                <div class="columnim rounded-corners">
                    <img src="IMG/Patricia.jpeg" alt="Patricia" style="width: 230px; height:290px; border-radius: 15px;">
                    </div>
                <div class="columnim rounded-corners">
                <img src="IMG/Ace.jpg" alt="Ace"style="width: 220px;em; height: 290px; border-radius: 15px">
        
                    
              
            </div id="textimpressum">
        
            <h4>Firma</h4>
            <p>Mountain View Hotel</p>
            <h4>UID Nummer</h4>
            <p>UID nummer: ATU1234</p>
            <h4>Firmenbuchnummer</h4>
            <p>123</p>
            <h4>Unternehmensregister</h4>
            <p>Universität: Vienna</p>
            <h4>Firmensitz</h4>
            <p>1200 Vienna</p>
            <h4>Adresse</h4>
            <p>Hoechstaedtplatz 6 | Vianna | Austria</p>
            <h4>Telefonnummer</h4>
            <p><a class="tel" href="tel:+43 1234567890">+43 1234567890</a></p>
            <h4>E-Mail Adresse</h4>
            <p><a class="mail" href="mailto:if22b180@technikum-wien.at">if12b123@technikum-wien.at</a></p> <!-- mit mailto kann man direkt den Link dann öffnen zum Mail schreiben -->
            <h4>Professioneller Titel</h4>
            <p>Webentwickler</p>
            
        </section>
    </body>
        
        
        
        
        
        
        
        
                
       

    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
</body>
</html>