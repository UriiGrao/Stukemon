<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mejora HP</title>
    </head>
    <body>
        <h1>Vamoh a Comprah</h1>
        <form action="hiperp.php" method="POST">
            Trainer:<select name='Trainer2'>
                <?php
                require_once '../bbdd.php';
                $trainer1 = select3();
                while ($option1 = mysqli_fetch_assoc($trainer1)) {
                    $npok = select1($option1['name']);
                    if ($npok > 0) {
                        echo "<option>" . $option1['name'] . "</option>";
                    }
                }
                ?>
                Potions: <input type="number" name="npot" required><br><br>
                <br><br>
                <input type="submit" value="Elegir" name="boton" />
            </select>
        </form>
        <a href="../index.php">Volver Menu</a>
        <img src="../Fotos/amatienda.jpg" alt="" width="200px"/>
    </body>
</html>
