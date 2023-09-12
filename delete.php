// delete.php

// This Page is use to delete in tasks list a specific task
<?php 

if($_SERVER["REQUEST_METHOD"] == GET AND isset($_GET['id'])){

    $id = $_GET[id];


//Assuming you have PDO database connection in $db
try{
    // Prepare an SQL query to delete a task
    $query = "DELETE FROM tasks WHERE id = :id";
    $stmt = $bd->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Redirection to index.php
    header("location: index.php");
    exit;
} catch (IOException $e) {
    echo "Error :" . $e->getMessage();
}
}

?>