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
        <a href="index.php"><img src="arbuz.png" alt="logo" id="logo"></a>
        <div id="search-bar">
        <form method="get" action="index.php">
            <input type="text" id="szukaj" name="szukaj" placeholder="Czego szukasz?">
            <input type="submit" id="search-button" name="search-button" value="Szukaj">  
        </form>
        </div>
        <div id="greetMsg">
            <?php
            if (isset($_SESSION['zalogowany'])){
                if ($_SESSION['zalogowany'] == true){
                    echo "<div id='akcje-konta'>";
                    echo "<div id='user'><img id='user-icon' src='user-icon.png'><p>Witaj ".$_SESSION['name']."!</p></div>";
                    echo "<div id='cart'><form action='cart.php' method='post'><button id='cart-button' type='submit'><img id='cartimg' src='koszyk.png'></button></form></div>";
                    echo "<div id='addProduct'><button id='addProduct-button' onclick='ShowOrHide(3)' type='submit'><img id='addProductimg' src='plus.png'></button></div>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    
        <div id="akcje">
            <input type="button" value="logowanie" name="login" id="login" onclick="ShowOrHide(0)">
            <input type="button" value="rejestracja" name="register" id="register" onclick="ShowOrHide(1)">
        </div>

        <div id="wyloguj">
            <form action="logOut.php">
            <input type="submit" value="wyloguj">
            </form>
        </div>
    </div>
    
    
            
    <?php
    if(isset($_POST['addcart'])){
        if(isset($_SESSION['zalogowany'])){
            if($_SESSION['zalogowany'] == true){
                $sql = "SELECT * FROM cart WHERE id_uzytkownika = '".$_SESSION['userID']."' AND id_produktu = '".$_POST['id-produktu']."'";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    $sql = "UPDATE cart SET ilosc = ilosc + 1 WHERE id_uzytkownika = '".$_SESSION['userID']."' AND id_produktu = '".$_POST['id-produktu']."'";
                }else
                {
                    $sql = "INSERT INTO cart (id_uzytkownika, id_produktu, ilosc) VALUES ('".$_SESSION['userID']."', '".$_POST['id-produktu']."', 1)";
                    $conn->query($sql);
                }
            }
        }
        else
        {
                $_SESSION['cartLoginError'] = '<div id="error">Musisz być zalogowany aby dodać produkt do koszyka</div>';
                $_SESSION['id'] = $_POST['id-produktu'];
        }
    }
    ?>

    <?php
        if(isset($_GET['search-button'])){
            if(isset($_GET['szukaj'])){
                $result = $conn->query('SELECT * FROM produkty WHERE prod_name LIKE "%'.$_GET['szukaj'].'%"');
            }
        }else
        {
            $result = $conn->query('SELECT * FROM produkty');
        }

        while ($rows = $result->fetch_assoc()){
            echo "<div id='produkt'>";
            echo "<div id='obraz-produktu'>";
            echo "<img src=".$rows['prod_thumbnail'].">";
            echo "</div>";
            echo "<div id='dane-produktu'>";
            echo "<h1>".$rows['prod_name']."</h1>";
            echo "<p>Cena:".$rows['price']."zł</p>";
            echo "<p>Sprzedwaca:".$rows['seller']."</p>";
            echo "</div>";
            echo "<form method='post' action='index.php'>";
            echo "<div id='akcje-produktu'><input type='hidden' name='id-produktu' value=".$rows['id']."><input type='submit' name='addcart' value='Dodaj do koszyka'></div>";
            if(isset($_SESSION['cartLoginError'])){
                if($_SESSION['id'] == $rows['id']){
                    echo $_SESSION['cartLoginError'];
                    unset($_SESSION['cartLoginError']);
                }
            }
            echo "</form>";
            echo "</div>";
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
<?php
