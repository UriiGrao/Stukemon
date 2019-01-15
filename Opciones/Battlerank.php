<html>
    <head>
        <meta charset="UTF-8">
        <title>rankingBattle</title>
    </head>
    <body>
        <h1>Ranking Battles</h1>
        <?php
        require_once '../bbdd.php';
        $listbattle = selectListBattle();
        echo "<table>";
        echo "<tr>";
        echo "<th>winner</th><th>victorias</th>";
        echo "</tr>";
        while ($fila = mysqli_fetch_assoc($listbattle)) {
            echo "<tr>";
            foreach ($fila as $dato) {
                echo "<td>$dato</td>";
            }
            echo "</tr>";
        }
        ?>
        <img src="../Fotos/rankpoints.jpg" alt=""/>
        <a href="../index.php">Volver Menu</a>
    </body>
</html>
