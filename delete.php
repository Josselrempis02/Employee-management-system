<?php

include_once("connections/connection.php");

// Always start session
session_start();

// Connect to database
$con = connection();

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];

    // Delete query
    $deleteSql = "DELETE FROM employee_list WHERE id='$id'";
    if ($con->query($deleteSql) === TRUE) {
        // Successful submission
        $_SESSION['success_message'] = "Record have been successfully deleted.";
        echo '<script>alert("Record have been successfully deleted."); window.location.href = "employee.php?ID=' . $id . '";</script>';
        exit; // Exit to prevent further execution
    } else {
        // Error handling
        $_SESSION['error_message'] = "Error deleting record: " . $con->error;
        echo '<script>alert("Error updating record: ' . $con->error . '"); window.location.href = "edit.php";</script>';
        exit; // Exit to prevent further execution
    }
}
?>
