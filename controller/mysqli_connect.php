<?php
if (!defined('DB_USER')) {
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'music_store');
}

try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($conn, 'utf8');
} catch(Exception $e) {
    print "The system is busy please try later";
} catch(Error $e) {
    print "The system is busy please try again later.";
}
?>
