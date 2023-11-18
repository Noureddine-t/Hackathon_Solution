<?php
define("MYHOST", "localhost");
define("MYUSER", "root");
define("MYPASS", "");
$base = "iot_c";

// Connexion à la base de données avec MySQLi
$idcon = new mysqli(MYHOST, MYUSER, MYPASS, $base);

// Vérifier la connexion
if ($idcon->connect_error) {
    die("Erreur de connexion à la base de données : " . $idcon->connect_error);
}
?>   