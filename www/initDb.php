<?php

include_once 'Helpers/DatabaseInitializer.php';
include_once 'Classes/DatabaseManager.php';

$databaseManager = DatabaseManager::getInstance();

$databaseInitializer = DatabaseInitializer::getInstance($databaseManager);

print_r('Создание таблиц' . PHP_EOL);

$databaseInitializer->initializeDatabase();
 
print_r('Создание таблиц окончено' . PHP_EOL);

var_dump($databaseManager->getData('SELECT * FROM Languages'));
?>