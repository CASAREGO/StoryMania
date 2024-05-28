<?php
session_start();
require_once "connection.php";

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$rowsPerPage = 10;
$offset = ($page - 1) * $rowsPerPage;

$author = isset($_GET['author']) ? $_GET['author'] : '';
$title = isset($_GET['title']) ? $_GET['title'] : '';
$genre = isset($_GET['genre']) ? $_GET['genre'] : '';
$rating = isset($_GET['rating']) ? $_GET['rating'] : '';

$sql = "SELECT * FROM writestory WHERE 1=1";
$params = [];

if ($author) {
    $sql .= " AND author LIKE ?";
    $params[] = "%$author%";
}
if ($title) {
    $sql .= " AND title LIKE ?";
    $params[] = "%$title%";
}
if ($genre) {
    $sql .= " AND genre = ?";
    $params[] = $genre;
}
if ($rating) {
    $sql .= " AND rating = ?";
    $params[] = $rating;
}

$totalSql = $sql; // For counting total results
$sql .= " LIMIT $rowsPerPage OFFSET $offset";

$stmt = $conn->prepare($sql);
$stmt->execute($params);
$writestory = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalStmt = $conn->prepare($totalSql);
$totalStmt->execute($params);
$totalResults = $totalStmt->rowCount();

$totalPages = ceil($totalResults / $rowsPerPage);

echo json_encode([
    'writestory' => $writestory,
    'totalPages' => $totalPages
]);
?>
