<?php
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a database connection
    $connect = new mysqli("localhost", "root", "", "storymania");

    // Check connection
    if ($connect->connect_error) {
        $_SESSION['modalMessage'] = "Connection failed: " . $connect->connect_error;
    } else {
        // Check if library_id is set
        if (isset($_POST['library_id'])) {
            $library_id = mysqli_real_escape_string($connect, $_POST['library_id']);

            // Prepare the SQL statement
            $sql = "DELETE FROM library WHERE library_id = ?";
            if ($stmt = $connect->prepare($sql)) {
                $stmt->bind_param("i", $library_id);

                // Execute the statement and check for success
                if ($stmt->execute()) {
                    $_SESSION['modalMessage'] = "Story deleted successfully";
                } else {
                    $_SESSION['modalMessage'] = "Error executing query: " . $stmt->error;
                }

                // Close the statement
                $stmt->close();
            } else {
                $_SESSION['modalMessage'] = "Error preparing query: " . $connect->error;
            }
        } else {
            $_SESSION['modalMessage'] = "Error: library_id not provided.";
        }

        // Close the connection
        $connect->close();
    }

    // Redirect back to the library page or another appropriate page
    header("Location: library.php");
    exit();
} else {
    $_SESSION['modalMessage'] = "Invalid request.";
    header("Location: library.php");
    exit();
}
?>
