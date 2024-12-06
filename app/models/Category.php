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

public function editCategory($data) {
    $this->db->query('update categories set cat_title=:cat_title, cat_desc=:cat_desc, p_amount=:p_amount, distance=:distance where catId=:id');
    //привязка параметров
    $this->db->bind('id', $data['id']);
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
public function delCategory($id) {
    $this->db->query('delete from categories where catId = :id');     
    $this->db->bind('id', $id);
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