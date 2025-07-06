<?php
include 'db.php';

$id = $_GET['id'];
$conn->query("UPDATE tasks SET is_completed = NOT is_completed WHERE id = $id");
header("Location: index.php");
