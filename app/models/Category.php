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

}