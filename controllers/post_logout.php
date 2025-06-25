<?php
session_start();
session_unset(); // Supprimer toutes les variables de la session
session_destroy(); // Détruire la session

header('Location: ../index.php');
