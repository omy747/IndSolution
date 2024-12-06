<?php
class Category {
    private $db;
public function __construct(){
    $this->db = new Database;
}

public function getCats($param) {
    $results = null;
       if($param == null)
       {
       $this->db->query("SELECT * FROM categories");
       $results = $this->db->resultSet();
       } 
       else
       {
       $this->db->query("SELECT * FROM categories WHERE cat_title like '%".$param."%' or cat_desc like '%".$param."%'");
       $results = $this->db->resultSet();
       }       
       return $results;
   }
   public function addCategory($data) {
    $this->db->query('INSERT INTO categories(cat_title, cat_desc, p_amount, distance) VALUES (:cat_title, :cat_desc, :p_amount, :distance)');
    //привязка параметров
    $this->db->bind('cat_title', $data['title']);
    $this->db->bind('cat_desc', $data['desc']);
    $this->db->bind('p_amount', $data['amount']);
    $this->db->bind('distance', $data['dist']);    
    // выполнение
    if($this->db->execute())    {
        return true;
    }     else     {
        return false;
    }
}
}