<?php
// Démarrage de la session, instruction a placer en tête de script
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Titre de la page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php

// Variable $x renseignée dans session1.php ... appel de session2.php : $x est inconnue

// (http protocole en mode déconnecté)

// Le tableau $_SESSION est 'super global', on y a accès partout (si session_start() fait)

// on pourra donc récupérer l'entrée 'x' de ce même tableau

echo "Entrée 'prenom' dans le tableau de Session : ".$_SESSION["prenom"];
echo "Entrée 'nom' dans le tableau de Session : ".$_SESSION["nom"];



?>

</body>

</html>