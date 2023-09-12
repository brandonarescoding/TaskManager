// update.php

// This page is use to edit a specific task in the list
<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];


// Assuming you have PDO database connection in $bd
try {
    //Prepare an Sql query to update task
    $query = "UPDATE INTO tasks (title, description, status) VALUES (:title, :description, :status)";
    $stmt= $db->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':status', $status);
    $stmt->execute();

    //Redirect to index.php
    header("location: index.php");
    exit;

}catch (IOException $e){
    echo "Error :" . $e->getMessage();
}
}
?>