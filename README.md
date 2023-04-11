# SpeakLanguages
Course project for PAPS in TPU

Проект запускается при помощи docker-compose

Чтобы запустить проект, нужно перейти в директорию проекта и запустить консольную команду docker-compose up -d
Затем зайти по адресу localhost:8000, авторизоваться при помоши логина/пароля root/test и создать БД myDb
После этого в директории проекта выполнить консольную команду docker-compose exec www php initDb.php
После этого проект должен заработать по адресу localhost:8002
