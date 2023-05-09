<?php
    $email = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['email'])) {
            Header('Location: ../index.html');
            exit();
        } else {
            $email = data_handle($_POST['email']);
        }

        require_once('cfg.php');

        $sql = "INSERT INTO subscriptions (id, email) VALUES ('', $email)";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../index.html");
            exit();
        } else {
            echo "Error: ".$sql."<br>".$conn->error;
        }
    }

function data_handle($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}