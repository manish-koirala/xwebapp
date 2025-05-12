<?php
// Check bank balance.
define("CONN_DB", true);
include("../inc/database.php");
$db = $conn;

$request_method = $_SERVER['REQUEST_METHOD'];
$results = "";

if ($request_method == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        // Check the balance in the database.
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $db->query($query);
        if ($result->num_rows > 0) {
            $balanceData = $result->fetch_object();
            $balance = $balanceData->balance;
            $user = $balanceData->username;
            $results =  "The balance for $user is \$$balance.";
        }
    }
}