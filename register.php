<?php
session_start();
@$name = $_POST['name'];
@$surname = $_POST['surname'];
@$password = $_POST['password'];
@$repeatPassword = $_POST['repeat-password'];
@$email = $_POST['email'];
@$adress = $_POST['adress'];
@$number = $_POST['number'];
@$error = 0;
@$ok = false;

$conn = mysqli_connect("localhost", "root", "", "projektallegro");
$sql = "INSERT INTO userdata (name, surname, email, adress, number, upassword) VALUES ('$name', '$surname', '$email', '$adress', '$number', '$password')";

$accVerify = $conn->query("SELECT * FROM userdata WHERE email = '$email' OR number = '$number'");
if($accVerify->num_rows > 0){
    echo '<div style="text-align: center;font-size: 30px">Taki użytkownik już istnieje<br>Spróbuj inny numer telefonu lub adres email';
    echo "<br><a href='index.html'>Powrót na stronę</a></div>";
}else if ($password != $repeatPassword){
    echo '<div style="text-align: center;font-size: 30px">Podane hasła nie są takie same<br>Spróbuj ponownie';
    echo "<br><a href='index.html'>Powrót na stronę</a></div>";
}else $ok = true;

if($ok == true){
    $conn->query($sql);
    echo '<div style="text-align: center;font-size: 30px">Pomyślnie zarejestrowano użytkownika o nazwie '.$name. " ".$surname;
    echo "<br><a href='index.html'>Powrót na stronę</a></div>";
}

