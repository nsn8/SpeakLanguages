<?php

require_once __DIR__.'/router.php';

route('/auth', 'Frontend/auth.html');

route('/', 'Frontend/index.html');

route('/languages', 'Frontend/languages.html');

route('/languages/get', 'Controllers/Languages/get.php');

route('/languages/add', 'Controllers/Languages/add.php');

route('/languages/delete', 'Controllers/Languages/delete.php');

route('/words', 'Frontend/words.html');

route('/words/get', 'Controllers/Words/get.php');

route('/words/add', 'Controllers/Words/add.php');

route('/words/delete', 'Controllers/Words/delete.php');

route('/phrases', 'Frontend/phrases.html');

route('/phrases/get', 'Controllers/Phrases/get.php');

route('/phrases/add', 'Controllers/Phrases/add.php');

route('/phrases/delete', 'Controllers/Phrases/delete.php');

route('/quizes', 'Frontend/quizes.html');

route('/quizes/compose', 'Controllers/Quizes/compose.php');

route('/quizes/process', 'Controllers/Quizes/process.php');
