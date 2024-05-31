<?php
spl_autoload_register();



echo (new Db('test1', 'users'))->select_id(1)['name']; //Вывод имени пользователя из базы данных по id = 1, через анонимный обьект.






?>
