<?php
   session_start(); // Session wird gestartet
   session_destroy(); // Session wird zerstört und User wird ausgeloggt
   header('Refresh: 1; URL = Index.php'); // User wird zurück zur Startseite gebracht
?>

<div class="container">
   <h3 class="text-center" style="font-family: Arial, Helvetica, Sans-serif">Sie werden jetzt ausgeloggt!</h3>
</div>