<?php 

include_once 'Classes/DatabaseManager.php';
include_once 'Classes/Redactors/LanguageRedactor.php';

$databaseManager = DatabaseManager::getInstance();

$redactor = LanguageRedactor::getInstance($databaseManager);

$languageName = $_GET['languageName'];

$redactor->addLanguage($languageName);//$databaseManager->updateData("INSERT INTO Languages (name) VALUES ('" . $languageName . "')");

?>