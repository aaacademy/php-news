<?php
function getCon() {
    $host = "localhost";
    $port = 3306;
    $db = "news_app";
    $user = "root";
    $password = "";
    return new PDO("mysql:host=$host:$port;dbname=$db", $user, $password);
}