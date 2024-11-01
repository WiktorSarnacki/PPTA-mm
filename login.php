<?php
session_start();

if (isset($_SESSION['zalogowany'])){
    if ($_SESSION['zalogowany'] == true){
        $_SESSION['alrLogged'] = '<span>Jesteś już zalogowany</span>';
        header("location: index.php");
    }
}
$conn = mysqli_connect("localhost", "root", "", "allegro");

$ok = false;

@$email = $_POST['email'];
@$password = $_POST['password'];

$accVerify = $conn->query("SELECT * FROM userdata WHERE email = '$email' AND upassword = '$password'" );


if ($accVerify->num_rows<=0){
    $_SESSION['loginErr'] = '<div id="error">Nie poprawny email lub hasło</div>';
    header("location: index.php");
}elseif($accVerify->num_rows>1){
    $_SESSION['loginErr2'] = '<div id="error">Wystąpił problem podczas logowania</div>';
    header("location: index.php");
}else{
    $ok = true;
}


if ($ok){
    $info = $accVerify->fetch_assoc();
    $_SESSION['zalogowany'] = true;
    $_SESSION['userID'] = $info['id'];
    $_SESSION['name'] = $info['name'];
    $accVerify->free_result();
    header("location: index.php");
}