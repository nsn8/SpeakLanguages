<?php 

include_once 'Classes/DatabaseManager.php';

class LanguageRedactor 
{
	private DatabaseManager $databaseManager;

    private static LanguageRedactor $instance;

    private function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }
	
	public static function getInstance(DatabaseManager $databaseManager): LanguageRedactor
    {
        if (!isset(self::$instance)) {
            self::$instance = new static($databaseManager);
        }

        return self::$instance;
    }
	
	public function getLanguages() 
	{
		 return $this->databaseManager->getData("SELECT * FROM Languages");
	}
	
	public function addLanguage($languageName) 
	{
		$this->databaseManager->updateData("INSERT INTO Languages (name) VALUES ('" . $languageName . "')");
	}
	
	public function deleteLanguage($languageId) 
	{
		$this->databaseManager->updateData("DELETE FROM Languages WHERE id=" . $languageId);
	}
}
?>