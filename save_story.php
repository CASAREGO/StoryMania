<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['login']) || !$_SESSION['login']) {
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = mysqli_connect("localhost", "root", "", "storymania");

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve user_id from session
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
         $_SESSION['modalMessage'] = "User ID not set in session.";
        exit;
    }

    // Assuming 'libdef_id' is sent from the 'writestory' page
    $libdef_id = $_POST["libdef_id"];

    $Title = mysqli_real_escape_string($connect, $_POST["Title"]);
    $Author = mysqli_real_escape_string($connect, $_POST["Author"]);
    $Genre = mysqli_real_escape_string($connect, $_POST["Genre"]);
    $Story = mysqli_real_escape_string($connect, $_POST["Story"]);
    $Rating = mysqli_real_escape_string($connect, $_POST["Rating"]);

    $sql = "INSERT INTO library (user_id, libdef_id, Title, Author, Genre, Story, Rating) VALUES (?, ?, ?, ?, ?, ?, ?)";
    if ($stmt = $connect->prepare($sql)) {
        $stmt->bind_param("iisssss", $user_id, $libdef_id, $Title, $Author, $Genre, $Story, $Rating);
        if ($stmt->execute()) {
             $_SESSION['modalMessage'] = "Story saved successfully.";
             header('Location: library.php');
        } else {
             $_SESSION['modalMessage'] = "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
         $_SESSION['modalMessage'] = "Error: " . $connect->error;
    }

    $connect->close();
} else {
     $_SESSION['modalMessage'] = "Invalid request.";
}
?>