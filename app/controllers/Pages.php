<?php
class Pages extends Controller {
    public function __construct() {   }
    
    public function index(){ // запуск стартовой страницы приложения
        if(isLoggedIn())   {
           if($_SESSION['user_role'] == "admin"){
         redirect('dashboard/index');
     }  elseif($_SESSION['user_role'] == "emp")  {
         redirect('emps/index'); 
     }   else {
         redirect('pages/index');  
     }
    }   else   {
           $data = [
              'title' => '',
              'description' => ''    
           ];       
           $this->view('pages/index', $data);
        }   
     }
}