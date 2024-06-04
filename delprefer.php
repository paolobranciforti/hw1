
<?php
    session_start();

    // Connessione al database
    $conn = mysqli_connect("localhost", "root", "", "hw1");

    if (!$conn) {
        die("Connessione fallita: " . mysqli_connect_error());
    }

    // Ottieni l'ID della sessione e il nome del circuito dalla richiesta GET
    $sess = $_SESSION['_agora_user_id'];
    $circuitName = mysqli_real_escape_string($conn, $_GET['circuitName']);

    // Elimina il circuito preferito dalla tabella gare
    $query = "DELETE FROM gare WHERE id = '$sess' AND circuito = '$circuitName'";

    if (mysqli_query($conn, $query)) {
        echo "Circuito rimosso dai preferiti";
    } else {
        echo "Errore: " . $query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
