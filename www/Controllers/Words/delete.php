<?php 

include_once 'Classes/DatabaseManager.php';
include_once 'Classes/Redactors/WordRedactor.php';

$databaseManager = DatabaseManager::getInstance();

$redactor = WordRedactor::getInstance($databaseManager);

$wordId = $_GET['wordId'];

$redactor->deleteWord($wordId);

?>