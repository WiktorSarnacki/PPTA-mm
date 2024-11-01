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

$conn = mysqli_connect("localhost", "root", "", "allegro");
$sql = "INSERT INTO userdata (name, surname, email, adress, number, upassword) VALUES ('$name', '$surname', '$email', '$adress', '$number', '$password')";

$accVerify = $conn->query("SELECT * FROM userdata WHERE email = '$email' OR number = '$number'");
if($accVerify->num_rows > 0){
    $_SESSION['registerErr'] = '<div id="error">Taki użytkownik już isnieje</div>';
    header("location: index.php");
}else if ($password != $repeatPassword){
    $_SESSION['registerErr2'] = '<div id="error">Hasła nie są takie same</div>';
    header("location: index.php");
}else $ok = true;

if($ok == true){
    $conn->query($sql);
    $accVerify = $conn->query("SELECT * FROM userdata WHERE email = '$email' AND upassword = '$password'" );
    $info = $accVerify->fetch_assoc();
    $_SESSION['zalogowany'] = true;
    $_SESSION['userID'] = $info['id'];
    $_SESSION['name'] = $info['name'];
    $accVerify->free_result();
    header("location: index.php");
}

