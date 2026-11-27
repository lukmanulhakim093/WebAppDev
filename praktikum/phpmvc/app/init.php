<?php 

// Memulai session aplikasi
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Melakukan autoload
require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/Database.php';


require_once 'config/config.php';
