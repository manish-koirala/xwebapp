<?php
$ping_results = "";
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["target"])) {
    $pingResults = [];
    exec("ping -c 4 " . $_POST["target"], $pingResults);
    $ping_results = implode("\n", $pingResults);
}
?>