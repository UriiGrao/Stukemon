<html>
    <head>
        <meta charset="UTF-8">
        <title>TrainerRank</title>
    </head>
    <body>
        <h1>Ranking Trainers</h1>
        <?php
        require_once '../bbdd.php';

        $listtrain = selectListTrainer();
        echo "<table>";
        echo "<tr>";
        echo "<th>name</th><th>pokeballs</th>"
        . "<th>potions</th><th>points</th>";
        echo "</tr>";
        while ($fila = mysqli_fetch_assoc($listtrain)) {
            echo "<tr>";
            foreach ($fila as $dato) {
                echo "<td>$dato</td>";
            }
            echo "</tr>";
        }
        ?>

        <img src="../Fotos/entrep.jpg" alt=""/>
        <a href="../index.php">Volver Menu</a>
    </body>
</html>
