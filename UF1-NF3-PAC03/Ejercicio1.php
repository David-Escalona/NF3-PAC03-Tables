<?php
// Conéctese a MySQL usando MySQLi
$db = mysqli_connect('localhost', 'root', 'root', 'moviesite') or 
    die('Unable to connect. Check your connection parameters.');

// Insertar nuevos datos en la tabla de reseñas (reviews)
$query = <<<ENDSQL
INSERT INTO reviews
    (review_movie_id, review_date, reviewer_name, review_comment, review_rating)
VALUES 
    (2, "2023-10-20", "Alice Johnson", "This movie was amazing! I can't believe I didn't watch it sooner.", 5),
    (3, "2023-10-21", "Bob Smith", "A must-see film for anyone interested in travel. Highly recommended!", 4),
    (4, "2023-10-22", "Catherine Lee", "I didn't expect much, but it turned out to be surprisingly good. Worth watching.", 3)
ENDSQL;
mysqli_query($db, $query) or die(mysqli_error($db));

echo 'Las peliuclas estan añadidas!';
?>

