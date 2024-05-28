<?php
session_start();

// Initialize the modal message
$_SESSION['modalMessage'] = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['default_id'])) {
    // Establish a database connection
    $conn = new mysqli("localhost", "root", "", "storymania");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare DELETE statements for all tables
    $deleteWritestory = "DELETE FROM writestory WHERE id = ?";
    $deleteLibrary = "DELETE FROM library WHERE library_id = ?"; // Adjusted SQL statement
    $deleteMystory = "DELETE FROM mystory WHERE default_id = ?";

    // Get the story ID from the URL parameter
    $default_id = intval($_GET['default_id']);  // Sanitize input

    // Function to execute deletion and handle errors
    function executeDeletion($conn, $sql, $id) {
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                $stmt->close();
                return true;
            } else {
                $error = "Error executing query: " . $stmt->error;
                $stmt->close();
                return $error;
            }
        } else {
            return "Error preparing query: " . $conn->error;
        }
    }

    // Execute deletions
    $errors = [];
    if (($result = executeDeletion($conn, $deleteWritestory, $default_id)) !== true) {
        $errors[] = "writestory: " . $result;
    }
    if (($result = executeDeletion($conn, $deleteLibrary, $default_id)) !== true) {
        $errors[] = "library: " . $result;
    }
    if (($result = executeDeletion($conn, $deleteMystory, $default_id)) !== true) {
        $errors[] = "mystory: " . $result;
    }

    // Check for errors
    if (empty($errors)) {
        $_SESSION['modalMessage'] = "Story deleted successfully.";
    } else {
        $_SESSION['modalMessage'] = "The following errors occured" . implode(", ", $errors);
    }

    // Close the connection
    $conn->close();
} else {
    $_SESSION['modalMessage'] = "Invalid Request.";
}

// Redirect back to the referring page
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>
