<?php
session_start();

$users = json_decode(file_get_contents('users.json'), true);

$institution = $_POST['institution'];
$username = $_POST['username'];
$password = $_POST['password'];

foreach ($users as $inst) {
    if ($inst['institution'] === $institution) {
        foreach ($inst['users'] as $user) {
            if ($user['username'] === $username && $user['password'] === $password) {
                $_SESSION['username'] = $username; // שמירת שם המשתמש ב-Session
                header("Location: commitments.html");
                exit;
            }
        }
    }
}

echo "שם משתמש או סיסמה שגויים.";
?>
