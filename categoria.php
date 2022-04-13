<html>

<head>
    <title>Ricerca film per categoria</title>
</head>

<body>
    <h1>RICERCA FILM PER CATEGORIA</h1>
    <form method="post" action="films_cat.php">
        Seleziona la categoria: <select name="cat_films">
            <?php
            require_once "database.php";
            $sql = "SELECT * FROM category";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value=" . $row['category_id'] . ">" .
                    $row['name'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Cerca">
    </form>
</body>

</html>