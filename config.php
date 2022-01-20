<?php
    $link = new mysqli('mysql.cba.pl','d4vez','30.Dz/977','d4vez');
        if ($link -> connect_errno) {
            echo 'Nie udało się połączyć z MySQL: ' . $mysqli -> connect_error;
            exit();
        }
?>