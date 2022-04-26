<?php
session_start();
include("inc/connect_db.php");


$name = $_POST['nom'];
$govForm = $_POST['govForm'];
$surface = $_POST['surface'];
$population = $_POST['pop'];
$lifeEx = $_POST['lifeEx'];
$gnp = $_POST['gnp'];
$gnpOld = $_POST['gnpOld'];
$headOfState = $_POST['headOfState'];
$commentaire = $_POST['commentaire'];

// Conversion de la surface en float
//$surface =
// Conversion de la population en int
//$population = 

$stmt = $pdo->prepare(
    "UPDATE `Country`
    SET `SurfaceArea` = :surface,
    `GovernmentForm` = :govform,
    `Population` = :pop,
    `LifeExpectancy` = :lifeEx,
    `GNP` = :gnp,
    `GNPOld` = :gnpOld,
    `HeadOfState` = :headOfState
    WHERE `Name` = :nom;"
);

$stmt->bindParam(":surface", $surface, PDO::PARAM_INT);
$stmt->bindParam(":govform", $govform, PDO::PARAM_STR);
$stmt->bindParam(":pop", $population, PDO::PARAM_INT);
$stmt->bindParam(":lifeEx", $lifeEx, PDO::PARAM_STR);
$stmt->bindParam(":gnp", $gnp, PDO::PARAM_INT);
$stmt->bindParam(":gnpOld", $gnpOld, PDO::PARAM_STR);
$stmt->bindParam(":headOfState", $headOfState, PDO::PARAM_STR);
$stmt->bindParam(":nom", $name, PDO::PARAM_STR);
    
$stmt->execute();

header("location: pays.php?name=".$name."");
?>