<?php 

include_once 'Classes/DatabaseManager.php';
include_once 'Classes/Redactors/WordRedactor.php';

$databaseManager = DatabaseManager::getInstance();

$redactor = WordRedactor::getInstance($databaseManager);

$languageId = $_GET['languageId'];

$wordOriginal = $_GET['wordOriginal']; 

$wordTranslation = $_GET['wordTranslation']; 

$wordTranscription = $_GET['wordTranscription'] ?? ""; 

$redactor->addWord($languageId, $wordOriginal, $wordTranslation, $wordTranscription);

?>