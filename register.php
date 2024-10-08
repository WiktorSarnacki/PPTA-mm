<?php
$name = $_POST['name'];
$surname = $_POST['surname'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeat-password'];
$email = $_POST['email'];
$adress = $_POST['adress'];
$number = $_POST['number'];


$conn = mysqli_connect("localhost", "root", "", "allegro");
$sql = "SELECT * FROM user;"

$result = mysqli_query($conn, $sql)

while($row = mysqli_fetch_array($result)){
    if ($email == $row['email']){
        die "ERROR, email jest zajęty.\nSpróbuj ponownie";
        break;
    }
    if ($number == $row['number']){
        die "ERROR, numer telefonu jest już w bazie.\nSpróbuj ponownie";
        break;
    }
}

if ($name == ""){
    die "ERROR, wypełnij cały formularz.";
}else if ($surname == ""){
    die "ERROR, wypełnij cały formularz.";
}else if ($email == ""){
    die "ERROR, wypełnij cały formularz.";
}else if ($password == ""){
    die "ERROR, wypełnij cały formularz.";
}else if ($repeatPassword == ""){
    die "ERROR, wypełnij cały formularz.";
}else if ($repeatPassword != $password){
    die "ERROR, powtórzone hasło się nie zgadza!";
}

