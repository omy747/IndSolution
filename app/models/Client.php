<?php
class Client {
    private $db;
public function __construct(){
    $this->db = new Database;
}

public function getClientForUser() {
    $this->db->query('SELECT * FROM clients c, users u WHERE c.usr_id=u.id and usr_id =:id');
    $this->db->bind('id', $_SESSION['user_id']); 
    $row = $this->db->single();
    return $row;
}

public function saveClientData($data) {
    $this->db->query('update clients set last_name=:lname, first_name=:name, patronymic=:patronymic, c_title=:c_title, address=:address, phone=:phone where clId=:id');
        //привязка параметров
        $this->db->bind('lname', $data['lname']);    
        $this->db->bind('name', $data['name']);   
        $this->db->bind('patronymic', $data['pat']);    
        $this->db->bind('c_title', $data['title']);  
        $this->db->bind('address', $data['address']);  
        $this->db->bind('phone', $data['phone']);  
        $this->db->bind('id', $data['client']->clId);       
        // Выполнение запроса
        if($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
}

}