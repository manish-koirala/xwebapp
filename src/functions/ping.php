<?php
if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["target"])) {
    $pingResults = [];
    exec("ping -c 4 " . $_GET["target"], $pingResults);
    foreach ($pingResults as $line) {
        echo "$line <br>";
    }
}
?>