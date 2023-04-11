<?php 

include_once 'Classes/DatabaseManager.php';
include_once 'Classes/QuizDisplayer.php';

$databaseManager = DatabaseManager::getInstance();

$displayer = QuizDisplayer::getInstance($databaseManager);

$languageId = $_GET['languageId'];

$useWords = $_GET['useWords'] == "true";

$usePhrases = $_GET['usePhrases'] == "true";

$questions = $displayer->compose($useWords, $usePhrases, $languageId);

echo json_encode($questions);
?>