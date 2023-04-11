<?php 

include_once 'Classes/DatabaseManager.php';

class PhraseRedactor 
{
	private DatabaseManager $databaseManager;

    private static PhraseRedactor $instance;

    private function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }
	
	public static function getInstance(DatabaseManager $databaseManager): PhraseRedactor
    {
        if (!isset(self::$instance)) {
            self::$instance = new static($databaseManager);
        }

        return self::$instance;
    }
	
	public function getPhrases($languageId) 
	{
		 return $this->databaseManager->getData("SELECT * FROM Phrases WHERE language_id=" . $languageId);
	}
	
	public function addPhrase($languageId, $phrase, $phraseDescription, $wordTranscription)
	{
		$addString = "('" . $phrase . "', '" . $phraseDescription . "', '" . $languageId . "')";
		
		$this->databaseManager->updateData("INSERT INTO Phrases (phrase, description, language_id) VALUES" . $addString);
	}
	
	public function deletePhrase($phraseId)
	{
		$this->databaseManager->updateData("DELETE FROM Phrases WHERE id=" . $phraseId);
	}
}
?>