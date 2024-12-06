<?php
class Product {
    private $db;
public function __construct(){
    $this->db = new Database;
}

public function delProdFromCl($id) {
    $this->db->query('delete from client_products where cpId = :id');     
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

public function getClientProds($id) {
 $this->db->query("SELECT * FROM clients c, products p, client_products cp where cp.prod_id=p.prodId and cp.client_id=c.clId and c.clId=".$id);
 $results = $this->db->resultSet();
 return $results;
}


public function getUserProds($param) {
    $results = null;
    if($param == null)
    {
    $this->db->query("select * from users u, clients c, client_products cp, products p where p.prodId=cp.prod_id and u.id=c.usr_id and c.clId=cp.client_id and u.id=".$_SESSION['user_id'].";");
    $results = $this->db->resultSet();
    } 
    else
    {
        $this->db->query("select * from users u, clients c, client_products cp, products p where   p.title like '%".$param."%' and p.prodId=cp.prod_id and u.id=c.usr_id and c.clId=cp.client_id and u.id=".$_SESSION['user_id'].";");
    $results = $this->db->resultSet();
    }       
    return $results;
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

public function addProduct($data) {
    $this->db->query('INSERT INTO products(title, cat_id, workers, version, price, platform, descr) VALUES (:title, :cat_id, :workers, :version, :price, :platform, :descr)');
    //привязка параметров
    $this->db->bind('title', $data['title']);
    $this->db->bind('cat_id', $data['cat_id']);
    $this->db->bind('workers', $data['workers']);
    $this->db->bind('version', $data['version']);    
    $this->db->bind('price', $data['price']);
    $this->db->bind('platform', $data['platform']);
    $this->db->bind('descr', $data['desc']);    
    // выполнение
    if($this->db->execute())    {
        return true;
    }     else     {
        return false;
    }
}

public function delProduct($id) {
    $this->db->query('delete from products where prodId = :id');     
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

public function editProduct($data) {
    $this->db->query('update products set title=:title, cat_id=:cat_id, workers=:workers, version=:version, price=:price, platform=:platform, descr=:descr where prodId=:id');
    //привязка параметров
    $this->db->bind('id', $data['id']);
    $this->db->bind('title', $data['title']);
    $this->db->bind('cat_id', $data['cat_id']);
    $this->db->bind('workers', $data['workers']);
    $this->db->bind('version', $data['version']);    
    $this->db->bind('price', $data['price']);
    $this->db->bind('platform', $data['platform']);
    $this->db->bind('descr', $data['desc']);    
    // выполнение
    if($this->db->execute())    {
        return true;
    }     else     {
        return false;
    }
}

public function getProductById($id) {
    $this->db->query('SELECT * FROM products WHERE prodId = :id');
    $this->db->bind('id', $id);
    $row = $this->db->single();    
    return $row;
}
}