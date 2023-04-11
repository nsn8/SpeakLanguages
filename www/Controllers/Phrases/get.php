<?php 

include_once 'Classes/DatabaseManager.php';
include_once 'Classes/Redactors/PhraseRedactor.php';

$databaseManager = DatabaseManager::getInstance();

$redactor = PhraseRedactor::getInstance($databaseManager);

$languageId = $_GET['languageId'];

$words = $redactor->getPhrases($languageId);

echo json_encode($words);

?>