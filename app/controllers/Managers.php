<?php
class Managers extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->clientModel = $this->model('Client');
        $this->catModel = $this->model('Category');
        $this->prodModel = $this->model('Product');
        $this->messageModel = $this->model('Message');
       }

       public function my_messages() {
        $messages = $this->messageModel->getEmpMessages();
        $data = [
            'messages' => $messages            
        ];
        $this->view('managers/messages', $data);
       }

       public function delprodfromclient($id) {
        if($this->prodModel->delProdFromCl($id)) {
            flash('post_message', 'Запись удалена.');
    // Переход к форме 
    redirect('managers/index');
        }
        else {
            die('Ошибка!');
            }
       }

       public function cl_products($id) {
        $client = $this->clientModel->getClientById($id);
        $prods = $this->prodModel->getClientProds($id);
        $data = [
            'client' => $client ,
            'prods' => $prods
        ];
        $this->view('managers/client_prods', $data);
       }

       public function index() {
        $clients = $this->clientModel->getClients(null);
        $data = [
            'clients' => $clients,                
         ];
         $this->view('managers/index', $data);
       }

public function cl_prods() {
    $clients = $this->clientModel->getClients(null);
    $prods = $this->prodModel->getProds(null);
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
            'clients' => $clients,
            'prods' => $prods,
            'cl' => trim($_POST['cl']),
            'prod' => trim($_POST['prod'])           
        ];
       $this->clientModel->addProdToClient($data);                   
                flash('post_message', 'Решение добавлено.');    
            // Переход к форме 
            redirect('managers/index');
    } else {
        $data = [
           'clients' => $clients,
            'prods' => $prods,
            'cl' => '',
            'prod' => ''       
        ];
        $this->view('managers/add_prod_to_client', $data);
    }
}
    }
