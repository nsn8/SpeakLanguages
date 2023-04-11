<?php 

include_once 'Classes/DatabaseManager.php';
include_once 'Classes/Redactors/PhraseRedactor.php';

$databaseManager = DatabaseManager::getInstance();

$redactor = PhraseRedactor::getInstance($databaseManager);

$languageId = $_GET['languageId'];

$phrase = $_GET['phrase']; 

$phraseDescription = $_GET['phraseDescription']; 

$redactor->addPhrase($languageId, $phrase, $phraseDescription, $wordTranscription);

?>