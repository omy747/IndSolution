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

public function editcat($id) { // добавление нового пользователя
    // Проверка метода отправки данных (должен быть POST)
    if($_SERVER['REQUEST_METHOD'] == 'POST') { 
        // Санитизация
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);       
        //Загрузка данных из формы
        $data = [ 
            'id' => $id,
            'title' => trim($_POST['title']),
            'desc' => trim($_POST['desc']),
            'amount' =>trim($_POST['amount']), 
            'dist' =>trim($_POST['dist']),            
            'title_err' => '',
            'desc_err' => ''               
        ];
        //Валидация почты
        if(empty($data['title']))
        {
            $data['title_err'] = 'Укажите название.';
        }        
        //Валидация пароля
        if(empty($data['desc']))
        {
            $data['desc_err'] = 'Укажите описание.';
        }        
        // Проверка отсутсвия ошибок
        if(empty($data['title_err']) && empty($data['desc_err']))
        {  
//Регистрация пользователя
if($this->catModel->editCategory($data))
{
flash('post_message', 'Категория изменена.');
// Переход к форме авторизации
redirect('dashboard/cats');
}
else {
die('Ошибка!');
}
}
        else
        {
            //Зaгрузка представления с ошибками
            $this->view('dashboard/editcat', $data);
        }
    }
    else {
        // Зaгрузка данных из формы  
        $cat = $this->catModel->getCategoryById($id) ;    
       $data = [   
        'id' => $id,     
        'title' => $cat->cat_title,
            'desc' => $cat->cat_desc,
            'amount' =>$cat->p_amount, 
            'dist' => $cat->distance == 1 ? 'Да':'Нет'  ,            
            'title_err' => '',
            'desc_err' => ''              
       ];
       
       // Загрузка представления
       $this->view('dashboard/editcat', $data);
            }
}

public function delcat($id) { // удаление категории
    if($this->catModel->delCategory($id)) {
        flash('post_message', 'Категория удалена.');
// Переход к форме 
redirect('dashboard/cats');
    }
    else {
        die('Ошибка!');
        }
}

public function addcat() { // добавление нового пользователя
    // Проверка метода отправки данных (должен быть POST)
    if($_SERVER['REQUEST_METHOD'] == 'POST') { 
        // Санитизация
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);       
        //Загрузка данных из формы
        $data = [ 
            'title' => trim($_POST['title']),
            'desc' => trim($_POST['desc']),
            'amount' =>trim($_POST['amount']), 
            'dist' =>trim($_POST['dist']),            
            'title_err' => '',
            'desc_err' => ''               
        ];
        //Валидация почты
        if(empty($data['title']))
        {
            $data['title_err'] = 'Укажите название.';
        }        
        //Валидация пароля
        if(empty($data['desc']))
        {
            $data['desc_err'] = 'Укажите описание.';
        }        
        // Проверка отсутсвия ошибок
        if(empty($data['title_err']) && empty($data['desc_err']))
        {  
//Регистрация пользователя
if($this->catModel->addCategory($data))
{
flash('post_message', 'Категория добавлена.');
// Переход к форме авторизации
redirect('dashboard/cats');
}
else {
die('Ошибка!');
}
}
        else
        {
            //Зaгрузка представления с ошибками
            $this->view('dashboard/addcat', $data);
        }
    }
    else {
        // Зaгрузка данных из формы       
       $data = [        
        'title' => '',
            'desc' => '',
            'amount' =>'', 
            'dist' =>'',            
            'title_err' => '',
            'desc_err' => ''              
       ];
       
       // Загрузка представления
       $this->view('dashboard/addcat', $data);
            }
}


public function cats() { // страница с сотрудниками
    $data = [];
    $cats = null;      
    if(isset($_POST["search"]))    { 
        $param = trim($_POST["fsearch"]);
        $cats = $this->catModel->getCats($param); 
    } else {
        $cats = $this->catModel->getCats(null);        
    }       
    $data = [
        'cats' => $cats           
    ];
    $this->view('dashboard/cats', $data);
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

public function emps() { // страница с сотрудниками
    $data = [];
    $emps = null;      
    if(isset($_POST["search"]))    { 
        $param = trim($_POST["fsearch"]);
        $emps = $this->empModel->getEmps($param); 
    } else {
        $emps = $this->empModel->getEmps(null);        
    }       
    $data = [
        'emps' => $emps           
    ];
    $this->view('dashboard/emps', $data);
}

public function addemp() { //добавление нового сотрудника
    $users = $this->userModel->getUsers(null);
     // Проверка метода отправки данных (должен быть POST)
     if($_SERVER['REQUEST_METHOD'] == 'POST') { 
        // Санитизация
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);        
        //Загрузка данных из формы
        $data = [ 
            'users'  => $users,          
            'lname' => trim($_POST['lname']),
            'fname' => trim($_POST['fname']),
            'patr' => trim($_POST['patr']),
            'place' => trim($_POST['place']),
            'department' => trim($_POST['department']),
            'h_date' => trim($_POST['h_date']),
            'user' => trim($_POST['user']),                           
            'lname_err' => '',
            'fname_err' => '',
            'patr_err' => '',
            'h_date_err' => ''                     
        ];
        //Валидация 
        if(empty($data['lname']))
        {
            $data['lname_err'] = 'Укажите фамилию сотрудника.';
        }  
        if(empty($data['fname']))
        {
            $data['fname_err'] = 'Укажите имя сотрудника.';
        }  
        
        if(empty($data['patr']))
        {
            $data['patr_err'] = 'Укажите отчество сотрудника.';
        }  

        if(empty($data['h_date']))
        {
            $data['h_date_err'] = 'Укажите дату найма сотрудника.';
        }       
        // Проверка отсутсвия ошибок
        if(empty($data['lname_err']) && empty($data['fname_err']) && empty($data['h_date_err']))
        {
if($this->empModel->addEmp($data))
{
flash('post_message', 'Сотрудник добавлен.');
// Переход к форме 
redirect('dashboard/emps');
} else {
die('Ошибка!');
}
}        else
        {
            //Зaгрузка представления с ошибками
            $this->view('dashboard/addemp', $data);
        }
    }    else {
        
        // Зaгрузка данных из формы     
        $data = [ 
            'users' => $users,
            'lname' => '',
            'fname' => '',
            'patr' => '',
            'place' => '',
            'department' => '',
            'h_date' => '',
            'user' => '',                           
            'lname_err' => '',
            'fname_err' => '',
            'patr_err' => '',
            'h_date_err' => ''        
       ];       
       // Загрузка представления
       $this->view('dashboard/addemp', $data);
            }
}

public function editemp($id) { // редактирование сотрудника
    $users = $this->userModel->getUsers(null);
     // Проверка метода отправки данных (должен быть POST)
     if($_SERVER['REQUEST_METHOD'] == 'POST') { 
        // Санитизация
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);        
        //Загрузка данных из формы
        $data = [ 
            'id' => $id,
            'users'  => $users,          
            'lname' => trim($_POST['lname']),
            'fname' => trim($_POST['fname']),
            'patr' => trim($_POST['patr']),
            'place' => trim($_POST['place']),
            'department' => trim($_POST['department']),
            'h_date' => trim($_POST['h_date']),
            'user' => trim($_POST['user']),                           
            'lname_err' => '',
            'fname_err' => '',
            'patr_err' => '',
            'h_date_err' => ''                        
        ];
        //Валидация 
        if(empty($data['lname']))
        {
            $data['lname_err'] = 'Укажите фамилию сотрудника.';
        }     
        if(empty($data['fname']))
        {
            $data['fname_err'] = 'Укажите имя сотрудника.';
        }        

        if(empty($data['h_date']))
        {
            $data['hdate_err'] = 'Укажите дату найма сотрудника.';
        }       
        // Проверка отсутсвия ошибок
        if(empty($data['lname_err']) && empty($data['fname_err']) && empty($data['h_date_err']))
        {
if($this->empModel->editEmp($data)){
flash('post_message', 'Запись о сотруднике изменена.');
// Переход к форме 
redirect('dashboard/emps');
} else {
die('Ошибка!');
}
}        else
        {
            //Зaгрузка представления с ошибками
            $this->view('dashboard/editemp', $data);
        }
    }    else {
        $emp = $this->empModel->getEmpById($id);
        // Зaгрузка данных из формы     
        $data = [ 
            'id' => $id,
            'users' => $users, 
            'lname' => $emp->lname,
            'fname' => $emp->fname,
            'patr' => $emp->patr,
            'place' => $emp->place,
            'department' => $emp->department,
            'h_date' => $emp->h_date,
            'user' => $emp->ur_id,                           
            'lname_err' => '',
            'fname_err' => '',
            'patr_err' => '',
            'h_date_err' => ''    
       ];       
       // Загрузка представления
       $this->view('dashboard/editemp', $data);
            }
}

public function delEmp($id) { // удаление сотрудника
    if($this->empModel->delEmp($id)) {
        flash('post_message', 'Сотрудник удален.');
// Переход к форме 
redirect('dashboard/emps');
    }
    else {
        die('Ошибка!');
        }
}

}