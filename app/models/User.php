<?php
class User {
    private $db;
public function __construct(){
    $this->db = new Database;
}
// Авторизация пользователя
public function login($email, $password)
{
    $this->db->query('SELECT * FROM users WHERE email = :email');
    $this->db->bind(':email', $email);
    $row = $this->db->single();
    //$hashed_password = $row->password;
    //if(password_verify($password, $hashed_password))
    if($password == $row->password)
    {
        return $row;
    }
    else
    {
        return false;
    }
}

//Поиск пользователя по почте
public function findUserByEmail($email) {
    $this->db->query('SELECT * FROM users WHERE email = :email');
$this->db->bind('email', $email);
$row = $this->db->single();

if($this->db->rowCount() > 0)
{
    return true;
}
else{
    return false;
}
}

// Получение данных пользователя по идентификатору
public function getUserById($id) {
    $this->db->query('SELECT * FROM users WHERE id = :id');
$this->db->bind('id', $id);
$row = $this->db->single();

    return $row;
}

public function getUsers($param) {
    $results = null;
    if($param == null)
    {
    $this->db->query("select * from users");
    $results = $this->db->resultSet();
    } 
    else
    {
    $this->db->query("select * from users where email like '%".$param."%' or login like '%".$param."%' or role like '%".$param."%' ");
    $results = $this->db->resultSet();
    }       
    return $results;
}

//Регистрация
public function register($data)
{
    $this->db->query('INSERT INTO `users`(email, password, role, login, u_group, reg_date, p_upd_date) values (:email, :password, :role, :login, :u_group, :reg_date, :p_upd_date)');
    //привязка параметров    
    $this->db->bind('email', $data['email']);
    $this->db->bind('password', $data['password']);
    $this->db->bind('role', $data['role']);
    $this->db->bind('login', '');   
    $this->db->bind('u_group', $data['role']);  
    $this->db->bind('reg_date', date('Y-m-d')); 
    $this->db->bind('p_upd_date', date('Y-m-d'));   
    // Выполнение запроса
    if($this->db->execute())    {
        return true;
    }    else    {
        return false;
    }
}

public function editUser($data) {    
    $this->db->query('UPDATE users SET email=:email, password=:password, role=:role, u_group=:role where id=:id');
    $this->db->bind('password', $data['password']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('role', $data['role']);    
    $this->db->bind('id', $data['id']);    
    if($this->db->execute())    {
        return true;
    }     else     {
        return false;
    }
 }
}