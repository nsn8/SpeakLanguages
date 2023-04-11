<?php 

include_once 'Classes/DatabaseManager.php';
include_once 'Classes/Redactors/WordRedactor.php';

$databaseManager = DatabaseManager::getInstance();

$redactor = WordRedactor::getInstance($databaseManager);

$languageId = $_GET['languageId'];

$words = $redactor->getWords($languageId);

echo json_encode($words);

?>