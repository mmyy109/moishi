<?php
session_start();

// בדיקה אם המשתמש מחובר
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

// קבלת הנתונים מהטופס
$institution = $_POST['institution'];
$amount = $_POST['amount'];

// קריאת הנתונים הקיימים מהקובץ commitments.json
$commitmentsFile = 'commitments.json';
if (file_exists($commitmentsFile)) {
    $commitmentsData = json_decode(file_get_contents($commitmentsFile), true);
} else {
    $commitmentsData = [];
}

// הוספת ההתחייבות החדשה
$newCommitment = [
    'institution' => $institution,
    'amount' => $amount
];
$commitmentsData[] = $newCommitment;

// שמירת הנתונים בקובץ
file_put_contents($commitmentsFile, json_encode($commitmentsData));

// הפניה חזרה לדף התחייבויות
header("Location: commitments.html");
exit();
?>
