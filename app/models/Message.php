<?php
class Message {
    private $db;
public function __construct(){
    $this->db = new Database;
}
public function saveMessage($data) {
    $this->db->query('INSERT INTO messages(m_text, IP, device, country, city, status, op_s) VALUES (:m_text, :IP, :device, :country, :city, :status, :op_s)');
    //привязка параметров
    $this->db->bind('m_text', $data['text']);
    $this->db->bind('IP', '127.0.0.1');
    $this->db->bind('device', 'Компьютер');
    $this->db->bind('country', 'РФ');    
    $this->db->bind('city', 'Москва'); 
    $this->db->bind('status', 'получено'); 
    $this->db->bind('op_s', 'Windows'); 
    // выполнение
    if($this->db->execute())    {
        $this->db->query('INSERT INTO user_messages(sender_id, mess_id, send_date, send_time, reciever_id) VALUES (:sender_id, :mess_id, :send_date, :send_time, :reciever_id)');
        $_id = $this->db->lastId();
        $this->db->bind('sender_id', $_SESSION['user_id']);
        $this->db->bind('mess_id', $_id);
        $this->db->bind('send_date', date('Y-m-d'));
        $this->db->bind('send_time', date("h:i:sa"));
        $this->db->bind('reciever_id', 3);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }        
    }     else     {
        return false;
    }
}
}