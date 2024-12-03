<?php
//Загрузка конфигурационного файла
require_once 'config/config.php';
// Load Helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';

//Автозагрузка ядра CMS
spl_autoload_register(function($className){
    require_once 'libraries/'.$className.'.php';
});