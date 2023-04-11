<?php 

include_once 'Classes/DatabaseManager.php';
include_once 'Classes/Redactors/PhraseRedactor.php';

$databaseManager = DatabaseManager::getInstance();

$redactor = PhraseRedactor::getInstance($databaseManager);

$phraseId = $_GET['phraseId'];

$redactor->deletePhrase($phraseId);

?>