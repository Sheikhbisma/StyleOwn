<?php
include_once __DIR__ . '/init.php';


if (isset($_POST['loginAccount'])) {
    $_SESSION['old_input'] = $_POST; 
    $email = clean_input($_POST['email']);
    $password = $_POST['password'];

    $sql = mysqli_query($conn, "select * from users where email = '$email'");

    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);

        if ($password == $row['password']) {
            
            $_SESSION['username'] = $row['full_name'] ?? 'User'; // Agar full_name khali ho to default 'User'
            $_SESSION['userid'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION["successMessage"] = "Login Successful!"; 
            
            unset($_SESSION['old_input']);
            header('Location:../../index.php');
            exit;
        } else {
            $_SESSION['errorMessage'] = "Invalid Password";
            redirectToLogin();
        }
    } else {
        $_SESSION['errorMessage'] = "Email Not Found";
        redirectToLogin();
    }
}
?>