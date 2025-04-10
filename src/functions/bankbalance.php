<?php
// Check bank balance.
define("CONN_DB", true);
include("../inc/database.php");
$db = $conn;

header("Content-Type: application/json");

$request_method = $_SERVER['REQUEST_METHOD'];

if ($request_method == "POST") {
    $input_data = file_get_contents("php://input");
    $data = json_decode($input_data, true);

    if (isset($data["username"]) && isset($data["password"])) {
        $username = $data["username"];
        $password = $data["password"];
        
        // Check the balance in the database.
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $db->query($query);
        if ($result->num_rows > 0) {
            $balanceData = $result->fetch_object();
            $balance = $balanceData->balance;
            $user = $balanceData->username;
            echo json_encode(["message" => "The balance for $user is \$$balance.", "success"=> true]);
        } else {
            echo json_encode(["message" => "Invalid user in the system.", "success"=> false]);
        }
    }
}