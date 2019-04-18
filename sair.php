<?php

session_start();
//eliminar superhlobal de ssão do array
unset($_SESSION['usuario']);
unset($_SESSION['email']);

header('location: index.php')

?>