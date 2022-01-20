<?php

    

    class listaZakupow{


        function dodaj($nazwa){
            include 'pages/config.php'; // <- wprowadziłem w błąd, do funkcji musisz includować cały kod
            $link->query("INSERT INTO zakupy VALUES(null,'$nazwa','N')"); //<- niewłaściwy escape string, clutchuj przed lepiej, nie wrzucał danych, najpierw stosuj "" zamiast ''
            $link->Close(); // <- zawsze zamykaj połączenie
            //<- location nie potrzebne, kod wywołujesz na konkretnej stronie, sama się odświeży po wykonaniu polecenia
        }

        function usun($id){
            include 'pages/config.php';
            $link->query('DELETE FROM zakupy WHERE id='.intval($id).' limit 1');
            $link->Close();// <- zawsze zamykaj połączenie
        }

        function zmienStan($id){
            include 'pages/config.php';
            $akt = mysqli_fetch_assoc($link->query('SELECT stan FROM zakupy WHERE id='.intval($id).' limit 1'));
            if($akt['stan']=='T'){
                $nw = 'N';
            } else{
                $nw = 'T';
            }
            $link->query("UPDATE zakupy SET stan='$nw' where id=".intval($id)." limit 1"); //<- tu miałeś mysqli_query bez kompletu
            $link->Close();// <- zawsze zamykaj połączenie
        }

    }
?>