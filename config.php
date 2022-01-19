<?php
    $link = new mysqli('mysql.cba.pl','d4vez','30.Dz/977','d4vez');
        if ($link -> connect_errno) {
            echo 'Nie udało się połączyć z MySQL: ' . $mysqli -> connect_error;
            exit();
        }
    
    class listaZakupow{

        function dodaj($nazwa){
            $link->query('INSERT INTO zakupy VALUES(null,\''.mysqli_real_escape_string($nazwa,$link).'\',\'N\');');
            header("location: index.php");
        }

        function usun($id){
            $link->query('DELETE FROM zakupy WHERE id='.intval($id).' limit 1');
            header("location: index.php");
        }

        function zmienStan($id){
            $akt = mysqli_fetch_assoc($link->query('SELECT stan FROM zakupy WHERE id='.intval($id).' limit 1'));
            if($akt['stan']=='T'){
                $nw = 'N';
            } else{
                $nw = 'T';
            }
            mysqli_query('UPDATE zakupy SET stan=\''.$nw.'\' where id='.intval($id).' limit 1');
            header("location: index.php");
        }

    }
?>