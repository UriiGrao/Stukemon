<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>altaEntrenador</title>
    </head>
    <body>
         <h1>Datos del Entrenador</h1>         
         <form action="altaentrenador.php" method="POST">
            Name: <input type="text" name="name" required><br><br>
            Pokeballs: <input type="number" name="pokeballs" required><br><br>
            Potions: <input type="number" name="potions" required><br><br>
            <br>
            <input type="submit" value="Registrar" name="boton" >
            <a href="../index.php">Volver Menu</a>
        </form>
         
         <img src="../Fotos/pok.jpg" alt=""/>
        <?php
        require_once '../bbdd.php';
        
        if (isset($_POST["boton"])) {
            $name = $_POST["name"];
            $pokeballs = $_POST["pokeballs"];
            $potions = $_POST["potions"];
            $points = 0;
            $registro = insertarTrainer($name, $pokeballs, $potions, $points);
            if ($registro == "ok") {
                echo "<p>Trainer registrado en la base de datos</p>";
            } else {
                echo "Error al registrar el Trainer $registro<br>";
            }
        }
        ?>
    </body>
</html>
