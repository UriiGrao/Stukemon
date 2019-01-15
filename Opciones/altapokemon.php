<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>altaPokemon</title>
    </head>
    <body>
        <h1>Datos del Pokemon</h1>
        <form action="altapokemon.php" method="POST">
            Name: <input type="text" name="name" required><br><br>
            Type: <select name="type">
                <option>Normal</option>
                <option>Fighting</option>
                <option>Frying</option>
                <option>Poison</option>
                <option>Ground</option>
                <option>Rock</option>
                <option>Bug</option>
                <option>Ghost</option>
                <option>Steel</option>
                <option>Fire</option>
                <option>Water</option>
                <option>Grass</option>
                <option>Electric</option>
                <option>Psychic</option>
                <option>Ice</option>
                <option>Dragon</option>
                <option>Dark</option>
                <option>Fairy</option>
            </select>
            Ability: <input type="text" name="ability" required ><br><br>
            Attack: <input type="number" name="attack" required><br><br>
            Defense: <input type="number" name="defense" required><br><br>
            Speed: <input type="number" name="speed" required><br><br>
            Life: <input type="number" name="life" required><br><br>
            Trainer: <select name='Trainer'>
                <?php
                require_once '../bbdd.php';
                $trainer1 = select2();
                while ($option1 = mysqli_fetch_assoc($trainer1)) {
                    $npok = select1($option1['name']);
                    if ($npok < 6) {
                        echo "<option>" . $option1['name'] . "</option>";
                    }
                }
                ?>
            </select>
            <br><br>
            <input type="submit" value="Registrar" name="boton" >
            <a href="../index.php">Volver Menu</a>
        </form>
        <?php
        require_once '../bbdd.php';
        if (isset($_POST["boton"])) {
            $name = $_POST["name"];
            $type = $_POST["type"];
            $ability = $_POST["ability"];
            $attack = $_POST["attack"];
            $defense = $_POST["defense"];
            $speed = $_POST["speed"];
            $life = $_POST["life"];
            $level = 0;
            $Trainer = $_POST["Trainer"];
            $registro = insertarPokemon($name, $type, $ability, $attack, $defense, $speed, $life, $level, $Trainer);
            if ($registro == "ok") {
                echo "<p>Pokemon registrado en la base de datos</p>";
            } else {
                echo "Error al registrar al Pokemon $registro<br>";
            }
        }
        ?>
        <img src="../Fotos/pok2.png" alt=""/>
    </body>
</html>

