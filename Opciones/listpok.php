<html>
    <head>
        <meta charset="UTF-8">
        <title>ListPok</title>
    </head>
    <body>
        <h1>Listado Pokemon</h1>
        <?php
        require_once '../bbdd.php';

        $listpok = selectListPok();
        echo "<table>";
        echo "<tr>";
        echo "<th>name</th><th>type</th><th>ability</th><th>attack</th><th>defense</th><th>speed</th>"
        . "<th>life</th><th>level</th><th>trainer</th>";
        echo "</tr>";
        while ($fila = mysqli_fetch_assoc($listpok)) {
            echo "<tr>";
            foreach ($fila as $dato) {
                echo "<td>$dato</td>";
            }
            echo "</tr>";
        }
        ?>

        <img src="../Fotos/listpok.jpg" alt=""/>
        <a href="../index.php">Volver Menu</a>
    </body>
</html>
