<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mejora HP</title>
    </head>
    <body>
        <h1>Vamoh a Curarnoh</h1>
        <img src="../Fotos/HP.jpg" alt=""/>
        <form action="mejorarHP.php" method="POST">
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
                <br><br>
            </select>
            <input type="submit" value="Elegir" name="boton" />
        </form>
        <form action="mejorarHP.php" method="POST">
            Pokemon a Curar:<select name='curar'>
                <?php
                if (isset($_POST["boton"])) {
                    $trainer2 = $_POST["Trainer2"];
                    require_once '../bbdd.php';
                    $pok = select4($trainer2);
                    while ($option1 = mysqli_fetch_assoc($pok)) {
                        echo "<option>" . $option1['name'] . "</option>";
                    }
                }
                ?>
                <input type="hidden" name="Trainer2" value="<?php echo $trainer2?>">
                <input type="submit" value="Curar" name="boton2" />
        </form>
        <?php
        require_once '../bbdd.php';

        if (isset($_POST["boton2"])) {
            $curar = $_POST["curar"];
            cambiarcura($curar);
            $poti = $_POST["Trainer2"];
            potimenus($poti);
            echo 'Todo Correcto!';
        }
        ?>   
        <a href="../index.php">Volver Menu</a>
    </body>
</html>
