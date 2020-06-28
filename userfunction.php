<?php

$db = mysqli_connect("127.0.0.1", "root", "", "newgestionvols");

if (@$idUser = intval($_GET['client'])) {
    $sql         = "SELECT * FROM client WHERE idClient = '" . $idUser . "'";
    $client      = mysqli_query($db, $sql);
    $client_rows = mysqli_num_rows($client);
    if ($client_rows > 0) {
        echo '<table class="table">
        <tr>
        <th>Nom</th>
        <th>Prennom</th>
        <th>telephone</th>
        <th>C.I.N</th>
        </tr>';
        while ($client_data =  mysqli_fetch_array($client)) {
            echo "<tr>";
            echo "<td>" . $client_data['Nom'] . "</td>";
            echo "<td>" . $client_data['Prenom'] . "</td>";
            echo "<td>" . $client_data['CIN'] . "</td>";
            echo "<td>" . $client_data['tel'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo '<h1 class="display-4"> No client found </h1>';
    }
}

