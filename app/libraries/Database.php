<?php
/*
* PDO класс для работы с БД
* Подключение к БД из конфигурационного файла
* Создание запроса с параметрами
* Возврат результатов запроса
*/
class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct(){
        // установка параметров для подключения к БД
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
    $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    // Создаем экземпляр PDO-класса
    try {
$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
$this->dbh->exec("set names utf8");
    } catch (PDOException $e) {
        $this->error=$e->getMessage();
        echo $this->error;
    }
    }
    // Создание запроса
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    //Привязка значений к параметрам
    public function bind($param, $value, $type=null){
if(is_null($type)) {
    switch (true) {
        case is_int($value):
            $type = PDO::PARAM_INT;
            break;
        case is_bool($value):
            $type = PDO::PARAM_BOOL;
            break;
        case is_null($value):
            $type = PDO::PARAM_NULL;
            break; 
        default:
            $type = PDO::PARAM_STR;            
    }
}
$this->stmt->bindValue($param, $value, $type);
    }
    // Выполнение запросов
    public function execute(){
        return $this->stmt->execute();
    }
    // Представление результата запроса в виде масива объектов
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    // Представление результата как единичного объекта
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    // Подсчет количества строк
    public function rowCount() {
    return $this->stmt->rowCount();
    }

    public function lastId() {
        return $this->dbh->lastInsertId();
    }
}