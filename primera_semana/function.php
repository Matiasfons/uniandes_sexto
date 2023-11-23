<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = file_get_contents('php://input');
    $data_decoded = json_decode($data, true);

    $initialNumber = $data_decoded["initialNumber"];
    $factorial = 1;
    echo "<h4> Vamos a Generar el factorial del número $initialNumber </h4>";
    echo "<br>";
    echo "<h5>El proceso empieza multiplicando dentro del bucle</h5>";
    for ($i = 1; $i <= $initialNumber; $i++) {
        echo "<br>";
        echo "El número $i se multiplica por $factorial";
        echo "<br>";
        $factorial *= $i;
    }

    echo "<br>";
    echo "<h5>El factorial de $initialNumber es </h5>";
    echo $factorial;
}
