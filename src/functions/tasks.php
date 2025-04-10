<?php

// Require database connection.
define("CONN_DB", true);
include("../inc/database.php");
$db = $conn;

// If GET request, Look for database records and set the $tasks var.
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $tasks_query = "SELECT id, detail FROM tasks ORDER BY id";
  $result = $db->query($tasks_query);
  $tasks = [];
  if ($result->num_rows > 0) {
    while ($task = $result->fetch_object()) {
      $tasks[] = array($task->id, $task->detail);
    }
  }
}


// If POST request, generate a new task and add it to the database.
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["task"])) {
  $task = $_POST["task"];
  $insertTaskQuery = "INSERT INTO tasks (detail) VALUES ('$task')";
  $db->query($insertTaskQuery);
  header("Location: ../pages/xss.php");
}
