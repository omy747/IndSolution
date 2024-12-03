<?php
/*
* Основной класс ядра
* Создает URL и загружает родительский контроллер
* URL формат - /controller/method/params
*/
class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
      
       $url = $this->getUrl();
       // Поиск контроллера
       if(isset($_GET['url'])){
        if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){ 
            // Получение ссылки на контроллер (если найден)
            $this->currentController = ucwords($url[0]);
             unset($url[0]); 
   }
}
       //Подключение файла с контроллером
       require_once '../app/controllers/'.$this->currentController.'.php';
       //Создание экземпляра класса с контроллером
       $this->currentController = new $this->currentController;       
    //Проверка на запрос метода
    if(isset($url[1])) {
        //Поиск метода в контроллере
        if(method_exists($this->currentController, $url[1])) {
        $this->currentMethod = $url[1];
        
        unset($url[1]);
        }
    }   
    //Получение параметров запроса
    $this->params = $url ? array_values($url) : [];

    // Указание параметров для основного класса (контроллер и метод)
    call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
        if(isset($_GET['url']))
        {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }         
    }
}