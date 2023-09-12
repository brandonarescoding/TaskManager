// index.php

// This is main page that display a list of task and allows users to add, update and delete tasks.

<?php 

require(config.php); // Import database reqirements connexion

try {

    $bd = new PDO ("mysql:host" . DB_HOST . "; dbname" . DB_NAME, DB_USER, DB_PASSWORD );
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

} catch (PDOException $e) {
    echo "Connection failed: ". $e->getMessage();
}


//Retrieve tasks from the database or an array
$tasks = getTasks();

// Loop through tasks and display them
foreach ($tasks as $task) {
    echo "<h2>{$task['title']}<h2>";
    echo "<p>{$task['description']}</p>";
    echo "<p>Status: {$task['statut']}</p>";
    // Add, Edit and Detete buttons with appropriate links
    echo "<a href='add.php>Add</a>";
    echo "<a href='edit.php?id={$task['id']}'>Edit</a>";
    echo "<a href='detete.php?id={$task['id']}'>Edit</a>";
   
}
?>