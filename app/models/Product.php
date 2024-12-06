<?php
class Product {
    private $db;
public function __construct(){
    $this->db = new Database;
}

public function getProds($param) {
    $results = null;
       if($param == null)
       {
       $this->db->query("SELECT * FROM products p, categories c where p.cat_id=c.catId");
       $results = $this->db->resultSet();
       } 
       else
       {
       $this->db->query("SELECT * FROM products p, categories c WHERE p.cat_id=c.catId and title like '%".$param."%' or descr like '%".$param."%'");
       $results = $this->db->resultSet();
       }       
       return $results;
   }

}