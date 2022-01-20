<?php
    $link = new mysqli('localhost','name','password','table');
        if ($link -> connect_errno) {
            echo 'Nie udało się połączyć z MySQL: ' . $mysqli -> connect_error;
            exit();
        }
?>