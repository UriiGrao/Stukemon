<?php
function UPlevel($m){
  $c = conectar();
    $select = "UPDATE pokemon SET level = level + 1 WHERE name = '$m'"; 
    if (mysqli_query($c, $select)) {
        $resultado = "ok";
    } else {
        $resultado = mysqli_error($c);
    }
    desconectar($c);
    return $resultado;  
}
function selectListBattle() {
    $c = conectar();
    $select = "select winner, count(*) as victorias from battle where winner is not null 
        group by winner order by victorias desc;"; 
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}
function insertarBattle($pokemon1, $pokemon2, $winner) {
    $conexion = conectar();
    if ($winner == $pokemon1 || $winner == $pokemon2) {
        $insert = "insert into battle values (null, '$pokemon1', '$pokemon2',"
                . "'$winner')";
    } else {
        $insert = "insert into battle values (null, '$pokemon1', '$pokemon2',"
                . " null)";
    }

    if (mysqli_query($conexion, $insert)) {
        $resultado = "ok";
    } else {
        $resultado = mysqli_error($conexion);
    }
    desconectar($conexion);
    return $resultado;
}

function cambiarcura2($n, $m) {
    $c = conectar();
    $select = "UPDATE pokemon SET life = $n WHERE name = '$m'";
    if (mysqli_query($c, $select)) {
        $resultado = "ok";
    } else {
        $resultado = mysqli_error($c);
    }
    desconectar($c);
}

function cambiarpuntosLose($n) {
    $c = conectar();
    $select = "UPDATE trainer SET points = points + 1 WHERE name = '$n'";
    if (mysqli_query($c, $select)) {
        $resultado = "ok";
    } else {
        $resultado = mysqli_error($c);
    }
    desconectar($c);
}

function cambiarpuntosWin($n) {
    $c = conectar();
    $select = "UPDATE trainer SET points = points + 10 WHERE name = '$n'";
    if (mysqli_query($c, $select)) {
        $resultado = "ok";
    } else {
        $resultado = mysqli_error($c);
    }
    desconectar($c);
}

function nivel($n) {
    $c = conectar();
    $select = "SELECT level FROM pokemon WHERE name = '$n'";
    $resultado = mysqli_query($c, $select);
    $cont = mysqli_fetch_array($resultado);
    extract($cont);
    desconectar($c);
    return $level;
}

function vida($n) {
    $c = conectar();
    $select = "SELECT life FROM pokemon WHERE name = '$n'";
    $resultado = mysqli_query($c, $select);
    $cont = mysqli_fetch_array($resultado);
    extract($cont);
    desconectar($c);
    return $life;
}

function attack($n) {
    $c = conectar();
    $select = "SELECT attack FROM pokemon WHERE name = '$n'";
    $resultado = mysqli_query($c, $select);
    $cont = mysqli_fetch_array($resultado);
    extract($cont);
    desconectar($c);
    return $attack;
}

function defense($n) {
    $c = conectar();
    $select = "SELECT defense FROM pokemon WHERE name = '$n'";
    $resultado = mysqli_query($c, $select);
    $cont = mysqli_fetch_array($resultado);
    extract($cont);
    desconectar($c);
    return $defense;
}

function veceswin() {
    $c = conectar();
    $select = "SELECT winner, count(*) as victorias FROM battle GROUP BY winner"
            . "ORDER BY victorias desc";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}

function selectListTrainer() {
    $c = conectar();
    $select = "SELECT * FROM Trainer ORDER BY points desc"; //falta order by.
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}

function selectListPok() {
    $c = conectar();
    $select = "SELECT * FROM Pokemon ORDER BY level desc, life desc";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}

function potimenus($n) {
    $c = conectar();
    $select = "UPDATE trainer set potions = potions -1 WHERE name = '$n'";
    if (mysqli_query($c, $select)) {
        $resultado = "ok";
    } else {
        $resultado = mysqli_error($c);
    }
    desconectar($c);
}

function cambiarcura($n) {
    $c = conectar();
    $select = "UPDATE pokemon SET life = life + 50 WHERE name = '$n'";
    if (mysqli_query($c, $select)) {
        $resultado = "ok";
    } else {
        $resultado = mysqli_error($c);
    }
    desconectar($c);
}

function select4($n) {
    $c = conectar();
    $select = "SELECT name FROM pokemon WHERE Trainer = '$n'";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}

function select3() {
    $c = conectar();
    $select = "SELECT * FROM Trainer WHERE potions > 0";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}

function select1($n) {
    $conexion = conectar();
    $select = "SELECT count(*) AS numen FROM pokemon where trainer='$n'";
    $resultado = mysqli_query($conexion, $select);
    $cont = mysqli_fetch_array($resultado);
    extract($cont);
    desconectar($conexion);
    return $numen;
}

function select2() {
    $c = conectar();
    $select = "SELECT name FROM trainer";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}

function insertarTrainer($name, $pokeballs, $potions, $points) {
    $conexion = conectar();
    $insert = "insert into trainer values ('$name', $pokeballs, $potions, $points)";
    if (mysqli_query($conexion, $insert)) {
        $resultado = "ok";
    } else {
        $resultado = mysqli_error($conexion);
    }
    desconectar($conexion);
    return $resultado;
}

function insertarPokemon($name, $type, $ability, $attack, $defense, $speed, $life, $level, $trainer) {
    $conexion = conectar();
    $insert = "insert into pokemon values ('$name', '$type', '$ability',
        $attack, $defense, $speed, $life, $level, '$trainer')";
    if (mysqli_query($conexion, $insert)) {
        $resultado = "ok";
    } else {
        $resultado = mysqli_error($conexion);
    }
    desconectar($conexion);
    return $resultado;
}

function desconectar($conexion) {
    mysqli_close($conexion);
}

function conectar() {
    $conexion = mysqli_connect("localhost", "root", "", "stukemon");
    if (!$conexion) {
        die("No se ha podido establecer la conexión con el servidor");
    }
    return $conexion;
}
