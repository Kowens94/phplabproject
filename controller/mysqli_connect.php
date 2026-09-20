<?php
    Define('DB_USER', 'guest');
    Define('DB_PASSWORD', 'password');
    Define('DB_HOST', 'localhost');
    Define('DB_NAME', 'music_store');

    try {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        mysqli_set_charset($conn, 'utf8');
    } catch(Exception $e) {
        print "The system is busy please try later";
    } catch(Error $e) {
        print "The system is busy please try again later.";
    }
?>