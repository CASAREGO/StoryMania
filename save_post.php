<?php  
session_start();

$connect = mysqli_connect("localhost", "root", "", "storymania");

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    echo "User ID not set in session.";
    exit;
}

if (isset($_POST["Title"]) && isset($_POST["Author"]) && isset($_POST["Genre"]) && isset($_POST["Rating"]) && isset($_POST["Story"])) {
    $Title = mysqli_real_escape_string($connect, $_POST["Title"]);
    $Author = mysqli_real_escape_string($connect, $_POST["Author"]);
    $Genre = mysqli_real_escape_string($connect, $_POST["Genre"]);
    $Rating = mysqli_real_escape_string($connect, $_POST["Rating"]);
    $Story = mysqli_real_escape_string($connect, $_POST["Story"]);

    if ($_POST["id"] != '') {  
        // Update post  
        $id = mysqli_real_escape_string($connect, $_POST["id"]);
        $sql = "UPDATE writestory SET user_id = '".$user_id."', Title = '".$Title."', Author = '".$Author."', Genre = '".$Genre."',  Rating = '".$Rating."', Story = '".$Story."' WHERE id = '".$id."'";  
        if (mysqli_query($connect, $sql)) {
            // Optionally, update corresponding entry in mystory if needed
            // $sql = "UPDATE mystory SET ... WHERE story_id = '".$id."'";
            // mysqli_query($connect, $sql);
            echo $id;
        } else {
            echo "Error updating record: " . mysqli_error($connect);
        }
    } else {  
        // Insert post  
        $sql = "INSERT INTO writestory(user_id, Title, Author, Genre, Rating, Story) VALUES ('".$user_id."', '".$Title."', '".$Author."', '".$Genre."','".$Rating."', '".$Story."')";  
        if (mysqli_query($connect, $sql)) {
            $id = mysqli_insert_id($connect); // Get the inserted ID
            echo $id;

            // Insert into mystory table
            $sql_mystory = "INSERT INTO mystory(user_id, default_id, Title, Genre, Rating, Story ) VALUES ('".$user_id."','".$id."', '".$Title."', '".$Genre."', '".$Rating."', '".$Story."')";
            if (!mysqli_query($connect, $sql_mystory)) {
                echo "Error inserting into mystory: " . mysqli_error($connect);
            }
        } else {
            echo "Error inserting record: " . mysqli_error($connect);
        }
    }
}  
?>
