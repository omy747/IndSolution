<?php
/*
* Родительский контроллер
* Загружает модели и представления
*/
class Controller {
    // Загрузка модели
    public function model($model) {
// Подключение файла с моделью
require_once '../app/models/'.$model.'.php';

//Создание экземпляра класса модели
return new $model();
    }

    //Загрузка представления
    public function view($view, $data = []) {
// Проверка наличия файла представления
if(file_exists('../app/views/'.$view.'.php')) {
    require_once '../app/views/'.$view.'.php';
}
else {
    // Представление не существует
    die('Представление не существует!');
}
    }
}