<?php

session_start();
require_once "Veritabani.php";
Veritabani::baglan("localhost", "movie", "root", "root");

$controller = isset($_GET['controller']) ? $_GET['controller'] : "anasayfa";
$action = isset($_GET['action']) ? $_GET['action'] : "index";