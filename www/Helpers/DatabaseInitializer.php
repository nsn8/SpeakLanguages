<?php

include_once 'Classes/DatabaseManager.php';

class DatabaseInitializer
{
    private DatabaseManager $databaseManager;

    private static DatabaseInitializer $instance;

    private function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public static function getInstance(DatabaseManager $databaseManager): DatabaseInitializer
    {
        if (!isset(self::$instance)) {
            self::$instance = new static($databaseManager);
        }

        return self::$instance;
    }

    /**
     * Создает таблицы и наполняет их данными
     */
    public function initializeDatabase()
    {
		$sql = '
            CREATE TABLE IF NOT EXISTS Users(
                id int PRIMARY KEY AUTO_INCREMENT,
				first_name varchar(255),
				last_name varchar(255),
				login varchar(255),
				password varchar(255)
            )
        ';

        $this->databaseManager->updateData($sql);
		
        $sql = '
            CREATE TABLE IF NOT EXISTS Words(
                id int PRIMARY KEY AUTO_INCREMENT,
                original varchar(255),
				translation  varchar(255),
				transcription varchar(255),
				language_id varchar(255)
            )
        ';

        $this->databaseManager->updateData($sql);
		
		$sql = '
            CREATE TABLE IF NOT EXISTS Phrases(
                id int PRIMARY KEY AUTO_INCREMENT,
				phrase varchar(255),
                description varchar(255),
				language_id varchar(255)
            )
        ';

        $this->databaseManager->updateData($sql);
		
		$sql = '
            CREATE TABLE IF NOT EXISTS Languages(
                id int PRIMARY KEY AUTO_INCREMENT,
                name varchar(255)
            )
        ';

        $this->databaseManager->updateData($sql);
    }

    /**
     * Удаляет таблицы
     */
    public function dropDatabase()
    {
        $sql = 'DROP TABLE IF EXISTS Users';

        $this->databaseManager->updateData($sql);

        $sql = 'DROP TABLE IF EXISTS Words';

        $this->databaseManager->updateData($sql);

        $sql = 'DROP TABLE IF EXISTS Phrases';

        $this->databaseManager->updateData($sql);
		
		$sql = 'DROP TABLE IF EXISTS Languages';

        $this->databaseManager->updateData($sql);
    }

}