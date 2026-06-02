<?php
include_once __DIR__ . '/init.php';
if (isset($_POST['registerAccount'])) {
    $_SESSION['oldValues'] = $_POST;
    $email = $_POST['email'];
    $password = clean_input($_POST['password']);
    $checkDuplicateUser = selectQuery("users", "email", $email);
    if ($checkDuplicateUser && mysqli_num_rows($checkDuplicateUser) > 0) {
        // Agar pehle se is gender mein yeh category bani hui hai
        $_SESSION["errorMessage"] = "Email Already Exists Try With New Email";
        redirectToSignup();
    }
    $regex = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/";
    if (!preg_match($regex, $password)) {
        $_SESSION["errorMessage"] = "Invalid password format. Please review and follow all password instructions carefully.";
        redirectToSignup();
    }
    $username = $_POST['first_name'] . " " . $_POST['last_name'];
    $userData = [
        "full_name" => $username,
        "email" => $email,
        "password" => $_POST['password']
    ];
    $insertUserDetails = insertData("users", $userData);
    if ($insertUserDetails) {
        $_SESSION["successMessage"] = "You Are Registered Successfully Now Please Login";
        unset($_SESSION['oldValue']);
         header('Location:../Authentication/login.php');
        exit;
    } else {
        $_SESSION["errorMessage"] = "Something went wrong while inserting data!";
    }

    redirectToSignup();
}
