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

<?php
    if (isset($_SESSION['zalogowany'])){
        if ($_SESSION['zalogowany'] == true){
            echo "<body onLoad='loggedHide(1)'>";
        }
    }else{
        echo '<body>';
    }
?>
<script>0</script>
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
                    <button type="reset" class="cool-button2" onclick="ShowOrHide(2)">Powrót</button><br>
                    <?php
                    if (isset($_SESSION['alrLogged'])){
                        echo $_SESSION['alrLogged'];
                        unset($_SESSION['alrLogged']);
                    }else{
                        if (isset($_SESSION['registerErr'])){
                            echo "<input type='hidden' id='registerErr2Flag'";
                            echo "<p>".$_SESSION['registerErr']."</p>";
                            unset($_SESSION['registerErr']);
                        }elseif (isset($_SESSION['registerErr2'])){
                            echo "<input type='hidden' id='registerErr2Flag'";
                            echo "<p>".$_SESSION['registerErr2']."</p>";
                            unset($_SESSION['registerErr2']);
                        }
                    }
                ?>
                </div>
            </form>
    </div>
    <div id="login-div">
    <form action="login.php" method="post">
                <label>Email:</label><input type="email" placeholder="superEmail@gmail.com" name="email" required><br>
                <label>Hasło:</label><input type="password" placeholder="fajneHaslo123" name="password" required><br>
                <button type="submit" class="cool-button1">Zaloguj się</button>
                <button type="button" class="cool-button2" onclick="ShowOrHide(2)">Powrót</button><br>
                <?php
                if (isset($_SESSION['alrLogged'])){
                    echo $_SESSION['alrLogged'];
                    unset($_SESSION['alrLogged']);
                }else{
                    if (isset($_SESSION['loginErr'])){
                        echo "<p>".$_SESSION['loginErr']."</p>";
                        echo "<input type='hidden' id='loginErrFlag'";
                        unset($_SESSION['loginErr']);
                    }elseif (isset($_SESSION['loginErr2'])){
                        echo "<p>".$_SESSION['loginErr2']."</p>";
                        echo "<input type='hidden' id='loginErr2Flag'";
                        unset($_SESSION['loginErr2']);
                    }
                }
                ?>
            </form>
    </div>

<?php
if(isset($_SESSION['zalogowany'])){
    if($_SESSION['zalogowany'] == true){
        echo "<div id='addProduct-div'>
        <form action='addProduct.php' method='post' enctype='multipart/form-data'>
        <label>Nazwa produktu:</label><input type='text' name='prod_name' required><br>
        <label>Cena:</label><input type='number' name='price' required><br>
        <label>Opis:</label><input type='text' name='description' required><br>
        <label>Zdjęcie:</label><input type='file' id='drop-area' name='prod_thumbnail' required><br>
        <input type='hidden' value=".$_SESSION['userID']." name='seller'><br>
        <button type='submit' class='cool-button1'>Dodaj produkt</button>
        <button type='button' class='cool-button2' onclick='ShowOrHide(2)'>Powrót</button><br>
    </form>            
</div>";
    }
}
?>

<div id="space"></div>
    <div id="baner">
        <div id="search-bar">
            <a href="index.php"><img src="arbuz.png" alt="logo" id="logo"></a>
            <input type="text" id="szukaj" name="szukaj" placeholder="Czego szukasz?">
            <input type="button" id="search-button" value="Szukaj">
        </div>

        <div id="greetMsg">
            <?php
            if (isset($_SESSION['zalogowany'])){
                if ($_SESSION['zalogowany'] == true){
                    echo "<div id='akcje-konta'>";
                    echo "<div id='user'><img id='user-icon' src='user-icon.png'><p id='greet'>Witaj ".$_SESSION['name']."!</p></div>";
                    echo "<div id='cart'><form action='cart.php' method='post'><button id='cart-button' type='submit'><img id='cartimg' src='shopping-cart_12317487.png'></button></form>";
                    echo "<div id='wyloguj'>";
                    echo "<form action='logOut.php'>";
                    echo "<input id='logout' type='submit' value='wyloguj'>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div id='addProduct'><button id='addProduct-button' onclick='ShowOrHide(3)' type='submit'><img id='addProductimg' src='plus-small_4338829.png'></button></div>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    
        <div id="akcje">
            <input type="button" value="logowanie" name="login" id="login" onclick="ShowOrHide(0)">
            <input type="button" value="rejestracja" name="register" id="register" onclick="ShowOrHide(1)">
        </div>
    </div>
    


    <?php
    
    if(isset($_SESSION['zalogowany'])){
        if($_SESSION['zalogowany'] == true){
            
            if(isset($_POST['changeCart'])){
                $sql = "UPDATE cart SET ilosc = ".$_POST['change']." WHERE id_produktu = ".$_POST['id-produktu']." AND id_uzytkownika = ".$_SESSION['userID'].";";
                $conn->query($sql);
            }
            if(isset($_POST['removecart'])){
                $sql = "DELETE FROM cart WHERE id_produktu = ".$_POST['id-produktu']." AND id_uzytkownika = ".$_SESSION['userID'].";";
                $conn->query($sql);
            }
            if(isset($_POST['buy'])){

                $sql = "SELECT produkty.price , cart.ilosc FROM produkty, cart, userdata WHERE userdata.id = cart.id_uzytkownika and cart.id_produktu = ".$_POST['id-produktu'].";";
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result);
                $cena = $row['price'] * $row['ilosc'];
                echo "<div id='platnosc'>";
                echo "Łączna cena: ".$cena."zł";
                echo "<form action='cart.php' method='post'>";
                echo "<label>Podaj adres:</label><input type='text' name='adress' required><br>";
                echo "<label>Podaj numer karty kredytowej:</label><input type='text' name='card' pattern='[0-9]{16}' placeholder='1234567812345678' required><br>";
                echo "<label>Podaj datę ważności karty:</label><input type='text' name='date' pattern='(0[1-9]|1[0-2])\/[0-9]{2}' placeholder='MM/YY' required><br>";
                echo "<label>Podaj kod CVV:</label><input type='text' name='cvv' pattern='[0-9]{3}' placeholder='123' required><br>";
                echo "<input type='hidden' name='id-produktu' value='".$_POST['id-produktu']."'>";
                echo "<button class='cool-button11' type='submit' name='finalize'>Kup</button>";
                echo "</form>";
                echo "<form id='anuuj' action='cart.php' method='post'>";
                echo "<button action='cart.php' class='cool-button22' type='submit' name='cancel'>Anuluj</button>";
                echo "</form>";
                echo "</div>";
            }
            if(isset($_POST['finalize'])){
                $sql = "DELETE FROM cart WHERE id_uzytkownika = ".$_SESSION['userID']." and id_produktu = ".$_POST['id-produktu'].";";
                $conn->query($sql);
                echo "<h1>Zakup zakończony pomyślnie</h1>";
            }

            $sql = "SELECT produkty.id ,produkty.prod_name, produkty.price, produkty.seller, produkty.prod_thumbnail, cart.ilosc FROM produkty, cart WHERE cart.id_uzytkownika = ".$_SESSION['userID']." and cart.id_produktu = produkty.id;";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $ilosc = $row['ilosc'];
                    echo "<div id='produkt'>";
                    echo "<div id='obraz-produktu'>";
                    echo "<img src=".$row['prod_thumbnail'].">";
                    echo "</div>";
                    echo "<div id='dane-produktu'>";
                    echo "<h1>".$row['prod_name']."</h1>";
                    echo "<p>Cena: ".$row['price']."zł</p>";
                    echo "<p>Sprzedwaca: ".$row['seller']."</p>";
                    echo "</div>";
                    echo "<div id='cartedit'>";
                    echo "<div id='ilosc'>";
                    echo "Ilosć:".$row['ilosc'];
                    echo "</div>";
                    echo "<div id='zmien'>";
                    echo "<form method='post' action='cart.php'>";
                    echo "<input type='hidden' name='id-produktu' value='".$row['id']."'>";
                    echo "Zmień ilość: <input id='zmien' type='range' value=".$ilosc." min=1 max=99 name='change' oninput='this.nextElementSibling.value = this.value'><output>".$ilosc."</output>";
                    echo "<button id='zapis' type='submit' name='changeCart'>Zapisz</button>";
                    echo "</form>";
                    echo "</div></br>";
                    echo "<div id='usun'>";
                    echo "<form action='cart.php' method='post'>";
                    echo "<input type='hidden' name='id-produktu' value='".$row['id']."'>";
                    echo "<button id='button-wkoszu1' type='submit' name='removecart'>Usuń z koszyka</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "<form action='cart.php' method='post'>";
                    echo "<input type='hidden' name='id-produktu' value='".$row['id']."'>";
                    echo "<button id='button-wkoszu2' type='submit' name='buy'>Kup</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
            }
        }else
        {
            echo "<h1>Twój koszyk jest pusty</h1>";
        }
    }
    }


    
    ?>
    

    </div>
    <div id="footer">
        <h2>Autorzy</h2>
        <h4>Wojtek Żukiewicz, Sarnacki Wiktor, Maciek Małkowski, Adrian Ochman, Jan Uściłko</h4>
    </div>
    <script src="main.js"></script>
    <script>
                    if(document.getElementById('loginErrFlag') != null){
                        ShowOrHide(0);
                    }
                    if(document.getElementById('loginErr2Flag') != null){
                        ShowOrHide(0);
                    }
                    if(document.getElementById('registerErrFlag') != null){
                        ShowOrHide(1);
                    }
                    if(document.getElementById('registerErr2Flag') != null){
                        ShowOrHide(1);
                    }
                </script>
</body>
</html>
