<?php

include_once('../config/conn.php');

if (isset($_POST['submit'])) {


    $rojos = $_POST['rojos'];
    $blancos = $_POST['blancos'];
    $plaquetas = $_POST['plaquetas'];
    $hematocrito = $_POST['hematocrito'];
    $hemoglobina = $_POST['hemoglobina'];
    $observaciones = $_POST['observaciones'];
    $idOrden = $_POST['idOrden'];
    $idPaciente = $_POST['idPaciente'];


    $query = "INSERT INTO `examen` (`rojos`, `blancos`, `plaquetas`, `hemoglobina`, `hematocrito`, `idPaciente`, `idOrden`, `observacion`) 
    VALUES                ('$rojos', '$blancos', '$plaquetas', '$hemoglobina', '$hematocrito', '$idPaciente', '$idOrden', '$observaciones')";

    $result = mysqli_query($conn, $query);



    $query2 = "update orden set status = 1 where id = '$idOrden'";
    $result2 = mysqli_query($conn, $query2);

    header('Location: ../dashboardDoctor.php');

} else {
    echo "No se pudo agregar el examen";
}
