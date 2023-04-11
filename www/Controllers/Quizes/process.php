<?php 

include_once 'Classes/DatabaseManager.php';
include_once 'Classes/QuizDisplayer.php';

$databaseManager = DatabaseManager::getInstance();

$displayer = QuizDisplayer::getInstance($databaseManager);

$questions = $_GET['questions'];

$result = $displayer->process($questions);

echo json_encode($result);
?>