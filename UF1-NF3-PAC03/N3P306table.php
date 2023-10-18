<?php
// Función para obtener el nombre completo de un director a partir de su ID
function get_director($director_id) {
    global $db;

    $query = "SELECT people_fullname FROM people WHERE people_id = $director_id";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $row = mysqli_fetch_assoc($result);
    extract($row);
    return $people_fullname;
}

// Función para obtener el nombre completo de un actor principal a partir de su ID
function get_leadactor($leadactor_id) {
    global $db;

    $query = "SELECT people_fullname FROM people WHERE people_id = $leadactor_id";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $row = mysqli_fetch_assoc($result);
    extract($row);
    return $people_fullname;
}

// Función para obtener la descripción textual de un tipo de película a partir de su ID
function get_movietype($type_id) {
    global $db;

    $query = "SELECT movietype_label FROM movietype WHERE movietype_id = $type_id";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $row = mysqli_fetch_assoc($result);
    extract($row);
    return $movietype_label;
}

// Conexión a la base de datos MySQL
$db = mysqli_connect('localhost', 'root', 'root') or die('No se pudo conectar. Verifique los parámetros de conexión.');

// Asegúrese de que se esté utilizando la base de datos correcta
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

// Consulta para recuperar información
$query = 'SELECT movie_name, movie_year, movie_director, movie_leadactor, movie_type FROM movie ORDER BY movie_name ASC, movie_year DESC';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

// Determinar el número de filas en el resultado
$num_movies = mysqli_num_rows($result);

$table = <<<ENDHTML
<div style="text-align: center;">
 <h2>Base de datos de críticas de películas</h2>
 <table border="1" cellpadding="2" cellspacing="2"
  style="width: 70%; margin-left: auto; margin-right: auto;">
  <tr>
   <th>Título de la película</th>
   <th>Año de estreno</th>
   <th>Director de la película</th>
   <th>Actor principal de la película</th>
   <th>Tipo de película</th>
  </tr>
ENDHTML;

// Recorrer los resultados
while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
    $director = get_director($movie_director);
    $leadactor = get_leadactor($movie_leadactor);
    $movietype = get_movietype($movie_type);

    $table .= <<<ENDHTML
    <tr>
     <td>$movie_name</td>
     <td>$movie_year</td>
     <td>$director</td>
     <td>$leadactor</td>
     <td>$movietype</td>
    </tr>
ENDHTML;
}

$table .= <<<ENDHTML
 </table>
<p>$num_movies películas</p>
</div>
ENDHTML;

echo $table;
?>

