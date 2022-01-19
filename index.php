<!doctype html>
<head>
    <meta charset="utf-8" />
    <title>Lista Zakupów</title>
</head>
<body>
    <?php
        require_once 'pages/config.php';

        $lz = new listaZakupow;

        if(isset($_GET['akcja'])){
            switch($_GET['akcja']){
                case 'dodaj':
                    $lz->dodaj($_POST['towar']);
                    break;
                case 'usun':
                    $lz->usun($_GET['id']);
                    break;
                case 'zmien':
                    $lz->zmienStan($_GET['id']);
                    break;
            }
        }

        $sql = 'SELECT * FROM zakupy';
        $result = mysqli_query($link,$sql);

        if(mysqli_num_rows($result) == 0){
            echo 'Nie masz jeszcze dodanego żadnego przedmiotu do kupienia';
        } else{
            echo 'Twoja lista zakupów:';
            while($row = mysqli_fetch_assoc($result)){

                $towarid = $row['id'];
                $towar = $row['towar'];
                $stan = $row['stan'];

                echo '<ul>';
                    if($stan=='T'){
                        $kupione = 'x';
                    } else{
                        $kupione = ' ';
                    }
                    echo '<li>'.$towar.' <a href="index.php?akcja=zmien&id='.$towarid.'">['.$kupione.']</a>
                    <a href="index.php?akcja=usun&id='.$towarid.'">usuń</a></li>';
                echo '</ul>';
            }
        }
    ?>
    <form action="index.php?akcja=dodaj" method="post">
        Towar: <input type="text" name="towar" />
        <input type="submit" value="Dodaj" />
</body>
</html>