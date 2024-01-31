<?php

include_once("connections/connection.php");

// Always start session
session_start();

// Connect to database
$con = connection();

if(isset($_POST['delete'])){
    $id = $_POST['ID'];
     $sql = "DELETE FROM employee_list WHERE id = '$id'";

     if ($con->query($sql) === TRUE) {
        // Successful submission
        $_SESSION['success_message'] = "Record has been deleted successfully.";
        echo '<script>alert("Record has been deleted successfully."); window.location.href = "employee.php";</script>';
        exit; // Exit to prevent further execution
    } else {
        // Error handling
        $_SESSION['error_message'] = "Error delete record: " . $con->error;
        echo '<script>alert("Error updating record: ' . $con->error . '"); window.location.href = "employee.php";</script>';
        exit; // Exit to prevent further execution
    }
}
?>