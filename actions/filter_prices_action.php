<?php
require_once '../config/db.php';

$category = $_GET['category'] ?? 'ALL';
$sql = "SELECT * FROM fair_prices WHERE 1=1";

if ($category !== 'ALL') {
    $category = mysqli_real_escape_string($conn, $category);
    $sql .= " AND category = '$category'";
}

$result = mysqli_query($conn, $sql);
?>