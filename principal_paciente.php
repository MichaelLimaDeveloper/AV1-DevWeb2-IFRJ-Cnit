<?php
   function conectar()
   {
    $host = "localhost";  
    $db   = "medica_clinica_paciente";
    $user = "root";       
    $pass = "";

    $conn = mysqli_connect("$host","$user","$pass","$db") or die ("problemas na conexão");
    return $conn;
   }
 ?>