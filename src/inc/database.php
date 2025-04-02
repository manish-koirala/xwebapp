<?php
// Connect to the database.
if (defined("CONN_DB")) {
    // Define constants to connect to the database.
    define("HOST_ADDR", "db");
    define("DB_DBNAME", "xwebapp");
    define("DB_USERNAME", "xwebapp");
    define("DB_PASS", "@Y01z)2mmPU");

    // Connect to the database.
    $conn = mysqli_connect(HOST_ADDR, DB_USERNAME, DB_PASS, DB_DBNAME);

    if ($conn->errno) {
        die("Internal Error, connecting to the database.");
    }
}