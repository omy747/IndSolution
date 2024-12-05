<?php
class Dashboard extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
       }

       public function users() {
        $data = [];
        $users = null;      
        if(isset($_POST["search"]))
        { 
            $param = trim($_POST["fsearch"]);
            $users = $this->userModel->getUsers($param); 
        }  
        else
        {
            $users = $this->userModel->getUsers(null);        
        }       
        $data = [
            'users' => $users           
        ];
        $this->view('dashboard/users', $data);
}

}