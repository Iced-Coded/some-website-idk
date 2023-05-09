<?php
$username = $pswrd = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['username'])) {
        $error = "Username field can't be empty!";
        Header('Location: ../log-in.php?error='.$error);
        exit();
    } else {
        $username = data_handle($_POST['username']);
    }

    if (empty($_POST['pass1'])) {
        $error = "Password field can't be empty!";
        Header('Location: ../log-in.php?error='.$error);
        exit();
    } else {
        $pswrd = md5(data_handle($_POST['pass1']));
    }

    require_once("cfg.php");

    $sql = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $sql->bind_param("s", $username);
    $sql->execute();

    $result = $sql->get_result();
    $row = $result->fetch_assoc();
    if ($row !== null) {
        $pswrd_c = $row['password'];
    } else {
        $error = $username/*"User not found!"*/;
        Header('Location: ../log-in.php?error='.$error);
        exit();
    }

    if ($pswrd_c === $pswrd) {
        // Successful log in
        echo("Success!");
    } else {
        /*$error = "Wrong Password!";
        Header('Location: ../log-in.php?error='.$error);
        exit();*/

        echo $pswrd_c."<br>";
        echo $pswrd;
    }
}

function data_handle($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

