<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "allegro");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="jquery-3.7.1.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
        
    <div id="baner">
        <div id="search-bar">
            <img src="arbuz.png" alt="logo" id="logo">
            <input type="text" id="szukaj" name="szukaj" placeholder="Czego szukasz?">
            <input type="button" id="search-button" value="Szukaj">
        </div>

        <div id="greetMsg">
            <?php
            if (isset($_SESSION['zalogowany'])){
                if ($_SESSION['zalogowany'] == true){
                    echo "<span>Witaj ".$_SESSION['name']."!</span>";
                }
            }
            ?>
        </div>
    
        <div id="akcje">
            <input type="button" value="logowanie" name="login" id="login" onclick="ShowOrHide(0)">
            <input type="button" value="rejestracja" name="register" id="register" onclick="ShowOrHide(1)">
        </div>
    </div>
    <div id="register-div">
            <form action="register.php" method="post">
                <label>Imie:</label><input type="text" name="name" placeholder="Jan" required><br>
                <label>Nazwisko:</label><input type="text" placeholder="Nowak" name="surname" required><br>
                <label>Email:</label><input type="email" placeholder="superEmail@gmail.com" name="email" required><br>
                <label>Numer telefonu (bez spacji):</label><input type="text" pattern="[0-9]{9}" placeholder="123456789" name="number" required><br>
                <label>Kod pocztowy:</label><input type="text" pattern="[0-9]{2}-[0-9]{3}" placeholder="XX-XXX" name="adress" required><br>
                <label>Hasło:</label><input type="password" placeholder="fajneHaslo123" name="password" required><br>
                <label>Powtórz hasło:</label><input type="password" placeholder="fajneHaslo123" name="repeat-password" required><br>
                <div id="buttons">
                    <button type="submit" class="cool-button1">Zarejestruj się</button>
                    <button type="reset" class="cool-button2" onclick="ShowOrHide(2)">Powrót</button>
                </div>
            </form>
    </div>
    <div id="login-div">
            <form action="login.php" method="post">
                <label>Email:</label><input type="email" placeholder="superEmail@gmail.com" name="email" required><br>
                <label>Hasło:</label><input type="password" placeholder="fajneHaslo123" name="password" required><br>
                <button type="submit" class="cool-button1">Zaloguj się</button>
                <?php
                if (isset($_SESSION['alrLogged'])){
                    echo $_SESSION['alrLogged'];
                    unset($_SESSION['alrLogged']);
                }else{
                    if (isset($_SESSION['loginErr'])){
                        echo $_SESSION['loginErr'];
                        unset($_SESSION['loginErr']);
                    }elseif (isset($_SESSION['loginErr2'])){
                        echo $_SESSION['loginErr2'];
                        unset($_SESSION['loginErr2']);
                    }
                }
                ?>
                <button type="button" class="cool-button2" onclick="ShowOrHide(2)">Powrót</button>
            </form>
    </div>

    <?php
    $result = $conn->query('SELECT * FROM produkty');
    while ($rows = $result->fetch_assoc()){
        echo "<div id='prodDiv'>";
        echo "<img src=".$rows['prod_thumbnail']."></br>";
        echo $rows['prod_name'], $rows['price']."zł </br>";
        echo "<h6>".$rows['seller']."</h6>";
        echo "</div>";
    }

    ?>

    <div id="footer">
        <h2>Autorzy</h2>
        <h4>Wojtek Żukiewicz, Sarnacki Wiktor, Maciek Małkowski, Adrian Ochman, Jan Uściłko</h4>
    </div>

    <script src="main.js"></script>
</body>
</html>