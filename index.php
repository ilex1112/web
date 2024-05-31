<?php
spl_autoload_register();



echo (new Db('test1', 'users'))->select_id(1)['name'];






?>