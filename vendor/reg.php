<?php
$fname = $uname = $email = $pswrd = $pswrd_c = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['full_name'])) {
        $error = "Full Name field can't be empty!";
        Header('Location: ../sign-up.php?error='.$error);
        exit();
    } else {
        $fname = data_handle($_POST['full_name']);
        if (!preg_match("/^([a-zA-Z]+\s{1}[a-zA-Z]+)+$/", $fname)) {
            $error = "Only letters and white spaces are allowed in Full Name.";
            Header('Location: ../sign-up.php?error='.$error);
            exit();
        }
    }

    if (empty($_POST['username'])) {
        $error = "Username field can't be empty!";
        Header('Location: ../sign-up.php?error='.$error);
        exit();
    } else {
        $uname = data_handle($_POST['username']);
        if (!preg_match("/^[a-zA-Z0-9_-]{3,16}$/", $uname)) {
            $error = "Username contains illegal characters!";
            Header('Location: ../sign-up.php?error='.$error);
            exit();
        }
    }

    if (empty($_POST['email'])) {
        $error = "Email field can't be empty!";
        Header('Location: ../sign-up.php?error='.$error);
        exit();
    } else {
        $email = data_handle($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Email contains illegal characters.";
            Header('Location: ../sign-up.php?error='.$error);
            exit();
        }
    }

    if (empty($_POST['pass1'])) {
        $error = "Password field can't be empty!";
        Header('Location: ../sign-up.php?error='.$error);
        exit();
    } else {
        $pswrd = data_handle($_POST['pass1']);
        if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $_POST['pass1'])) {
            $error = "Your password must have 1 uppercase, 1 lowercase and 1 number.";
            Header('Location: ../sign-up.php?error='.$error);
            exit();
        }
    }

    if (empty($_POST['pass2'])) {
        $error = "Confirm Password field can't be empty!";
        Header('Location: ../sign-up.php?error='.$error);
        exit();
    } else {
        $pswrd_c = data_handle($_POST['pass2']);
        if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $_POST['pass2'])) {
            $error = "Your password must have 1 uppercase, 1 lowercase and 1 number.";
            Header('Location: ../sign-up.php?error='.$error);
            exit();
        }
    }

    if ($pswrd != $pswrd_c) {
        $error = "Passwords don't match!";
        Header('Location: ../sign-up.php?error='.$error);
        exit();
    } else {
        $pswrd = md5($pswrd);
        $pswrd_c = md5($pswrd_c);
    }

    require('cfg.php');

    $sql = "INSERT INTO users (id, full_name, username, email, password)
            VALUES ('', '$fname', '$uname', '$email', '$pswrd')";

    $sql2 = $conn->prepare("SELECT username, email FROM users WHERE username = ?");
    $sql2->bind_param("s", $username);
    $sql2->execute();

    $result = $sql2->get_result();
    $row = $result->fetch_assoc();

    if ($row == null) {
        echo "This email/username is already registered!";
    } else {
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}

function data_handle($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}