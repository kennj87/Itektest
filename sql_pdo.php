<?php
$hostname = 'HOST';
$username = 'USER';
$password = 'PASS';
try {
    $dbh = new PDO("mysql:host=$hostname;dbname=itek14a", $username, $password);
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>
