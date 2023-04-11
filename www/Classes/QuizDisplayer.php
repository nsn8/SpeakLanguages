<?php 

include_once 'Classes/DatabaseManager.php';
include_once 'Classes/Redactors/WordRedactor.php';
include_once 'Classes/Redactors/PhraseRedactor.php';

class QuizDisplayer 
{
	private DatabaseManager $databaseManager;

    private static QuizDisplayer $instance;

    private function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }
	
	public static function getInstance(DatabaseManager $databaseManager): QuizDisplayer
    {
        if (!isset(self::$instance)) {
            self::$instance = new static($databaseManager);
        }

        return self::$instance;
    }
	
	public function compose($useWords, $usePhrases, $languageId) 
	{
		$questions = [];
		
		$questionNumber = 1;
		
		if ($useWords) {
			$allWords = WordRedactor::getInstance($this->databaseManager)->getWords($languageId);
			
			$quantity = count($allWords) >= 5 ? 5 : count($allWords);
			
			$quizKeys = array_rand($allWords, $quantity);
			
			foreach($quizKeys as $key) {
				$quizItem = [
					'question' => $allWords[$key]['original'],
					'answer'   => $allWords[$key]['translation'],
					'type'     => 'word',
					'number'   => $questionNumber
 				];
				
				$questions[] = $quizItem;
				$questionNumber++;
			}
		}
		
		if ($usePhrases) {
			$allPhrases = PhraseRedactor::getInstance($this->databaseManager)->getPhrases($languageId);
			
			$quantity = count($allPhrases) >= 5 ? 5 : count($allPhrases);
			
			$quizKeys = array_rand($allPhrases, $quantity);
			
			
			
			foreach($quizKeys as $key) {
				$quizItem = [
					'question' => $allPhrases[$key]['description'],
					'answer'   => $allPhrases[$key]['phrase'],
					'type'     => 'phrase',
					'number'   => $questionNumber
 				];
				
				$questions[] = $quizItem;
				$questionNumber++;
			}
		}
		
		return $questions;
	}
	
	public function process($questions)
	{
		$correctAnswers = 0;
		$wrongAnswers = 0;
		
		$correctNumbers = [];
		$wrongNumbers = [];
		
		foreach ($questions as $question) { 
			if ($question['result'] == $question['answer']) {
				$correctAnswers++;
				$correctNumbers[] = $question['number'];
				continue;
			} 
			
			$wrongAnswers++;
			$wrongNumbers[] = $question['number'];
		}
		
		$result = [
			'result'         => 'Правильных ответов - ' . $correctAnswers . ', Неправильных ответов - ' . $wrongAnswers,
			'correctNumbers' => $correctNumbers,
			'wrongNumbers'   => $wrongNumbers
		];
		
		return $result;
	}
}
?>