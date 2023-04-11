<?php 

include_once 'Classes/DatabaseManager.php';
include_once 'Classes/Redactors/LanguageRedactor.php';

$databaseManager = DatabaseManager::getInstance();

$redactor = LanguageRedactor::getInstance($databaseManager);

$languages = $redactor->getLanguages();

echo json_encode($languages);

?>