<?php
include "../app/base/App.php"; // подключаем файл App.php
\app\base\App::call()->run(); // в файле App.php вызываем статическую функцию App::call()
                                // и функцию run() (объект класса App не создается)