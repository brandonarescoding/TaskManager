// add.php

// This page is use to add in the list news tasks.

<?php 

require('config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST["title"];
    $description = $_POST['description'];
    $status = $_POST['status'];


// Assuming you have PDO database connection in $bd

try {
    // Prepare an SQL query to insert a new task
    $query = "INSERT INTO tasks (title, description, status) VALUES (:title, :description, :status)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':status', $status);
    $stmt->execute();

    // Redirect to index.php
    header("Location: index.php");
    exit;
} catch (IOException $e){
    //Hand,database error
    echo "Error: " . $e->getMessage();
}

}
?>