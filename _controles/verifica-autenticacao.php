<?php
session_start();
$url = isset($_GET['url']) ? $_GET['url'] : null;

if (!isset($_SESSION['id'])) {
    if($url != null) {
        exit;
        header("location: ../index.php");
    }
    exit;
    header("location: ../index.php");
}
?>