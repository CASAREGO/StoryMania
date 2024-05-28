<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['default_id'])) {
    // Establish a database connection
    $conn = new mysqli("localhost", "root", "", "storymania");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare UPDATE statements for all tables
    $updateWritestory = "UPDATE writestory SET Title = ?, Story = ? WHERE id = ?";
    $updateLibrary = "UPDATE library SET Title = ?, Story = ? WHERE libdef_id = ?";
    $updateMystory = "UPDATE mystory SET Title = ?, Story = ? WHERE default_id = ?";

    // Get the story ID and other data from the POST parameters
    $default_id = intval($_POST['default_id']);  // Sanitize input
    $title = mysqli_real_escape_string($conn, $_POST['Title']);
    $story = mysqli_real_escape_string($conn, $_POST['Story']);

    // Function to execute update and handle errors
    function executeUpdate($conn, $sql, $params) {
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param(...$params);
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

    // Execute updates
    $errors = [];
    if (($result = executeUpdate($conn, $updateWritestory, ['ssi', $title, $story, $default_id])) !== true) {
        $errors[] = "writestory: " . $result;
    }
    if (($result = executeUpdate($conn, $updateLibrary, ['ssi', $title, $story, $default_id])) !== true) {
        $errors[] = "library: " . $result;
    }
    if (($result = executeUpdate($conn, $updateMystory, ['ssi', $title, $story, $default_id])) !== true) {
        $errors[] = "mystory: " . $result;
    }

    // Check for errors
    if (empty($errors)) {
        echo "Story updated successfully in all tables.";
    } else {
        echo "The following errors occurred: " . implode(", ", $errors);
    }

    // Close the connection
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
