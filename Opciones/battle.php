<html>
    <head>
        <meta charset="UTF-8">
        <title>battle!</title>
    </head>
    <body>
        <h1>Vamoh a Lucha!</h1>
        <img src="../Fotos/battle.jpg" alt=""/>
        <a href="../index.php">Volver Menu</a>
        <form action="battle.php" method="POST">
            Trainer:<select name='Trainer'>
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
            </select>
            Trainer2:<select name='Trainer2'>
                <?php
                require_once '../bbdd.php';
                $trainer2 = select3();
                while ($option2 = mysqli_fetch_assoc($trainer2)) {
                    $npok2 = select1($option2['name']);
                    if ($npok2 > 0) {
                        echo "<option>" . $option2['name'] . "</option>";
                    }
                }
                ?>
            </select>
            <input type="submit" value="Elegir" name="boton" />
        </form>
        <form action="battle.php" method="POST">
            Pokemon a Luchar:
            <select name="pok">
                <?php
                if (isset($_POST["boton"])) {
                    $trainer = $_POST["Trainer"];
                    require_once '../bbdd.php';
                    $pok = select4($trainer);
                    while ($option1 = mysqli_fetch_assoc($pok)) {
                        echo "<option>" . $option1['name'] . "</option>";
                    }
                    ?>
                    <input type="hidden" name="Trainer" value="<?php echo $trainer ?>"/>
                    <?php
                }
                ?>
            </select>
            Pokemon a Luchar 2:<select name='pok2'>
                <?php
                if (isset($_POST["boton"])) {
                    $trainer2 = $_POST["Trainer2"];
                    require_once '../bbdd.php';
                    $pok2 = select4($trainer2);
                    while ($option2 = mysqli_fetch_assoc($pok2)) {
                        echo "<option>" . $option2['name'] . "</option>";
                    }
                    ?>
                    <input type="hidden" name="Trainer2" value="<?php echo $trainer2 ?>"/>
                    <?php
                }
                ?>
                <input type="submit" value="Luchar" name="boton2" />
            </select>
        </form>
        <?php
        if (isset($_POST["boton2"])) {
            $trainer = $_POST["Trainer"];
            $trainer2 = $_POST["Trainer2"];
            $pok = $_POST["pok"];
            $pok2 = $_POST["pok2"];
            $trainpok1def = defense($pok);
            $trainpok2def = defense($pok2);
            $nivel1 = nivel($pok);
            $nivel2 = nivel($pok2);

            $trainpok1atk = attack($pok) + (1.5 * $nivel1);
            $trainpok2atk = attack($pok2) + (1.5 * $nivel2);

            $trainpok1lif = vida($pok);
            $trainpok2lif = vida($pok2);

            if ($trainpok1def > $trainpok2def) { // FALTA AUMENTAR NIVEL.
                $vidarestante1 = $trainpok1lif - $trainpok2atk;
                $vidarestante2 = $trainpok2lif - $trainpok1atk;
                echo "$vidarestante1 es la vida que le queda al $pok <br>";
                echo "$vidarestante2 es la vida que le queda al $pok2 <br>";
            } else if ($trainpok1def < $trainpok2def) {
                $vidarestante2 = $trainpok2lif - $trainpok1atk;
                $vidarestante1 = $trainpok1lif - $trainpok2atk;
                echo "$vidarestante2 es la vida que le queda al $pok2 <br>";
                echo "$vidarestante1 es la vida que le queda al $pok <br>";
            } else {
                $random = rand(0, 1);
                if ($random == 1) {
                    $vidarestante1 = $trainpok1lif - $trainpok2atk;
                    $vidarestante2 = $trainpok2lif - $trainpok1atk;
                    echo "$vidarestante1 es la vida que le queda al $pok <br>";
                    echo "$vidarestante2 es la vida que le queda al $pok2 <br>";
                } else {
                    $vidarestante2 = $trainpok2lif - $trainpok1atk;
                    $vidarestante1 = $trainpok1lif - $trainpok2atk;
                    echo "$vidarestante2 es la vida que le queda al $pok2 <br>";
                    echo "$vidarestante1 es la vida que le queda al $pok <br>";
                }
            }
            if ($vidarestante1 > $vidarestante2) {
                echo " El ganador es: $pok del entrenador $trainer <br> ";
                echo "Tu pokemon ha subido 1lvl!";
                echo "Ahora $trainer tiene 10 puntos mas y $trainer2 ha ganado 1 punto.";
                UPlevel($pok);
                cambiarpuntosWin($trainer);
                cambiarpuntosLose($trainer2);
                insertarBattle($pok, $pok2, $pok);
            } else if ($vidarestante1 < $vidarestante2) {
                echo " El ganador es: $pok2 del entrenador $trainer2 <br> ";
                echo "Tu pokemon ha subido 1lvl!";
                echo "Ahora $trainer2 tiene 10 puntos mas y $trainer ha ganado 1 punto.";
                UPlevel($pok2);
                cambiarpuntosLose($trainer);
                cambiarpuntosWin($trainer2);
                insertarBattle($pok, $pok2, $pok2);
            } else {
                echo "Los pokemon han empatado ningun entrenador gana puntos!";
                insertarBattle($pok, $pok2, "empate");
            }
            cambiarcura2($vidarestante1, $pok);
            cambiarcura2($vidarestante2, $pok2);
            echo '<br>La vida ha sido modificada.';
        }
        ?>
    </body>
</html>
