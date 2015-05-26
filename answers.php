<?php session_start();
require 'sql_pdo.php';
if ( 
(!empty($_POST[1])) &&
(!empty($_POST[2])) &&
(!empty($_POST[3])) &&
(!empty($_POST[4])) &&
(!empty($_POST[5])) &&
(!empty($_POST[6])) &&
(!empty($_POST[7])) &&
(!empty($_POST[8])) &&
(!empty($_POST[9])) &&
(!empty($_POST[10]))) {
   $sql_fetch = "SELECT p1,p2,p3 FROM questions";
   $stmt_fetch = $dbh->prepare($sql_fetch);
   $stmt_fetch->execute();
   $result = $stmt_fetch->fetchAll();
   $i = 1;
   $q = array();
   foreach($result as $row){
       if ($_POST[$i] == 1) {
       ${"q".$i} = $row['p1'];    
       }
       if ($_POST[$i] == 2) {
       ${"q".$i} = $row['p2'];    
       }
       if ($_POST[$i] == 3) {
           ${"q".$i} = $row['p3'];    
       }
       $i++;
   }
} 

    $username = $_SESSION['username'];
$sql_check = "SELECT username FROM answers WHERE username = '$username';";
$stmt_check = $dbh->query($sql_check);
$row = $stmt_check->fetchObject();
$check = $row->username;
if ($check != $username) {   
    if (!empty($_SESSION['username'])) {
    $sum = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10;
    $sql = "INSERT INTO answers (sum,a1,a2,a3,a4,a5,a6,a7,a8,a9,a10,username) VALUES (:sum,:a1,:a2,:a3,:a4,:a5,:a6,:a7,:a8,:a9,:a10,:username)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':sum',$sum, PDO::PARAM_INT);
    $stmt->bindParam(':a1',$q1, PDO::PARAM_INT);
    $stmt->bindParam(':a2',$q2, PDO::PARAM_INT);
    $stmt->bindParam(':a3',$q3, PDO::PARAM_INT);
    $stmt->bindParam(':a4',$q4, PDO::PARAM_INT);
    $stmt->bindParam(':a5',$q5, PDO::PARAM_INT);
    $stmt->bindParam(':a6',$q6, PDO::PARAM_INT);
    $stmt->bindParam(':a7',$q7, PDO::PARAM_INT);
    $stmt->bindParam(':a8',$q8, PDO::PARAM_INT);
    $stmt->bindParam(':a9',$q9, PDO::PARAM_INT);
    $stmt->bindParam(':a10',$q10, PDO::PARAM_INT);
    $stmt->bindParam(':username',$username, PDO::PARAM_STR);
    $stmt->execute();
    $timestamp = new DateTime();
    $time = $timestamp->getTimestamp();
    $sql = "UPDATE testee SET time_end = :time where username = '$username';";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':time',$time, PDO::PARAM_INT);
    $stmt->execute();
    }
}
$_SESSION['test'] = "done";
echo "<script language='Javascript'>document.location.href='index.php' ;</script>";
