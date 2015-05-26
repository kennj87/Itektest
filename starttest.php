<?php session_start(); require 'sql_pdo.php';
if (!empty($_POST['username'])) {
$username = $_POST['username'];
$sql_check = "SELECT username FROM testee WHERE username = '$username';";
$stmt_check = $dbh->query($sql_check);
$row = $stmt_check->fetchObject();
$check = $row->username;
    if ($check != $username) {   
    $_SESSION['test'] = "on";
    $_SESSION['username'] = $username;
    $timestamp = new DateTime();
    $time = $timestamp->getTimestamp();
    $sql = "INSERT INTO testee(username,time_start) VALUES(:uname,:time);";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':uname', $username, PDO::PARAM_STR);
    $stmt->bindParam(':time',$time, PDO::PARAM_INT);
    $stmt->execute();
    } else { echo "username already used"; }
}
echo "<script language='Javascript'>document.location.href='index.php' ;</script>";
