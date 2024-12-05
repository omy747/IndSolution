<?php
class Employee {
    private $db;
public function __construct(){
    $this->db = new Database;
}

public function getEmps($param) {
 $results = null;
    if($param == null)
    {
    $this->db->query("SELECT * FROM employees e, users u WHERE e.ur_id=u.id");
    $results = $this->db->resultSet();
    } 
    else
    {
    $this->db->query("SELECT * FROM employees e, users u WHERE e.ur_id=u.id and (lname like '%".$param."%' or place like '%".$param."%' or department like '%".$param."%')");
    $results = $this->db->resultSet();
    }       
    return $results;
}

public function getEmpById($id) {
    $this->db->query('select * from employees where empid = :id');
    $this->db->bind('id', $id);
    $row = $this->db->single();
    return $row;
}

public function getEmpByUserId($id) {
    $this->db->query('select * from employees e, users u  where e.user_id=u.id and u.id = :id');
    $this->db->bind('id', $id);
    $row = $this->db->single();
    return $row;
}

public function addEmp($data) {
    $this->db->query('INSERT INTO employees(lname, fname, patr, place, department, ur_id, h_date) VALUES (:lname, :fname, :patr, :place, :department, :ur_id, :h_date)');
    //привязка параметров
    $this->db->bind('lname', $data['lname']);
    $this->db->bind('fname', $data['fname']);
    $this->db->bind('patr', $data['patr']);
    $this->db->bind('place', $data['place']);
    $this->db->bind('department', $data['department']);
    $this->db->bind('h_date', $data['h_date']);    
    $this->db->bind('ur_id', $data['user']); 
    // выполнение
    if($this->db->execute())    {
        return true;
    }     else     {
        return false;
    }
}

public function  editEmp($data)   {
    $this->db->query('update employees set lname=:lname, fname=:fname, patr=:patr, place=:place, department=:department, ur_id=:ur_id, h_date=:h_date where empId=:id');   
    $this->db->bind('id', $data['id']);
    $this->db->bind('lname', $data['lname']);
    $this->db->bind('fname', $data['fname']);
    $this->db->bind('patr', $data['patr']);
    $this->db->bind('place', $data['place']);
    $this->db->bind('department', $data['department']);
    $this->db->bind('h_date', $data['h_date']);    
    $this->db->bind('ur_id', $data['user']);   
    if($this->db->execute())    {
        return true;
    }    else    {
        return false;
    }
   }

   public function delEmp($id) {
    $this->db->query('delete from employees where empId = :id');     
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

   public function getFreeEmp() {
    $this->db->query('SELECT * FROM employees e left join tickets t on e.empId=t.emp_id WHERE t.emp_id is null limit 1');
    $result = $this->db->single();
    if($this->db->rowCount() > 0) {
        return $result;
    } else {
        $this->db->query("SELECT count(ticketId) as amount, e.empId FROM employees e, tickets t where e.empId=t.emp_id and status <> 'Завершена' group by e.empId order by amount limit 1");
        $result = $this->db->single();
        return $result;
    }
   }
   

   
   
}