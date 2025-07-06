<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}




//<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main-wrapper">
    <h1>My To-Do List</h1>

    <!-- Task Form -->
    <form action="add_task.php" method="POST">
        <input type="text" name="title" placeholder="Task title" required>
        <textarea name="description" placeholder="Description"></textarea>
        <input type="date" name="due_date">
       
        <button type="submit">Add Task</button>
    </form>

    <!-- Task List -->
    <h2>Tasks</h2>
    <ul>
    <?php
        $result = $conn->query("SELECT * FROM tasks ORDER BY due_date ASC");
        while($row = $result->fetch_assoc()) {
            echo "<li>";
           echo "<strong>{$row['title']}</strong> - " . ($row['is_completed'] ? "✅ Done" : "❌ Pending");

            echo " [<a href='update_task.php?id={$row['id']}'>Toggle</a>] ";
            echo " [<a href='delete_task.php?id={$row['id']}'>Delete</a>]";
            echo "</li>";
        }
    ?>
    </ul>
</div>
</body>

</html>
