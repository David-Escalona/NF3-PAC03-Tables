<?php
// Connect to the database
$db = mysqli_connect('localhost', 'root', 'root') or 
    die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

// You should have the $movie_id value available here; you can retrieve it from your URL or any other source.
$movie_id = 1; // Replace with the actual movie ID you want to calculate the average rating for

// Calculate the average rating for the movie
$query = 'SELECT AVG(review_rating) as average_rating FROM reviews WHERE review_movie_id = ' . $movie_id;
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$row = mysqli_fetch_assoc($result);
$average_rating = number_format($row['average_rating'], 2); // Format the average rating

// Now you can use the $average_rating variable to display the average rating.
echo "Average Rating: $average_rating";

// Close the database connection if you no longer need it.
mysqli_close($db);
?>

