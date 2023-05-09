<?php
$username = $pswrd = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['username'])) {
        $error = "Username field can't be empty!";
        Header('Location: ../log-in.php?error='.$error);
        exit();
    } else {
        $username = data_handle($username);
    }

    if (empty($_POST['pass1'])) {
        $error = "Password field can't be empty!";
        Header('Location: ../log-in.php?error='.$error);
        exit();
    } else {
        $pswrd = data_handle($_POST['pass1']);
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
        $error = "User not found!";
        Header('Location: ../log-in.php?error='.$error);
        exit();
    }

    if (password_verify($pswrd, $pswrd_c)) {
        // Successful log in
        echo("Success!");
        exit();
    } else {
        $error = "Wrong password!";
        echo $pswrd_c;
        exit();
    }
}

function data_handle($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

