<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    session_destroy();
    exit;
}

// Assuming user_id is stored in session when the user logs in
if (!isset($_SESSION['user_id'])) {
    echo "User ID not set in session.";
    exit;
}
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
#storyTable td:first-child {
  display: none;
}

body {
  background-image: linear-gradient(to left, #FFFFFF, #d9d9d9);
}

.juju {
  position: absolute;
  left: 400px;
  width: 100px;
}

.dea {
  position: absolute;
  left: 20px;
  top: 73px;
}

.radio {
  position: absolute;
  left: 300px;
  font-family: "Georgia", serif;
  top: 180px;
  border: 2px solid #000; /* Border color and thickness */
  border-radius: 20px; /* Border radius to make it look like a square */
  padding: 20px;
  width: 300px;
}

ul {
  list-style-type: none;
  padding: 0;
  overflow: hidden;
  background-color: transparent;
  position: relative;
  top: 30px;
  left: 40px;
  width: 1800px;
  border-radius: 7px;
  font-weight: bold;
}

li {
  float: left;
}

li a {
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  margin: 0 20px;
  text-decoration: none;
  font-family: "Tahoma";
  font-size: 120%;
  border-bottom: 2px solid #000;
}

li a:hover {
  background-color: #d9d9d9;
}
.container {
  height: 700px; /* Adjust the height as needed */
  overflow-y: scroll; /* Enable vertical scrolling */
  margin-left: 600px;
  margin-top: 130px;
  font-family: "Tahoma";
}
.story {
  position: absolute;
  text-align: center;
  margin-top: 50px;
  font-family: "Tahoma";
  font-weight: bold;
  left: 900px;
}

#storyTable {
  background-color: black; /* Background color of the table */
  color: white; /* Text color */
  width: 100%; /* Full width */
  border-collapse: collapse; /* Collapse borders */
}
#storyTable th,
#storyTable td {
  border: 1px solid black; /* Border color of table cells */
  padding: 8px; /* Padding inside cells */
}
#storyTable th {
  background-color: black; /* Background color for header cells */
  color: white; /* Text color for header cells */
}
#storyTable tr {
  background-color: black; /* Ensure background color for all rows */
}
#storyTable tr:hover {
  background-color: #333; /* Optional: slightly lighter on hover for visibility */
}

.pagination {
  display: flex;
  justify-content: center;
  margin-top: -70px;
  margin-left: 550px;
}

.pagination a {
  margin: 0 5px;
  padding: 10px 15px;
  border: 1px solid #000;
  text-decoration: none;
  color: black;
  background-color: white;
}

.pagination a.active {
  background-color: black;
  color: white;
}

.pagination a:hover {
  background-color: #d9d9d9;
}
</style>
</head>
<body>
<ul>
  <li><a href="storymaniadashboard.php">HOME</a></li>
  <li><a href="stories.php">STORIES</a></li>
  <li><a href="write.php">WRITE</a></li>
  <li><a href="library.php">LIBRARY</a></li>
  <li><a href="mystory.php">MY STORIES</a></li>
  <li><a href="about.php">ABOUT</a></li>
  <li style="float:right"><a href="logout.php">LOGOUT</a></li>
</ul>
<div class="story">
<h2><strong>MY STORIES</strong></h2>
</div>
<div class="container">
<table id="storyTable" class="table table-bordered">
<tr>
  <th style="display: none;">ID</th>
  <th>Title</th>
  <th>Genre</th>
  <th>Rating</th>
  <th>Action</th>
</tr>
<?php
$conn = new mysqli("localhost", "root", "", "storymania");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$limit = 12; // Number of entries to show per page
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $limit;

// Fetch stories for the logged-in user with pagination
$query = "SELECT default_id, Title, Genre, Rating FROM mystory WHERE user_id = ? LIMIT ?, ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("iii", $user_id, $start_from, $limit);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr class='storyRow'><td style='display:none;'>". $row["default_id"] ."</td><td><a href='read.php?default_id=" . $row["default_id"] . "&source=mystory'>" . htmlspecialchars($row["Title"]) . "</a></td><td>". htmlspecialchars($row["Genre"]) ."</td>
        <td>". htmlspecialchars($row["Rating"]) ."</td><td><a href='edit.php?default_id=" . $row["default_id"] . "&source=mystory'>Edit</a> | <a href='delete.php?default_id=" . $row["default_id"] . "' onclick='return confirm(\"Are you sure you want to delete this story?\");'>Delete</a></td></tr>";
    }
} else {
    echo "<tr><td colspan='3'>No stories found.</td></tr>";
}

$stmt->close();

// Pagination logic
$query = "SELECT COUNT(default_id) FROM mystory WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($total_records);
$stmt->fetch();
$total_pages = ceil($total_records / $limit);
$stmt->close();
$conn->close();
?>
</table>
</div>

<div class="pagination">
<?php
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a href='mystory.php?page=" . $i . "'" . ($i == $page ? " class='active'" : "") . ">" . $i . "</a> ";
}
?>
</div>

<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo isset($_SESSION['modalMessage']) ? $_SESSION['modalMessage'] : ''; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  var modalMessage = <?php echo json_encode(isset($_SESSION['modalMessage']) ? $_SESSION['modalMessage'] : null); ?>;
  if (modalMessage) {
    var modal = new bootstrap.Modal(document.getElementById('messageModal'));
    modal.show();
    <?php unset($_SESSION['modalMessage']); ?>
  }
});
</script>

</body>
</html>
