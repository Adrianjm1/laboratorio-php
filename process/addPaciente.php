<?php
include_once('../config/conn.php');
// Header("Location: dashboard.php");



    if (!isset($_POST['nombre']) || !isset($_POST['cedula']) || !isset($_POST['correo']) ) {

        echo "No se pudo agregar el paciente";
        // header('Location: ../dashboardEnfermero.php');
    }
    else{
        $nombre = $_POST['nombre'];
        $cedula = $_POST['cedula'];
        $correo = $_POST['correo'];

        $sql = "INSERT INTO paciente (nombre, cedula, correo) VALUES ('$nombre', '$cedula', '$correo')";
        $query= mysqli_query($conn,$sql);

        if ($query) {
            header('Location: ../dashboardEnfermero.php');
        }

     

    }