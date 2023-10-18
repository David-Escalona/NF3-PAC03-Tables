<?php
// Conéctese a MySQL usando MySQLi
$db = mysqli_connect('localhost', 'root', 'root', 'moviesite') or 
    die('Unable to connect. Check your connection parameters.');

// Alterar la tabla de películas para incluir campos de tiempo de ejecución, costo y ganancias
$query = 'ALTER TABLE movie ADD (
    movie_running_time TINYINT UNSIGNED NULL,
    movie_cost DECIMAL(4,1) NULL,
    movie_takings DECIMAL(4,1) NULL)';
mysqli_query($db, $query) or die(mysqli_error($db));

// Insertar nuevos datos en la tabla de películas para cada película
$query = 'UPDATE movie SET
        movie_running_time = 101,
        movie_cost = 81,
        movie_takings = 242.6
    WHERE
        movie_id = 1';
mysqli_query($db, $query) or die(mysqli_error($db));

$query = 'UPDATE movie SET
        movie_running_time = 89,
        movie_cost = 10,
        movie_takings = 10.8
    WHERE
        movie_id = 2';
mysqli_query($db, $query) or die(mysqli_error($db));

$query = 'UPDATE movie SET
        movie_running_time = 134,
        movie_cost = NULL,
        movie_takings = 33.2
    WHERE
        movie_id = 3';
mysqli_query($db, $query) or die(mysqli_error($db));

echo 'Movie database successfully updated!';
?>
