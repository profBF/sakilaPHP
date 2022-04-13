<html>

<head>
    <title>Sakila Films</title>
    <link rel="stylesheet" href="stile.css">
</head>

<body>
    <?php
    require_once "database.php";

    // CONTROLLO LATO SERVER DEL VALORE TRASMESSO IN POST
    $titolo = htmlspecialchars(trim($_POST['titolo']));
    if ($titolo == "") {
        die("Richiesta errata");
    } else {
        // CREO LA QUERY PARAMETRICA
        $sql = "SELECT * FROM sakila.film WHERE title REGEXP ?";
        $stmt = $conn->prepare($sql);
        // LA COLLEGO AL PARAMETRO titolo
        $stmt->bind_param("s", $titolo);
        // LA ESEGUO
        $stmt->execute();
        // RICAVO L'OGGETTO RECORDSET
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $table = "<table border=1>";
            $table .= "<tr><th>ID</th><th>Titolo</th><th>Descrizione</th><th>Durata (min)</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $table .= "<tr><td>" . $row['film_id'] . "</td>" .
                    "<td>" . $row['title'] . "</td>" .
                    "<td>" . $row['description'] . "</td>" .
                    "<td>" . $row['length'] . "</td></tr>";
            }
            $table .= "</table>";
            echo $table;
        } else {
            echo "<p>Nessun film trovato</p>";
        }
    }

    ?>
</body>

</html>