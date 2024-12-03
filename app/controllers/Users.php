<?php
class Users extends Controller {
    public function __construct(){
$this->userModel = $this->model('User');
    }  
    public function login(){ // авторизация
        // Проверка метода отправки данных из формы
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
             // Санитизация
             $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        // Получение данных
        $data = [            
            'email' => trim($_POST['email']),
            'password' =>trim($_POST['password']),            
            'email_err' => '',
            'password_err' => ''
           
        ];
        //Валидация почты
        if(empty($data['email']))
        {
            $data['email_err'] = 'Укажите адрес электронной почты';
        }      

        //Валидация пароля
        if(empty($data['password']))
        {
            $data['password_err'] = 'Укажите пароль';
        }
        elseif(strlen($data['password']) < 6)
        {
            $data['password_err'] = 'Пароль не может быть короче 6 символов';
        }      
        
        // Проверка на отсутсвие ошибок
        if(empty($data['email_err']) && empty($data['password_err']))
        {

// Создание сессии для пользователя
$loggedInUser = $this->userModel->login($data['email'], $data['password']);
if($loggedInUser)
{
    
$this->createUserSession($loggedInUser);
}
else
{
    $data['password_err'] = 'Пароль не верен.';
    $this->view('users/login', $data);
}
        }
        else
        {
            
            $this->view('users/login', $data);
        }
    }
        else {
           
           $data = [               
               'email' => '',
               'password' =>'',                                    
               'email_err' => '',
               'password_err' => ''               
           ];
           
           $this->view('users/login', $data);
                }
    }
    public function createUserSession($loggedInUser) // создание сессии пользователя
    {
        $_SESSION['user_id'] = $loggedInUser->id;
        $_SESSION['user_email'] = $loggedInUser->email;        
        $_SESSION['user_role'] = $loggedInUser->role;

if($_SESSION['user_role'] == "admin")
{
    redirect('dashboard/index');
}

elseif($_SESSION['user_role'] == "manager")
{
    redirect('orders/index'); 
}

else
{
    $data = [   ];       
     $this->view('clients/index', $data);
    //redirect('pages/index');  
}              
    }

    public function logout() // выход из системы
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);        
        unset($_SESSION['user_role']);
        session_destroy(); 
        redirect('users/login');
    }  

}