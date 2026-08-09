<?php


// Database connection file lai include गर्ने
require_once __DIR__ . '/../config/db.php';

// १. Input Data Clean/Sanitize गर्ने Function (SQL Injection र XSS बाट बचाउन)
function sanitize_input($data) {
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return mysqli_real_escape_string($conn, $data);
}

// २. User Logged In छ कि छैन Check गर्ने Function
function is_loggedin() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return isset($_SESSION['user_id']);
}

// ३. Tourism Packages / Destinations तान्ने Function
function get_all_packages() {
    global $conn;
    $query = "SELECT * FROM packages ORDER BY id DESC";
    $result = mysqli_query($conn, $query);
    
    $packages = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $packages[] = $row;
        }
    }
    return $packages;
}

// ४. Specific Destination Detail तान्ने Function (ID अनुसार)
function get_package_by_id($id) {
    global $conn;
    $id = sanitize_input($id);
    $query = "SELECT * FROM packages WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

// ५. Page Redirect गर्ने Helper Function
function redirect($url) {
    header("Location: " . $url);
    exit();
}
?>

