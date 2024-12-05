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

public function adduser() { // добавление нового пользователя
    // Проверка метода отправки данных (должен быть POST)
    if($_SERVER['REQUEST_METHOD'] == 'POST') { 
        // Санитизация
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);       
        //Загрузка данных из формы
        $data = [ 
            'email' => trim($_POST['email']),
            'role' => trim($_POST['role']),
            'password' =>trim($_POST['password']),            
            'email_err' => '',
            'password_err' => ''               
        ];
        //Валидация почты
        if(empty($data['email']))
        {
            $data['email_err'] = 'Укажите электронный адрес.';
        }
        else 
        {
            // Поиск почты в БД
            if($this->userModel->findUserByEmail($data['email']))
            {
                $data['email_err'] = 'Пользователь с указанным адресом уже существует.';
            }
        } 
        //Валидация пароля
        if(empty($data['password']))
        {
            $data['password_err'] = 'Введите пароль.';
        }
        elseif(strlen($data['password']) < 6)
        {
            $data['password_err'] = 'Длина пароля не менее 6 символов.';
        }
        // Проверка отсутсвия ошибок
        if(empty($data['email_err']) && empty($data['password_err']))
        {  
//Регистрация пользователя
if($this->userModel->register($data))
{
flash('post_message', 'Пользователь добавлен.');
// Переход к форме авторизации
redirect('dashboard/users');
}
else {
die('Ошибка!');
}
}
        else
        {
            //Зaгрузка представления с ошибками
            $this->view('dashboard/adduser', $data);
        }
    }
    else {
        // Зaгрузка данных из формы       
       $data = [        
        'email' => '',
        'role' => '',
        'password' =>'',        
        'email_err' => '',
        'password_err' => ''              
       ];
       
       // Загрузка представления
       $this->view('dashboard/adduser', $data);
            }
}

public function changerules($id) { // редактирование записи о пользователе
    // Проверка метода отправки данных (должен быть POST)
if($_SERVER['REQUEST_METHOD'] == 'POST') { 
    // Санитизация
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);       
    //Загрузка данных из формы
    $data = [ 
        'id' => $id,
        'email' => trim($_POST['email']),
        'role' => trim($_POST['role']),
        'password' =>trim($_POST['password']),            
        'email_err' => '',
        'password_err' => ''               
    ];
    //Валидация почты
    if(empty($data['email']))
    {
        $data['email_err'] = 'Укажите электронный адрес.';
    }   
    //Валидация пароля
    if(empty($data['password']))
    {
        $data['password_err'] = 'Введите пароль.';
    }
    elseif(strlen($data['password']) < 6)
    {
        $data['password_err'] = 'Длина пароля не менее 6 символов.';
    }
    // Проверка отсутсвия ошибок
    if(empty($data['email_err']) && empty($data['password_err']))
    {  
//Регистрация пользователя
if($this->userModel->editUser($data))
{
flash('post_message', 'Данные пользователя изменены.');
// Переход к форме авторизации
redirect('dashboard/users');
}
else {
die('Ошибка!');
}
}
    else
    {
        //Зaгрузка представления с ошибками
        $this->view('dashboard/changerules', $data);
    }
}
else {
    $user = $this->userModel->getUserById($id);
    // Зaгрузка данных из формы       
   $data = [    
    'id'    => $id,
    'email' => $user->email,
    'role' => $user->role,
    'password' =>$user->password,        
    'email_err' => '',
    'password_err' => ''              
   ];   
   // Загрузка представления
   $this->view('dashboard/changerules', $data);
        }
}

public function delete($id) { // удаление пользователя
    if($this->userModel->delUser($id)) {
        flash('post_message', 'Пользователь удален.');
// Переход к форме 
redirect('dashboard/users');
    }
    else {
        die('Ошибка!');
        }
}

}