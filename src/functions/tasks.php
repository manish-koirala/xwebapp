<?php

// Require the database connection
define("CONN_DB", true);
include("../inc/database.php");
$db = $conn;

// If post request is recieved.
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["task"])) {
// Store the task in the tasks table.
  $task = $_POST["task"];
  $insertTaskQuery = "INSERT INTO tasks (detail) VALUES '$task'";
  $db->query($insertTaskQuery);

}
// Set the value of tasks session variable as obtained from the tasks table.
$tasks_query = "SELECT * FROM tasks";
$result = $db->query($tasks_query);
if ($result->num_rows > 0) {
  // Set the session variable.

} 

?>
