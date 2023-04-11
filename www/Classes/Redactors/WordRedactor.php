<?php 

include_once 'Classes/DatabaseManager.php';

class WordRedactor 
{
	private DatabaseManager $databaseManager;

    private static WordRedactor $instance;

    private function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }
	
	public static function getInstance(DatabaseManager $databaseManager): WordRedactor
    {
        if (!isset(self::$instance)) {
            self::$instance = new static($databaseManager);
        }

        return self::$instance;
    }
	
	public function getWords($languageId) 
	{
		 return $this->databaseManager->getData("SELECT * FROM Words WHERE language_id=" . $languageId);
	}
	
	public function addWord($languageId, $wordOriginal, $wordTranslation, $wordTranscription) 
	{
		$addString = "('" . $wordOriginal . "', '" . $wordTranslation . "', '" . $wordTranscription . "', '" . $languageId . "')";
		
		$this->databaseManager->updateData("INSERT INTO Words (original, translation, transcription, language_id) VALUES" . $addString);
	}
	
	public function deleteWord($wordId) 
	{
		$this->databaseManager->updateData("DELETE FROM Words WHERE id=" . $wordId);
	}
}
?>