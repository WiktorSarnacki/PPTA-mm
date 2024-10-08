<?php
$name = $_POST['name'];
$surname = $_POST['surname'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeat-password'];
$email = $_POST['email'];
$adress = $_POST['adress'];
$number = $_POST['number'];
$error = 0;

$conn = mysqli_connect("localhost", "root", "", "projektallegro");
$sql = "INSERT INTO userdata (name, surname, email, adress, number, upassword) VALUES ('$name', '$surname', '$email', '$adress', '$number', '$password')";

$result = mysqli_query($conn, "SELECT * FROM userdata");

// while($row = mysqli_fetch_array($result)){
//     if($email != $row['email']){
//         if($number != $row['number']){
//             if($password != $repeatPassword){
//                 continue;
//             }else{
//                 echo 'ERROR, podane hasła nie są takie same.\nSpróbuj ponownie';
//                 $error++;
//                 break;
//             }
//         }else{
//             echo 'ERROR, numer telefonu jest już w bazie.\nSpróbuj ponownie';
//             $error++;
//             break;
//         }
//     }else{
//         echo 'ERROR, email jest zajęty.\nSpróbuj ponownie';
//         $error++;
//         break;
//     }
//}
if($error == 0){
    $query = mysqli_query($conn, $sql);
}

$conn -> close();
header("Location: index.html");
exit;


