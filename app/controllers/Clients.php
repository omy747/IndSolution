<?php
class Clients extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->clientModel = $this->model('Client');
        $this->catModel = $this->model('Category');
        $this->prodModel = $this->model('Product');
       }

       public function my_prods() {
        $data = [];
        $prods = null;      
        if(isset($_POST["search"]))    { 
            $param = trim($_POST["fsearch"]);
            $prods = $this->prodModel->getUserProds($param); 
        } else {
            $prods = $this->prodModel->getUserProds(null);        
        }       
        $data = [
            'prods' => $prods           
        ];
        $this->view('clients/my_prods', $data);
       }


       public function index() {  // анкета
        $client = $this->clientModel->getClientForUser();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
            'lname' => trim($_POST['lname'])    ,
            'name' => trim($_POST['name'])    ,
            'pat' => trim($_POST['pat'])    ,            
            'title' => trim($_POST['title'])    ,  
            'address' => trim($_POST['address'])    ,   
            'phone' => trim($_POST['phone'])    ,             
            'client' => $client,
            'lname_err' => '',
            'name_err' => '',
            'title_err' => '',
            'address_err' => '',
            'phone_err' => ''            
        ];

        if(empty($data['lname'])) {
        $data['lname_err'] = "Укажите фамилию";
        }
        if(empty($data['name'])) {
            $data['name_err'] = "Укажите имя";
            }
            if(empty($data['title'])) {
                $data['title_err'] = "Укажите название";
                }
                if(empty($data['address'])) {
                    $data['address_err'] = "Укажите адрес";
                    }
                    if(empty($data['phone'])) {
                        $data['phone_err'] = "Укажите телефон";
                        }        
            if(empty($data['name_err'] ) && empty($data['lname_err'] ) && empty($data['title_err'] ) && empty($data['address_err'] ) && empty($data['phone_err'] )) {
                $this->clientModel->saveClientData($data);
               
                flash('post_message', 'Данные изменены.');    
            // Переход к форме 
            redirect('clients/index');
            } else {
                $this->view('clients/index', $data);
            }       

    } else {
        $data = [
            'client' => $client,
            'lname_err' => '',
            'name_err' => '',
            'title_err' => '',
            'address_err' => '',
            'phone_err' => '' ,   
            'lname' => !empty($client) ?  $client->last_name : ''   ,
            'name' => !empty($client) ?  $client->first_name : ''       ,
            'pat' => !empty($client) ?  $client->patronymic : ''       ,
            'title' => !empty($client) ?  $client->c_title : ''       ,              
            'address' => !empty($client) ?  $client->address : ''       ,
            'phone' => !empty($client) ?  $client->phone : ''       , 
            'lname_err' => '',
            'name_err' => '',
            'title_err' => '',
            'address_err' => '',
            'phone_err' => ''   
        ];
        $this->view('clients/index', $data);
    }     
        //$data = [];
        //$this->view('clients/index', $data);
    }
 

       public function prods() { // страница с решениями
        $data = [];
        $prods = null;      
        if(isset($_POST["search"]))    { 
            $param = trim($_POST["fsearch"]);
            $prods = $this->prodModel->getProds($param); 
        } else {
            $prods = $this->prodModel->getProds(null);        
        }       
        $data = [
            'prods' => $prods           
        ];
        $this->view('clients/prods', $data);
    }

    }