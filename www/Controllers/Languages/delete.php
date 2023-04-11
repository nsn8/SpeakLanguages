<?php 

include_once 'Classes/DatabaseManager.php';
include_once 'Classes/Redactors/LanguageRedactor.php';

$databaseManager = DatabaseManager::getInstance();

$redactor = LanguageRedactor::getInstance($databaseManager);

$languageId = $_GET['languageId'];

$redactor->deleteLanguage($languageId);//$databaseManager->updateData("DELETE FROM Languages WHERE id=" . $languageId);

?>