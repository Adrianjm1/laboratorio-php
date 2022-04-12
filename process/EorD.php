<?php 
if (isset($_POST['select'])) {
    $select = $_POST['select'];
    if($select == 'dashboardEnfermero'){
        header('Location: ../dashboardEnfermero.php');
    }
    else{
            header('Location: ../dashboardDoctor.php');
    }
}

else{
    header('Location: ../index.php');
}
