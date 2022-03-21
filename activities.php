<?php

    

    class listaZakupow{


        function dodaj($nazwa){
            include 'pages/config.php';
            $link->query("INSERT INTO zakupy VALUES(null,'$nazwa','N')");
            $link->Close();
        }

        function usun($id){
            include 'pages/config.php';
            $link->query('DELETE FROM zakupy WHERE id='.intval($id).' limit 1');
            $link->Close();
        }

        function zmienStan($id){
            include 'pages/config.php';
            $akt = mysqli_fetch_assoc($link->query('SELECT stan FROM zakupy WHERE id='.intval($id).' limit 1'));
            if($akt['stan']=='T'){
                $nw = 'N';
            } else{
                $nw = 'T';
            }
            $link->query("UPDATE zakupy SET stan='$nw' where id=".intval($id)." limit 1");
            $link->Close();
        }

    }
?>
