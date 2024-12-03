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
        $data = [
            'title' => 'Отраслевые решения 1С',
            'description' => 'Внедряем решения от 1С в любой бизнес'    
         ];       
         $this->view('pages/index', $data); 
     }
    }   else   {
           $data = [
              'title' => 'Отраслевые решения 1С',
              'description' => 'Внедряем решения от 1С в любой бизнес'    
           ];       
           $this->view('pages/index', $data);
        }   
     }
}